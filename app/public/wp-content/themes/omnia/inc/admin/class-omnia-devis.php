<?php
/**
 * Omnia Admin — Devis CPT + admin table.
 *
 * CPT: omnia_devis
 * Meta keys stored per submission:
 *   _omnia_service   string   assurances|billeterie|mobile-money|canal|contact
 *   _omnia_prenom    string
 *   _omnia_nom       string
 *   _omnia_telephone string
 *   _omnia_email     string
 *   _omnia_details   array    (serialized) extra conditional fields
 *   _omnia_status    string   nouveau|en_cours|traite
 *   _omnia_read      int      0|1
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class Omnia_Admin_Devis {

    /* ── Service labels ─────────────────────────────────────── */
    private static array $service_labels = [
        'assurances'   => 'Assurances',
        'billeterie'   => 'Billeterie',
        'mobile-money' => 'Mobile Money',
        'canal'        => 'Canal+',
        'contact'      => 'Contact',
    ];

    private static array $status_labels = [
        'nouveau'   => 'Nouveau',
        'en_cours'  => 'En cours',
        'traite'    => 'Traité',
    ];

    /* ── Bootstrap ──────────────────────────────────────────── */

    public function __construct() {
        add_action( 'init',    [ $this, 'register_cpt' ] );
        add_action( 'wp_ajax_omnia_devis_status', [ $this, 'ajax_update_status' ] );
        add_action( 'wp_ajax_omnia_devis_read',   [ $this, 'ajax_mark_read' ] );
    }

    /* ── CPT registration ───────────────────────────────────── */

    public function register_cpt(): void {
        register_post_type( 'omnia_devis', [
            'labels'              => [
                'name'          => 'Demandes de devis',
                'singular_name' => 'Demande de devis',
            ],
            'public'              => false,
            'publicly_queryable'  => false,
            'show_ui'             => false,
            'show_in_menu'        => false,
            'show_in_rest'        => false,
            'capability_type'     => 'post',
            'supports'            => [ 'title', 'custom-fields' ],
            'rewrite'             => false,
        ] );
    }

    /* ── AJAX handlers ──────────────────────────────────────── */

    public function ajax_update_status(): void {
        check_ajax_referer( 'omnia_admin_nonce', 'nonce' );
        if ( ! current_user_can( 'manage_options' ) ) wp_send_json_error( 'Unauthorized', 403 );

        $id     = intval( $_POST['id'] ?? 0 );
        $status = sanitize_key( $_POST['status'] ?? '' );

        if ( ! $id || ! array_key_exists( $status, self::$status_labels ) ) {
            wp_send_json_error( 'Invalid data' );
        }

        update_post_meta( $id, '_omnia_status', $status );
        if ( $status !== 'nouveau' ) {
            update_post_meta( $id, '_omnia_read', 1 );
        }

        wp_send_json_success( [
            'label' => self::$status_labels[ $status ],
            'status' => $status,
        ] );
    }

    public function ajax_mark_read(): void {
        check_ajax_referer( 'omnia_admin_nonce', 'nonce' );
        if ( ! current_user_can( 'manage_options' ) ) wp_send_json_error( 'Unauthorized', 403 );

        $id = intval( $_POST['id'] ?? 0 );
        if ( ! $id ) wp_send_json_error( 'Invalid id' );

        update_post_meta( $id, '_omnia_read', 1 );
        wp_send_json_success();
    }

    /* ── Page render entry point ────────────────────────────── */

    public static function render(): void {
        if ( ! current_user_can( 'manage_options' ) ) return;

        $action = sanitize_key( $_GET['action'] ?? 'list' );
        $id     = intval( $_GET['id'] ?? 0 );

        if ( $action === 'view' && $id ) {
            self::render_detail( $id );
        } else {
            self::render_list();
        }
    }

    /* ── List view ──────────────────────────────────────────── */

    private static function render_list(): void {
        $status_filter  = sanitize_key( $_GET['status'] ?? 'all' );
        $current_page   = max( 1, intval( $_GET['paged'] ?? 1 ) );
        $per_page       = 20;

        $query_args = [
            'post_type'      => 'omnia_devis',
            'post_status'    => 'publish',
            'posts_per_page' => $per_page,
            'paged'          => $current_page,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ];

        if ( $status_filter && $status_filter !== 'all' ) {
            $query_args['meta_query'] = [ [
                'key'     => '_omnia_status',
                'value'   => $status_filter,
                'compare' => '=',
            ] ];
        }

        $query      = new WP_Query( $query_args );
        $total      = $query->found_posts;
        $total_pages = ceil( $total / $per_page );

        // Tab counts
        $tab_counts = self::get_tab_counts();

        $base_url = admin_url( 'admin.php?page=omnia-devis' );
        ?>
        <div class="wrap omnia-wrap">
            <h1 class="omnia-page-title">
                <span class="dashicons dashicons-portfolio"></span>
                Demandes de devis
                <span class="omnia-total-count"><?php echo esc_html( $total ); ?> demande<?php echo $total !== 1 ? 's' : ''; ?></span>
            </h1>

            <!-- Status tabs -->
            <nav class="omnia-tabs" aria-label="Filtrer par statut">
                <?php
                $tabs = [ 'all' => 'Toutes' ] + self::$status_labels;
                foreach ( $tabs as $key => $label ) :
                    $count    = $tab_counts[ $key ] ?? 0;
                    $active   = ( $status_filter === $key || ( $key === 'all' && ! $status_filter ) ) ? ' omnia-tab--active' : '';
                    $tab_url  = add_query_arg( [ 'page' => 'omnia-devis', 'status' => $key ], admin_url( 'admin.php' ) );
                    ?>
                    <a href="<?php echo esc_url( $tab_url ); ?>" class="omnia-tab<?php echo $active; ?>">
                        <?php echo esc_html( $label ); ?>
                        <span class="omnia-tab__count"><?php echo esc_html( $count ); ?></span>
                    </a>
                <?php endforeach; ?>
            </nav>

            <?php if ( $query->have_posts() ) : ?>
            <table class="omnia-table widefat striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Service</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ( $query->have_posts() ) : $query->the_post();
                    $pid     = get_the_ID();
                    $service = get_post_meta( $pid, '_omnia_service',   true ) ?: '—';
                    $prenom  = get_post_meta( $pid, '_omnia_prenom',    true ) ?: '—';
                    $nom     = get_post_meta( $pid, '_omnia_nom',       true ) ?: '—';
                    $tel     = get_post_meta( $pid, '_omnia_telephone', true ) ?: '—';
                    $email   = get_post_meta( $pid, '_omnia_email',     true ) ?: '—';
                    $status  = get_post_meta( $pid, '_omnia_status',    true ) ?: 'nouveau';
                    $read    = get_post_meta( $pid, '_omnia_read',      true );
                    $svc_lbl = self::$service_labels[ $service ] ?? ucfirst( $service );
                    $detail_url = add_query_arg( [ 'page' => 'omnia-devis', 'action' => 'view', 'id' => $pid ], admin_url( 'admin.php' ) );
                    ?>
                    <tr class="omnia-row<?php echo ! $read ? ' omnia-row--unread' : ''; ?>" data-id="<?php echo $pid; ?>">
                        <td class="omnia-col-id">
                            <?php if ( ! $read ) : ?>
                                <span class="omnia-unread-dot" title="Non lu" aria-label="Non lu"></span>
                            <?php endif; ?>
                            <?php echo esc_html( $pid ); ?>
                        </td>
                        <td class="omnia-col-date"><?php echo esc_html( get_the_date( 'd/m/Y H:i' ) ); ?></td>
                        <td><span class="omnia-badge omnia-badge--<?php echo esc_attr( $service ); ?>"><?php echo esc_html( $svc_lbl ); ?></span></td>
                        <td><?php echo esc_html( $prenom ); ?></td>
                        <td><?php echo esc_html( $nom ); ?></td>
                        <td><?php echo esc_html( $tel ); ?></td>
                        <td><?php echo esc_html( $email ); ?></td>
                        <td>
                            <select class="omnia-status-select" data-id="<?php echo $pid; ?>" data-type="devis">
                                <?php foreach ( self::$status_labels as $skey => $slabel ) : ?>
                                    <option value="<?php echo esc_attr( $skey ); ?>"<?php selected( $status, $skey ); ?>>
                                        <?php echo esc_html( $slabel ); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <a href="<?php echo esc_url( $detail_url ); ?>" class="button button-small">Voir</a>
                        </td>
                    </tr>
                <?php endwhile; wp_reset_postdata(); ?>
                </tbody>
            </table>

            <?php if ( $total_pages > 1 ) : ?>
            <div class="omnia-pagination">
                <?php
                echo paginate_links( [
                    'base'      => add_query_arg( 'paged', '%#%' ),
                    'format'    => '',
                    'current'   => $current_page,
                    'total'     => $total_pages,
                    'prev_text' => '&laquo; Précédent',
                    'next_text' => 'Suivant &raquo;',
                ] );
                ?>
            </div>
            <?php endif; ?>

            <?php else : ?>
            <div class="omnia-empty">
                <span class="dashicons dashicons-inbox"></span>
                <p>Aucune demande de devis pour le moment.</p>
            </div>
            <?php endif; ?>
        </div>
        <?php
    }

    /* ── Detail view ────────────────────────────────────────── */

    private static function render_detail( int $id ): void {
        $post = get_post( $id );
        if ( ! $post || $post->post_type !== 'omnia_devis' ) {
            echo '<div class="wrap"><p>Demande introuvable.</p></div>';
            return;
        }

        // Mark as read automatically
        update_post_meta( $id, '_omnia_read', 1 );

        $service = get_post_meta( $id, '_omnia_service',   true ) ?: '—';
        $prenom  = get_post_meta( $id, '_omnia_prenom',    true ) ?: '—';
        $nom     = get_post_meta( $id, '_omnia_nom',       true ) ?: '—';
        $tel     = get_post_meta( $id, '_omnia_telephone', true ) ?: '—';
        $email   = get_post_meta( $id, '_omnia_email',     true ) ?: '—';
        $status  = get_post_meta( $id, '_omnia_status',    true ) ?: 'nouveau';
        $details = get_post_meta( $id, '_omnia_details',   true ) ?: [];
        $svc_lbl = self::$service_labels[ $service ] ?? ucfirst( $service );
        $back_url = admin_url( 'admin.php?page=omnia-devis' );

        $label_map = [
            'operateur'      => 'Opérateur',
            'montant'        => 'Montant',
            'ville_dest'     => 'Ville destinataire',
            'sous_service'   => 'Sous-service',
            'type_vehicule'  => 'Type de véhicule',
            'marque'         => 'Marque',
            'modele'         => 'Modèle',
            'annee'          => 'Année',
            'immatriculation'=> 'Immatriculation',
            'nb_personnes'   => 'Nombre de personnes',
            'statut_sante'   => 'Statut',
            'statut_hab'     => 'Statut propriétaire',
            'superficie'     => 'Superficie (m²)',
            'type_lourd'     => 'Type poids lourd',
            'nb_vehicules'   => 'Nombre de véhicules',
            'num_passeport'      => 'Numéro de passeport',
            'lieu_delivrance'    => 'Lieu de délivrance',
            'date_delivrance'    => 'Date de délivrance',
            'date_expiration'    => 'Date d\'expiration',
            'carte_grise'        => 'Carte grise',
            'permis_conduire'    => 'Permis de conduire',
            'controle_technique' => 'Contrôle technique',
            'ville_depart'                => 'Ville de départ',
            'destination'                 => 'Destination',
            'date_depart'                 => 'Date de départ',
            'date_retour'                 => 'Date de retour',
            'nb_passagers'                => 'Nombre de passagers',
            'type_billet'                 => 'Type de billet',
            'zone_voyage'                 => 'Zone de voyage',
            'classe_billet'               => 'Classe du billet',
            'admin_passeport'             => 'Passeport valide',
            'admin_visa'                  => 'Visa',
            'admin_titre_sejour'          => 'Titre de séjour',
            'admin_assistance_visa'       => 'Assistance visa',
            'infos_documents'             => 'Infos documents',
            'pref_vol_direct'             => 'Vol direct uniquement',
            'pref_escales'                => 'Escales acceptées',
            'pref_bagage'                 => 'Bagage en soute',
            'pref_horaires_flexibles'     => 'Horaires flexibles',
            'service_hotel'               => 'Réservation hôtel',
            'service_assurance_voyage'    => 'Assurance voyage',
            'service_assistance_aeroport' => 'Assistance aéroport',
            'service_location_voiture'    => 'Location de voiture',
            'budget'                      => 'Budget estimatif',
            'devise'                      => 'Devise',
            'type_canal'     => 'Type (Abonnement / Réabonnement)',
            'bouquet'        => 'Bouquet',
            'objet'          => 'Objet',
            'message'        => 'Message',
        ];
        ?>
        <div class="wrap omnia-wrap">
            <h1 class="omnia-page-title">
                <span class="dashicons dashicons-portfolio"></span>
                Demande #<?php echo esc_html( $id ); ?>
                <a href="<?php echo esc_url( $back_url ); ?>" class="page-title-action">
                    &larr; Retour à la liste
                </a>
            </h1>

            <div class="omnia-detail-grid">

                <!-- Main info card -->
                <div class="omnia-card">
                    <h2 class="omnia-card__title">Informations du contact</h2>
                    <dl class="omnia-dl">
                        <dt>Service</dt>
                        <dd><span class="omnia-badge omnia-badge--<?php echo esc_attr( $service ); ?>"><?php echo esc_html( $svc_lbl ); ?></span></dd>

                        <dt>Prénom</dt>
                        <dd><?php echo esc_html( $prenom ); ?></dd>

                        <dt>Nom</dt>
                        <dd><?php echo esc_html( $nom ); ?></dd>

                        <dt>Téléphone</dt>
                        <dd>
                            <a href="tel:+229<?php echo esc_attr( preg_replace( '/\D/', '', $tel ) ); ?>">
                                +229 <?php echo esc_html( $tel ); ?>
                            </a>
                        </dd>

                        <?php if ( $email && $email !== '—' ) : ?>
                        <dt>Email</dt>
                        <dd><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></dd>
                        <?php endif; ?>

                        <dt>Date</dt>
                        <dd><?php echo esc_html( get_the_date( 'd/m/Y à H:i', $post ) ); ?></dd>
                    </dl>
                </div>

                <!-- Conditional details card -->
                <?php if ( ! empty( $details ) && is_array( $details ) ) : ?>
                <div class="omnia-card">
                    <h2 class="omnia-card__title">Détails de la demande</h2>
                    <?php $file_fields = ['carte_grise', 'permis_conduire', 'controle_technique']; ?>
                    <dl class="omnia-dl">
                        <?php foreach ( $details as $key => $value ) :
                            if ( $value === '' || $value === null ) continue;
                            $lbl = $label_map[ $key ] ?? ucwords( str_replace( '_', ' ', $key ) );
                            ?>
                            <dt><?php echo esc_html( $lbl ); ?></dt>
                            <?php if ( in_array( $key, $file_fields, true ) ) : ?>
                                <dd><a href="<?php echo esc_url( $value ); ?>" target="_blank" rel="noopener">Télécharger</a></dd>
                            <?php else : ?>
                                <dd style="white-space: pre-wrap"><?php echo esc_html( $value ); ?></dd>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </dl>
                </div>
                <?php endif; ?>

                <!-- Status card -->
                <div class="omnia-card omnia-card--sidebar">
                    <h2 class="omnia-card__title">Statut</h2>
                    <select id="omnia-detail-status" class="omnia-status-select widefat" data-id="<?php echo $id; ?>" data-type="devis">
                        <?php foreach ( self::$status_labels as $skey => $slabel ) : ?>
                            <option value="<?php echo esc_attr( $skey ); ?>"<?php selected( $status, $skey ); ?>>
                                <?php echo esc_html( $slabel ); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <p class="omnia-card__hint">Le statut est sauvegardé automatiquement.</p>

                    <hr class="omnia-card__sep">

                    <a href="tel:+229<?php echo esc_attr( preg_replace( '/\D/', '', $tel ) ); ?>" class="button button-primary omnia-btn-block">
                        <span class="dashicons dashicons-phone"></span> Appeler
                    </a>
                    <?php if ( $email && $email !== '—' ) : ?>
                    <a href="mailto:<?php echo esc_attr( $email ); ?>" class="button omnia-btn-block" style="margin-top:8px">
                        <span class="dashicons dashicons-email-alt"></span> Envoyer un email
                    </a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <?php
    }

    /* ── Tab counts helper ──────────────────────────────────── */

    private static function get_tab_counts(): array {
        $counts = [ 'all' => 0 ];
        foreach ( array_keys( self::$status_labels ) as $s ) $counts[ $s ] = 0;

        $all = get_posts( [
            'post_type'      => 'omnia_devis',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',
        ] );
        $counts['all'] = count( $all );

        foreach ( array_keys( self::$status_labels ) as $s ) {
            $q = new WP_Query( [
                'post_type'      => 'omnia_devis',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'fields'         => 'ids',
                'meta_query'     => [ [ 'key' => '_omnia_status', 'value' => $s ] ],
            ] );
            $counts[ $s ] = $q->found_posts;
        }

        return $counts;
    }
}
