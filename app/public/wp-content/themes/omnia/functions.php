<?php
defined('ABSPATH') || exit;

/* ── Theme setup ───────────────────────────────────────── */
function omnia_setup(): void {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('customize-selective-refresh-widgets');

    register_nav_menus([
        'primary' => __('Menu principal', 'omnia'),
    ]);

    load_theme_textdomain('omnia', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'omnia_setup');

/* ── Admin class loader ────────────────────────────────── */
require_once get_template_directory() . '/inc/admin/class-omnia-admin.php';
require_once get_template_directory() . '/inc/admin/class-omnia-devis.php';
require_once get_template_directory() . '/inc/admin/class-omnia-messages.php';
require_once get_template_directory() . '/inc/admin/class-omnia-dashboard.php';
require_once get_template_directory() . '/inc/admin/class-omnia-export.php';
new Omnia_Admin();
new Omnia_Admin_Devis();
new Omnia_Admin_Messages();
new Omnia_Admin_Export();

/* ── Enqueue assets ────────────────────────────────────── */
function omnia_enqueue_assets(): void {
    $ver = wp_get_theme()->get('Version');
    $css = get_template_directory_uri() . '/assets/css/';
    $js  = get_template_directory_uri() . '/assets/js/';

    // Google Fonts
    wp_enqueue_style(
        'omnia-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap',
        [],
        null
    );

    // Design tokens — loaded first, everything else depends on it
    wp_enqueue_style('omnia-design-system', $css . 'design-system.css', ['omnia-fonts'], $ver);

    // Global resets + utilities
    wp_enqueue_style('omnia-global', $css . 'global.css', ['omnia-design-system'], $ver);

    // Header + Footer
    wp_enqueue_style('omnia-header', $css . 'header.css', ['omnia-global'], $ver);
    wp_enqueue_style('omnia-footer', $css . 'footer.css', ['omnia-global'], $ver);

    // Page-specific stylesheets
    if (is_front_page()) {
        wp_enqueue_style('omnia-home', $css . 'home.css', ['omnia-global'], $ver);
    }

    if (is_page(['assurances', 'billeterie', 'mobile-money-canal', 'a-propos'])) {
        wp_enqueue_style('omnia-services', $css . 'services.css', ['omnia-global'], $ver);
    }

    if (is_page(['devis', 'contact'])) {
        wp_enqueue_style('omnia-devis', $css . 'devis.css', ['omnia-global'], $ver);
    }

    if (is_page('contact')) {
        wp_enqueue_style('omnia-contact', $css . 'contact.css', ['omnia-devis'], $ver);
    }

    // Preline UI — accordion & interactive components
    wp_enqueue_script('preline', 'https://cdn.jsdelivr.net/npm/preline@2.7.0/dist/preline.js', [], '2.7.0', true);

    // Main JS — deferred, no jQuery dependency
    wp_enqueue_script('omnia-main', $js . 'main.js', ['preline'], $ver, true);

    // Pass AJAX url + nonce to JS
    wp_localize_script('omnia-main', 'omniaAjax', [
        'url'   => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('omnia_devis_nonce'),
    ]);
}
add_action('wp_enqueue_scripts', 'omnia_enqueue_assets');

/* ── Add defer to main.js ──────────────────────────────── */
function omnia_script_attributes( string $tag, string $handle ): string {
    if ( $handle === 'omnia-main' ) {
        return str_replace( ' src=', ' defer src=', $tag );
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'omnia_script_attributes', 10, 2 );

/* ── SEO meta + Open Graph ─────────────────────────────── */
function omnia_seo_meta(): void {
    // Let Yoast handle it if active
    if ( defined('WPSEO_VERSION') ) return;

    $site  = get_bloginfo('name');
    $sep   = ' — ';
    $desc  = '';
    $title = '';

    if ( is_front_page() ) {
        $title = 'Omnia Group — Mobile Money, Assurances, Billeterie à Abomey-Calavi';
        $desc  = 'Agence multiservices à Zoca, Abomey-Calavi, Bénin. Mobile Money MTN & Moov, Assurances, Billeterie aérienne Cotonou, Canal+. Devis gratuit.';
    } elseif ( is_page('assurances') ) {
        $title = 'Assurances SUNU — Auto/Moto & Voyage à Abomey-Calavi | Omnia Group';
        $desc  = 'Souscrivez une assurance auto, moto ou voyage avec SUNU Assurances à Abomey-Calavi. Devis gratuit en ligne. Omnia Group SARL, partenaire agréé, Bénin.';
    } elseif ( is_page('billeterie') ) {
        $title = 'Billeterie aérienne Cotonou' . $sep . $site;
        $desc  = 'Réservation et achat de billets d\'avion depuis Cotonou. Modification, suivi de dossier. Service rapide — Omnia Group Abomey-Calavi.';
    } elseif ( is_page('mobile-money-canal') ) {
        $title = 'Mobile Money MTN Moov & Canal+ — Abomey-Calavi' . $sep . $site;
        $desc  = 'Dépôts, retraits et transferts Mobile Money MTN & Moov à Abomey-Calavi. Abonnement et réabonnement Canal+ au Bénin.';
    } elseif ( is_page('devis') ) {
        $title = 'Devis gratuit en ligne' . $sep . $site;
        $desc  = 'Demandez votre devis en ligne gratuitement. Mobile Money, Assurances, Billeterie ou Canal+ — réponse sous 24h.';
    } elseif ( is_page('a-propos') ) {
        $title = 'À propos d\'Omnia Group' . $sep . $site;
        $desc  = 'Omnia Group SARL, agence multiservices enregistrée à Abomey-Calavi, Bénin depuis 2018. RCCM RB/ABC/18 B 2458.';
    } elseif ( is_page('contact') ) {
        $title = 'Contactez-nous' . $sep . $site;
        $desc  = 'Contactez Omnia Group à Zoca, Abomey-Calavi. Tél : +229 01 96 87 04 99. Lun–Ven 9h–18h30 · Sam 9h–16h.';
    } else {
        $title = get_the_title() . $sep . $site;
        $desc  = get_the_excerpt() ?: 'Omnia Group SARL — Agence multiservices à Abomey-Calavi, Bénin.';
    }

    $url = get_permalink() ?: home_url('/');
    ?>
    <meta name="description" content="<?php echo esc_attr( $desc ); ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo esc_url( $url ); ?>">
    <!-- Open Graph -->
    <meta property="og:type"        content="website">
    <meta property="og:title"       content="<?php echo esc_attr( $title ); ?>">
    <meta property="og:description" content="<?php echo esc_attr( $desc ); ?>">
    <meta property="og:url"         content="<?php echo esc_url( $url ); ?>">
    <meta property="og:site_name"   content="<?php echo esc_attr( $site ); ?>">
    <meta property="og:locale"      content="fr_BJ">
    <!-- Twitter Card -->
    <meta name="twitter:card"        content="summary">
    <meta name="twitter:title"       content="<?php echo esc_attr( $title ); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr( $desc ); ?>">
    <!-- Local business -->
    <meta name="geo.region"   content="BJ">
    <meta name="geo.placename" content="Abomey-Calavi">
    <?php
}
add_action( 'wp_head', 'omnia_seo_meta', 1 );

/* ── JSON-LD local business schema ────────────────────── */
function omnia_schema_jsonld(): void {
    if ( ! is_front_page() ) return;
    ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Omnia Group SARL",
        "description": "Agence multiservices à Abomey-Calavi, Bénin. Mobile Money MTN & Moov, Assurances, Billeterie aérienne, Canal+.",
        "url": "<?php echo esc_url( home_url('/') ); ?>",
        "telephone": "+2290196870499",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Ilot 103 J, Maison GADESSOU, ZOCA",
            "addressLocality": "Abomey-Calavi",
            "addressCountry": "BJ",
            "postalCode": "BP 1547"
        },
        "openingHoursSpecification": [
            {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday"],
                "opens": "09:00",
                "closes": "18:30"
            },
            {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": "Saturday",
                "opens": "09:00",
                "closes": "16:00"
            }
        ],
        "identifier": [
            {"@type": "PropertyValue", "name": "RCCM", "value": "RB/ABC/18 B 2458"},
            {"@type": "PropertyValue", "name": "IFU",  "value": "3201810514040"}
        ]
    }
    </script>
    <?php
}
add_action( 'wp_head', 'omnia_schema_jsonld' );

