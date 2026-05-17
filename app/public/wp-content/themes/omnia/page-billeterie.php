<?php get_header(); ?>

<main id="main-content" role="main">

    <!-- ═══════════════════════════════════════════════
         HERO
         ═══════════════════════════════════════════════ -->
    <section class="page-hero-gradient" aria-labelledby="billeterie-heading">
        <div class="container animate-fade-up">

            <div class="page-hero-badge">
                <span>Billets d'avion depuis Cotonou</span>
                <a href="<?php echo esc_url( home_url('/devis') ); ?>">Voir nos destinations →</a>
            </div>

            <h1 id="billeterie-heading" class="page-hero-title">
                Voyagez sereinement, au meilleur prix
            </h1>

            <p class="page-hero-subtitle">
                Réservation, achat et suivi de vos billets d'avion — un conseiller dédié
                de Abomey-Calavi à votre destination.
            </p>

            <div class="page-hero-actions">
                <a href="<?php echo esc_url( home_url('/devis') ); ?>" class="btn btn-primary">
                    Demander un devis vol
                </a>
                <a href="<?php echo esc_url('https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20souhaite%20r%C3%A9server%20un%20billet%20d%27avion.'); ?>"
                   class="btn-text-arrow" target="_blank" rel="noopener noreferrer">
                    Nous écrire sur WhatsApp →
                </a>
            </div>

        </div>
    </section>

    <!-- Services billeterie -->
    <section class="section" aria-labelledby="services-billet-heading">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="badge badge--primary">Nos prestations</span>
                <h2 id="services-billet-heading" class="section-header__title">
                    Tout pour votre voyage
                </h2>
                <p class="section-header__sub">
                    De la réservation initiale au suivi après-vente, notre équipe vous accompagne à chaque étape de votre voyage aérien.
                </p>
            </div>

            <div class="sub-services animate-fade-up">

                <div class="sub-service-card">
                    <div class="sub-service-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                    </div>
                    <h3 class="sub-service-card__title">Réservation de vol</h3>
                    <p class="sub-service-card__desc">
                        Recherche des meilleures options de vol au départ de Cotonou selon vos dates et votre budget.
                    </p>
                    <ul class="sub-service-card__list">
                        <li>Vols aller simple & retour</li>
                        <li>Destinations Afrique & international</li>
                        <li>Comparaison des tarifs</li>
                        <li>Réservation immédiate</li>
                    </ul>
                </div>

                <div class="sub-service-card">
                    <div class="sub-service-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 12V22H4V12"/><path d="M22 7H2v5h20V7z"/><path d="M12 22V7"/><path d="M12 7H7.5a2.5 2.5 0 010-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 000-5C13 2 12 7 12 7z"/></svg>
                    </div>
                    <h3 class="sub-service-card__title">Achat de billet</h3>
                    <p class="sub-service-card__desc">
                        Achat sécurisé de vos billets d'avion avec confirmation immédiate et envoi de l'e-ticket.
                    </p>
                    <ul class="sub-service-card__list">
                        <li>Paiement sécurisé</li>
                        <li>E-ticket envoyé par email/SMS</li>
                        <li>Toutes compagnies aériennes</li>
                        <li>Classes économique & affaires</li>
                    </ul>
                </div>

                <div class="sub-service-card">
                    <div class="sub-service-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    </div>
                    <h3 class="sub-service-card__title">Modification de billet</h3>
                    <p class="sub-service-card__desc">
                        Changement de date, de destination ou de nom — nous gérons les modifications auprès de la compagnie.
                    </p>
                    <ul class="sub-service-card__list">
                        <li>Changement de date de vol</li>
                        <li>Modification de destination</li>
                        <li>Correction de nom</li>
                        <li>Gestion des annulations</li>
                    </ul>
                </div>

                <div class="sub-service-card">
                    <div class="sub-service-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <h3 class="sub-service-card__title">Suivi de dossier</h3>
                    <p class="sub-service-card__desc">
                        Suivi en temps réel de votre réservation et assistance avant, pendant et après votre voyage.
                    </p>
                    <ul class="sub-service-card__list">
                        <li>Statut de réservation en direct</li>
                        <li>Rappels & alertes vol</li>
                        <li>Assistance bagages perdus</li>
                        <li>Support WhatsApp disponible</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- Process -->
    <section class="section section--soft" aria-labelledby="process-billet-heading">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="badge">Processus simple</span>
                <h2 id="process-billet-heading" class="section-header__title">Réservez votre vol en 3 étapes</h2>
            </div>
            <div class="process-steps animate-fade-up" style="max-width:600px;margin-inline:auto;">
                <div class="process-step">
                    <div class="process-step__number">1</div>
                    <div class="process-step__content">
                        <h3 class="process-step__title">Soumettez votre demande</h3>
                        <p class="process-step__desc">Renseignez votre destination, vos dates et le nombre de passagers via notre formulaire ou WhatsApp.</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="process-step__number">2</div>
                    <div class="process-step__content">
                        <h3 class="process-step__title">Recevez les meilleures offres</h3>
                        <p class="process-step__desc">Notre équipe recherche les vols disponibles et vous présente les tarifs les plus avantageux.</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="process-step__number">3</div>
                    <div class="process-step__content">
                        <h3 class="process-step__title">Confirmation & e-ticket</h3>
                        <p class="process-step__desc">Après paiement, votre billet est émis et envoyé immédiatement par email ou SMS.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ (Preline UI) -->
    <section class="faq-section section section--soft" aria-labelledby="faq-billet-heading">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="badge badge--primary">FAQ</span>
                <h2 id="faq-billet-heading" class="section-header__title">Questions fréquentes</h2>
                <p class="section-header__sub">
                    Tout ce que vous devez savoir avant de réserver votre billet d'avion depuis Cotonou.
                </p>
            </div>

            <div class="hs-accordion-group animate-fade-up" aria-label="Questions fréquentes">

                <div class="hs-accordion active" id="hs-faqb-1">
                    <button class="hs-accordion-toggle" aria-expanded="true" aria-controls="hs-faqb-collapse-1">
                        Comment réserver un billet d'avion depuis Cotonou ?
                        <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 10l5 5 5-5z"/></svg>
                    </button>
                    <div id="hs-faqb-collapse-1" class="hs-accordion-content" role="region" aria-labelledby="hs-faqb-1">
                        <p>Contactez-nous par WhatsApp ou via notre <a href="<?php echo esc_url( home_url('/devis') ); ?>">formulaire en ligne</a> avec votre destination, vos dates et le nombre de passagers. Nous comparons les offres disponibles et vous proposons les meilleurs tarifs sous quelques heures.</p>
                    </div>
                </div>

                <div class="hs-accordion" id="hs-faqb-2">
                    <button class="hs-accordion-toggle" aria-expanded="false" aria-controls="hs-faqb-collapse-2">
                        Quels documents faut-il pour voyager depuis le Bénin ?
                        <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 10l5 5 5-5z"/></svg>
                    </button>
                    <div id="hs-faqb-collapse-2" class="hs-accordion-content" role="region" aria-labelledby="hs-faqb-2">
                        <p>Un <strong>passeport valide</strong> est indispensable. Selon la destination, un visa peut être requis. Certains pays demandent également un <strong>certificat de vaccination</strong> (fièvre jaune notamment). Nous vous guidons selon votre destination.</p>
                    </div>
                </div>

                <div class="hs-accordion" id="hs-faqb-3">
                    <button class="hs-accordion-toggle" aria-expanded="false" aria-controls="hs-faqb-collapse-3">
                        Peut-on modifier ou annuler un billet après achat ?
                        <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 10l5 5 5-5z"/></svg>
                    </button>
                    <div id="hs-faqb-collapse-3" class="hs-accordion-content" role="region" aria-labelledby="hs-faqb-3">
                        <p>Oui, selon les conditions de la compagnie aérienne. Certains billets sont <strong>modifiables ou remboursables</strong> avec des frais, d'autres sont non échangeables. Nous vous conseillons le billet adapté à vos besoins avant l'achat.</p>
                    </div>
                </div>

                <div class="hs-accordion" id="hs-faqb-4">
                    <button class="hs-accordion-toggle" aria-expanded="false" aria-controls="hs-faqb-collapse-4">
                        Combien de temps à l'avance faut-il réserver ?
                        <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 10l5 5 5-5z"/></svg>
                    </button>
                    <div id="hs-faqb-collapse-4" class="hs-accordion-content" role="region" aria-labelledby="hs-faqb-4">
                        <p>Plus tôt vous réservez, plus les tarifs sont avantageux — idéalement <strong>3 à 8 semaines</strong> avant le départ pour les vols internationaux. Contactez-nous dès que votre date est connue.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="section">
        <div class="container animate-fade-up">
            <div class="page-cta-strip">
                <div>
                    <h2 class="page-cta-strip__title">Réservez votre prochain vol</h2>
                    <p class="page-cta-strip__sub">Départ depuis Cotonou — Toutes destinations.</p>
                </div>
                <div class="page-cta-strip__actions">
                    <a href="<?php echo esc_url(home_url('/devis')); ?>" class="btn btn-primary">Demander un devis</a>
                    <a href="<?php echo esc_url('https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20souhaite%20r%C3%A9server%20un%20billet%20d%27avion.'); ?>" class="btn btn-outline" target="_blank" rel="noopener noreferrer">WhatsApp</a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
