<?php
/**
 * Template Name: Assurances
 */
get_header(); ?>

<main id="main-content" role="main">

    <!-- ═══════════════════════════════════════════════
         HERO
         ═══════════════════════════════════════════════ -->
    <section class="page-hero-gradient" aria-labelledby="assurances-heading">
        <div class="container animate-fade-up">

            <div class="page-hero-badge">
                <span>Partenaire agréé SUNU Assurances</span>
                <a href="<?php echo esc_url( home_url('/devis') ); ?>">Découvrir nos offres →</a>
            </div>

            <h1 id="assurances-heading" class="page-hero-title">
                Protégez ce qui compte vraiment
            </h1>

            <p class="page-hero-subtitle">
                Assurance auto, moto et voyage — des solutions adaptées
                à votre vie à Abomey-Calavi, avec la garantie SUNU Assurances.
            </p>

            <div class="page-hero-actions">
                <a href="<?php echo esc_url( home_url('/devis') ); ?>" class="btn btn-primary">
                    Obtenir un devis gratuit
                </a>
                <a href="<?php echo esc_url('https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20souhaite%20des%20informations%20sur%20vos%20assurances.'); ?>"
                   class="btn-text-arrow" target="_blank" rel="noopener noreferrer">
                    Nous écrire sur WhatsApp →
                </a>
            </div>

            <nav class="page-hero__anchors" aria-label="Produits d'assurance" style="margin-top:var(--space-10);">
                <a href="#auto"   class="anchor-pill">Auto / Moto</a>
                <a href="#voyage" class="anchor-pill">Voyage</a>
            </nav>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════════
         PARTNER — SUNU Assurances
         ═══════════════════════════════════════════════ -->
    <section class="partner-section section" aria-labelledby="partner-heading">
        <div class="container">
            <div class="partner-card animate-fade-up">
                <div class="partner-card__logo">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sunu-assurances.png' ); ?>"
                         alt="SUNU Assurances — partenaire Omnia Group"
                         width="160" height="64"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                    <div class="partner-card__logo-fallback" style="display:none" aria-hidden="true">
                        <span class="partner-card__logo-text">SUNU</span>
                        <span class="partner-card__logo-sub">ASSURANCES</span>
                    </div>
                </div>
                <div class="partner-card__content">
                    <h2 id="partner-heading" class="partner-card__title">Notre partenaire assurance</h2>
                    <p class="partner-card__desc">
                        Omnia Group SARL est partenaire agréé de SUNU Assurances, l'un des leaders
                        de l'assurance en Afrique de l'Ouest. Présent dans plus de 15 pays, SUNU
                        garantit des produits fiables, reconnus et conformes aux réglementations en vigueur au Bénin.
                    </p>
                    <span class="partner-badge">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        Agréé et fiable
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════
         #auto — SUNU Auto / Moto
         ═══════════════════════════════════════════════ -->
    <section class="product-section section section--soft" id="auto" aria-labelledby="auto-heading">
        <div class="container">
            <div class="animate-fade-up">

                <div class="product-layout__icon product-layout__icon--auto" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="2"/><path d="M16 8h4l3 5v3h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                </div>

                <span class="product-badge product-badge--auto">SUNU Auto</span>
                <h2 id="auto-heading" class="product-layout__title">Assurance Auto / Moto</h2>
                <p class="product-layout__desc">
                    Roulez en toute sérénité au Bénin. L'assurance auto SUNU couvre votre véhicule contre
                    les accidents, le vol, l'incendie et bien plus — avec une assistance dépannage incluse.
                </p>

                <div class="product-cols">
                    <div class="product-col">
                        <p class="product-col__heading">Ce qui est couvert</p>
                        <ul class="product-checklist">
                            <li>Responsabilité civile obligatoire</li>
                            <li>Dommages tous accidents</li>
                            <li>Vol et incendie</li>
                            <li>Bris de glace</li>
                            <li>Assistance dépannage</li>
                        </ul>
                    </div>
                    <div class="product-col">
                        <p class="product-col__heading">Documents requis</p>
                        <ul class="product-docs">
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                                Carte grise du véhicule
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                                Permis de conduire
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                                Pièce d'identité
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                                Ancien contrat (si renouvellement)
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="product-cta">
                    <a href="<?php echo esc_url( home_url('/devis') ); ?>" class="btn btn-primary">
                        Obtenir un devis auto
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════
         #voyage — SUNU Voyage
         ═══════════════════════════════════════════════ -->
    <section class="product-section section" id="voyage" aria-labelledby="voyage-heading">
        <div class="container">
            <div class="animate-fade-up">

                <div class="product-layout__icon product-layout__icon--voyage" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21.5 2l-19 7 7 3 3 7 9-17z"/><line x1="12" y1="12" x2="17" y2="7"/></svg>
                </div>

                <span class="product-badge product-badge--voyage">SUNU Voyage</span>
                <h2 id="voyage-heading" class="product-layout__title">Assurance Voyage</h2>
                <p class="product-layout__desc">
                    Partez l'esprit tranquille. L'assurance voyage SUNU vous protège contre les imprévus
                    à l'étranger — frais médicaux, rapatriement, annulation ou perte de bagages —
                    pour tous vos déplacements depuis le Bénin.
                </p>

                <div class="product-cols">
                    <div class="product-col">
                        <p class="product-col__heading">Ce qui est couvert</p>
                        <ul class="product-checklist">
                            <li>Frais médicaux à l'étranger</li>
                            <li>Rapatriement sanitaire</li>
                            <li>Annulation ou interruption de voyage</li>
                            <li>Perte et retard de bagages</li>
                            <li>Responsabilité civile à l'étranger</li>
                        </ul>
                    </div>
                    <div class="product-col">
                        <p class="product-col__heading">Documents requis</p>
                        <ul class="product-docs">
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                                Passeport en cours de validité
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                                Billets d'avion ou réservation
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                                Dates de départ et de retour
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="product-cta">
                    <a href="<?php echo esc_url( home_url('/devis') ); ?>" class="btn btn-primary">
                        Obtenir un devis voyage
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════
         FAQ ACCORDION (Preline UI)
         ═══════════════════════════════════════════════ -->
    <section class="faq-section section section--soft" aria-labelledby="faq-heading">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="badge badge--primary">FAQ</span>
                <h2 id="faq-heading" class="section-header__title">Questions fréquentes</h2>
                <p class="section-header__sub">
                    Tout ce que vous devez savoir avant de souscrire une assurance à Abomey-Calavi.
                </p>
            </div>

            <div class="hs-accordion-group animate-fade-up" aria-label="Questions fréquentes">

                <div class="hs-accordion active" id="hs-faq-1">
                    <button class="hs-accordion-toggle" aria-expanded="true" aria-controls="hs-faq-collapse-1">
                        Quels documents faut-il pour souscrire une assurance auto au Bénin ?
                        <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 10l5 5 5-5z"/></svg>
                    </button>
                    <div id="hs-faq-collapse-1" class="hs-accordion-content" role="region" aria-labelledby="hs-faq-1">
                        <p>Il vous faut la <strong>carte grise</strong> du véhicule, votre <strong>permis de conduire</strong>, une <strong>pièce d'identité</strong> valide et votre ancien contrat si c'est un renouvellement. Apportez ces documents à notre agence de Zoca et nous traitons votre dossier le jour même.</p>
                    </div>
                </div>

                <div class="hs-accordion" id="hs-faq-2">
                    <button class="hs-accordion-toggle" aria-expanded="false" aria-controls="hs-faq-collapse-2">
                        Combien coûte une assurance moto à Abomey-Calavi ?
                        <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 10l5 5 5-5z"/></svg>
                    </button>
                    <div id="hs-faq-collapse-2" class="hs-accordion-content" role="region" aria-labelledby="hs-faq-2">
                        <p>Le tarif dépend de la puissance de la moto, de votre profil et de la couverture choisie. Contactez-nous pour obtenir un <strong>devis personnalisé gratuit</strong> adapté à votre situation.</p>
                    </div>
                </div>

                <div class="hs-accordion" id="hs-faq-3">
                    <button class="hs-accordion-toggle" aria-expanded="false" aria-controls="hs-faq-collapse-3">
                        L'assurance habitation est-elle obligatoire au Bénin ?
                        <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 10l5 5 5-5z"/></svg>
                    </button>
                    <div id="hs-faq-collapse-3" class="hs-accordion-content" role="region" aria-labelledby="hs-faq-3">
                        <p>Elle n'est pas légalement obligatoire pour les propriétaires, mais elle est fortement recommandée. Pour les locataires, certains bailleurs l'exigent dans le contrat de bail. Elle vous protège contre l'incendie, le vol, les dégâts des eaux et engage votre responsabilité civile.</p>
                    </div>
                </div>

                <div class="hs-accordion" id="hs-faq-4">
                    <button class="hs-accordion-toggle" aria-expanded="false" aria-controls="hs-faq-collapse-4">
                        Comment déclarer un sinistre avec SUNU Assurances ?
                        <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 10l5 5 5-5z"/></svg>
                    </button>
                    <div id="hs-faq-collapse-4" class="hs-accordion-content" role="region" aria-labelledby="hs-faq-4">
                        <p>Contactez notre agence dès que possible après le sinistre. Nous vous accompagnons dans la constitution du dossier et le suivi de votre déclaration auprès de SUNU Assurances. Appelez-nous ou écrivez-nous sur <strong>WhatsApp</strong>.</p>
                    </div>
                </div>

                <div class="hs-accordion" id="hs-faq-5">
                    <button class="hs-accordion-toggle" aria-expanded="false" aria-controls="hs-faq-collapse-5">
                        Puis-je obtenir un devis en ligne ?
                        <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 10l5 5 5-5z"/></svg>
                    </button>
                    <div id="hs-faq-collapse-5" class="hs-accordion-content" role="region" aria-labelledby="hs-faq-5">
                        <p>Oui — remplissez notre <a href="<?php echo esc_url( home_url('/devis') ); ?>">formulaire de devis en ligne</a> et un conseiller vous recontacte sous <strong>24h</strong>. Vous pouvez aussi nous écrire directement sur <strong>WhatsApp</strong> pour une réponse encore plus rapide.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════
         CTA STRIP
         ═══════════════════════════════════════════════ -->
    <section class="section">
        <div class="container animate-fade-up">
            <div class="page-cta-strip">
                <div>
                    <h2 class="page-cta-strip__title">Protégez ce qui compte.</h2>
                    <p class="page-cta-strip__sub">
                        Obtenez votre devis SUNU Assurances gratuitement — réponse sous 24h.
                    </p>
                </div>
                <div class="page-cta-strip__actions">
                    <a href="<?php echo esc_url( home_url('/devis') ); ?>" class="btn btn-primary">
                        Demander un devis
                    </a>
                    <a href="tel:+2290196870499" class="btn btn-outline">
                        +229 01 96 87 04 99
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
