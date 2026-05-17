<?php get_header(); ?>

<main id="main-content" role="main">

    <section class="devis-section section" aria-labelledby="devis-heading">
        <div class="container">

            <div class="devis-header animate-fade-up">
                <span class="badge badge--primary">Devis gratuit</span>
                <h1 id="devis-heading" class="devis-header__title">Demandez votre devis en ligne</h1>
                <p class="devis-header__sub">
                    Remplissez ce formulaire en quelques minutes. Un conseiller Omnia Group vous contacte sous 24h.
                    Vos informations sont strictement confidentielles.
                </p>
            </div>

            <!-- Multi-step form -->
            <div class="devis-form-wrap animate-fade-up">

                <!-- Step indicators -->
                <div class="devis-steps" role="list" aria-label="Étapes du formulaire">
                    <div class="devis-step is-active" role="listitem" data-step="1">
                        <div class="devis-step__circle">1</div>
                        <span class="devis-step__label">Service</span>
                    </div>
                    <div class="devis-step__line" aria-hidden="true"></div>
                    <div class="devis-step" role="listitem" data-step="2">
                        <div class="devis-step__circle">2</div>
                        <span class="devis-step__label">Coordonnées</span>
                    </div>
                    <div class="devis-step__line" aria-hidden="true"></div>
                    <div class="devis-step" role="listitem" data-step="3">
                        <div class="devis-step__circle">3</div>
                        <span class="devis-step__label">Détails</span>
                    </div>
                </div>

                <form id="devis-form" class="devis-form" novalidate>
                    <?php wp_nonce_field('omnia_devis_nonce', 'nonce'); ?>

                    <!-- ── STEP 1: Service selector ── -->
                    <fieldset class="devis-fieldset is-active" id="step-1">
                        <legend class="devis-fieldset__legend">Quel service vous intéresse ?</legend>
                        <div class="service-selector" role="radiogroup" aria-label="Choisissez un service">

                            <label class="service-option">
                                <input type="radio" name="service" value="assurances" required>
                                <div class="service-option__card">
                                    <div class="service-option__icon">🛡️</div>
                                    <div class="service-option__name">Assurances</div>
                                    <div class="service-option__sub">Auto / Moto · Voyage</div>
                                </div>
                            </label>

                            <label class="service-option">
                                <input type="radio" name="service" value="billeterie" required>
                                <div class="service-option__card">
                                    <div class="service-option__icon">✈️</div>
                                    <div class="service-option__name">Billeterie</div>
                                    <div class="service-option__sub">Vols & réservations</div>
                                </div>
                            </label>

                        </div>
                        <p class="devis-form__error" id="step1-error" role="alert" hidden>Veuillez sélectionner un service.</p>
                        <div class="devis-form__nav">
                            <button type="button" class="btn btn-primary" id="step1-next">Continuer →</button>
                        </div>
                    </fieldset>

                    <!-- ── STEP 2: Common fields ── -->
                    <fieldset class="devis-fieldset" id="step-2" hidden>
                        <legend class="devis-fieldset__legend">Vos coordonnées</legend>

                        <div class="devis-field-row">
                            <div class="devis-field">
                                <label class="devis-field__label" for="nom">Nom <span aria-hidden="true">*</span></label>
                                <input class="devis-field__input" type="text" id="nom" name="nom"
                                       placeholder="DOSSOU" autocomplete="family-name" required>
                                <p class="devis-form__error" id="nom-error" role="alert" hidden>Veuillez entrer votre nom.</p>
                            </div>
                            <div class="devis-field">
                                <label class="devis-field__label" for="prenom">Prénom <span aria-hidden="true">*</span></label>
                                <input class="devis-field__input" type="text" id="prenom" name="prenom"
                                       placeholder="Koffi" autocomplete="given-name" required>
                                <p class="devis-form__error" id="prenom-error" role="alert" hidden>Veuillez entrer votre prénom.</p>
                            </div>
                        </div>

                        <div class="devis-field">
                            <label class="devis-field__label" for="telephone">Téléphone <span aria-hidden="true">*</span></label>
                            <div class="devis-field__phone">
                                <span class="devis-field__prefix">+229</span>
                                <input class="devis-field__input" type="tel" id="telephone" name="telephone"
                                       placeholder="01 96 87 04 99" autocomplete="tel" required>
                            </div>
                            <p class="devis-form__error" id="tel-error" role="alert" hidden>Veuillez entrer un numéro valide.</p>
                        </div>

                        <div class="devis-field">
                            <label class="devis-field__label" for="email">
                                Email <span class="devis-field__optional">(optionnel)</span>
                            </label>
                            <input class="devis-field__input" type="email" id="email" name="email"
                                   placeholder="votre@email.com" autocomplete="email">
                        </div>

                        <div class="devis-form__nav">
                            <button type="button" class="btn btn-outline devis-btn-outline" id="step2-back">← Retour</button>
                            <button type="button" class="btn btn-primary" id="step2-next">Continuer →</button>
                        </div>
                    </fieldset>

                    <!-- ── STEP 3: Conditional fields ── -->
                    <fieldset class="devis-fieldset" id="step-3" hidden>
                        <legend class="devis-fieldset__legend">Détails de votre demande</legend>

                        <!-- Assurances fields -->
                        <div class="conditional-fields" id="fields-assurances" hidden>
                            <div class="devis-field">
                                <label class="devis-field__label" for="sous_service">Type d'assurance</label>
                                <select class="devis-field__input devis-field__select" id="sous_service" name="sous_service">
                                    <option value="">Choisir…</option>
                                    <option value="auto-moto">Auto / Moto</option>
                                    <option value="voyage">Voyage</option>
                                </select>
                            </div>

                            <!-- Auto/Moto sub-fields -->
                            <div id="sub-auto-moto" class="sub-conditional" hidden>
                                <div class="devis-field">
                                    <label class="devis-field__label" for="type_vehicule">Type de véhicule</label>
                                    <select class="devis-field__input devis-field__select" id="type_vehicule" name="type_vehicule">
                                        <option value="">Choisir…</option>
                                        <option value="moto">Moto – 2 roues</option>
                                        <option value="voiture">Voiture – 4 roues</option>
                                        <option value="poids-lourd">Poids lourd</option>
                                    </select>
                                </div>
                                <div class="devis-field">
                                    <label class="devis-field__label" for="marque">Marque</label>
                                    <input class="devis-field__input" type="text" id="marque" name="marque" placeholder="Ex : Toyota">
                                </div>
                                <div class="devis-field" id="annee-field-wrap">
                                    <label class="devis-field__label" for="annee">Année</label>
                                    <input class="devis-field__input" type="number" id="annee" name="annee" placeholder="Ex : 2019" min="1990" max="2030">
                                </div>
                                <div class="devis-field">
                                    <label class="devis-field__label" for="immatriculation">Immatriculation</label>
                                    <input class="devis-field__input" type="text" id="immatriculation" name="immatriculation" placeholder="Ex : AA-000-RB">
                                </div>

                                <!-- Documents à téléverser -->
                                <div class="devis-field">
                                    <label class="devis-field__label" for="carte_grise">
                                        Carte grise
                                        <span class="devis-field__optional">(JPG, PNG ou PDF)</span>
                                    </label>
                                    <input class="devis-field__file" type="file" id="carte_grise" name="carte_grise"
                                           accept="image/jpeg,image/png,image/webp,application/pdf">
                                </div>

                                <div id="uploads-voiture-only" hidden>
                                    <div class="devis-field">
                                        <label class="devis-field__label" for="permis_conduire">
                                            Permis de conduire
                                            <span class="devis-field__optional">(JPG, PNG ou PDF)</span>
                                        </label>
                                        <input class="devis-field__file" type="file" id="permis_conduire" name="permis_conduire"
                                               accept="image/jpeg,image/png,image/webp,application/pdf">
                                    </div>
                                    <div class="devis-field">
                                        <label class="devis-field__label" for="controle_technique">
                                            Contrôle technique valide
                                            <span class="devis-field__optional">(JPG, PNG ou PDF)</span>
                                        </label>
                                        <input class="devis-field__file" type="file" id="controle_technique" name="controle_technique"
                                               accept="image/jpeg,image/png,image/webp,application/pdf">
                                    </div>
                                </div>
                            </div>

                            <!-- Voyage sub-fields -->
                            <div id="sub-voyage" class="sub-conditional" hidden>
                                <div class="devis-field-row">
                                    <div class="devis-field">
                                        <label class="devis-field__label" for="destination_voyage">Destination</label>
                                        <input class="devis-field__input" type="text" id="destination_voyage" name="destination_voyage" placeholder="Ex : France">
                                    </div>
                                    <div class="devis-field">
                                        <label class="devis-field__label" for="nb_voyageurs">Nombre de voyageurs</label>
                                        <input class="devis-field__input" type="number" id="nb_voyageurs" name="nb_voyageurs" placeholder="Ex : 2" min="1">
                                    </div>
                                </div>
                                <div class="devis-field-row">
                                    <div class="devis-field">
                                        <label class="devis-field__label" for="date_depart_voyage">Date de départ</label>
                                        <input class="devis-field__input" type="date" id="date_depart_voyage" name="date_depart_voyage">
                                    </div>
                                    <div class="devis-field">
                                        <label class="devis-field__label" for="date_retour">Date de retour</label>
                                        <input class="devis-field__input" type="date" id="date_retour" name="date_retour">
                                    </div>
                                </div>
                                <div class="devis-field-row">
                                    <div class="devis-field">
                                        <label class="devis-field__label" for="num_passeport">Numéro de passeport</label>
                                        <input class="devis-field__input" type="text" id="num_passeport" name="num_passeport" placeholder="Ex : BJ1234567">
                                    </div>
                                    <div class="devis-field">
                                        <label class="devis-field__label" for="lieu_delivrance">Lieu de délivrance</label>
                                        <input class="devis-field__input" type="text" id="lieu_delivrance" name="lieu_delivrance" placeholder="Ex : Cotonou">
                                    </div>
                                </div>
                                <div class="devis-field-row">
                                    <div class="devis-field">
                                        <label class="devis-field__label" for="date_delivrance">Date de délivrance</label>
                                        <input class="devis-field__input" type="date" id="date_delivrance" name="date_delivrance">
                                    </div>
                                    <div class="devis-field">
                                        <label class="devis-field__label" for="date_expiration">Date d'expiration</label>
                                        <input class="devis-field__input" type="date" id="date_expiration" name="date_expiration">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Billeterie fields -->
                        <div class="conditional-fields" id="fields-billeterie" hidden>
                            <div class="devis-field-row">
                                <div class="devis-field">
                                    <label class="devis-field__label" for="ville_depart">Ville de départ</label>
                                    <input class="devis-field__input" type="text" id="ville_depart" name="ville_depart" placeholder="Ex : Cotonou">
                                </div>
                                <div class="devis-field">
                                    <label class="devis-field__label" for="destination">Destination</label>
                                    <input class="devis-field__input" type="text" id="destination" name="destination" placeholder="Ex : Paris">
                                </div>
                            </div>
                            <div class="devis-field-row">
                                <div class="devis-field">
                                    <label class="devis-field__label" for="date_depart">Date de départ</label>
                                    <input class="devis-field__input" type="date" id="date_depart" name="date_depart">
                                </div>
                                <div class="devis-field">
                                    <label class="devis-field__label" for="nb_passagers">Nb de passagers</label>
                                    <input class="devis-field__input" type="number" id="nb_passagers" name="nb_passagers" placeholder="Ex : 2" min="1">
                                </div>
                            </div>
                            <div class="devis-field">
                                <label class="devis-field__label" for="type_billet">Type de billet</label>
                                <select class="devis-field__input devis-field__select" id="type_billet" name="type_billet">
                                    <option value="">Choisir…</option>
                                    <option value="aller-simple">Aller simple</option>
                                    <option value="aller-retour">Aller–Retour</option>
                                </select>
                            </div>
                        </div>

                        <div class="devis-form__nav">
                            <button type="button" class="btn btn-outline devis-btn-outline" id="step3-back">← Retour</button>
                            <button type="submit" class="btn btn-primary" id="submit-btn">
                                <span class="submit-text">Envoyer ma demande</span>
                                <span class="submit-spinner" hidden aria-hidden="true">…</span>
                            </button>
                        </div>
                    </fieldset>

                    <!-- Success message -->
                    <div class="devis-success" id="devis-success" hidden role="alert">
                        <div class="devis-success__icon">✓</div>
                        <h2 class="devis-success__title">Demande envoyée !</h2>
                        <p class="devis-success__msg">
                            Merci <strong id="success-name"></strong>. Un conseiller Omnia Group vous contactera très bientôt au <strong id="success-tel"></strong>.
                        </p>
                        <a id="success-wa"
                           href="<?php echo esc_url('https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20j%27ai%20soumis%20une%20demande%20de%20devis%20en%20ligne.'); ?>"
                           class="btn btn-whatsapp" target="_blank" rel="noopener noreferrer">
                            Confirmer sur WhatsApp
                        </a>
                    </div>

                    <!-- Error message -->
                    <p class="devis-form__error devis-form__error--global" id="global-error" role="alert" hidden></p>

                </form>
            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>
