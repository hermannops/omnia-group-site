# OMNIA GROUP SARL — Project Brief for Claude Code

> This file is the single source of truth for this project.
> Read it entirely before doing anything. Update it when something changes.

---

## 1. BUSINESS

| Field | Value |
|---|---|
| Company | Omnia Group SARL |
| Location | Ilot 103 J, Maison GADESSOU, ZOCA – BP 1547, Abomey-Calavi, Bénin |
| Phone / WhatsApp | +2290196870499 |
| WhatsApp link | https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20souhaite%20des%20informations%20sur%20vos%20services. |
| Hours | Mon–Fri 9h–12h / 14h–18h30 · Sat 9h–16h · Closed public holidays |
| RCCM | RB/ABC/18 B 2458 |
| IFU | 3201810514040 |
| Live site (old) | https://omnia-group-sarl.com |


---

## 2. ACTIVE SERVICES — these 4 only, nothing else

| # | Service | Details |
|---|---|---|
| 1 | **Mobile Money** | MTN Mobile Money + Moov Money — local transfers only |
| 2 | **Assurances** | Auto/Moto · Voyage — **Partenaire : SUNU Assurances** |
| 3 | **Billeterie** | Réservation · Achat de billets d'avion · Modification · Suivi de dossier |
| 4 | **Canal+** | Abonnement et réabonnement uniquement |

---

## 3. NEVER MENTION — remove immediately if found anywhere

