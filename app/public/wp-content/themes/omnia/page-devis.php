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
                    <div class="devis-step__line" id="step-line-4" aria-hidden="true" hidden></div>
                    <div class="devis-step" role="listitem" data-step="4" id="step-indicator-4" hidden>
                        <div class="devis-step__circle">4</div>
                        <span class="devis-step__label">Documents</span>
                    </div>
                    <div class="devis-step__line" id="step-line-5" aria-hidden="true" hidden></div>
                    <div class="devis-step" role="listitem" data-step="5" id="step-indicator-5" hidden>
                        <div class="devis-step__circle">5</div>
                        <span class="devis-step__label">Préférences</span>
                    </div>
                    <div class="devis-step__line" id="step-line-6" aria-hidden="true" hidden></div>
                    <div class="devis-step" role="listitem" data-step="6" id="step-indicator-6" hidden>
                        <div class="devis-step__circle">6</div>
                        <span class="devis-step__label">Services</span>
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

                            <label class="service-option">
                                <input type="radio" name="service" value="mobile-money">
                                <div class="service-option__card">
                                    <div class="service-option__icon">📱</div>
                                    <div class="service-option__name">Mobile Money</div>
                                    <div class="service-option__sub">MTN & Moov</div>
                                </div>
                            </label>

                            <label class="service-option">
                                <input type="radio" name="service" value="canal">
                                <div class="service-option__card">
                                    <div class="service-option__icon">📺</div>
                                    <div class="service-option__name">Canal+</div>
                                    <div class="service-option__sub">Abonnement & réabonnement</div>
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
                                       placeholder="01 23 45 67 89 0" autocomplete="tel" required>
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
                                        <label class="devis-field__label" for="date_retour_voyage">Date de retour</label>
                                        <input class="devis-field__input" type="date" id="date_retour_voyage" name="date_retour">
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

                            <!-- §1 Type de billet -->
                            <p class="devis-subsection-title">Type de billet</p>

                            <div class="devis-field">
                                <label class="devis-field__label" for="type_billet">Type de billet</label>
                                <select class="devis-field__input devis-field__select" id="type_billet" name="type_billet">
                                    <option value="aller-retour" selected>Aller–Retour</option>
                                    <option value="aller-simple">Aller simple</option>
                                    <option value="multi-destinations">Multi-destinations</option>
                                </select>
                            </div>

                            <!-- §2 Zone de voyage -->
                            <p class="devis-subsection-title">Zone de voyage</p>

                            <div class="devis-field">
                                <label class="devis-field__label" for="zone_voyage">Zone de voyage</label>
                                <select class="devis-field__input devis-field__select" id="zone_voyage" name="zone_voyage">
                                    <option value="">Sélectionner…</option>
                                    <option value="schengen">Espace Schengen</option>
                                    <option value="cedeao">CEDEAO / Afrique de l'Ouest</option>
                                    <option value="afrique-centrale">Afrique centrale</option>
                                    <option value="amerique-nord">Amérique du Nord</option>
                                    <option value="amerique-sud">Amérique du Sud</option>
                                    <option value="moyen-orient">Moyen-Orient</option>
                                    <option value="asie">Asie</option>
                                    <option value="autre">Autre destination internationale</option>
                                </select>
                            </div>

                            <!-- §3 Informations de voyage -->
                            <p class="devis-subsection-title">Informations de voyage</p>

                            <div class="devis-field-row">
                                <div class="devis-field">
                                    <label class="devis-field__label" for="date_depart">Date de départ <span aria-hidden="true">*</span></label>
                                    <input class="devis-field__input" type="date" id="date_depart" name="date_depart" required>
                                    <p class="devis-form__error" id="date-depart-error" role="alert" hidden>Veuillez sélectionner une date de départ.</p>
                                </div>
                                <div class="devis-field" id="date-retour-wrap">
                                    <label class="devis-field__label" for="date_retour">Date de retour <span aria-hidden="true">*</span></label>
                                    <input class="devis-field__input" type="date" id="date_retour" name="date_retour">
                                    <p class="devis-form__error" id="date-retour-error" role="alert" hidden>Veuillez sélectionner une date de retour.</p>
                                </div>
                            </div>

                            <div class="devis-field-row">
                                <div class="devis-field">
                                    <label class="devis-field__label" for="aeroport_depart">Aéroport de départ <span aria-hidden="true">*</span></label>
                                    <input class="devis-field__input" type="text" id="aeroport_depart" name="aeroport_depart" placeholder="Ex : Cotonou (COO)" required>
                                    <p class="devis-form__error" id="aeroport-depart-error" role="alert" hidden>Veuillez indiquer l'aéroport de départ.</p>
                                </div>
                                <div class="devis-field">
                                    <label class="devis-field__label" for="destination">Destination <span aria-hidden="true">*</span></label>
                                    <input class="devis-field__input" type="text" id="destination" name="destination" placeholder="Ex : Paris (CDG)" required>
                                    <p class="devis-form__error" id="destination-error" role="alert" hidden>Veuillez indiquer la destination.</p>
                                </div>
                            </div>

                        </div>

                        <div class="devis-form__nav">
                            <button type="button" class="btn btn-outline devis-btn-outline" id="step3-back">← Retour</button>
                            <button type="button" class="btn btn-primary" id="step3-next" hidden>Continuer →</button>
                            <button type="submit" class="btn btn-primary" id="submit-btn">
                                <span class="submit-text">Envoyer ma demande</span>
                                <span class="submit-spinner" hidden aria-hidden="true">…</span>
                            </button>
                        </div>
                    </fieldset>

                    <!-- ── STEP 4: Billeterie — Préférences et services ── -->
                    <fieldset class="devis-fieldset" id="step-4" hidden>
                        <legend class="devis-fieldset__legend">Informations complémentaires</legend>

                        <!-- §4 Situation administrative -->
                        <p class="devis-subsection-title">Situation administrative</p>

                        <!-- Passeport valide — toujours requis -->
                        <div class="devis-field">
                            <label class="devis-checkbox">
                                <input type="checkbox" id="admin_passeport" name="admin_passeport" value="1">
                                <span>Je possède un passeport valide <span aria-hidden="true">*</span></span>
                            </label>
                            <p class="devis-form__error" id="passeport-error" role="alert" hidden>Un passeport valide est requis pour voyager à l'international.</p>
                        </div>

                        <!-- Numéro de passeport — apparaît si passeport coché -->
                        <div class="devis-field devis-reveal" id="passeport-number-wrap" hidden>
                            <label class="devis-field__label" for="passeport_numero">
                                Numéro de passeport <span aria-hidden="true">*</span>
                            </label>
                            <input class="devis-field__input" type="text" id="passeport_numero" name="num_passeport"
                                   placeholder="Ex : BJ1234567">
                            <p class="devis-form__error" id="passeport-numero-error" role="alert" hidden>Veuillez saisir votre numéro de passeport.</p>
                        </div>

                        <!-- Visa — affiché uniquement si la destination exige un visa -->
                        <div class="devis-field" id="admin-visa-wrap" hidden>
                            <label class="devis-checkbox">
                                <input type="checkbox" id="admin_visa" name="admin_visa" value="1">
                                <span>Je possède déjà un visa</span>
                            </label>
                        </div>

                        <!-- Titre de séjour — affiché pour les destinations nécessitant visa ou titre -->
                        <div class="devis-field" id="admin-titre-sejour-wrap" hidden>
                            <label class="devis-checkbox">
                                <input type="checkbox" id="admin_titre_sejour" name="admin_titre_sejour" value="1">
                                <span>Je possède un titre de séjour</span>
                            </label>
                        </div>

                        <!-- Assistance visa — toujours visible -->
                        <div class="devis-field">
                            <label class="devis-checkbox">
                                <input type="checkbox" id="admin_assistance_visa" name="admin_assistance_visa" value="1">
                                <span>J'ai besoin d'une assistance visa</span>
                            </label>
                        </div>

                        <div class="devis-field">
                            <label class="devis-field__label" for="infos_documents">
                                Informations complémentaires sur vos documents
                                <span class="devis-field__optional">(optionnel)</span>
                            </label>
                            <textarea class="devis-field__input devis-field__textarea" id="infos_documents" name="infos_documents"
                                      placeholder="Ex : Visa expiré, renouvellement de titre de séjour en cours, première demande de visa…" rows="3"></textarea>
                        </div>

                        <div class="devis-form__nav">
                            <button type="button" class="btn btn-outline devis-btn-outline" id="step4-back">← Retour</button>
                            <button type="button" class="btn btn-primary" id="step4-next">Continuer →</button>
                        </div>
                    </fieldset>

                    <!-- ── STEP 5: Billeterie — Préférences de voyage + Budget ── -->
                    <fieldset class="devis-fieldset" id="step-5" hidden>
                        <legend class="devis-fieldset__legend">Préférences de voyage</legend>

                        <div class="devis-field">
                            <label class="devis-field__label" for="classe_billet">Classe du billet</label>
                            <select class="devis-field__input devis-field__select" id="classe_billet" name="classe_billet">
                                <option value="">Choisir…</option>
                                <option value="economique">Économique</option>
                                <option value="premium-economy">Premium Economy</option>
                                <option value="business">Business</option>
                                <option value="premiere-classe">Première classe</option>
                            </select>
                        </div>

                        <div class="devis-field">
                            <div class="devis-checkbox-group devis-checkbox-group--grid">
                                <label class="devis-checkbox">
                                    <input type="checkbox" name="pref_vol_direct" value="1">
                                    <span>Vol direct uniquement</span>
                                </label>
                                <label class="devis-checkbox">
                                    <input type="checkbox" name="pref_escales" value="1">
                                    <span>Escales acceptées</span>
                                </label>
                                <label class="devis-checkbox">
                                    <input type="checkbox" name="pref_bagage" value="1">
                                    <span>Bagage en soute inclus souhaité</span>
                                </label>
                                <label class="devis-checkbox">
                                    <input type="checkbox" name="pref_horaires_flexibles" value="1">
                                    <span>Horaires flexibles</span>
                                </label>
                            </div>
                        </div>

                        <p class="devis-subsection-title">Budget</p>

                        <div class="devis-field-row">
                            <div class="devis-field">
                                <label class="devis-field__label" for="budget">
                                    Budget estimatif
                                    <span class="devis-field__optional">(optionnel)</span>
                                </label>
                                <input class="devis-field__input" type="number" id="budget" name="budget" placeholder="Ex : 500 000" min="0">
                            </div>
                            <div class="devis-field">
                                <label class="devis-field__label" for="devise">Devise</label>
                                <select class="devis-field__input devis-field__select" id="devise" name="devise">
                                    <option value="FCFA">FCFA</option>
                                    <option value="EUR">EUR</option>
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                        </div>

                        <div class="devis-form__nav">
                            <button type="button" class="btn btn-outline devis-btn-outline" id="step5-back">← Retour</button>
                            <button type="button" class="btn btn-primary" id="step5-next">Continuer →</button>
                        </div>
                    </fieldset>

                    <!-- ── STEP 6: Billeterie — Services complémentaires ── -->
                    <fieldset class="devis-fieldset" id="step-6" hidden>
                        <legend class="devis-fieldset__legend">Services complémentaires</legend>

                        <div class="devis-field">
                            <div class="devis-checkbox-group devis-checkbox-group--grid">
                                <label class="devis-checkbox">
                                    <input type="checkbox" name="service_hotel" value="1">
                                    <span>Réservation hôtel</span>
                                </label>
                                <label class="devis-checkbox">
                                    <input type="checkbox" name="service_assurance_voyage" value="1">
                                    <span>Assurance voyage</span>
                                </label>
                                <label class="devis-checkbox">
                                    <input type="checkbox" name="service_assistance_aeroport" value="1">
                                    <span>Assistance aéroport</span>
                                </label>
                                <label class="devis-checkbox">
                                    <input type="checkbox" name="service_location_voiture" value="1">
                                    <span>Location de voiture</span>
                                </label>
                            </div>
                        </div>

                        <div class="devis-form__nav">
                            <button type="button" class="btn btn-outline devis-btn-outline" id="step6-back">← Retour</button>
                            <button type="submit" class="btn btn-primary" id="submit-btn-6">
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
