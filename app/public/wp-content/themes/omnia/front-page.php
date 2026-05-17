<?php get_header(); ?>

<main id="main-content" role="main">

    <!-- ═══════════════════════════════════════════════════
         SECTION 1 — Hero
         ═══════════════════════════════════════════════════ -->
    <section class="hero section" aria-labelledby="hero-heading">
        <div class="container hero__inner">

            <!-- Left: copy -->
            <div class="hero__copy animate-fade-up">
                <span class="badge">Abomey-Calavi · Bénin</span>
                <h1 id="hero-heading" class="hero__title">
                    Votre agence multiservices<br>
                    <span class="hero__title-accent">de confiance</span>
                </h1>
                <p class="hero__subtitle">
                    Mobile Money, Assurances, Billeterie aérienne et Canal+ —
                    tout ce dont vous avez besoin, en un seul endroit à Zoca, Abomey-Calavi.
                </p>
                <div class="hero__actions">
                    <a href="<?php echo esc_url(home_url('/devis')); ?>" class="btn btn-primary hero__btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                        Demander un devis gratuit
                    </a>
                    <a href="<?php echo esc_url('https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20souhaite%20des%20informations%20sur%20vos%20services.'); ?>"
                       class="btn btn-outline hero__btn hero__btn--wa"
                       target="_blank" rel="noopener noreferrer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Écrire sur WhatsApp
                    </a>
                </div>
                <div class="hero__trust">
                    <div class="hero__trust-item">
                        <span class="hero__trust-icon">✓</span> Service rapide
                    </div>
                    <div class="hero__trust-item">
                        <span class="hero__trust-icon">✓</span> Conseils personnalisés
                    </div>
                    <div class="hero__trust-item">
                        <span class="hero__trust-icon">✓</span> 100% local
                    </div>
                </div>
            </div>

            <!-- Right: floating service cards -->
            <div class="hero__cards" aria-hidden="true">
                <div class="hero__card hero__card--money animate-fade-up" style="--delay:100ms">
                    <div class="hero__card-icon">💸</div>
                    <div class="hero__card-label">Mobile Money</div>
                    <div class="hero__card-sub">MTN · Moov</div>
                </div>
                <div class="hero__card hero__card--assurance animate-fade-up" style="--delay:200ms">
                    <div class="hero__card-icon">🛡️</div>
                    <div class="hero__card-label">Assurances</div>
                    <div class="hero__card-sub">Santé · Auto · Habitation</div>
                </div>
                <div class="hero__card hero__card--billet animate-fade-up" style="--delay:300ms">
                    <div class="hero__card-icon">✈️</div>
                    <div class="hero__card-label">Billeterie</div>
                    <div class="hero__card-sub">Vols & réservations</div>
                </div>
                <div class="hero__card hero__card--canal animate-fade-up" style="--delay:400ms">
                    <div class="hero__card-icon">📺</div>
                    <div class="hero__card-label">Canal+</div>
                    <div class="hero__card-sub">Abonnement & réabo</div>
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════
         SECTION 2 — Partner trust bar
         ═══════════════════════════════════════════════════ -->
    <section class="trust-bar section--dark" aria-label="Nos partenaires">
        <div class="container trust-bar__inner">
            <p class="trust-bar__label">Nos partenaires</p>
            <div class="trust-bar__logos">
                <span class="trust-bar__partner">MTN Mobile Money</span>
                <span class="trust-bar__sep" aria-hidden="true">·</span>
                <span class="trust-bar__partner">Moov Money</span>
                <span class="trust-bar__sep" aria-hidden="true">·</span>
                <span class="trust-bar__partner">Canal+</span>
                <span class="trust-bar__sep" aria-hidden="true">·</span>
                <span class="trust-bar__partner">Compagnies d'assurance</span>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════
         SECTION 3 — Services
         ═══════════════════════════════════════════════════ -->
    <section class="services-section section section--soft" aria-labelledby="services-heading">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="badge badge--primary">Ce que nous faisons</span>
                <h2 id="services-heading" class="section-header__title">
                    Nos services à Abomey-Calavi
                </h2>
                <p class="section-header__sub">
                    Quatre services essentiels réunis en un seul point de contact,
                    disponibles du lundi au samedi à Zoca, Abomey-Calavi.
                </p>
            </div>

            <div class="services-grid">

                <!-- Mobile Money -->
                <article class="service-card card animate-fade-up" style="--delay:100ms">
                    <div class="service-card__icon service-card__icon--money">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
                    </div>
                    <h3 class="service-card__title">Mobile Money</h3>
                    <p class="service-card__desc">
                        Dépôts, retraits et transferts d'argent en toute sécurité avec MTN Mobile Money et Moov Money à Abomey-Calavi.
                    </p>
                    <ul class="service-card__list" aria-label="Inclus">
                        <li>MTN Mobile Money</li>
                        <li>Moov Money</li>
                        <li>Transferts locaux rapides</li>
                        <li>Assistance & conseils</li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/mobile-money-canal')); ?>" class="service-card__link">
                        En savoir plus
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </article>

                <!-- Assurances -->
                <article class="service-card card animate-fade-up" style="--delay:200ms">
                    <div class="service-card__icon service-card__icon--assurance">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <h3 class="service-card__title">Assurances</h3>
                    <p class="service-card__desc">
                        Protégez ce qui compte le plus. Devis personnalisé pour vos besoins en assurance à Cotonou et Abomey-Calavi.
                    </p>
                    <ul class="service-card__list" aria-label="Inclus">
                        <li>Assurance santé</li>
                        <li>Assurance habitation</li>
                        <li>Assurance auto/moto</li>
                        <li>Assurance poids lourds</li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/assurances')); ?>" class="service-card__link">
                        En savoir plus
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </article>

                <!-- Billeterie -->
                <article class="service-card card animate-fade-up" style="--delay:300ms">
                    <div class="service-card__icon service-card__icon--billet">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                    </div>
                    <h3 class="service-card__title">Billeterie aérienne</h3>
                    <p class="service-card__desc">
                        Réservation et achat de billets d'avion au départ de Cotonou vers toutes destinations. Suivi de dossier inclus.
                    </p>
                    <ul class="service-card__list" aria-label="Inclus">
                        <li>Réservation de vol</li>
                        <li>Achat de billet d'avion</li>
                        <li>Modification de billet</li>
                        <li>Suivi de dossier</li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/billeterie')); ?>" class="service-card__link">
                        En savoir plus
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </article>

                <!-- Canal+ -->
                <article class="service-card card animate-fade-up" style="--delay:400ms">
                    <div class="service-card__icon service-card__icon--canal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="7" width="20" height="15" rx="2" ry="2"/><polyline points="17 2 12 7 7 2"/></svg>
                    </div>
                    <h3 class="service-card__title">Canal+</h3>
                    <p class="service-card__desc">
                        Souscrivez ou renouvelez votre abonnement Canal+ au Bénin rapidement, sans déplacement inutile.
                    </p>
                    <ul class="service-card__list" aria-label="Inclus">
                        <li>Nouvel abonnement</li>
                        <li>Réabonnement</li>
                        <li>Assistance & activation</li>
                        <li>Tous bouquets disponibles</li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/mobile-money-canal')); ?>" class="service-card__link">
                        En savoir plus
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </article>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════
         SECTION 4 — Why Omnia
         ═══════════════════════════════════════════════════ -->
    <section class="why-section section" aria-labelledby="why-heading">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="badge">Pourquoi nous choisir</span>
                <h2 id="why-heading" class="section-header__title">
                    Ce qui nous distingue
                </h2>
            </div>
            <div class="why-grid">
                <div class="why-card animate-fade-up" style="--delay:100ms">
                    <div class="why-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <h3 class="why-card__title">Proximité</h3>
                    <p class="why-card__desc">
                        Basés à Zoca, Abomey-Calavi, nous sommes votre voisin de confiance. Venez nous voir ou contactez-nous directement sur WhatsApp.
                    </p>
                </div>
                <div class="why-card animate-fade-up" style="--delay:200ms">
                    <div class="why-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                    </div>
                    <h3 class="why-card__title">Réactivité</h3>
                    <p class="why-card__desc">
                        Nous répondons rapidement à chaque demande. Votre dossier est traité le jour même pour ne jamais vous faire attendre.
                    </p>
                </div>
                <div class="why-card animate-fade-up" style="--delay:300ms">
                    <div class="why-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                    </div>
                    <h3 class="why-card__title">Accompagnement</h3>
                    <p class="why-card__desc">
                        Un conseiller dédié vous guide à chaque étape — du choix du service jusqu'à l'activation ou la livraison de votre billet.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════
         SECTION 5 — Testimonials
         ═══════════════════════════════════════════════════ -->
    <section class="testimonials-section section section--soft" aria-labelledby="testimonials-heading">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="badge">Témoignages</span>
                <h2 id="testimonials-heading" class="section-header__title">
                    Ce que disent nos clients
                </h2>
            </div>
            <div class="testimonials-grid">

                <blockquote class="testimonial-card card animate-fade-up" style="--delay:100ms">
                    <div class="testimonial-card__stars" aria-label="5 étoiles sur 5">★★★★★</div>
                    <p class="testimonial-card__quote">
                        "Retrait effectué très rapidement. Très satisfait."
                    </p>
                    <footer class="testimonial-card__footer">
                        <span class="testimonial-card__name">Adeline A.</span>
                        <span class="badge">Mobile Money</span>
                    </footer>
                </blockquote>

                <blockquote class="testimonial-card card animate-fade-up" style="--delay:200ms">
                    <div class="testimonial-card__stars" aria-label="5 étoiles sur 5">★★★★★</div>
                    <p class="testimonial-card__quote">
                        "Le personnel est d'une patience incroyable, prévenant et très professionnel, véritablement au service du client."
                    </p>
                    <footer class="testimonial-card__footer">
                        <span class="testimonial-card__name">Paul B.</span>
                        <span class="badge badge--primary">Service client</span>
                    </footer>
                </blockquote>

                <blockquote class="testimonial-card card animate-fade-up" style="--delay:300ms">
                    <div class="testimonial-card__stars" aria-label="5 étoiles sur 5">★★★★★</div>
                    <p class="testimonial-card__quote">
                        "Conseiller très professionnel, à l'écoute ! Très bonne proposition sur assurance auto. Souscription rapide et tout est clair !"
                    </p>
                    <footer class="testimonial-card__footer">
                        <span class="testimonial-card__name">Theresa R.</span>
                        <span class="badge">Assurances</span>
                    </footer>
                </blockquote>

                <blockquote class="testimonial-card card animate-fade-up" style="--delay:400ms">
                    <div class="testimonial-card__stars" aria-label="5 étoiles sur 5">★★★★★</div>
                    <p class="testimonial-card__quote">
                        "Accueil, rapidité, renseignements précis. Comme nouveau client, très bon tarif. Je recommande."
                    </p>
                    <footer class="testimonial-card__footer">
                        <span class="testimonial-card__name">Adam L.</span>
                        <span class="badge badge--primary">Billeterie</span>
                    </footer>
                </blockquote>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════
         SECTION 6 — CTA Banner
         ═══════════════════════════════════════════════════ -->
    <section class="cta-banner section section--dark" aria-labelledby="cta-heading">
        <div class="container cta-banner__inner animate-fade-up">
            <div class="cta-banner__copy">
                <h2 id="cta-heading" class="cta-banner__title">
                    Prêt à nous faire confiance ?
                </h2>
                <p class="cta-banner__sub">
                    Obtenez un devis gratuit en quelques minutes ou écrivez-nous directement sur WhatsApp.
                </p>
            </div>
            <div class="cta-banner__actions">
                <a href="<?php echo esc_url(home_url('/devis')); ?>" class="btn btn-primary">
                    Devis gratuit
                </a>
                <a href="<?php echo esc_url('https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20souhaite%20des%20informations%20sur%20vos%20services.'); ?>"
                   class="btn btn-outline"
                   target="_blank" rel="noopener noreferrer">
                    Écrire sur WhatsApp
                </a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
