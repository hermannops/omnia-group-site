<?php get_header(); ?>

<main id="main-content" role="main">

    <!-- ═══════════════════════════════════════════════
         HERO
         ═══════════════════════════════════════════════ -->
    <section class="page-hero-gradient" aria-labelledby="monetique-heading">
        <div class="container animate-fade-up">

            <div class="page-hero-badge">
                <span>MTN Mobile Money · Moov Money · Canal+</span>
                <a href="<?php echo esc_url( home_url('/devis') ); ?>">Voir nos services →</a>
            </div>

            <h1 id="monetique-heading" class="page-hero-title">
                Vos transactions locales, simples et rapides
            </h1>

            <p class="page-hero-subtitle">
                Transferts Mobile Money avec MTN et Moov, abonnement et réabonnement Canal+ —
                tout depuis notre agence de Zoca, Abomey-Calavi.
            </p>

            <div class="page-hero-actions">
                <a href="<?php echo esc_url( home_url('/contact') ); ?>" class="btn btn-primary">
                    Nous contacter
                </a>
                <a href="<?php echo esc_url('https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20souhaite%20des%20informations%20sur%20vos%20services.'); ?>"
                   class="btn-text-arrow" target="_blank" rel="noopener noreferrer">
                    Nous écrire sur WhatsApp →
                </a>
            </div>

            <nav class="page-hero__anchors" aria-label="Sections de la page" style="margin-top:var(--space-10);">
                <a href="#mobile-money" class="anchor-pill">Mobile Money</a>
                <a href="#canal"        class="anchor-pill">Canal+</a>
            </nav>

        </div>
    </section>

    <!-- ── Mobile Money ───────────────────────────────────── -->
    <section id="mobile-money" class="product-section" aria-labelledby="mm-heading">
        <div class="container">
            <div class="animate-fade-up">
                <div class="product-layout__icon product-layout__icon--auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="2" y="5" width="20" height="14" rx="2"/>
                        <line x1="2" y1="10" x2="22" y2="10"/>
                    </svg>
                </div>
                <span class="product-badge product-badge--auto">Mobile Money</span>
                <h2 id="mm-heading" class="product-layout__title">
                    Dépôts, retraits &amp; transferts locaux
                </h2>
                <p class="product-layout__desc">
                    Nos agents prennent en charge toutes vos opérations Mobile Money à Zoca, Abomey-Calavi.
                    Service disponible du lundi au samedi, sans rendez-vous — compatible avec tous les opérateurs
                    mobiles du Bénin : MTN, Moov, Celtis et autres.
                </p>
                <div class="product-cols">
                    <div class="product-col">
                        <p class="product-col__heading">Opérations disponibles</p>
                        <ul class="product-checklist">
                            <li>Dépôt sur compte Mobile Money</li>
                            <li>Retrait d'espèces</li>
                            <li>Transferts locaux entre opérateurs</li>
                            <li>Paiements marchands</li>
                            <li>Paiement de factures CEB, SONEB…</li>
                        </ul>
                    </div>
                    <div class="product-col">
                        <p class="product-col__heading">Opérateurs acceptés</p>
                        <ul class="product-checklist">
                            <li>MTN Mobile Money</li>
                            <li>Moov Money</li>
                            <li>Celtis</li>
                            <li>Et autres opérateurs locaux</li>
                        </ul>
                    </div>
                </div>
                <div class="product-cta">
                    <a href="<?php echo esc_url(home_url('/devis')); ?>" class="btn btn-primary">Faire une demande</a>
                    <a href="<?php echo esc_url('https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20souhaite%20effectuer%20une%20op%C3%A9ration%20Mobile%20Money.'); ?>"
                       class="btn btn-whatsapp" target="_blank" rel="noopener noreferrer">
                        Écrire sur WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Canal+ ─────────────────────────────────────────── -->
    <section id="canal" class="product-section section--soft" aria-labelledby="canal-heading">
        <div class="container">
            <div class="animate-fade-up" style="margin-bottom:var(--space-10);">
                <div class="product-layout__icon product-layout__icon--canal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="2" y="7" width="20" height="15" rx="2"/>
                        <polyline points="17 2 12 7 7 2"/>
                    </svg>
                </div>
                <span class="product-badge product-badge--auto">Canal+</span>
                <h2 id="canal-heading" class="product-layout__title">
                    Abonnement &amp; réabonnement Canal+ Bénin
                </h2>
                <p class="product-layout__desc">
                    Souscrivez ou renouvelez votre abonnement Canal+ directement à notre agence.
                    Activation rapide, tous bouquets disponibles, paiement Mobile Money accepté.
                </p>
            </div>

            <div class="sub-services animate-fade-up">

                <div class="sub-service-card">
                    <div class="sub-service-card__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="16"/>
                            <line x1="8"  y1="12" x2="16" y2="12"/>
                        </svg>
                    </div>
                    <h3 class="sub-service-card__title">Nouvel abonnement</h3>
                    <p class="sub-service-card__desc">
                        Vous n'êtes pas encore abonné Canal+ ? Souscrivez pour la première fois et profitez
                        d'une activation immédiate de votre bouquet.
                    </p>
                    <ul class="sub-service-card__list">
                        <li>Tous les bouquets Canal+ disponibles</li>
                        <li>Activation sous 24h</li>
                        <li>Conseil sur le choix du bouquet</li>
                        <li>Paiement Mobile Money accepté</li>
                    </ul>
                </div>

                <div class="sub-service-card">
                    <div class="sub-service-card__icon" style="background-color:rgba(232,151,26,0.10);color:var(--color-accent);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <polyline points="1 4 1 10 7 10"/>
                            <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"/>
                        </svg>
                    </div>
                    <h3 class="sub-service-card__title">Réabonnement</h3>
                    <p class="sub-service-card__desc">
                        Renouvelez votre abonnement Canal+ avant la coupure de signal.
                        Mensuel ou annuel — nous gérons tout rapidement sur place.
                    </p>
                    <ul class="sub-service-card__list">
                        <li>Renouvellement mensuel &amp; annuel</li>
                        <li>Pas d'interruption de signal</li>
                        <li>Rappel avant expiration</li>
                        <li>Paiement Mobile Money accepté</li>
                    </ul>
                </div>

            </div>

            <div class="product-cta animate-fade-up" style="margin-top:var(--space-10);">
                <a href="<?php echo esc_url(home_url('/devis')); ?>" class="btn btn-primary">Souscrire en ligne</a>
                <a href="<?php echo esc_url('https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20souhaite%20des%20informations%20sur%20l%27abonnement%20Canal%2B.'); ?>"
                   class="btn btn-whatsapp" target="_blank" rel="noopener noreferrer">
                    Écrire sur WhatsApp
                </a>
            </div>
        </div>
    </section>

    <!-- ── FAQ (Preline UI) ──────────────────────────────── -->
    <section class="faq-section section section--soft" aria-labelledby="faq-mm-heading">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="badge badge--primary">FAQ</span>
                <h2 id="faq-mm-heading" class="section-header__title">Questions fréquentes</h2>
                <p class="section-header__sub">
                    Tout ce que vous devez savoir sur nos services Mobile Money et Canal+.
                </p>
            </div>

            <div class="hs-accordion-group animate-fade-up" aria-label="Questions fréquentes">

                <div class="hs-accordion active" id="hs-faqm-1">
                    <button class="hs-accordion-toggle" aria-expanded="true" aria-controls="hs-faqm-collapse-1">
                        Quels opérateurs Mobile Money acceptez-vous ?
                        <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 10l5 5 5-5z"/></svg>
                    </button>
                    <div id="hs-faqm-collapse-1" class="hs-accordion-content" role="region" aria-labelledby="hs-faqm-1">
                        <p>Nous travaillons avec <strong>MTN Mobile Money</strong> et <strong>Moov Money</strong> pour tous vos transferts locaux. Venez à notre agence de Zoca avec le numéro du destinataire et le montant souhaité.</p>
                    </div>
                </div>

                <div class="hs-accordion" id="hs-faqm-2">
                    <button class="hs-accordion-toggle" aria-expanded="false" aria-controls="hs-faqm-collapse-2">
                        Quel est le délai d'un transfert Mobile Money ?
                        <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 10l5 5 5-5z"/></svg>
                    </button>
                    <div id="hs-faqm-collapse-2" class="hs-accordion-content" role="region" aria-labelledby="hs-faqm-2">
                        <p>Les transferts sont <strong>quasi instantanés</strong>. Le destinataire reçoit une notification dès que l'opération est confirmée de notre côté.</p>
                    </div>
                </div>

                <div class="hs-accordion" id="hs-faqm-3">
                    <button class="hs-accordion-toggle" aria-expanded="false" aria-controls="hs-faqm-collapse-3">
                        Comment renouveler mon abonnement Canal+ ?
                        <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 10l5 5 5-5z"/></svg>
                    </button>
                    <div id="hs-faqm-collapse-3" class="hs-accordion-content" role="region" aria-labelledby="hs-faqm-3">
                        <p>Venez à l'agence ou contactez-nous sur <strong>WhatsApp</strong> avec votre numéro de décodeur. Nous traitons le réabonnement rapidement, sans déplacement si vous passez par WhatsApp.</p>
                    </div>
                </div>

                <div class="hs-accordion" id="hs-faqm-4">
                    <button class="hs-accordion-toggle" aria-expanded="false" aria-controls="hs-faqm-collapse-4">
                        Puis-je m'abonner à Canal+ sans me déplacer ?
                        <svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 10l5 5 5-5z"/></svg>
                    </button>
                    <div id="hs-faqm-collapse-4" class="hs-accordion-content" role="region" aria-labelledby="hs-faqm-4">
                        <p>Oui — envoyez-nous un message <strong>WhatsApp</strong> avec votre numéro de décodeur et le bouquet souhaité. Nous nous occupons de tout et vous confirmons l'activation dès que c'est fait.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ── CTA Strip ──────────────────────────────────────── -->
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
                    <a href="<?php echo esc_url(home_url('/devis')); ?>" class="btn btn-primary">Devis gratuit</a>
                    <a href="<?php echo esc_url('https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20souhaite%20des%20informations%20sur%20vos%20services.'); ?>"
                       class="btn btn-outline" target="_blank" rel="noopener noreferrer">WhatsApp</a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
