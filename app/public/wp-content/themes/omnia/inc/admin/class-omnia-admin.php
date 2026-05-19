<?php
/**
 * Omnia Admin — top-level menu + sub-menu registration.
 *
 * Loaded by functions.php only in the admin context.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class Omnia_Admin {

    public function __construct() {
        add_action( 'admin_menu', [ $this, 'register_menus' ] );
    }

    /* ── Menu registration ──────────────────────────────────── */

    public function register_menus(): void {
        $badge = $this->unread_badge();

        add_menu_page(
            'Omnia Group',
            'Omnia Group' . $badge,
            'manage_options',
            'omnia-dashboard',
            [ $this, 'page_dashboard' ],
            'dashicons-store',
            25
        );

        add_submenu_page(
            'omnia-dashboard',
            'Tableau de bord — Omnia',
            'Tableau de bord',
            'manage_options',
            'omnia-dashboard',
            [ $this, 'page_dashboard' ]
        );

        $devis_badge = $this->unread_badge( 'omnia_devis' );
        add_submenu_page(
            'omnia-dashboard',
            'Demandes de devis — Omnia',
            'Demandes de devis' . $devis_badge,
            'manage_options',
            'omnia-devis',
            [ $this, 'page_devis' ]
        );

        $msg_badge = $this->unread_badge( 'omnia_message' );
        add_submenu_page(
            'omnia-dashboard',
            'Messages contact — Omnia',
            'Messages' . $msg_badge,
            'manage_options',
            'omnia-messages',
            [ $this, 'page_messages' ]
        );

        add_submenu_page(
            'omnia-dashboard',
            'Exporter — Omnia',
            'Exporter',
            'manage_options',
            'omnia-export',
            [ $this, 'page_export' ]
        );
    }

    /* ── Badge helper ───────────────────────────────────────── */

    /**
     * Returns the WP-style unread badge HTML, or '' if count is 0.
     * When $post_type is omitted, sums both CPTs.
     */
    private function unread_badge( string $post_type = '' ): string {
        $count = $this->count_unread( $post_type );
        if ( $count === 0 ) return '';

        return sprintf(
            ' <span class="awaiting-mod count-%1$d"><span class="pending-count">%1$d</span></span>',
            $count
        );
    }

    private function count_unread( string $post_type = '' ): int {
        $types = $post_type ? [ $post_type ] : [ 'omnia_devis', 'omnia_message' ];
        $total = 0;

        foreach ( $types as $type ) {
            $query = new WP_Query( [
                'post_type'      => $type,
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'fields'         => 'ids',
                'meta_query'     => [ [
                    'key'     => '_omnia_read',
                    'value'   => '0',
                    'compare' => '=',
                ] ],
            ] );
            $total += $query->found_posts;
        }

        return $total;
    }

    /* ── Page callbacks (output delegated to other classes) ─── */

    public function page_dashboard(): void {
        if ( class_exists( 'Omnia_Admin_Dashboard' ) ) {
            Omnia_Admin_Dashboard::render();
        }
    }

    public function page_devis(): void {
        if ( class_exists( 'Omnia_Admin_Devis' ) ) {
            Omnia_Admin_Devis::render();
        }
    }

    public function page_messages(): void {
        if ( class_exists( 'Omnia_Admin_Messages' ) ) {
            Omnia_Admin_Messages::render();
        }
    }

    public function page_export(): void {
        if ( class_exists( 'Omnia_Admin_Export' ) ) {
            Omnia_Admin_Export::render();
        }
    }
}
