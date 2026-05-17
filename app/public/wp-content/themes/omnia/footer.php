<footer class="site-footer" role="contentinfo">

    <!-- Footer main grid -->
    <div class="footer-main">
        <div class="container footer-main__grid">

            <!-- Col 1 — Brand -->
            <div class="footer-col footer-col--brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo" aria-label="Omnia Group — Accueil">
                    <?php
                    $logo_id = get_theme_mod('custom_logo');
                    if ($logo_id) :
                        $logo_url = wp_get_attachment_image_url($logo_id, 'full');
                        ?>
                        <img src="<?php echo esc_url($logo_url); ?>" alt="Omnia Group" height="44" width="auto" class="footer-logo__img">
                    <?php else : ?>
                        <span class="footer-logo__text">
                            <span class="footer-logo__omnia">OMNIA</span>
                            <span class="footer-logo__group">GROUP</span>
                        </span>
                    <?php endif; ?>
                </a>
                <p class="footer-tagline">
                    Votre partenaire multiservices de confiance à Abomey-Calavi.
                </p>
                <div class="footer-social" role="list" aria-label="Réseaux sociaux">
                    <a href="https://facebook.com" class="footer-social__link" target="_blank" rel="noopener noreferrer" role="listitem" aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                        </svg>
                    </a>
                    <a href="<?php echo esc_url('https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20souhaite%20des%20informations%20sur%20vos%20services.'); ?>"
                       class="footer-social__link footer-social__link--whatsapp"
                       target="_blank" rel="noopener noreferrer" role="listitem" aria-label="WhatsApp">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Col 2 — Services -->
            <div class="footer-col">
                <h3 class="footer-col__title">Nos services</h3>
                <ul class="footer-col__links" role="list">
                    <li><a href="<?php echo esc_url(home_url('/mobile-money-canal')); ?>" class="footer-col__link">Mobile Money</a></li>
                    <li><a href="<?php echo esc_url(home_url('/assurances')); ?>"         class="footer-col__link">Assurances</a></li>
                    <li><a href="<?php echo esc_url(home_url('/billeterie')); ?>"         class="footer-col__link">Billeterie aérienne</a></li>
                    <li><a href="<?php echo esc_url(home_url('/mobile-money-canal')); ?>" class="footer-col__link">Canal+</a></li>
                </ul>
            </div>

            <!-- Col 3 — Navigation -->
            <div class="footer-col">
                <h3 class="footer-col__title">Liens utiles</h3>
                <ul class="footer-col__links" role="list">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"        class="footer-col__link">Accueil</a></li>
                    <li><a href="<?php echo esc_url(home_url('/a-propos')); ?>" class="footer-col__link">À propos</a></li>
                    <li><a href="<?php echo esc_url(home_url('/devis')); ?>"   class="footer-col__link">Devis gratuit</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact')); ?>" class="footer-col__link">Contact</a></li>
                </ul>
            </div>

            <!-- Col 4 — Contact -->
            <div class="footer-col">
                <h3 class="footer-col__title">Nous trouver</h3>
                <ul class="footer-contact" role="list">
                    <li class="footer-contact__item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="footer-contact__icon" aria-hidden="true">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                        <span>Ilot 103 J, Maison GADESSOU,<br>ZOCA – Abomey-Calavi, Bénin</span>
                    </li>
                    <li class="footer-contact__item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="footer-contact__icon" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zM12 2C6.48 2 2 6.48 2 12c0 1.76.46 3.41 1.26 4.84L2 22l5.25-1.38C8.71 21.51 10.31 22 12 22c5.52 0 10-4.48 10-10S17.52 2 12 2z"/></svg>
                        <a href="<?php echo esc_url('https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20souhaite%20des%20informations%20sur%20vos%20services.'); ?>" class="footer-contact__link" target="_blank" rel="noopener noreferrer">WhatsApp</a>
                    </li>
                    <li class="footer-contact__item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="footer-contact__icon" aria-hidden="true">
                            <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/>
                        </svg>
                        <span>Lun–Ven : 9h–12h / 14h–18h30<br>Sam : 9h–16h</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <!-- Bottom bar -->
    <div class="footer-bottom">
        <div class="container footer-bottom__inner">
            <p class="footer-bottom__copy">
                &copy; <?php echo date('Y'); ?> Omnia Group SARL
                &nbsp;|&nbsp; RCCM&nbsp;: RB/ABC/18 B 2458
                &nbsp;|&nbsp; IFU&nbsp;: 3201810514040
                &nbsp;|&nbsp; Tous droits réservés
            </p>
            <p class="footer-bottom__location">
                Abomey-Calavi · Cotonou · Bénin
            </p>
        </div>
    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