/* ── Remove unused default assets ─────────────────────── */
function omnia_dequeue_defaults(): void {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('classic-theme-styles');
    wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'omnia_dequeue_defaults', 100);

/* ── AJAX: Devis form handler ──────────────────────────── */
function omnia_handle_devis(): void {
    check_ajax_referer('omnia_devis_nonce', 'nonce');

    $service = sanitize_text_field($_POST['service'] ?? '');

    if ($service === 'contact') {
        omnia_handle_contact_submission();
    } else {
        omnia_handle_devis_submission($service);
    }
}
add_action('wp_ajax_omnia_devis',        'omnia_handle_devis');
add_action('wp_ajax_nopriv_omnia_devis', 'omnia_handle_devis');

/* ── Contact form: validate + save + email ─────────────── */
function omnia_handle_contact_submission(): void {
    $prenom = sanitize_text_field($_POST['prenom']    ?? '');
    $nom    = sanitize_text_field($_POST['nom']        ?? '');
    $email  = sanitize_email($_POST['email']           ?? '');
    $tel    = sanitize_text_field($_POST['telephone']  ?? '');
    $objet  = sanitize_text_field($_POST['objet']      ?? '');
    $msg    = sanitize_textarea_field($_POST['message'] ?? '');

    if (empty($prenom) || empty($nom) || empty($email) || empty($tel) || empty($objet) || empty($msg)) {
        wp_send_json_error(['message' => 'Veuillez remplir tous les champs obligatoires.']);
        return;
    }

    // Persist in DB
    $post_id = wp_insert_post([
        'post_type'   => 'omnia_message',
        'post_title'  => sanitize_text_field($prenom . ' ' . $nom . ' — ' . $objet),
        'post_status' => 'publish',
        'post_author' => 1,
    ]);

    if ($post_id && ! is_wp_error($post_id)) {
        update_post_meta($post_id, '_omnia_prenom',    $prenom);
        update_post_meta($post_id, '_omnia_nom',       $nom);
        update_post_meta($post_id, '_omnia_email',     $email);
        update_post_meta($post_id, '_omnia_telephone', $tel);
        update_post_meta($post_id, '_omnia_objet',     $objet);
        update_post_meta($post_id, '_omnia_message',   $msg);
        update_post_meta($post_id, '_omnia_status',    'nouveau');
        update_post_meta($post_id, '_omnia_read',      0);
    }

    // Email notification
    $subject = sprintf('[Omnia Contact] %s — %s %s', $objet, $prenom, $nom);
    $body    = omnia_build_contact_email($prenom, $nom, $email, $tel, $objet, $msg);
    wp_mail(get_option('admin_email'), $subject, $body, ['Content-Type: text/html; charset=UTF-8']);

    wp_send_json_success(['message' => 'Message envoyé avec succès.']);
}

