<?php
/**
 * Omnia Admin — CSV export page.
 *
 * Export form lives at admin.php?page=omnia-export.
 * Actual download is triggered via admin-post.php (omnia_export action)
 * so WordPress never buffers the CSV output.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class Omnia_Admin_Export {

    /* ── Bootstrap ──────────────────────────────────────────── */

    public function __construct() {
        add_action( 'admin_post_omnia_export', [ $this, 'handle_export' ] );
    }

    /* ── Export form page ───────────────────────────────────── */

    public static function render(): void {
        if ( ! current_user_can( 'manage_options' ) ) return;

        $form_action = admin_url( 'admin-post.php' );
        ?>
        <div class="wrap omnia-wrap">
            <h1 class="omnia-page-title">
                <span class="dashicons dashicons-download"></span>
                Exporter les données
            </h1>

            <div class="omnia-export-layout">

                <div class="omnia-card omnia-card--export">
                    <h2 class="omnia-card__title">Options d'export</h2>
                    <p class="omnia-card__hint">
                        Les fichiers sont exportés au format CSV (UTF-8, compatible Excel).
                    </p>

                    <form method="post" action="<?php echo esc_url( $form_action ); ?>">
                        <input type="hidden" name="action" value="omnia_export">
                        <?php wp_nonce_field( 'omnia_export_nonce', 'nonce' ); ?>

                        <!-- Type -->
                        <div class="omnia-form-field">
                            <label class="omnia-form-label" for="export-type">Type de données</label>
                            <select id="export-type" name="type" class="omnia-form-select">
                                <option value="devis">Demandes de devis uniquement</option>
                                <option value="messages">Messages contact uniquement</option>
                                <option value="all">Devis + Messages (deux fichiers ZIP)</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="omnia-form-field">
                            <label class="omnia-form-label" for="export-status">Statut</label>
                            <select id="export-status" name="status" class="omnia-form-select">
                                <option value="all">Tous les statuts</option>
                                <option value="nouveau">Nouveau uniquement</option>
                                <option value="en_cours">En cours uniquement</option>
                                <option value="traite">Traité uniquement</option>
                            </select>
                        </div>

                        <!-- Date range -->
                        <div class="omnia-form-row">
                            <div class="omnia-form-field">
                                <label class="omnia-form-label" for="export-from">Date de début</label>
                                <input type="date" id="export-from" name="date_from" class="omnia-form-input"
                                       value="<?php echo esc_attr( date('Y-m-01') ); ?>">
                            </div>
                            <div class="omnia-form-field">
                                <label class="omnia-form-label" for="export-to">Date de fin</label>
                                <input type="date" id="export-to" name="date_to" class="omnia-form-input"
                                       value="<?php echo esc_attr( date('Y-m-d') ); ?>">
                            </div>
                        </div>

                        <button type="submit" class="button button-primary omnia-export-btn">
                            <span class="dashicons dashicons-download"></span>
                            Télécharger le CSV
                        </button>
                    </form>
                </div>

                <!-- Info sidebar -->
                <div class="omnia-card omnia-card--sidebar">
                    <h2 class="omnia-card__title">Colonnes exportées</h2>

                    <p class="omnia-card__hint" style="margin-bottom:8px"><strong>Devis :</strong></p>
                    <ul class="omnia-col-list">
                        <li>ID</li><li>Date</li><li>Service</li>
                        <li>Nom</li><li>Téléphone</li><li>Email</li>
                        <li>Statut</li><li>Lu</li><li>Détails</li>
                    </ul>

                    <p class="omnia-card__hint" style="margin-top:16px;margin-bottom:8px"><strong>Messages :</strong></p>
                    <ul class="omnia-col-list">
                        <li>ID</li><li>Date</li><li>Prénom</li><li>Nom</li>
                        <li>Email</li><li>Téléphone</li>
                        <li>Objet</li><li>Message</li>
                        <li>Statut</li><li>Lu</li>
                    </ul>
                </div>

            </div>
        </div>
        <?php
    }

    /* ── Export handler (outputs file, then exits) ──────────── */

    public function handle_export(): void {
        check_admin_referer( 'omnia_export_nonce', 'nonce' );
        if ( ! current_user_can( 'manage_options' ) ) wp_die( 'Unauthorized' );

        $type      = sanitize_key( $_POST['type']      ?? 'devis' );
        $status    = sanitize_key( $_POST['status']    ?? 'all' );
        $date_from = sanitize_text_field( $_POST['date_from'] ?? '' );
        $date_to   = sanitize_text_field( $_POST['date_to']   ?? '' );

        $filters = compact( 'status', 'date_from', 'date_to' );

        if ( $type === 'all' ) {
            self::export_zip( $filters );
        } elseif ( $type === 'messages' ) {
            self::stream_messages_csv( $filters );
        } else {
            self::stream_devis_csv( $filters );
        }

        exit;
    }

    /* ── Devis CSV ──────────────────────────────────────────── */

    private static function stream_devis_csv( array $filters ): void {
        $filename = 'omnia-devis-' . date('Y-m-d') . '.csv';
        self::set_csv_headers( $filename );

        $output = fopen( 'php://output', 'w' );
        fputs( $output, "\xEF\xBB\xBF" ); // UTF-8 BOM for Excel

        fputcsv( $output, [
            'ID', 'Date', 'Service', 'Nom', 'Téléphone', 'Email',
            'Statut', 'Lu', 'Détails',
        ] );

        $posts = self::query_posts( 'omnia_devis', $filters );

        $status_labels = [ 'nouveau' => 'Nouveau', 'en_cours' => 'En cours', 'traite' => 'Traité' ];
        $service_labels = [
            'assurances'   => 'Assurances',
            'billeterie'   => 'Billeterie',
            'mobile-money' => 'Mobile Money',
            'canal'        => 'Canal+',
        ];

        foreach ( $posts as $post ) {
            $service = get_post_meta( $post->ID, '_omnia_service',   true );
            $nom     = get_post_meta( $post->ID, '_omnia_nom',       true );
            $tel     = get_post_meta( $post->ID, '_omnia_telephone', true );
            $email   = get_post_meta( $post->ID, '_omnia_email',     true );
            $status  = get_post_meta( $post->ID, '_omnia_status',    true ) ?: 'nouveau';
            $read    = get_post_meta( $post->ID, '_omnia_read',      true );
            $details = get_post_meta( $post->ID, '_omnia_details',   true ) ?: [];

            $details_str = '';
            if ( is_array( $details ) ) {
                $parts = [];
                foreach ( $details as $k => $v ) {
                    $parts[] = ucwords( str_replace( '_', ' ', $k ) ) . ': ' . $v;
                }
                $details_str = implode( ' | ', $parts );
            }

            fputcsv( $output, [
                $post->ID,
                get_the_date( 'd/m/Y H:i', $post ),
                $service_labels[ $service ] ?? $service,
                $nom,
                $tel,
                $email,
                $status_labels[ $status ] ?? $status,
                $read ? 'Oui' : 'Non',
                $details_str,
            ] );
        }

        fclose( $output );
    }

    /* ── Messages CSV ───────────────────────────────────────── */

    private static function stream_messages_csv( array $filters ): void {
        $filename = 'omnia-messages-' . date('Y-m-d') . '.csv';
        self::set_csv_headers( $filename );

        $output = fopen( 'php://output', 'w' );
        fputs( $output, "\xEF\xBB\xBF" ); // UTF-8 BOM for Excel

        fputcsv( $output, [
            'ID', 'Date', 'Prénom', 'Nom', 'Email', 'Téléphone',
            'Objet', 'Message', 'Statut', 'Lu',
        ] );

        $posts = self::query_posts( 'omnia_message', $filters );

        $status_labels = [ 'nouveau' => 'Nouveau', 'en_cours' => 'En cours', 'traite' => 'Traité' ];

        foreach ( $posts as $post ) {
            $prenom = get_post_meta( $post->ID, '_omnia_prenom',    true );
            $nom    = get_post_meta( $post->ID, '_omnia_nom',       true );
            $email  = get_post_meta( $post->ID, '_omnia_email',     true );
            $tel    = get_post_meta( $post->ID, '_omnia_telephone', true );
            $objet  = get_post_meta( $post->ID, '_omnia_objet',     true );
            $msg    = get_post_meta( $post->ID, '_omnia_message',   true );
            $status = get_post_meta( $post->ID, '_omnia_status',    true ) ?: 'nouveau';
            $read   = get_post_meta( $post->ID, '_omnia_read',      true );

            fputcsv( $output, [
                $post->ID,
                get_the_date( 'd/m/Y H:i', $post ),
                $prenom,
                $nom,
                $email,
                $tel,
                $objet,
                $msg,
                $status_labels[ $status ] ?? $status,
                $read ? 'Oui' : 'Non',
            ] );
        }

        fclose( $output );
    }

    /* ── ZIP (both types) ───────────────────────────────────── */

    private static function export_zip( array $filters ): void {
        if ( ! class_exists( 'ZipArchive' ) ) {
            // Fallback: export devis only if ZipArchive unavailable
            self::stream_devis_csv( $filters );
            return;
        }

        $tmp_dir   = get_temp_dir();
        $devis_tmp = $tmp_dir . 'omnia-devis-'    . time() . '.csv';
        $msgs_tmp  = $tmp_dir . 'omnia-messages-' . time() . '.csv';
        $zip_tmp   = $tmp_dir . 'omnia-export-'   . date('Y-m-d') . '.zip';

        // Write devis CSV to temp file
        $f = fopen( $devis_tmp, 'w' );
        fputs( $f, "\xEF\xBB\xBF" );
        fputcsv( $f, [ 'ID','Date','Service','Nom','Téléphone','Email','Statut','Lu','Détails' ] );
        foreach ( self::query_posts('omnia_devis', $filters) as $post ) {
            $details = get_post_meta( $post->ID, '_omnia_details', true ) ?: [];
            $parts   = [];
            if ( is_array($details) ) {
                foreach ($details as $k => $v) $parts[] = ucwords(str_replace('_',' ',$k)).': '.$v;
            }
            fputcsv( $f, [
                $post->ID, get_the_date('d/m/Y H:i', $post),
                get_post_meta($post->ID, '_omnia_service',   true),
                get_post_meta($post->ID, '_omnia_nom',       true),
                get_post_meta($post->ID, '_omnia_telephone', true),
                get_post_meta($post->ID, '_omnia_email',     true),
                get_post_meta($post->ID, '_omnia_status',    true) ?: 'nouveau',
                get_post_meta($post->ID, '_omnia_read',      true) ? 'Oui' : 'Non',
                implode(' | ', $parts),
            ]);
        }
        fclose($f);

        // Write messages CSV to temp file
        $g = fopen( $msgs_tmp, 'w' );
        fputs( $g, "\xEF\xBB\xBF" );
        fputcsv( $g, [ 'ID','Date','Prénom','Nom','Email','Téléphone','Objet','Message','Statut','Lu' ] );
        foreach ( self::query_posts('omnia_message', $filters) as $post ) {
            fputcsv( $g, [
                $post->ID, get_the_date('d/m/Y H:i', $post),
                get_post_meta($post->ID, '_omnia_prenom',    true),
                get_post_meta($post->ID, '_omnia_nom',       true),
                get_post_meta($post->ID, '_omnia_email',     true),
                get_post_meta($post->ID, '_omnia_telephone', true),
                get_post_meta($post->ID, '_omnia_objet',     true),
                get_post_meta($post->ID, '_omnia_message',   true),
                get_post_meta($post->ID, '_omnia_status',    true) ?: 'nouveau',
                get_post_meta($post->ID, '_omnia_read',      true) ? 'Oui' : 'Non',
            ]);
        }
        fclose($g);

        // Zip both files
        $zip = new ZipArchive();
        $zip->open( $zip_tmp, ZipArchive::CREATE | ZipArchive::OVERWRITE );
        $zip->addFile( $devis_tmp, 'omnia-devis-' . date('Y-m-d') . '.csv' );
        $zip->addFile( $msgs_tmp,  'omnia-messages-' . date('Y-m-d') . '.csv' );
        $zip->close();

        // Stream ZIP
        header( 'Content-Type: application/zip' );
        header( 'Content-Disposition: attachment; filename="omnia-export-' . date('Y-m-d') . '.zip"' );
        header( 'Content-Length: ' . filesize($zip_tmp) );
        header( 'Pragma: no-cache' );
        readfile( $zip_tmp );

        // Cleanup
        @unlink( $devis_tmp );
        @unlink( $msgs_tmp );
        @unlink( $zip_tmp );
    }

    /* ── Shared query ───────────────────────────────────────── */

    private static function query_posts( string $post_type, array $filters ): array {
        $args = [
            'post_type'      => $post_type,
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ];

        // Status filter
        if ( ! empty($filters['status']) && $filters['status'] !== 'all' ) {
            $args['meta_query'] = [ [
                'key'     => '_omnia_status',
                'value'   => $filters['status'],
                'compare' => '=',
            ] ];
        }

        // Date range filter
        $date_query = [];
        if ( ! empty($filters['date_from']) ) {
            $date_query['after'] = $filters['date_from'] . ' 00:00:00';
        }
        if ( ! empty($filters['date_to']) ) {
            $date_query['before'] = $filters['date_to'] . ' 23:59:59';
        }
        if ( $date_query ) {
            $date_query['inclusive'] = true;
            $args['date_query']      = [ $date_query ];
        }

        return get_posts( $args );
    }

    /* ── CSV response headers ───────────────────────────────── */

    private static function set_csv_headers( string $filename ): void {
        header( 'Content-Type: text/csv; charset=UTF-8' );
        header( 'Content-Disposition: attachment; filename="' . $filename . '"' );
        header( 'Pragma: no-cache' );
        header( 'Expires: 0' );
    }
}
