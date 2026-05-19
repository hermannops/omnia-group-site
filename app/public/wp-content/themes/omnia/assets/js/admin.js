/**
 * Omnia Admin JS
 * Handles: status auto-save, unread row cleanup, save feedback.
 * Depends on: omniaAdmin.ajaxUrl + omniaAdmin.nonce (via wp_localize_script)
 */

(function () {
    'use strict';

    /* ════════════════════════════════════════════════════════
       1. STATUS SELECT — auto-save on change
       ════════════════════════════════════════════════════════ */
    document.querySelectorAll('.omnia-status-select').forEach( select => {
        select.addEventListener('change', handleStatusChange);
    });

    async function handleStatusChange(e) {
        const select = e.target;
        const id     = select.dataset.id;
        const type   = select.dataset.type;   // 'devis' | 'message'
        const status = select.value;

        if (!id || !type || !status) return;

        const action = type === 'message'
            ? 'omnia_message_status'
            : 'omnia_devis_status';

        select.disabled = true;
        showIndicator(select, 'saving');

        const body = new FormData();
        body.set('action', action);
        body.set('nonce',  omniaAdmin.nonce);
        body.set('id',     id);
        body.set('status', status);

        try {
            const res  = await fetch(omniaAdmin.ajaxUrl, { method: 'POST', body });
            const data = await res.json();

            if (data.success) {
                showIndicator(select, 'saved');
                markRowRead(select, status);
            } else {
                showIndicator(select, 'error');
                console.error('[Omnia] Status update failed:', data);
            }
        } catch (err) {
            showIndicator(select, 'error');
            console.error('[Omnia] Network error:', err);
        } finally {
            select.disabled = false;
        }
    }

    /* ════════════════════════════════════════════════════════
       2. MARK ROW AS READ — remove unread styling when
          status is moved away from "nouveau"
       ════════════════════════════════════════════════════════ */
    function markRowRead(select, status) {
        if (status === 'nouveau') return;

        const row = select.closest('.omnia-row');
        if (!row) return;

        row.classList.remove('omnia-row--unread');
        row.querySelector('.omnia-unread-dot')?.remove();

        // Decrement the admin menu badge count
        updateMenuBadge(-1);
    }

    /* ════════════════════════════════════════════════════════
       3. MENU BADGE — decrement count when item marked read
       ════════════════════════════════════════════════════════ */
    function updateMenuBadge(delta) {
        // WordPress injects badge as:
        // <span class="awaiting-mod count-N"><span class="pending-count">N</span></span>
        const badges = document.querySelectorAll(
            '#toplevel_page_omnia-dashboard .awaiting-mod .pending-count'
        );
        badges.forEach(badge => {
            const current = parseInt(badge.textContent, 10);
            if (isNaN(current)) return;
            const next = Math.max(0, current + delta);
            badge.textContent = next;

            // Hide badge when it reaches zero
            const wrap = badge.closest('.awaiting-mod');
            if (wrap) wrap.style.display = next === 0 ? 'none' : '';
        });
    }

    /* ════════════════════════════════════════════════════════
       4. SAVE INDICATOR — inline feedback next to select
       ════════════════════════════════════════════════════════ */
    function showIndicator(select, state) {
        let indicator = select.parentElement.querySelector('.omnia-save-indicator');

        if (!indicator) {
            indicator = document.createElement('span');
            indicator.className = 'omnia-save-indicator';
            select.insertAdjacentElement('afterend', indicator);
        }

        indicator.className = 'omnia-save-indicator'; // reset modifiers
        indicator.style.opacity = '1';

        if (state === 'saving') {
            indicator.textContent = '…';
            indicator.classList.add('is-saving');
        } else if (state === 'saved') {
            indicator.textContent = '✓ Sauvegardé';
            indicator.classList.add('is-saved');
            fadeOutAfter(indicator, 2000);
        } else {
            indicator.textContent = '✗ Erreur';
            indicator.classList.add('is-error');
            fadeOutAfter(indicator, 3500);
        }
    }

    function fadeOutAfter(el, ms) {
        setTimeout(() => {
            el.style.transition = 'opacity .3s';
            el.style.opacity    = '0';
            setTimeout(() => el.remove(), 320);
        }, ms);
    }

    /* ════════════════════════════════════════════════════════
       5. BREAKDOWN BARS — animate width on page load
          (bars are rendered with inline style="width:X%" by PHP;
           we start at 0 and animate to the target)
       ════════════════════════════════════════════════════════ */
    const bars = document.querySelectorAll('.omnia-breakdown__bar');

    if (bars.length) {
        bars.forEach(bar => {
            const target = bar.style.width;
            bar.style.width = '0';
            // Trigger reflow so the transition fires
            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    bar.style.width = target;
                });
            });
        });
    }

    /* ════════════════════════════════════════════════════════
       6. EXPORT FORM — disable submit while downloading
       ════════════════════════════════════════════════════════ */
    const exportForm = document.querySelector('.omnia-card--export form');

    if (exportForm) {
        exportForm.addEventListener('submit', e => {
            const btn = exportForm.querySelector('.omnia-export-btn');
            if (!btn) return;

            btn.disabled = true;
            btn.textContent = 'Génération en cours…';

            // Re-enable after a short delay (download starts, no page navigation)
            setTimeout(() => {
                btn.disabled    = false;
                btn.innerHTML   = '<span class="dashicons dashicons-download"></span> Télécharger le CSV';
            }, 3500);
        });
    }

})();