/* ── Devis form: validate + save + email ───────────────── */
function omnia_handle_devis_submission(string $service): void {
    $nom    = sanitize_text_field($_POST['nom']       ?? '');
    $prenom = sanitize_text_field($_POST['prenom']    ?? '');
    $tel    = sanitize_text_field($_POST['telephone'] ?? '');
    $email  = sanitize_email($_POST['email']          ?? '');

    if (empty($service) || empty($nom) || empty($prenom) || empty($tel)) {
        wp_send_json_error(['message' => 'Veuillez remplir tous les champs obligatoires.']);
        return;
    }

    $details = omnia_build_devis_details($service);

    // Persist in DB
    $post_id = wp_insert_post([
        'post_type'   => 'omnia_devis',
        'post_title'  => sanitize_text_field(ucfirst($service) . ' — ' . $prenom . ' ' . $nom),
        'post_status' => 'publish',
        'post_author' => 1,
    ]);

    if ($post_id && ! is_wp_error($post_id)) {
        update_post_meta($post_id, '_omnia_service',   $service);
        update_post_meta($post_id, '_omnia_prenom',    $prenom);
        update_post_meta($post_id, '_omnia_nom',       $nom);
        update_post_meta($post_id, '_omnia_telephone', $tel);
        update_post_meta($post_id, '_omnia_email',     $email);
        update_post_meta($post_id, '_omnia_details',   $details);
        update_post_meta($post_id, '_omnia_status',    'nouveau');
        update_post_meta($post_id, '_omnia_read',      0);

        // Handle document uploads
        $upload_fields = ['carte_grise', 'permis_conduire', 'controle_technique'];
        $allowed_mime  = ['image/jpeg', 'image/png', 'image/webp', 'application/pdf'];
        require_once ABSPATH . 'wp-admin/includes/file.php';

        foreach ($upload_fields as $field) {
            if (empty($_FILES[$field]['name'])) continue;
            if (! in_array($_FILES[$field]['type'], $allowed_mime, true)) continue;

            $uploaded = wp_handle_upload($_FILES[$field], ['test_form' => false]);
            if ($uploaded && ! isset($uploaded['error'])) {
                update_post_meta($post_id, '_omnia_' . $field, $uploaded['url']);
                $details[$field] = $uploaded['url'];
            }
        }
    }

    // Email notification
    $subject = sprintf('[Omnia Devis] %s — %s %s', ucfirst($service), $prenom, $nom);
    $body    = omnia_build_email_body($prenom, $nom, $tel, $email, $service, $details);
    wp_mail(get_option('admin_email'), $subject, $body, ['Content-Type: text/html; charset=UTF-8']);

    wp_send_json_success(['message' => 'Votre demande a été envoyée. Nous vous contactons très bientôt.']);
}

