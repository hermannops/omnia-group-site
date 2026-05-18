/**
 * Omnia Group — main.js
 * All JavaScript for the theme. No jQuery. No inline scripts in PHP.
 * Modules: scroll, menu, animations, devis form, contact form.
 */

(function () {
    'use strict';

    /* ════════════════════════════════════════════════════════
       1. STICKY HEADER — topbar hide + navbar shadow on scroll
       ════════════════════════════════════════════════════════ */
    const header  = document.getElementById('site-header');
    const topbar  = document.getElementById('topbar');
    const navbar  = document.getElementById('navbar');
    const spacer  = document.getElementById('header-spacer');
    const SCROLL_THRESHOLD = 80;

    function onScroll() {
        const scrolled = window.scrollY > SCROLL_THRESHOLD;
        topbar?.classList.toggle('is-hidden', scrolled);
        navbar?.classList.toggle('is-scrolled', scrolled);
        spacer?.classList.toggle('topbar-hidden', scrolled);
    }

    if (header) {
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll(); // run once on load
    }

    /* ════════════════════════════════════════════════════════
       2. MOBILE MENU — hamburger toggle
       ════════════════════════════════════════════════════════ */
    const hamburger  = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');

    function openMenu() {
        mobileMenu.removeAttribute('hidden');
        hamburger.setAttribute('aria-expanded', 'true');
        hamburger.setAttribute('aria-label', 'Fermer le menu');
        hamburger.classList.add('is-open');
        document.body.style.overflow = 'hidden';
        // focus first link for accessibility
        const firstLink = mobileMenu.querySelector('.mobile-menu__link');
        firstLink?.focus();
    }

    function closeMenu() {
        mobileMenu.setAttribute('hidden', '');
        hamburger.setAttribute('aria-expanded', 'false');
        hamburger.setAttribute('aria-label', 'Ouvrir le menu');
        hamburger.classList.remove('is-open');
        document.body.style.overflow = '';
    }

    function toggleMenu() {
        const isOpen = hamburger.getAttribute('aria-expanded') === 'true';
        isOpen ? closeMenu() : openMenu();
    }

    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', toggleMenu);

        // Close on link click
        mobileMenu.querySelectorAll('.mobile-menu__link, .mobile-menu__cta').forEach(link => {
            link.addEventListener('click', closeMenu);
        });

        // Close on Escape
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape' && hamburger.getAttribute('aria-expanded') === 'true') {
                closeMenu();
                hamburger.focus();
            }
        });

        // Close on outside click
        document.addEventListener('click', e => {
            if (
                hamburger.getAttribute('aria-expanded') === 'true' &&
                !mobileMenu.contains(e.target) &&
                !hamburger.contains(e.target)
            ) {
                closeMenu();
            }
        });
    }

    /* ════════════════════════════════════════════════════════
       3. SCROLL ANIMATIONS — IntersectionObserver for .animate-fade-up
       ════════════════════════════════════════════════════════ */
    const animatedEls = document.querySelectorAll('.animate-fade-up');

    if (animatedEls.length && 'IntersectionObserver' in window) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const delay = entry.target.style.getPropertyValue('--delay') || '0ms';
                        setTimeout(() => {
                            entry.target.classList.add('is-visible');
                        }, parseInt(delay) || 0);
                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
        );
        animatedEls.forEach(el => observer.observe(el));
    } else {
        // Fallback: show all immediately if no IntersectionObserver
        animatedEls.forEach(el => el.classList.add('is-visible'));
    }

    /* ════════════════════════════════════════════════════════
       4. DEVIS FORM — multi-step + AJAX submit
       ════════════════════════════════════════════════════════ */
    const devisForm = document.getElementById('devis-form');

    if (devisForm) {
        const steps      = [1, 2, 3];
        let currentStep  = 1;

        const getFieldset = n => document.getElementById(`step-${n}`);
        const getStepEl   = n => document.querySelector(`.devis-step[data-step="${n}"]`);
        const getLine     = n => document.querySelectorAll('.devis-step__line')[n - 1];

        function showStep(n) {
            steps.forEach(s => {
                const fs = getFieldset(s);
                const st = getStepEl(s);
                if (!fs || !st) return;

                if (s === n) {
                    fs.removeAttribute('hidden');
                    st.classList.add('is-active');
                } else {
                    fs.setAttribute('hidden', '');
                    st.classList.remove('is-active');
                    if (s < n) st.classList.add('is-done');
                    else st.classList.remove('is-done');
                }
            });

            // Update connector lines
            document.querySelectorAll('.devis-step__line').forEach((line, i) => {
                line.classList.toggle('is-done', i + 1 < n);
            });

            currentStep = n;
        }

        // Step 1 → 2
        document.getElementById('step1-next')?.addEventListener('click', () => {
            const selected = devisForm.querySelector('input[name="service"]:checked');
            const err = document.getElementById('step1-error');
            if (!selected) {
                err?.removeAttribute('hidden');
                return;
            }
            err?.setAttribute('hidden', '');
            showConditionalFields(selected.value);
            showStep(2);
        });

        // Step 2 → back
        document.getElementById('step2-back')?.addEventListener('click', () => showStep(1));

        // Step 2 → 3
        document.getElementById('step2-next')?.addEventListener('click', () => {
            if (!validateStep2()) return;
            showStep(3);
        });

        // Step 3 → back
        document.getElementById('step3-back')?.addEventListener('click', () => showStep(2));

        // Service radio auto-advance (UX: click card = move on)
        devisForm.querySelectorAll('input[name="service"]').forEach(radio => {
            radio.addEventListener('change', () => {
                document.getElementById('step1-error')?.setAttribute('hidden', '');
            });
        });

        // Conditional sub-fields for assurances
        const sousServiceSelect = document.getElementById('sous_service');
        sousServiceSelect?.addEventListener('change', () => {
            showAssuranceSubFields(sousServiceSelect.value);
        });

        // Show/hide fields based on vehicle type
        document.getElementById('type_vehicule')?.addEventListener('change', function () {
            const isMoto      = this.value === 'moto';
            const hasValue    = !!this.value;
            const uploadsExtra = document.getElementById('uploads-voiture-only');
            const anneeWrap   = document.getElementById('annee-field-wrap');

            if (uploadsExtra) {
                if (hasValue && !isMoto) {
                    uploadsExtra.removeAttribute('hidden');
                } else {
                    uploadsExtra.setAttribute('hidden', '');
                    uploadsExtra.querySelectorAll('input[type="file"]').forEach(f => { f.value = ''; });
                }
            }

            if (anneeWrap) {
                if (isMoto) {
                    anneeWrap.setAttribute('hidden', '');
                    document.getElementById('annee').value = '';
                } else {
                    anneeWrap.removeAttribute('hidden');
                }
            }
        });

        // Show/hide "Date de retour" based on ticket type
        document.getElementById('type_billet')?.addEventListener('change', function () {
            const wrap = document.getElementById('date-retour-wrap');
            if (!wrap) return;
            if (this.value === 'aller-retour') {
                wrap.removeAttribute('hidden');
            } else {
                wrap.setAttribute('hidden', '');
                document.getElementById('date_retour').value = '';
                document.getElementById('date-retour-error')?.setAttribute('hidden', '');
            }
        });

        function showConditionalFields(service) {
            document.querySelectorAll('.conditional-fields').forEach(el => el.setAttribute('hidden', ''));
            const target = document.getElementById(`fields-${service}`);
            target?.removeAttribute('hidden');
        }

        function showAssuranceSubFields(value) {
            document.querySelectorAll('.sub-conditional').forEach(el => el.setAttribute('hidden', ''));
            document.getElementById('uploads-voiture-only')?.setAttribute('hidden', '');
            if (value) {
                document.getElementById(`sub-${value}`)?.removeAttribute('hidden');
            }
        }

        function validateStep2() {
            let valid = true;

            const nom       = document.getElementById('nom');
            const prenom    = document.getElementById('prenom');
            const tel       = document.getElementById('telephone');
            const nomErr    = document.getElementById('nom-error');
            const prenomErr = document.getElementById('prenom-error');
            const telErr    = document.getElementById('tel-error');

            if (!nom?.value.trim()) {
                nomErr?.removeAttribute('hidden');
                nom?.classList.add('is-invalid');
                valid = false;
            } else {
                nomErr?.setAttribute('hidden', '');
                nom?.classList.remove('is-invalid');
            }

            if (!prenom?.value.trim()) {
                prenomErr?.removeAttribute('hidden');
                prenom?.classList.add('is-invalid');
                valid = false;
            } else {
                prenomErr?.setAttribute('hidden', '');
                prenom?.classList.remove('is-invalid');
            }

            if (!tel?.value.trim()) {
                telErr?.removeAttribute('hidden');
                tel?.classList.add('is-invalid');
                valid = false;
            } else {
                telErr?.setAttribute('hidden', '');
                tel?.classList.remove('is-invalid');
            }

            return valid;
        }

        function validateStep3() {
            const service = devisForm.querySelector('input[name="service"]:checked')?.value;
            if (service !== 'billeterie') return true;

            let valid = true;

            function checkField(inputId, errorId, test) {
                const el  = document.getElementById(inputId);
                const err = document.getElementById(errorId);
                const ok  = test(el);
                el?.classList.toggle('is-invalid', !ok);
                ok ? err?.setAttribute('hidden', '') : err?.removeAttribute('hidden');
                if (!ok) valid = false;
            }

            checkField('ville_depart',  'ville-depart-error',  el => !!el?.value.trim());
            checkField('destination',   'destination-error',   el => !!el?.value.trim());
            checkField('date_depart',   'date-depart-error',   el => !!el?.value);
            checkField('nb_passagers',  'nb-passagers-error',  el => el?.value && parseInt(el.value, 10) >= 1);

            if (document.getElementById('type_billet')?.value === 'aller-retour') {
                checkField('date_retour', 'date-retour-error', el => !!el?.value);
            }

            return valid;
        }

        // AJAX submit
        devisForm.addEventListener('submit', async e => {
            e.preventDefault();
            if (!validateStep2()) { showStep(2); return; }
            if (!validateStep3()) { showStep(3); return; }

            // ── Capture values NOW — before any async gap or reset ──
            const clientPrenom  = document.getElementById('prenom')?.value.trim()    || '';
            const clientNom     = document.getElementById('nom')?.value.trim()       || '';
            const clientName    = (clientPrenom + ' ' + clientNom).trim();
            const clientPhone   = document.getElementById('telephone')?.value.trim() || '';
            const clientService = devisForm.querySelector('input[name="service"]:checked')?.value || '';

            const submitBtn     = document.getElementById('submit-btn');
            const submitText    = submitBtn?.querySelector('.submit-text');
            const submitSpinner = submitBtn?.querySelector('.submit-spinner');
            const globalErr     = document.getElementById('global-error');

            // Show spinner
            submitBtn?.setAttribute('disabled', '');
            submitText?.setAttribute('hidden', '');
            submitSpinner?.removeAttribute('hidden');

            const formData = new FormData(devisForm);
            formData.set('action', 'omnia_devis');

            try {
                const res  = await fetch(omniaAjax.url, { method: 'POST', body: formData });
                const data = await res.json();

                if (data.success) {
                    // Hide form steps
                    devisForm.querySelectorAll('.devis-fieldset, .devis-steps').forEach(el => el.setAttribute('hidden', ''));
                    const successEl = document.getElementById('devis-success');
                    successEl?.removeAttribute('hidden');

                    // Populate with pre-captured values (safe after any async operation)
                    document.getElementById('success-name').textContent = clientName;
                    document.getElementById('success-tel').textContent  = '+229 ' + clientPhone;

                    // Update WhatsApp link with service + name
                    const waLink = document.getElementById('success-wa');
                    if (waLink && clientService) {
                        const waText = `Bonjour Omnia Group, je confirme ma demande de devis pour ${clientService}. Je suis ${clientName}.`;
                        waLink.href  = 'https://wa.me/2290196870499?text=' + encodeURIComponent(waText);
                    }

                    successEl?.scrollIntoView({ behavior: 'smooth', block: 'center' });
                } else {
                    globalErr.textContent = data.data?.message || 'Une erreur est survenue.';
                    globalErr.removeAttribute('hidden');
                }
            } catch {
                globalErr.textContent = 'Erreur réseau. Veuillez réessayer ou nous appeler directement.';
                globalErr.removeAttribute('hidden');
            } finally {
                submitBtn?.removeAttribute('disabled');
                submitText?.removeAttribute('hidden');
                submitSpinner?.setAttribute('hidden', '');
            }
        });
    }

    /* ════════════════════════════════════════════════════════
       5. CONTACT FORM — validation + AJAX submit
       ════════════════════════════════════════════════════════ */
    const contactForm = document.getElementById('contact-form');

    if (contactForm) {

        function showFieldError(id, show) {
            const el = document.getElementById(id);
            if (!el) return;
            show ? el.removeAttribute('hidden') : el.setAttribute('hidden', '');
        }

        function markInput(el, invalid) {
            el?.classList.toggle('is-invalid', invalid);
        }

        function validateContactForm() {
            let valid = true;

            const prenom       = document.getElementById('contact-prenom');
            const nom          = document.getElementById('contact-nom');
            const email        = document.getElementById('contact-email');
            const emailConfirm = document.getElementById('contact-email-confirm');
            const tel          = document.getElementById('contact-tel');
            const telConfirm   = document.getElementById('contact-tel-confirm');
            const objet        = document.getElementById('contact-objet');
            const msg          = document.getElementById('contact-message');

            // Prénom
            const prenomOk = !!prenom?.value.trim();
            markInput(prenom, !prenomOk);
            showFieldError('prenom-error', !prenomOk);
            if (!prenomOk) valid = false;

            // Nom
            const nomOk = !!nom?.value.trim();
            markInput(nom, !nomOk);
            showFieldError('nom-error', !nomOk);
            if (!nomOk) valid = false;

            // Email — basic format check
            const emailVal = email?.value.trim() || '';
            const emailOk  = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal);
            markInput(email, !emailOk);
            showFieldError('email-error', !emailOk);
            if (!emailOk) valid = false;

            // Confirm email
            const emailConfirmOk = emailOk && emailConfirm?.value.trim() === emailVal;
            markInput(emailConfirm, !emailConfirmOk);
            showFieldError('email-confirm-error', !emailConfirmOk);
            if (!emailConfirmOk) valid = false;

            // Téléphone
            const telOk = !!tel?.value.trim();
            markInput(tel, !telOk);
            showFieldError('tel-error', !telOk);
            if (!telOk) valid = false;

            // Confirm téléphone
            const telConfirmOk = telOk && telConfirm?.value.trim() === tel?.value.trim();
            markInput(telConfirm, !telConfirmOk);
            showFieldError('tel-confirm-error', !telConfirmOk);
            if (!telConfirmOk) valid = false;

            // Objet
            const objetOk = !!objet?.value;
            markInput(objet, !objetOk);
            showFieldError('objet-error', !objetOk);
            if (!objetOk) valid = false;

            // Message
            const msgOk = !!msg?.value.trim();
            markInput(msg, !msgOk);
            showFieldError('message-error', !msgOk);
            if (!msgOk) valid = false;

            return valid;
        }

        // Reset button: swap back to form
        document.getElementById('contact-reset')?.addEventListener('click', () => {
            document.getElementById('contact-merci')?.setAttribute('hidden', '');
            document.getElementById('contact-section')?.removeAttribute('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
            contactForm.querySelector('#contact-prenom')?.focus();
        });

        contactForm.addEventListener('submit', async e => {
            e.preventDefault();

            if (!validateContactForm()) return;

            const submitBtn     = contactForm.querySelector('[type="submit"]');
            const submitText    = submitBtn?.querySelector('.submit-text');
            const submitSpinner = submitBtn?.querySelector('.submit-spinner');
            const errEl         = document.getElementById('contact-error');
            const successEl     = document.getElementById('contact-success');

            submitBtn?.setAttribute('disabled', '');
            submitText?.setAttribute('hidden', '');
            submitSpinner?.removeAttribute('hidden');
            errEl?.setAttribute('hidden', '');

            const formData = new FormData(contactForm);
            formData.set('action', 'omnia_devis');

            try {
                const res  = await fetch(omniaAjax.url, { method: 'POST', body: formData });
                const data = await res.json();

                if (data.success) {
                    contactForm.reset();
                    // Swap sections: hide form page, show thank-you page
                    document.getElementById('contact-section')?.setAttribute('hidden', '');
                    const merci = document.getElementById('contact-merci');
                    merci?.removeAttribute('hidden');
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                } else {
                    if (errEl) {
                        errEl.textContent = data.data?.message || 'Une erreur est survenue.';
                        errEl.removeAttribute('hidden');
                    }
                }
            } catch {
                if (errEl) {
                    errEl.textContent = 'Erreur réseau. Veuillez réessayer.';
                    errEl.removeAttribute('hidden');
                }
            } finally {
                submitBtn?.removeAttribute('disabled');
                submitText?.removeAttribute('hidden');
                submitSpinner?.setAttribute('hidden', '');
            }
        });
    }

    /* ════════════════════════════════════════════════════════
       6. PRELINE INIT — ensure accordion initializes even if
          DOMContentLoaded already fired when script executes
       ════════════════════════════════════════════════════════ */
    if (window.HSStaticMethods) {
        window.HSStaticMethods.autoInit();
    }

})();
