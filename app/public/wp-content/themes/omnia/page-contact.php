<?php get_header(); ?>

<main id="main-content" role="main">

    <!-- ══════════════════════════════════════════════════════
         CONTACT SECTION — hidden after successful submit
         ══════════════════════════════════════════════════════ -->
    <section id="contact-section" class="contact-section section" aria-labelledby="contact-heading">
        <div class="container">

            <div class="contact-header animate-fade-up">
                <span class="badge badge--primary">Contact</span>
                <h1 id="contact-heading" class="contact-header__title">Nous contacter</h1>
                <p class="contact-header__sub">
                    Notre équipe est disponible du lundi au samedi à Zoca, Abomey-Calavi.
                    Écrivez-nous, appelez-nous, ou venez directement nous rendre visite.
                </p>
            </div>

            <div class="contact-layout">

                <!-- Form -->
                <div class="contact-form-wrap animate-fade-up">
                    <h2 class="contact-form-wrap__title">Envoyez-nous un message</h2>

                    <form id="contact-form" class="contact-form" novalidate>
                        <?php wp_nonce_field('omnia_devis_nonce', 'nonce'); ?>
                        <input type="hidden" name="service" value="contact">

                        <!-- Prénom + Nom -->
                        <div class="contact-form__row">
                            <div class="devis-field">
                                <label class="devis-field__label" for="contact-prenom">
                                    Prénom <span aria-hidden="true">*</span>
                                </label>
                                <input class="devis-field__input" type="text" id="contact-prenom" name="prenom"
                                       placeholder="Koffi" autocomplete="given-name" required>
                                <p class="devis-field__error" id="prenom-error" hidden role="alert">Veuillez saisir votre prénom.</p>
                            </div>
                            <div class="devis-field">
                                <label class="devis-field__label" for="contact-nom">
                                    Nom <span aria-hidden="true">*</span>
                                </label>
                                <input class="devis-field__input" type="text" id="contact-nom" name="nom"
                                       placeholder="Dossou" autocomplete="family-name" required>
                                <p class="devis-field__error" id="nom-error" hidden role="alert">Veuillez saisir votre nom.</p>
                            </div>
                        </div>

                        <!-- Email + Confirmer email -->
                        <div class="contact-form__row">
                            <div class="devis-field">
                                <label class="devis-field__label" for="contact-email">
                                    Email <span aria-hidden="true">*</span>
                                </label>
                                <input class="devis-field__input" type="email" id="contact-email" name="email"
                                       placeholder="koffi@email.com" autocomplete="email" required>
                                <p class="devis-field__error" id="email-error" hidden role="alert">Veuillez saisir un email valide.</p>
                            </div>
                            <div class="devis-field">
                                <label class="devis-field__label" for="contact-email-confirm">
                                    Confirmer l'email <span aria-hidden="true">*</span>
                                </label>
                                <input class="devis-field__input" type="email" id="contact-email-confirm"
                                       placeholder="koffi@email.com" autocomplete="email" required>
                                <p class="devis-field__error" id="email-confirm-error" hidden role="alert">Les adresses email ne correspondent pas.</p>
                            </div>
                        </div>

                        <!-- Téléphone + Confirmer téléphone -->
                        <div class="contact-form__row">
                            <div class="devis-field">
                                <label class="devis-field__label" for="contact-tel">
                                    Téléphone <span aria-hidden="true">*</span>
                                </label>
                                <div class="devis-field__phone">
                                    <span class="devis-field__prefix">+229</span>
                                    <input class="devis-field__input" type="tel" id="contact-tel" name="telephone"
                                           placeholder="01 23 45 67 89 0" autocomplete="tel" required>
                                </div>
                                <p class="devis-field__error" id="tel-error" hidden role="alert">Veuillez saisir votre numéro.</p>
                            </div>
                            <div class="devis-field">
                                <label class="devis-field__label" for="contact-tel-confirm">
                                    Confirmer le téléphone <span aria-hidden="true">*</span>
                                </label>
                                <div class="devis-field__phone">
                                    <span class="devis-field__prefix">+229</span>
                                    <input class="devis-field__input" type="tel" id="contact-tel-confirm"
                                           placeholder="01 23 45 67 89 0" autocomplete="tel" required>
                                </div>
                                <p class="devis-field__error" id="tel-confirm-error" hidden role="alert">Les numéros de téléphone ne correspondent pas.</p>
                            </div>
                        </div>

                        <!-- Objet -->
                        <div class="devis-field">
                            <label class="devis-field__label" for="contact-objet">
                                Objet <span aria-hidden="true">*</span>
                            </label>
                            <select class="devis-field__input devis-field__select" id="contact-objet" name="objet" required>
                                <option value="">-- Sélectionnez un objet --</option>
                                <option value="Assurance">Assurance</option>
                                <option value="Billeterie">Billeterie</option>
                                <option value="Canal+">Canal+</option>
                                <option value="Mobile Money">Mobile Money</option>
                                <option value="Autres">Autres</option>
                            </select>
                            <p class="devis-field__error" id="objet-error" hidden role="alert">Veuillez sélectionner un objet.</p>
                        </div>

                        <!-- Message -->
                        <div class="devis-field">
                            <label class="devis-field__label" for="contact-message">
                                Message <span aria-hidden="true">*</span>
                            </label>
                            <textarea class="devis-field__input devis-field__textarea" id="contact-message" name="message"
                                      placeholder="Comment pouvons-nous vous aider ?" rows="5" required></textarea>
                            <p class="devis-field__error" id="message-error" hidden role="alert">Veuillez saisir votre message.</p>
                        </div>

                        <button type="submit" class="btn btn-primary contact-form__submit">
                            <span class="submit-text">Envoyer le message</span>
                            <span class="submit-spinner" hidden aria-hidden="true">…</span>
                        </button>

                        <p class="devis-form__error devis-form__error--global" id="contact-error" role="alert" hidden></p>
                    </form>
                </div>

                <!-- Info panel -->
                <div class="contact-info animate-fade-up">
                    <div class="contact-info__block">
                        <h2 class="contact-info__title">Informations</h2>

                        <div class="contact-info__item">
                            <div class="contact-info__icon" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                            </div>
                            <div>
                                <p class="contact-info__label">Adresse</p>
                                <p class="contact-info__value">Ilot 103 J, Maison GADESSOU<br>ZOCA – BP 1547<br>Abomey-Calavi, Bénin</p>
                            </div>
                        </div>

                        <div class="contact-info__item">
                            <div class="contact-info__icon" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="contact-info__label">WhatsApp</p>
                                <a href="<?php echo esc_url('https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20souhaite%20des%20informations%20sur%20vos%20services.'); ?>" class="contact-info__value contact-info__link" target="_blank" rel="noopener noreferrer">Écrire sur WhatsApp →</a>
                            </div>
                        </div>

                        <div class="contact-info__item">
                            <div class="contact-info__icon" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polyline points="12 6 12 12 16 14"/>
                                </svg>
                            </div>
                            <div>
                                <p class="contact-info__label">Horaires d'ouverture</p>
                                <p class="contact-info__value">
                                    Lun–Ven : 9h–12h / 14h–18h30<br>
                                    Samedi : 9h–16h<br>
                                    <em>Fermé les jours fériés</em>
                                </p>
                            </div>
                        </div>

                        <a href="<?php echo esc_url('https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20souhaite%20des%20informations%20sur%20vos%20services.'); ?>"
                           class="btn btn-whatsapp contact-info__wa"
                           target="_blank" rel="noopener noreferrer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/>
                            </svg>
                            Écrire sur WhatsApp
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════════════════
         THANK-YOU SECTION — shown after successful submit
         ══════════════════════════════════════════════════════ -->
    <section id="contact-merci" class="contact-merci section" hidden aria-labelledby="merci-heading">
        <div class="container">
            <div class="contact-merci__inner">

                <div class="contact-merci__icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                </div>

                <h2 id="merci-heading" class="contact-merci__title">Message envoyé !</h2>
                <p class="contact-merci__sub">
                    Nous avons bien reçu votre message.<br>
                    Nous vous répondons très bientôt.
                </p>

                <div class="contact-merci__actions">
                    <a href="<?php echo esc_url('https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20viens%20d%27envoyer%20un%20message%20via%20le%20formulaire.'); ?>"
                       class="btn btn-whatsapp" target="_blank" rel="noopener noreferrer">
                        Écrire sur WhatsApp
                    </a>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                        Retour à l'accueil
                    </a>
                </div>

                <button type="button" id="contact-reset" class="contact-merci__reset">
                    Envoyer un autre message
                </button>

            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