/* ── Build service-specific detail fields ──────────────── */
function omnia_build_devis_details(string $service): array {
    $details = [];
    $allowed = ['text', 'email', 'number'];

    $map = [
        'assurances' => ['sous_service', 'type_vehicule', 'marque', 'annee', 'immatriculation', 'destination_voyage', 'nb_voyageurs', 'date_depart_voyage', 'date_retour', 'num_passeport', 'lieu_delivrance', 'date_delivrance', 'date_expiration'],
        'billeterie' => ['ville_depart', 'destination', 'date_depart', 'nb_passagers', 'type_billet'],
    ];

    $fields = $map[$service] ?? [];

    foreach ($fields as $field) {
        $value = sanitize_text_field($_POST[$field] ?? '');
        if ($value !== '') {
            $details[$field] = $value;
        }
    }

    return $details;
}

/* ── Build HTML email body ─────────────────────────────── */
function omnia_build_email_body(string $prenom, string $nom, string $tel, string $email, string $service, array $details): string {
    $label_map = [
        'prenom'           => 'Prénom',
        'objet'            => 'Objet',
        'message'          => 'Message',
        'operateur'        => 'Opérateur',
        'montant'          => 'Montant',
        'ville_destinataire' => 'Ville destinataire',
        'sous_service'       => 'Type d\'assurance',
        'type_vehicule'      => 'Type de véhicule',
        'marque'             => 'Marque',
        'modele'             => 'Modèle',
        'annee'              => 'Année',
        'immatriculation'    => 'Immatriculation',
        'destination_voyage' => 'Destination',
        'nb_voyageurs'       => 'Nombre de voyageurs',
        'date_depart_voyage' => 'Date de départ',
        'date_retour'        => 'Date de retour',
        'num_passeport'      => 'Numéro de passeport',
        'lieu_delivrance'    => 'Lieu de délivrance',
        'date_delivrance'    => 'Date de délivrance',
        'date_expiration'    => 'Date d\'expiration',
        'carte_grise'        => 'Carte grise',
        'permis_conduire'    => 'Permis de conduire',
        'controle_technique' => 'Contrôle technique',
        'ville_depart'       => 'Ville de départ',
        'destination'        => 'Destination',
        'date_depart'        => 'Date de départ',
        'nb_passagers'       => 'Nombre de passagers',
        'type_billet'        => 'Type de billet',
    ];

    $file_fields = ['carte_grise', 'permis_conduire', 'controle_technique'];

    $rows = '';
    foreach ($details as $key => $value) {
        $label = $label_map[$key] ?? ucfirst(str_replace('_', ' ', $key));
        if (in_array($key, $file_fields, true)) {
            $td_value = "<td style='padding:6px 12px;'><a href='" . esc_url($value) . "' target='_blank' style='color:#0A2F6E;font-weight:600;'>Télécharger</a></td>";
        } elseif ($key === 'message') {
            $td_value = "<td style='padding:6px 12px;color:#0D1B2A;white-space:pre-wrap;'>" . esc_html($value) . "</td>";
        } else {
            $td_value = "<td style='padding:6px 12px;color:#0D1B2A;font-weight:600;'>" . esc_html($value) . "</td>";
        }
        $rows .= "<tr><td style='padding:6px 12px;color:#718096;'>{$label}</td>{$td_value}</tr>";
    }

    return "
    <div style='font-family:Inter,sans-serif;max-width:600px;margin:auto;'>
      <div style='background:#0A2F6E;padding:24px 32px;border-radius:8px 8px 0 0;'>
        <h2 style='color:#ffffff;margin:0;font-size:20px;'>Nouvelle demande de devis</h2>
      </div>
      <div style='background:#F7F9FC;padding:32px;border-radius:0 0 8px 8px;'>
        <table style='width:100%;border-collapse:collapse;'>
          <tr><td style='padding:6px 12px;color:#718096;'>Service</td><td style='padding:6px 12px;color:#E8971A;font-weight:700;'>" . esc_html(ucfirst($service)) . "</td></tr>
          <tr><td style='padding:6px 12px;color:#718096;'>Prénom</td><td style='padding:6px 12px;color:#0D1B2A;font-weight:600;'>" . esc_html($prenom) . "</td></tr>
          <tr><td style='padding:6px 12px;color:#718096;'>Nom</td><td style='padding:6px 12px;color:#0D1B2A;font-weight:600;'>" . esc_html($nom) . "</td></tr>
          <tr><td style='padding:6px 12px;color:#718096;'>Téléphone</td><td style='padding:6px 12px;color:#0D1B2A;font-weight:600;'>" . esc_html($tel) . "</td></tr>
          <tr><td style='padding:6px 12px;color:#718096;'>Email</td><td style='padding:6px 12px;color:#0D1B2A;'>" . esc_html($email ?: '—') . "</td></tr>
          {$rows}
        </table>
        <p style='margin-top:24px;color:#718096;font-size:13px;'>Envoyé depuis omnia-group-sarl.com</p>
      </div>
    </div>";
}

