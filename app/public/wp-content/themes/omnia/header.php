<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-to-content" href="#main-content">Aller au contenu principal</a>

<header class="site-header" id="site-header" role="banner">

    <!-- Topbar -->
    <div class="topbar" id="topbar">
        <div class="container topbar__inner">
            <div class="topbar__left">
                <span class="topbar__item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                    Zoca, Abomey-Calavi, Bénin
                </span>
                <span class="topbar__divider" aria-hidden="true">|</span>
                <span class="topbar__item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/></svg>
                    Lun–Ven&nbsp;9h–12h / 14h–18h30&nbsp;&nbsp;|&nbsp;&nbsp;Sam&nbsp;9h–16h
                </span>
            </div>
            <div class="topbar__right">
                <a href="<?php echo esc_url('https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20souhaite%20des%20informations%20sur%20vos%20services.'); ?>" class="topbar__phone" target="_blank" rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.99 2C6.47 2 2 6.48 2 12c0 1.76.46 3.41 1.26 4.84L2 22l5.25-1.38C8.71 21.51 10.31 22 12 22c5.52 0 10-4.48 10-10S17.52 2 11.99 2z" opacity=".3"/><path d="M12 2C6.48 2 2 6.48 2 12c0 1.76.46 3.41 1.26 4.84L2 22l5.25-1.38C8.71 21.51 10.31 22 12 22c5.52 0 10-4.48 10-10S17.52 2 12 2zm.01 18c-1.59 0-3.07-.43-4.35-1.17l-.31-.18-3.12.82.83-3.04-.2-.32C3.93 14.93 3.51 13.51 3.51 12c0-4.69 3.82-8.5 8.5-8.5s8.5 3.81 8.5 8.5-3.82 8.5-8.5 8.5z"/></svg>
                    WhatsApp
                </a>
            </div>
        </div>
    </div>

    <!-- Main navbar -->
    <nav class="navbar" id="navbar" role="navigation" aria-label="Navigation principale">
        <div class="container navbar__inner">

            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar__logo" aria-label="Omnia Group — Accueil">
                <?php
                $logo_id = get_theme_mod('custom_logo');
                if ($logo_id) :
                    $logo_url = wp_get_attachment_image_url($logo_id, 'full');
                    ?>
                    <img src="<?php echo esc_url($logo_url); ?>" alt="Omnia Group" height="48" width="auto">
                <?php else : ?>
                    <span class="navbar__logo-text">
                        <span class="navbar__logo-omnia">OMNIA</span>
                        <span class="navbar__logo-group">GROUP</span>
                    </span>
                <?php endif; ?>
            </a>

            <!-- Desktop nav links -->
            <ul class="navbar__links" role="list">
                <li>
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       class="navbar__link <?php echo is_front_page() ? 'is-active' : ''; ?>">
                        Accueil
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/assurances')); ?>"
                       class="navbar__link <?php echo is_page('assurances') ? 'is-active' : ''; ?>">
                        Assurances
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/billeterie')); ?>"
                       class="navbar__link <?php echo is_page('billeterie') ? 'is-active' : ''; ?>">
                        Billeterie
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/mobile-money-canal')); ?>"
                       class="navbar__link <?php echo is_page('mobile-money-canal') ? 'is-active' : ''; ?>">
                        Mobile Money & Canal+
                    </a>
                </li>
            </ul>

            <!-- CTA -->
            <a href="<?php echo esc_url(home_url('/devis')); ?>" class="btn btn-primary navbar__cta">
                Devis gratuit
            </a>

            <!-- Hamburger -->
            <button class="navbar__hamburger" id="hamburger" aria-label="Ouvrir le menu" aria-expanded="false" aria-controls="mobile-menu">
                <span class="hamburger__bar"></span>
                <span class="hamburger__bar"></span>
                <span class="hamburger__bar"></span>
            </button>

        </div>
    </nav>

    <!-- Mobile overlay menu -->
    <div class="mobile-menu" id="mobile-menu" role="dialog" aria-modal="true" aria-label="Menu mobile" hidden>
        <ul class="mobile-menu__links" role="list">
            <li><a href="<?php echo esc_url(home_url('/')); ?>"                    class="mobile-menu__link <?php echo is_front_page()              ? 'is-active' : ''; ?>">Accueil</a></li>
            <li><a href="<?php echo esc_url(home_url('/assurances')); ?>"          class="mobile-menu__link <?php echo is_page('assurances')         ? 'is-active' : ''; ?>">Assurances</a></li>
            <li><a href="<?php echo esc_url(home_url('/billeterie')); ?>"          class="mobile-menu__link <?php echo is_page('billeterie')         ? 'is-active' : ''; ?>">Billeterie</a></li>
            <li><a href="<?php echo esc_url(home_url('/mobile-money-canal')); ?>"  class="mobile-menu__link <?php echo is_page('mobile-money-canal') ? 'is-active' : ''; ?>">Mobile Money & Canal+</a></li>
        </ul>
        <a href="<?php echo esc_url(home_url('/devis')); ?>" class="btn btn-primary mobile-menu__cta">
            Devis gratuit
        </a>
    </div>

</header>

<!-- Spacer so sticky header doesn't overlap content -->
<div class="header-spacer" id="header-spacer" aria-hidden="true"></div>
