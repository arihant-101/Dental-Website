# SmileCare Dental — WordPress Child Theme

A comprehensive, professional dental clinic child theme built on the **Medicare** parent theme by BoldThemes.

---

## Color Palette

| Color | Hex | Usage |
|---|---|---|
| Primary Blue | `#0077B6` | Buttons, links, headings |
| Sky Blue | `#00B4D8` | Accents, gradients |
| Ice Blue | `#90E0EF` | Highlights, subtle bg |
| Deep Navy | `#023E8A` | Header top bar, dark accents |
| Warm Gold | `#E8A838` | CTAs, appointment buttons |
| Light BG | `#F0F8FF` | Section backgrounds |
| Soft Gray | `#F4F8FD` | Alternating sections |
| Dark Text | `#1A2332` | Headings |
| Body Text | `#3D4B5C` | Paragraphs |

---

## Files & Structure

```
medicare-child/
├── style.css                          ← Main stylesheet (dental overrides + CSS variables)
├── functions.php                      ← Main PHP (enqueues, customizer, shortcodes, helpers)
├── header.php                         ← Custom dental header with top bar
├── footer.php                         ← Custom dental footer with 4 columns
├── dental-theme-options.json          ← Import-ready theme options
├── README.md                          ← This file
│
├── templates/
│   ├── dental-home.php                ← Homepage template (full-width, all sections)
│   ├── dental-services.php            ← Services page + pricing plans
│   ├── dental-appointment.php         ← Appointment booking page + form
│   ├── dental-team.php                ← Meet the team + bio cards
│   ├── dental-contact.php             ← Contact page with map + form
│   └── dental-gallery.php             ← Before & After gallery with filter
│
├── inc/
│   └── dental-widgets.php             ← Custom WordPress widgets
│
└── js/
    └── dental.js                      ← Custom JavaScript (sticky header, animations, etc.)
```

---

## Setup Instructions

### 1. Install & Activate

1. Upload `medicare-child.zip` via **Appearance → Themes → Add New → Upload**
2. **Activate** the SmileCare Dental child theme
3. Ensure the **Medicare** parent theme is installed (but not active)

### 2. Install Required Plugins

Install these from **Appearance → Install Plugins**:

**Required:**
- Bold Page Builder
- Medicare (companion plugin from `medicare/plugins/medicare.zip`)
- Meta Box
- Contact Form 7
- Sidebar Manager
- BT Cost Calculator

**Recommended:**
- Yoast SEO
- Wordfence Security
- WP Super Cache

### 3. Import Dentist Demo Content

1. Go to **Tools → Import → WordPress**
2. Upload `medicare/demo_data/dentist.WordPress.2024-07-08.xml`
3. Map authors and import attachments

### 4. Configure Customizer

Go to **Appearance → Customize → SmileCare Dental**:

- **Clinic Identity** — Set clinic name, phone, email, address, social links
- **Working Hours** — Set opening hours for each day
- **Emergency Bar** — Enable/disable the emergency notice bar
- **Appointment Settings** — Set the appointment page and button text

### 5. Create Pages

Create these pages and assign templates:

| Page Title | Template |
|---|---|
| Home | Dental: Home (Full Width) |
| Our Services | Dental: Services Page |
| Book Appointment | Dental: Appointment Form |
| Meet the Team | Dental: Meet the Team |
| Before & After Gallery | Dental: Before & After Gallery |
| Contact Us | Dental: Contact Page |

6. Go to **Settings → Reading** → set Homepage to **Home** page.

### 6. Set Up Menus

**Appearance → Menus:**
- Primary Menu: Home, Services, Team, Gallery, Blog, Contact, [Book Appointment button]
- Footer Menu: Home, Services, Team, Gallery, Blog, Contact

---

## Shortcodes Available

| Shortcode | Description |
|---|---|
| `[dental_hours]` | Working hours table (reads from Customizer) |
| `[dental_cta]` | Appointment call-to-action block |
| `[dental_services]` | Grid of dental services |
| `[dental_stats]` | Animated statistics counters |
| `[dental_team]` | Team members grid |
| `[dental_insurance]` | Accepted insurance plans badges |
| `[dental_appointment_widget]` | Sidebar appointment widget |

### Shortcode Examples

```
[dental_cta title="Ready to Smile?" btn_text="Book Free Consultation"]

[dental_services columns="3"]

[dental_stats]

[dental_team count="4"]

[dental_hours title="Our Office Hours"]
```

---

## Custom Widgets

Register in **Appearance → Widgets** (or use the Block Editor):

- **🦷 Dental: Appointment CTA** — Blue gradient appointment widget
- **🕐 Dental: Working Hours** — Today-highlighted hours table
- **🦷 Dental: Services List** — Compact list of dental services
- **🚨 Dental: Emergency Banner** — Red emergency contact widget

---

## PHP Helper Functions

Available globally:

```php
// Get phone link HTML
echo smilecare_phone_link( 'Call Us', 'my-class' );

// Get appointment button HTML
echo smilecare_appointment_button( 'my-class' );

// Get hours for a specific day
echo smilecare_get_hours( 'monday' ); // "9:00 AM – 6:00 PM"
echo smilecare_get_hours(); // Today's hours

// Check if clinic is currently open
if ( smilecare_is_open_now() ) {
    echo 'We are open!';
}
```

---

## SEO & Schema Markup

The theme automatically outputs **Schema.org DentistOffice** structured data on the homepage:

```json
{
  "@type": "Dentist",
  "name": "SmileCare Dental",
  "telephone": "...",
  "openingHours": [...],
  "medicalSpecialty": ["General Dentistry", ...]
}
```

This helps search engines understand your clinic and can improve local SEO rankings.

---

## Customization Tips

### Change the Color Scheme

Edit `style.css` — update the CSS custom properties at the top:

```css
:root {
    --dental-primary:  #0077B6; /* Change this */
    --dental-gold:     #E8A838; /* Change this */
    /* ... */
}
```

### Add Google Maps

Replace the map placeholder in `templates/dental-contact.php`:

```html
<!-- Find this comment and replace with your embed: -->
<iframe src="https://maps.google.com/maps?q=YOUR+ADDRESS&output=embed"
        width="100%" height="400" style="border:0;" loading="lazy"></iframe>
```

### Connect Contact Form 7

1. Create your CF7 form in **Contact → Add New**
2. Note the form ID
3. Update the shortcode in templates:
   ```php
   // In dental-home.php, dental-appointment.php, dental-contact.php:
   echo do_shortcode( '[contact-form-7 id="YOUR_ID" title="Your Title"]' );
   ```

---

## Version History

- **2.0.0** (2026-03-21) — Complete dental clinic build
  - Custom dental color palette (ocean blue + gold)
  - 6 custom page templates
  - 4 custom WordPress widgets
  - 7 dental shortcodes
  - Custom header with top bar + appointment CTA
  - Custom footer with 4 columns + working hours
  - Schema.org DentistOffice markup
  - Sticky header, smooth scroll, animated counters
  - Before & After gallery with filter
  - Emergency bar with session dismiss

---

## Support

For theme support: hello@smilecaredental.com
Parent theme support: https://bold-themes.com/support/