/* ── HTML email — contact message ─────────────────────── */
function omnia_build_contact_email(string $prenom, string $nom, string $email, string $tel, string $objet, string $msg): string {
    return "
    <div style='font-family:Inter,sans-serif;max-width:600px;margin:auto;'>
      <div style='background:#0A2F6E;padding:24px 32px;border-radius:8px 8px 0 0;'>
        <h2 style='color:#ffffff;margin:0;font-size:20px;'>Nouveau message de contact</h2>
      </div>
      <div style='background:#F7F9FC;padding:32px;border-radius:0 0 8px 8px;'>
        <table style='width:100%;border-collapse:collapse;'>
          <tr><td style='padding:6px 12px;color:#718096;'>Prénom</td><td style='padding:6px 12px;color:#0D1B2A;font-weight:600;'>" . esc_html($prenom) . "</td></tr>
          <tr><td style='padding:6px 12px;color:#718096;'>Nom</td><td style='padding:6px 12px;color:#0D1B2A;font-weight:600;'>" . esc_html($nom) . "</td></tr>
          <tr><td style='padding:6px 12px;color:#718096;'>Email</td><td style='padding:6px 12px;color:#0D1B2A;'><a href='mailto:" . esc_attr($email) . "'>" . esc_html($email) . "</a></td></tr>
          <tr><td style='padding:6px 12px;color:#718096;'>Téléphone</td><td style='padding:6px 12px;color:#0D1B2A;font-weight:600;'>" . esc_html($tel) . "</td></tr>
          <tr><td style='padding:6px 12px;color:#718096;'>Objet</td><td style='padding:6px 12px;color:#E8971A;font-weight:700;'>" . esc_html($objet) . "</td></tr>
          <tr>
            <td style='padding:6px 12px;color:#718096;vertical-align:top;'>Message</td>
            <td style='padding:6px 12px;color:#0D1B2A;white-space:pre-wrap;'>" . esc_html($msg) . "</td>
          </tr>
        </table>
        <p style='margin-top:24px;color:#718096;font-size:13px;'>Envoyé depuis le formulaire de contact — omnia-group-sarl.com</p>
      </div>
    </div>";
}

