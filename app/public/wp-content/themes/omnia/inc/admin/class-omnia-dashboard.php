<?php
/**
 * Omnia Admin — Dashboard overview page.
 *
 * Shows: unread counts, weekly totals, recent devis, recent messages,
 * and a service breakdown. Purely read-only; no state changes here.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class Omnia_Admin_Dashboard {

    /* ── Service labels (mirrors class-omnia-devis.php) ──── */
    private static array $service_labels = [
        'assurances'   => 'Assurances',
        'billeterie'   => 'Billeterie',
        'mobile-money' => 'Mobile Money',
        'canal'        => 'Canal+',
    ];

    /* ── Entry point ────────────────────────────────────────── */

    public static function render(): void {
        if ( ! current_user_can( 'manage_options' ) ) return;

        $stats   = self::get_stats();
        $devis   = self::get_recent( 'omnia_devis',   5 );
        $msgs    = self::get_recent( 'omnia_message', 5 );
        $by_svc  = self::get_by_service();
        ?>
        <div class="wrap omnia-wrap">
            <h1 class="omnia-page-title">
                <span class="dashicons dashicons-store"></span>
                Tableau de bord Omnia
            </h1>

            <!-- ── Stats row ─────────────────────────────── -->
            <div class="omnia-stats-row">

                <div class="omnia-stat omnia-stat--alert">
                    <span class="omnia-stat__value"><?php echo esc_html( $stats['devis_unread'] ); ?></span>
                    <span class="omnia-stat__label">Devis non lus</span>
                    <a href="<?php echo esc_url( admin_url('admin.php?page=omnia-devis&status=nouveau') ); ?>" class="omnia-stat__link">Voir →</a>
                </div>

                <div class="omnia-stat omnia-stat--alert">
                    <span class="omnia-stat__value"><?php echo esc_html( $stats['msgs_unread'] ); ?></span>
                    <span class="omnia-stat__label">Messages non lus</span>
                    <a href="<?php echo esc_url( admin_url('admin.php?page=omnia-messages&status=nouveau') ); ?>" class="omnia-stat__link">Voir →</a>
                </div>

                <div class="omnia-stat">
                    <span class="omnia-stat__value"><?php echo esc_html( $stats['devis_week'] ); ?></span>
                    <span class="omnia-stat__label">Devis cette semaine</span>
                    <a href="<?php echo esc_url( admin_url('admin.php?page=omnia-devis') ); ?>" class="omnia-stat__link">Voir →</a>
                </div>

                <div class="omnia-stat">
                    <span class="omnia-stat__value"><?php echo esc_html( $stats['msgs_week'] ); ?></span>
                    <span class="omnia-stat__label">Messages cette semaine</span>
                    <a href="<?php echo esc_url( admin_url('admin.php?page=omnia-messages') ); ?>" class="omnia-stat__link">Voir →</a>
                </div>

                <div class="omnia-stat omnia-stat--muted">
                    <span class="omnia-stat__value"><?php echo esc_html( $stats['devis_total'] ); ?></span>
                    <span class="omnia-stat__label">Total devis</span>
                </div>

                <div class="omnia-stat omnia-stat--muted">
                    <span class="omnia-stat__value"><?php echo esc_html( $stats['msgs_total'] ); ?></span>
                    <span class="omnia-stat__label">Total messages</span>
                </div>

            </div>

            <!-- ── Main content grid ─────────────────────── -->
            <div class="omnia-dashboard-grid">

                <!-- Recent devis -->
                <div class="omnia-card">
                    <div class="omnia-card__header">
                        <h2 class="omnia-card__title">Dernières demandes de devis</h2>
                        <a href="<?php echo esc_url( admin_url('admin.php?page=omnia-devis') ); ?>" class="omnia-card__action">Voir toutes →</a>
                    </div>

                    <?php if ( $devis ) : ?>
                    <table class="omnia-table omnia-table--compact widefat">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Service</th>
                                <th>Nom</th>
                                <th>Téléphone</th>
                                <th>Statut</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ( $devis as $item ) :
                            $service = get_post_meta( $item->ID, '_omnia_service',   true ) ?: '—';
                            $nom     = get_post_meta( $item->ID, '_omnia_nom',       true ) ?: '—';
                            $tel     = get_post_meta( $item->ID, '_omnia_telephone', true ) ?: '—';
                            $status  = get_post_meta( $item->ID, '_omnia_status',    true ) ?: 'nouveau';
                            $read    = get_post_meta( $item->ID, '_omnia_read',      true );
                            $svc_lbl = self::$service_labels[ $service ] ?? ucfirst( $service );
                            $url     = admin_url( 'admin.php?page=omnia-devis&action=view&id=' . $item->ID );
                            ?>
                            <tr class="omnia-row<?php echo ! $read ? ' omnia-row--unread' : ''; ?>">
                                <td class="omnia-col-date"><?php echo esc_html( get_the_date( 'd/m H:i', $item ) ); ?></td>
                                <td><span class="omnia-badge omnia-badge--<?php echo esc_attr( $service ); ?>"><?php echo esc_html( $svc_lbl ); ?></span></td>
                                <td><?php echo esc_html( $nom ); ?></td>
                                <td><?php echo esc_html( $tel ); ?></td>
                                <td><span class="omnia-status omnia-status--<?php echo esc_attr( $status ); ?>"><?php echo esc_html( self::status_label( $status ) ); ?></span></td>
                                <td><a href="<?php echo esc_url( $url ); ?>" class="button button-small">Voir</a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                    <p class="omnia-empty-inline">Aucune demande de devis pour le moment.</p>
                    <?php endif; ?>
                </div>

                <!-- Recent messages -->
                <div class="omnia-card">
                    <div class="omnia-card__header">
                        <h2 class="omnia-card__title">Derniers messages</h2>
                        <a href="<?php echo esc_url( admin_url('admin.php?page=omnia-messages') ); ?>" class="omnia-card__action">Voir tous →</a>
                    </div>

                    <?php if ( $msgs ) : ?>
                    <table class="omnia-table omnia-table--compact widefat">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Objet</th>
                                <th>De</th>
                                <th>Statut</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ( $msgs as $item ) :
                            $prenom = get_post_meta( $item->ID, '_omnia_prenom', true ) ?: '';
                            $nom    = get_post_meta( $item->ID, '_omnia_nom',    true ) ?: '—';
                            $objet  = get_post_meta( $item->ID, '_omnia_objet',  true ) ?: '—';
                            $status = get_post_meta( $item->ID, '_omnia_status', true ) ?: 'nouveau';
                            $read   = get_post_meta( $item->ID, '_omnia_read',   true );
                            $full   = trim( $prenom . ' ' . $nom );
                            $url    = admin_url( 'admin.php?page=omnia-messages&action=view&id=' . $item->ID );
                            ?>
                            <tr class="omnia-row<?php echo ! $read ? ' omnia-row--unread' : ''; ?>">
                                <td class="omnia-col-date"><?php echo esc_html( get_the_date( 'd/m H:i', $item ) ); ?></td>
                                <td><span class="omnia-badge omnia-badge--objet"><?php echo esc_html( $objet ); ?></span></td>
                                <td><?php echo esc_html( $full ); ?></td>
                                <td><span class="omnia-status omnia-status--<?php echo esc_attr( $status ); ?>"><?php echo esc_html( self::status_label( $status ) ); ?></span></td>
                                <td><a href="<?php echo esc_url( $url ); ?>" class="button button-small">Lire</a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                    <p class="omnia-empty-inline">Aucun message reçu pour le moment.</p>
                    <?php endif; ?>
                </div>

                <!-- Service breakdown -->
                <div class="omnia-card omnia-card--breakdown">
                    <h2 class="omnia-card__title">Répartition par service</h2>
                    <ul class="omnia-breakdown">
                        <?php foreach ( $by_svc as $svc => $count ) :
                            $label  = self::$service_labels[ $svc ] ?? ucfirst( $svc );
                            $pct    = $stats['devis_total'] > 0
                                ? round( ( $count / $stats['devis_total'] ) * 100 )
                                : 0;
                            ?>
                            <li class="omnia-breakdown__item">
                                <div class="omnia-breakdown__meta">
                                    <span class="omnia-badge omnia-badge--<?php echo esc_attr( $svc ); ?>"><?php echo esc_html( $label ); ?></span>
                                    <span class="omnia-breakdown__count"><?php echo esc_html( $count ); ?></span>
                                </div>
                                <div class="omnia-breakdown__bar-wrap">
                                    <div class="omnia-breakdown__bar" style="width:<?php echo esc_attr( $pct ); ?>%"></div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div><!-- /.omnia-dashboard-grid -->
        </div>
        <?php
    }

    /* ── Data helpers ───────────────────────────────────────── */

    private static function get_stats(): array {
        $week_start = date( 'Y-m-d', strtotime( 'monday this week' ) );

        return [
            'devis_unread' => self::count_unread( 'omnia_devis' ),
            'msgs_unread'  => self::count_unread( 'omnia_message' ),
            'devis_week'   => self::count_since( 'omnia_devis',   $week_start ),
            'msgs_week'    => self::count_since( 'omnia_message', $week_start ),
            'devis_total'  => self::count_all( 'omnia_devis' ),
            'msgs_total'   => self::count_all( 'omnia_message' ),
        ];
    }

    private static function count_unread( string $post_type ): int {
        $q = new WP_Query( [
            'post_type'      => $post_type,
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'meta_query'     => [ [ 'key' => '_omnia_read', 'value' => '0', 'compare' => '=' ] ],
        ] );
        return $q->found_posts;
    }

    private static function count_since( string $post_type, string $date ): int {
        $q = new WP_Query( [
            'post_type'      => $post_type,
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'date_query'     => [ [ 'after' => $date, 'inclusive' => true ] ],
        ] );
        return $q->found_posts;
    }

    private static function count_all( string $post_type ): int {
        $counts = wp_count_posts( $post_type );
        return intval( $counts->publish ?? 0 );
    }

    private static function get_recent( string $post_type, int $limit ): array {
        return get_posts( [
            'post_type'      => $post_type,
            'post_status'    => 'publish',
            'posts_per_page' => $limit,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ] );
    }

    private static function get_by_service(): array {
        $result = [];
        foreach ( array_keys( self::$service_labels ) as $svc ) {
            $q = new WP_Query( [
                'post_type'      => 'omnia_devis',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'fields'         => 'ids',
                'meta_query'     => [ [ 'key' => '_omnia_service', 'value' => $svc ] ],
            ] );
            $result[ $svc ] = $q->found_posts;
        }
        arsort( $result );
        return $result;
    }

    private static function status_label( string $status ): string {
        return match ( $status ) {
            'nouveau'  => 'Nouveau',
            'en_cours' => 'En cours',
            'traite'   => 'Traité',
            default    => ucfirst( $status ),
        };
    }
}
