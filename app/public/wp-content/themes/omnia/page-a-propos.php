<?php get_header(); ?>

<main id="main-content" role="main">

    <!-- ═══════════════════════════════════════════════
         HERO
         ═══════════════════════════════════════════════ -->
    <section class="page-hero-gradient" aria-labelledby="apropos-heading">
        <div class="container animate-fade-up">

            <div class="page-hero-badge">
                <span>Abomey-Calavi, Bénin · Depuis 2018</span>
            </div>

            <h1 id="apropos-heading" class="page-hero-title">
                Votre partenaire de confiance<br>à Abomey-Calavi
            </h1>

            <p class="page-hero-subtitle">
                Omnia Group SARL est une agence multiservices établie à Zoca, Abomey-Calavi.
                Mobile Money, assurances, billeterie aérienne et Canal+ — tout sous un même toit.
            </p>

            <div class="page-hero-actions">
                <a href="<?php echo esc_url( home_url('/contact') ); ?>" class="btn btn-primary">
                    Nous contacter
                </a>
                <a href="<?php echo esc_url( home_url('/devis') ); ?>" class="btn-text-arrow">
                    Demander un devis →
                </a>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════════
         NOS VALEURS
         ═══════════════════════════════════════════════ -->
    <section class="section" aria-labelledby="valeurs-heading">
        <div class="container">

            <div class="section-header animate-fade-up">
                <span class="badge badge--primary">Nos valeurs</span>
                <h2 id="valeurs-heading" class="section-header__title">
                    Ce qui nous guide au quotidien
                </h2>
                <p class="section-header__sub">
                    Depuis 2018, nous construisons une relation de confiance avec chaque client
                    d'Abomey-Calavi grâce à trois principes fondamentaux.
                </p>
            </div>

            <div class="sub-services sub-services--3 animate-fade-up">

                <div class="sub-service-card">
                    <div class="sub-service-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                    </div>
                    <h3 class="sub-service-card__title">Confiance</h3>
                    <p class="sub-service-card__desc">
                        Enregistrés au RCCM depuis 2018, nous opérons dans un cadre légal et transparent
                        pour vous protéger à chaque transaction.
                    </p>
                </div>

                <div class="sub-service-card">
                    <div class="sub-service-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <h3 class="sub-service-card__title">Service humain</h3>
                    <p class="sub-service-card__desc">
                        Une équipe à l'écoute, disponible du lundi au samedi. Un vrai conseiller
                        pour vous accompagner, pas un robot.
                    </p>
                </div>

                <div class="sub-service-card">
                    <div class="sub-service-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                    </div>
                    <h3 class="sub-service-card__title">Rapidité</h3>
                    <p class="sub-service-card__desc">
                        Votre temps est précieux. Nos dossiers sont traités le jour même.
                        Réponse garantie sous 24h pour toute demande en ligne.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════
         NOS SERVICES
         ═══════════════════════════════════════════════ -->
    <section class="section section--soft" aria-labelledby="services-apropos-heading">
        <div class="container">

            <div class="section-header animate-fade-up">
                <span class="badge">Nos services</span>
                <h2 id="services-apropos-heading" class="section-header__title">
                    Quatre services, une seule agence
                </h2>
                <p class="section-header__sub">
                    Tout ce dont vous avez besoin au quotidien, disponible sans rendez-vous
                    à notre agence de Zoca, Abomey-Calavi.
                </p>
            </div>

            <div class="sub-services animate-fade-up">

                <div class="sub-service-card">
                    <div class="sub-service-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <rect x="2" y="5" width="20" height="14" rx="2"/>
                            <line x1="2" y1="10" x2="22" y2="10"/>
                        </svg>
                    </div>
                    <h3 class="sub-service-card__title">Mobile Money</h3>
                    <p class="sub-service-card__desc">
                        Dépôts, retraits et transferts locaux avec MTN Mobile Money et Moov Money.
                    </p>
                    <a href="<?php echo esc_url( home_url('/mobile-money-canal') ); ?>" class="sub-service-card__link">
                        En savoir plus →
                    </a>
                </div>

                <div class="sub-service-card">
                    <div class="sub-service-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                    </div>
                    <h3 class="sub-service-card__title">Assurances SUNU</h3>
                    <p class="sub-service-card__desc">
                        Assurance auto / moto et assurance voyage avec notre partenaire SUNU Assurances.
                    </p>
                    <a href="<?php echo esc_url( home_url('/assurances') ); ?>" class="sub-service-card__link">
                        En savoir plus →
                    </a>
                </div>

                <div class="sub-service-card">
                    <div class="sub-service-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M21.5 2l-19 7 7 3 3 7 9-17z"/>
                        </svg>
                    </div>
                    <h3 class="sub-service-card__title">Billeterie aérienne</h3>
                    <p class="sub-service-card__desc">
                        Réservation, achat et suivi de billets d'avion depuis Cotonou vers toutes destinations.
                    </p>
                    <a href="<?php echo esc_url( home_url('/billeterie') ); ?>" class="sub-service-card__link">
                        En savoir plus →
                    </a>
                </div>

                <div class="sub-service-card">
                    <div class="sub-service-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <rect x="2" y="7" width="20" height="15" rx="2"/>
                            <polyline points="17 2 12 7 7 2"/>
                        </svg>
                    </div>
                    <h3 class="sub-service-card__title">Canal+</h3>
                    <p class="sub-service-card__desc">
                        Abonnement et réabonnement Canal+ Bénin — tous bouquets, paiement Mobile Money accepté.
                    </p>
                    <a href="<?php echo esc_url( home_url('/mobile-money-canal') ); ?>#canal" class="sub-service-card__link">
                        En savoir plus →
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════
         TÉMOIGNAGES
         ═══════════════════════════════════════════════ -->
    <section class="testimonials-section section" aria-labelledby="temoignages-heading">
        <div class="container">

            <div class="section-header animate-fade-up">
                <span class="badge badge--primary">Témoignages</span>
                <h2 id="temoignages-heading" class="section-header__title">
                    Ce que disent nos clients
                </h2>
                <p class="section-header__sub">
                    Des centaines de clients nous font confiance à Abomey-Calavi.
                    Voici ce qu'ils disent de nous.
                </p>
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

    <!-- ═══════════════════════════════════════════════
         INFORMATIONS LÉGALES
         ═══════════════════════════════════════════════ -->
    <section class="section section--soft" aria-labelledby="legal-heading">
        <div class="container">

            <div class="section-header animate-fade-up">
                <span class="badge">Informations légales</span>
                <h2 id="legal-heading" class="section-header__title">Omnia Group SARL</h2>
                <p class="section-header__sub">
                    Société à responsabilité limitée enregistrée au Bénin depuis 2018.
                </p>
            </div>

            <div class="legal-grid animate-fade-up">
                <div class="legal-item">
                    <span class="legal-item__label">RCCM</span>
                    <span class="legal-item__value">RB/ABC/18 B 2458</span>
                </div>
                <div class="legal-item">
                    <span class="legal-item__label">IFU</span>
                    <span class="legal-item__value">3201810514040</span>
                </div>
                <div class="legal-item">
                    <span class="legal-item__label">Siège social</span>
                    <span class="legal-item__value">Ilot 103 J, Maison GADESSOU, ZOCA – BP 1547, Abomey-Calavi, Bénin</span>
                </div>
                <div class="legal-item">
                    <span class="legal-item__label">Horaires</span>
                    <span class="legal-item__value">Lun–Ven : 9h–12h / 14h–18h30 &nbsp;·&nbsp; Sam : 9h–16h</span>
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════════
         CTA
         ═══════════════════════════════════════════════ -->
    <section class="section section--dark">
        <div class="container animate-fade-up">
            <div class="page-cta-strip">
                <div>
                    <h2 class="page-cta-strip__title">Venez nous voir à Zoca, Abomey-Calavi</h2>
                    <p class="page-cta-strip__sub">
                        Ilot 103 J, Maison GADESSOU — Lun–Ven 9h–18h30 · Sam 9h–16h.
                    </p>
                </div>
                <div class="page-cta-strip__actions">
                    <a href="<?php echo esc_url( home_url('/devis') ); ?>" class="btn btn-primary">Devis gratuit</a>
                    <a href="<?php echo esc_url( home_url('/contact') ); ?>" class="btn btn-outline">Nous contacter</a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