/* ── Admin assets (dashboard pages only) ───────────────── */
function omnia_admin_assets( string $hook ): void {
    if ( strpos($hook, 'omnia') === false ) return;

    $ver = wp_get_theme()->get('Version');
    $dir = get_template_directory_uri();

    wp_enqueue_style(
        'omnia-admin',
        $dir . '/assets/css/admin.css',
        [],
        $ver
    );
    wp_enqueue_script(
        'omnia-admin',
        $dir . '/assets/js/admin.js',
        [],
        $ver,
        true
    );
    wp_localize_script('omnia-admin', 'omniaAdmin', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('omnia_admin_nonce'),
    ]);
}
add_action('admin_enqueue_scripts', 'omnia_admin_assets');

/* ── Floating WhatsApp button (injected in wp_footer) ──── */
function omnia_whatsapp_button(): void {
    $url = 'https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20souhaite%20des%20informations%20sur%20vos%20services.';
    ?>
    <a href="<?php echo esc_url($url); ?>"
       class="whatsapp-float"
       target="_blank"
       rel="noopener noreferrer"
       aria-label="Écrivez-nous sur WhatsApp">
        <span class="whatsapp-float__ring"></span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="28" height="28" aria-hidden="true">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
        <span class="whatsapp-float__tooltip">Écrivez-nous sur WhatsApp</span>
    </a>
    <style>
    .whatsapp-float {
        position: fixed;
        bottom: 24px;
        right: 24px;
        width: 60px;
        height: 60px;
        background-color: var(--color-whatsapp);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: var(--shadow-lg);
        z-index: 9999;
        transition: transform var(--transition-fast), box-shadow var(--transition-fast);
    }
    .whatsapp-float:hover {
        transform: scale(1.08);
        box-shadow: var(--shadow-xl);
    }
    .whatsapp-float__ring {
        position: absolute;
        inset: 0;
        border-radius: 50%;
        border: 3px solid var(--color-whatsapp);
        animation: omnia-pulse 2.5s ease-out 3;
        opacity: 0;
    }
    @keyframes omnia-pulse {
        0%   { transform: scale(1);    opacity: 0.8; }
        100% { transform: scale(1.7);  opacity: 0; }
    }
    .whatsapp-float__tooltip {
        position: absolute;
        right: 72px;
        background: var(--color-dark);
        color: #ffffff;
        font-family: var(--font-body);
        font-size: var(--text-sm);
        white-space: nowrap;
        padding: 6px 12px;
        border-radius: var(--border-radius-sm);
        pointer-events: none;
        opacity: 0;
        transform: translateX(6px);
        transition: opacity var(--transition-fast), transform var(--transition-fast);
    }
    .whatsapp-float__tooltip::after {
        content: '';
        position: absolute;
        right: -6px;
        top: 50%;
        transform: translateY(-50%);
        border: 6px solid transparent;
        border-left-color: var(--color-dark);
        border-right: 0;
    }
    .whatsapp-float:hover .whatsapp-float__tooltip {
        opacity: 1;
        transform: translateX(0);
    }
    </style>
    <?php
}
add_action('wp_footer', 'omnia_whatsapp_button');

/* ── Image size registration ───────────────────────────── */
add_image_size('omnia-hero',    1200, 600, true);
add_image_size('omnia-card',     600, 400, true);
add_image_size('omnia-thumb',    400, 300, true);