- DHL
- Western Union
- Moneygram
- Ria
- Small World
- Gestion locative
- Web / E-commerce
- "Bientôt disponible"
- WooCommerce (deactivate don't delete)

---

## 4. TESTIMONIALS — reuse exactly as written

| Client | Quote | Service badge |
|---|---|---|
| Adeline A. | "Retrait effectué très rapidement. Très satisfait." | Mobile Money |
| Paul B. | "Le personnel est d'une patience incroyable, prévenant et très professionnel, véritablement au service du client." | Service client |
| Theresa R. | "Conseiller très professionnel, à l'écoute! Très bonne proposition sur assurance auto et habitation. Souscription rapide et tout est clair!" | Assurances |
| Adam L. | "Accueil, rapidité, renseignements précis. Comme nouveau client, très bon tarif. Je recommande." | Billeterie |

---

## 5. TECH STACK

| Layer | Choice |
|---|---|
| CMS | WordPress 6.x (latest) |
| Theme | Custom theme — no page builder |
| Theme name | `omnia` (child theme not needed — full custom) |
| Forms | Custom PHP/JS form handler (no WPForms, no plugin) |
| SEO | Yoast SEO plugin |
| WooCommerce | Deactivated and deleted |
| Local env | LocalWP |
| CLI | WP-CLI available |

---

## 6. SITE STRUCTURE — 7 pages

| Template file | URL | Page title |
|---|---|---|
| `front-page.php` | / | Accueil |
| `page-assurances.php` | /assurances | Assurances |
| `page-billeterie.php` | /billeterie | Billeterie |
| `page-mobile-money-canal.php` | /mobile-money-canal | Mobile Money & Canal+ |
| `page-devis.php` | /devis | Devis gratuit |
| `page-a-propos.php` | /a-propos | À propos |
| `page-contact.php` | /contact | Contact |

---

## 7. DESIGN SYSTEM

### Visual identity
- **Style:** Corporate, trustworthy, professional — think AXA / Wave / Allianz
- **Mood:** Serious, clean, modern. Not flashy.

### Colors
```css
--color-primary:       #0A2F6E;   /* Deep navy — trust, authority */
--color-primary-light: #1A4BA0;   /* Hover state */
--color-accent:        #E8971A;   /* Gold/amber — CTA, actions */
--color-accent-hover:  #D4830E;
--color-dark:          #0D1B2A;   /* Headings */
--color-body:          #4A5568;   /* Body text */
--color-muted:         #718096;   /* Secondary text */
--color-border:        #E2E8F0;
--color-bg:            #FFFFFF;
--color-bg-soft:       #F7F9FC;   /* Alternating sections */
--color-bg-dark:       #0A2F6E;   /* Dark sections */
--color-whatsapp:      #25D366;
```

### Typography
```css
--font-heading: 'Plus Jakarta Sans', sans-serif;
--font-body:    'Inter', sans-serif;
/* Google Fonts URL:
   https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap */
```

### Theme folder structure
```
wp-content/themes/omnia/
  style.css
  functions.php
  index.php
  header.php
  footer.php
  front-page.php
  page.php
  page-assurances.php
  page-billeterie.php
  page-mobile-money-canal.php
  page-devis.php
  page-a-propos.php
  page-contact.php
  assets/
    css/
      design-system.css
      global.css
      header.css
      footer.css
      home.css
      services.css
      devis.css
      contact.css
    js/
      main.js
    images/
```

---

## 8. GLOBAL COMPONENTS (present on every page)

### Header
- Topbar: address + hours (left) · phone (right)
- Navbar: logo (left) · navigation (center) · "Devis gratuit" CTA button (right)
- Sticky on scroll · topbar hides after 80px · hamburger on mobile

### Footer
- 4 columns: Brand+tagline · Services · Navigation · Contact info
- Bottom bar: copyright + RCCM + IFU

### Floating WhatsApp button
- Fixed bottom-right · green circle · pulse animation on load
- Link: `https://wa.me/2290196870499?text=Bonjour%20Omnia%20Group%2C%20je%20souhaite%20des%20informations%20sur%20vos%20services.`
- Present on ALL pages

---

## 9. HOMEPAGE SECTIONS (front-page.php)

1. **Hero** — Split layout. H1 + subtext + 2 CTA buttons + trust bar. Right side: 4 floating service cards (CSS only).
2. **Partner trust bar** — Dark navy. MTN · Moov · Canal+ · Compagnies d'assurance.
3. **Services** — 4 cards grid. Icon + title + description + checklist + "En savoir plus" link.
4. **Why Omnia** — 3 feature blocks: Proximité · Réactivité · Accompagnement.
5. **Testimonials** — 4 cards with star ratings and service badges.
6. **CTA banner** — Dark navy. "Prêt à nous faire confiance ?" + 2 buttons.

---

## 10. DEVIS FORM — custom multi-step (no plugin)

### Overview
- 2 clickable service cards: **Assurances** · **Billeterie** (Mobile Money and Canal+ removed — no quote needed)
- Assurances: **3 steps** (shared steps 1–3)
- Billeterie: **6 steps** (shared steps 1–2, then billeterie-specific steps 3–6)
- Steps 4–6 indicators and lines hidden in the DOM by default; revealed by JS when billeterie is selected
- On success: fieldsets, progress bar (`.devis-steps`), and page header (`.devis-header`) all hidden — only confirmation message shown

---

### Step 1 — Service selector (both services)
Visual radio cards (not a dropdown). Selection reveals the correct conditional fields for step 3 onward.

---

### Step 2 — Coordonnées (both services)
| Field | Type | Required |
|---|---|---|
| Nom | text | yes |
| Prénom | text | yes |
| Téléphone | text with +229 prefix | yes |
| Email | email | no |

---

### Step 3 — Détails (conditional by service)

**Assurances** — sub-selector first: `Auto-Moto` or `Voyage`

*Auto-Moto fields:*
- Type de véhicule (voiture / 4×4 / utilitaire / moto / 2 roues)
- Marque
- Année — **hidden when type = moto or 2 roues**
- Immatriculation
- File uploads (carte grise · permis de conduire · contrôle technique) — shown only for voiture / 4×4 / utilitaire

*Voyage fields:*
- Destination
- Nombre de voyageurs
- Date de départ · Date de retour (both `min=today`)
- Numéro de passeport · Lieu de délivrance · Date de délivrance · Date d'expiration

**Billeterie:**
| Field | Notes |
|---|---|
| Type de billet | Aller-Retour selected by default; Aller-Simple hides date retour |
| Zone de voyage | Drives conditional admin fields in step 4 |
| Aéroport de départ | text |
| Destination | text |
| Date de départ | `min=today` |
| Date de retour | visible by default; hidden only when Aller-Simple |

Validation on "Continuer": aéroport, destination, date départ required; date retour required unless Aller-Simple.

---

### Step 4 — Situation administrative (billeterie only)

| Field | Visibility | Required |
|---|---|---|
| Je possède un passeport valide | always | **yes — blocks step 4→5** |
| Numéro de passeport | revealed when passeport checked | **yes if passeport checked** |
| Je possède déjà un visa | shown only for visa-required zones | optional |
| Je possède un titre de séjour | shown only for visa-required zones | optional |
| J'ai besoin d'une assistance visa | always | optional |
| Informations complémentaires (textarea) | always | optional |

**Visa-required zones** (controls visa + titre de séjour visibility):
`schengen` · `afrique-centrale` · `amerique-nord` · `amerique-sud` · `moyen-orient` · `asie` · `autre`

CEDEAO = free movement; visa/titre fields stay hidden.

`updateAdminFields()` is called both on `zone_voyage` change and on step 3→4 transition.

---

### Step 5 — Préférences de voyage + Budget (billeterie only)

- Classe du billet (Économique / Premium Economy / Business / Première classe)
- Checkboxes: Vol direct uniquement · Escales acceptées · Bagage en soute · Horaires flexibles
- Budget estimatif (number, optional) + Devise (FCFA / EUR / USD)

All fields optional — no validation block on step 5→6.

---

### Step 6 — Services complémentaires (billeterie only)

Checkboxes: Réservation hôtel · Assurance voyage · Assistance aéroport · Location de voiture

Submit button here (`id="submit-btn-6"`). For assurances, submit button is at the bottom of step 3 (`id="submit-btn"`).

---

### On submit
- Validation re-runs steps 2, 3, and 4 server-side before sending
- PHP handler via `admin-ajax.php` (`wp_ajax_omnia_devis`)
- Saved to `omnia_devis` CPT with all field values as post meta
- Email notification sent to admin with formatted HTML table
- Checkbox fields rendered as "✓ Oui" in email
- File uploads (assurances auto) saved via `wp_handle_upload()`, linked in email
- Success: hides fieldsets + `.devis-steps` + `.devis-header`; shows `#devis-success` with client name, phone, and WhatsApp confirm link

---

## 11. TASK STATUS

Track progress here. Update as tasks are completed.

- [x] **Task 1** — Design system + theme structure (`design-system.css`, `global.css`, `functions.php`)
- [x] **Task 2** — Header + Footer + Floating WhatsApp button
- [x] **Task 3** — Homepage (`front-page.php` + `home.css`)
- [x] **Task 4** — Service pages (assurances · billeterie · monetique · apropos)
- [x] **Task 5** — Devis form + Contact page
- [x] **Task 6** — JavaScript (`main.js`: animations, menu, accordion, form logic)
- [x] **Task 7** — Final audit: content scan + SEO + performance + accessibility
- [x] **Task 8** — Admin dashboard: CPTs `omnia_devis` + `omnia_message`, list/detail views, CSV export, `admin.css`, `admin.js`

---

## 12. SEO TARGETS (local keywords to include in every page)

- Abomey-Calavi · Cotonou · Bénin · Zoca
- assurance Abomey-Calavi · assurance auto Bénin
- Mobile Money MTN Moov Abomey-Calavi
- billet d'avion Cotonou · billeterie Abomey-Calavi
- abonnement Canal+ Bénin

---

## 14. DEPLOYMENT

| Field | Value |
|---|---|
| GitHub repository | https://github.com/hermannops/omnia-group-site.git |
| FTP server | `hug.o2switch.net` |
| Remote path | `/home/ocjl6044/omnia-group-sarl.com/wp-content/themes/omnia/` |
| Deploy trigger | Push to `main` branch |
| What deploys | `app/public/wp-content/themes/omnia/` only |
| Workflow file | `.github/workflows/deploy.yml` |
| FTP action | `SamKirkland/FTP-Deploy-Action@v4.3.5` |
| Checkout action | `actions/checkout@v4` |
| Node warning fix | `env: FORCE_JAVASCRIPT_ACTIONS_TO_NODE24: true` |
| Clean slate | `dangerous_clean_slate: false` (preserves server files not in repo) |
| Log level | `standard` |

### Secrets required (set in GitHub → Settings → Secrets)
- `FTP_SERVER` — hostname only, no `ftp://` prefix (currently `hug.o2switch.net`)
- `FTP_USERNAME`
- `FTP_PASSWORD`
- `FTP_SERVER_DIR` — remote path ending with `/`

### Excluded from deploy
```
**/.git*
**/.git*/**
**/node_modules/**
**/*.md
**/.gitignore
```

### Branching workflow
- Active development on `dev`
- Deploy by merging `dev` → `main` then `git push origin main`
- CI/CD runs automatically on every push to `main`

---

## 13. RULES — always follow these

1. Never mention any forbidden service (see section 3)
2. Always use design system variables — no hardcoded colors or sizes
3. Mobile-first CSS — write mobile styles first, desktop with `min-width` media queries
4. All JS in `main.js` — no inline scripts in PHP templates
5. All form handling in `functions.php` via `wp_ajax` hooks
6. Show output file by file and wait for approval before moving to the next
7. Update the Task Status checklist (section 11) after each completed task