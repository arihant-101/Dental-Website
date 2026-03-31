<?php
/**
 * SmileCare Dental — Front Page Template
 * WordPress automatically uses this file for the static front page.
 * NOTE: Uses sc-section / sc-row / sc-col grid (NOT boldSection/boldRow/rowItem
 * because those are page-builder-only and stay invisible outside builder context).
 */
get_header();

$clinic_name  = get_theme_mod( 'smilecare_clinic_name', 'SmileCare Dental' );
$tagline      = get_theme_mod( 'smilecare_tagline',     'Your Smile, Our Passion' );
$phone        = get_theme_mod( 'smilecare_phone',       '(555) 123-4567' );
$email        = get_theme_mod( 'smilecare_email',       'hello@smilecaredental.com' );
$address      = get_theme_mod( 'smilecare_address',     '123 Smile Avenue, Suite 200, New York, NY 10001' );
$appt_url     = smilecare_appointment_url();
$services_url = smilecare_nav_url( 'services' );
$team_url     = smilecare_nav_url( 'team' );
$gallery_url  = smilecare_nav_url( 'gallery' );
$contact_url  = smilecare_nav_url( 'contact' );
$blog_url     = get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' );
?>

<!-- ═══════════════════════════════════════
     HERO
     ═══════════════════════════════════════ -->
<section class="sc-hero">
  <div class="sc-hero-shape-1"></div>
  <div class="sc-hero-shape-2"></div>
  <div class="port">
    <div class="sc-row sc-vcenter" style="gap:32px;">

      <div class="sc-col-6 sc-hero-content sc-fade-up">
        <div class="sc-hero-eyebrow"><span class="sc-ico sc-ico-tooth" aria-hidden="true"></span> Trusted by 10,000+ Happy Patients</div>
        <h1><?php echo esc_html( $tagline ); ?><br><span><?php echo esc_html( $clinic_name ); ?></span></h1>
        <p>Comprehensive dental care for the whole family — from preventive cleanings to advanced cosmetic procedures — all delivered with a gentle touch.</p>
        <div class="sc-hero-actions">
          <a class="btBtn btSolidButton sc-btn-gold" href="<?php echo esc_url( $appt_url ); ?>"><span class="sc-ico sc-ico-fa-cal" aria-hidden="true"></span> &nbsp;Book Appointment</a>
          <a class="sc-btn-outline sc-btn-white btBtn" href="<?php echo esc_url( $services_url ); ?>">View Our Services</a>
        </div>
        <div class="sc-hero-trust">
          <div class="sc-hero-trust-item"><span class="sc-hero-trust-icon sc-ico sc-ico-fa-star" aria-hidden="true"></span><span>4.9/5 Google Rating</span></div>
          <div class="sc-hero-trust-item"><span class="sc-hero-trust-icon sc-ico sc-ico-fa-award" aria-hidden="true"></span><span>15+ Years Experience</span></div>
          <div class="sc-hero-trust-item"><span class="sc-hero-trust-icon sc-ico sc-ico-fa-shield" aria-hidden="true"></span><span>All Insurance Accepted</span></div>
        </div>
      </div>

      <div class="sc-col-5 sc-fade-up" style="transition-delay:.15s;">
        <div class="sc-hero-card">
          <div class="sc-hero-card-title"><span class="sc-ico sc-ico-fa-cal" aria-hidden="true"></span> Quick Appointment Request</div>
          <form method="post" action="<?php echo esc_url( $appt_url ); ?>">
            <?php wp_nonce_field( 'dental_quick_appt', 'sc_nonce' ); ?>
            <div class="sc-hero-form-group">
              <label>Full Name</label>
              <input type="text" name="sc_name" placeholder="Your name" required>
            </div>
            <div style="display:flex;gap:10px;">
              <div class="sc-hero-form-group" style="flex:1;">
                <label>Phone</label>
                <input type="tel" name="sc_phone" placeholder="(555) 000-0000" required>
              </div>
              <div class="sc-hero-form-group" style="flex:1;">
                <label>Service</label>
                <select name="sc_service">
                  <option>General Checkup</option>
                  <option>Teeth Whitening</option>
                  <option>Dental Implants</option>
                  <option>Orthodontics</option>
                  <option>Emergency Care</option>
                </select>
              </div>
            </div>
            <div class="sc-hero-form-group">
              <label>Preferred Date</label>
              <input type="date" name="sc_date" id="scHeroDate">
            </div>
            <button type="submit" class="btBtn btSolidButton" style="width:100%;justify-content:center;padding:14px;">
              Request Appointment
            </button>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- INFO STRIP -->
<div class="sc-info-strip">
  <div class="port">
    <div class="sc-info-item">
      <div class="sc-info-icon"><span class="sc-ico sc-ico-phone" aria-hidden="true"></span></div>
      <div>
        <div class="sc-info-label">Call Us</div>
        <div class="sc-info-value"><a href="<?php echo esc_attr( smilecare_phone_link( $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></div>
      </div>
    </div>
    <div class="sc-info-item">
      <div class="sc-info-icon"><span class="sc-ico sc-ico-clock" aria-hidden="true"></span></div>
      <div>
        <div class="sc-info-label">Open Hours</div>
        <div class="sc-info-value">Mon–Fri: 9AM–6PM · Sat: 10AM–3PM</div>
      </div>
    </div>
    <div class="sc-info-item">
      <div class="sc-info-icon"><span class="sc-ico sc-ico-map" aria-hidden="true"></span></div>
      <div>
        <div class="sc-info-label">Our Location</div>
        <div class="sc-info-value"><?php echo esc_html( $address ); ?></div>
      </div>
    </div>
    <div class="sc-info-item">
      <div class="sc-info-icon"><span class="sc-ico sc-ico-mail" aria-hidden="true"></span></div>
      <div>
        <div class="sc-info-label">Email Us</div>
        <div class="sc-info-value"><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></div>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════
     SERVICES
     ═══════════════════════════════════════ -->
<section class="sc-section sc-bg-soft" style="padding:80px 0;">
  <div class="port">
    <div class="sc-section-head">
      <div class="sc-section-label">Our Services</div>
      <h2>Comprehensive Dental Care<br>Under One Roof</h2>
      <p>From routine cleanings to full smile makeovers — we offer the complete spectrum of dental treatments with the latest technology.</p>
    </div>

    <div class="sc-row">
      <div class="sc-col-4 sc-fade-up">
        <div class="sc-service-card sc-featured">
          <div class="sc-service-icon"><span class="sc-ico sc-ico-tooth" aria-hidden="true"></span></div>
          <h3>General Dentistry</h3>
          <p>Comprehensive exams, professional cleanings, fillings, and preventive treatments to keep your smile healthy.</p>
          <a class="sc-service-link" href="<?php echo esc_url( $services_url ); ?>#general">Learn More →</a>
        </div>
      </div>
      <div class="sc-col-4 sc-fade-up">
        <div class="sc-service-card">
          <div class="sc-service-icon"><span class="sc-ico sc-ico-fa-star" aria-hidden="true"></span></div>
          <h3>Cosmetic Dentistry</h3>
          <p>Transform your smile with teeth whitening, veneers, bonding, and complete smile makeovers.</p>
          <a class="sc-service-link" href="<?php echo esc_url( $services_url ); ?>#cosmetic">Learn More →</a>
        </div>
      </div>
      <div class="sc-col-4 sc-fade-up">
        <div class="sc-service-card">
          <div class="sc-service-icon"><span class="sc-ico sc-ico-fa-shield" aria-hidden="true"></span></div>
          <h3>Dental Implants</h3>
          <p>Permanent, natural-looking tooth replacement with state-of-the-art titanium implant systems.</p>
          <a class="sc-service-link" href="<?php echo esc_url( $services_url ); ?>#implants">Learn More →</a>
        </div>
      </div>
      <div class="sc-col-4 sc-fade-up">
        <div class="sc-service-card">
          <div class="sc-service-icon"><span class="sc-ico sc-ico-fa-award" aria-hidden="true"></span></div>
          <h3>Orthodontics</h3>
          <p>Traditional braces and clear aligners (Invisalign) for teens and adults who want straighter teeth.</p>
          <a class="sc-service-link" href="<?php echo esc_url( $services_url ); ?>#ortho">Learn More →</a>
        </div>
      </div>
      <div class="sc-col-4 sc-fade-up">
        <div class="sc-service-card">
          <div class="sc-service-icon"><span class="sc-ico sc-ico-fa-steth" aria-hidden="true"></span></div>
          <h3>Oral Surgery</h3>
          <p>Wisdom teeth extraction, bone grafting, and complex procedures performed with precision and care.</p>
          <a class="sc-service-link" href="<?php echo esc_url( $services_url ); ?>#surgery">Learn More →</a>
        </div>
      </div>
      <div class="sc-col-4 sc-fade-up">
        <div class="sc-service-card">
          <div class="sc-service-icon"><span class="sc-ico sc-ico-fa-heart" aria-hidden="true"></span></div>
          <h3>Pediatric Dentistry</h3>
          <p>Gentle, fun dental care for children from their first tooth through the teenage years.</p>
          <a class="sc-service-link" href="<?php echo esc_url( $services_url ); ?>#pediatric">Learn More →</a>
        </div>
      </div>
    </div>

    <div style="text-align:center;margin-top:40px;">
      <a class="btBtn btHollowButton" href="<?php echo esc_url( $services_url ); ?>">View All Services</a>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════
     WHY CHOOSE US
     ═══════════════════════════════════════ -->
<section class="sc-section sc-bg-white" style="padding:80px 0;">
  <div class="port">
    <div class="sc-row sc-vcenter sc-gap-lg">

      <div class="sc-col-6 sc-fade-up">
        <div class="sc-section-head sc-left" style="margin-bottom:28px;">
          <div class="sc-section-label">Why Choose Us</div>
          <h2>Excellence in Every<br>Aspect of Dental Care</h2>
          <p>We combine cutting-edge technology with a compassionate approach to deliver exceptional dental care that exceeds your expectations.</p>
        </div>
        <div class="sc-why-item">
          <div class="sc-why-check"><span class="sc-ico sc-ico-fa-check" aria-hidden="true"></span></div>
          <div><div class="sc-why-title">Advanced Digital Technology</div><div class="sc-why-desc">Digital X-rays, 3D scanning, CEREC same-day crowns, and laser dentistry for precise, comfortable treatments.</div></div>
        </div>
        <div class="sc-why-item">
          <div class="sc-why-check"><span class="sc-ico sc-ico-fa-check" aria-hidden="true"></span></div>
          <div><div class="sc-why-title">Experienced &amp; Caring Team</div><div class="sc-why-desc">Our board-certified dentists have 15+ years of combined experience and pursue continuing education annually.</div></div>
        </div>
        <div class="sc-why-item">
          <div class="sc-why-check"><span class="sc-ico sc-ico-fa-check" aria-hidden="true"></span></div>
          <div><div class="sc-why-title">Flexible Financing Options</div><div class="sc-why-desc">We accept all major insurance plans and offer 0% interest financing through CareCredit and Sunbit.</div></div>
        </div>
        <div class="sc-why-item">
          <div class="sc-why-check"><span class="sc-ico sc-ico-fa-check" aria-hidden="true"></span></div>
          <div><div class="sc-why-title">Comfort-First Approach</div><div class="sc-why-desc">Sedation dentistry, nitrous oxide, and our anxiety-free protocol ensure every visit is relaxed and stress-free.</div></div>
        </div>
        <div style="margin-top:24px;">
          <a class="btBtn btSolidButton" href="<?php echo esc_url( $team_url ); ?>">Meet Our Team</a>
        </div>
      </div>

      <div class="sc-col-6 sc-fade-up" style="transition-delay:.15s;">
        <div style="background:var(--bg-sf);border-radius:var(--rad-lg);padding:32px;border:1px solid var(--border);">
          <div class="sc-section-label" style="margin-bottom:16px;">Patient Transformations</div>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
            <?php
            $ba = array(
              array( 'Chipped Teeth',   'Porcelain Veneers',    '😬', '✨' ),
              array( 'Missing Tooth',   'Dental Implant',       '😶', '😁' ),
              array( 'Stained Enamel',  'Pro Whitening',        '😕', '😃' ),
              array( 'Crowded Teeth',   'Clear Aligners',       '😬', '😊' ),
            );
            foreach ( $ba as $b ) : ?>
            <div style="background:var(--white);border-radius:var(--rad-sm);padding:14px;border:1px solid var(--border);text-align:center;">
              <div style="display:flex;justify-content:center;align-items:center;gap:10px;margin-bottom:8px;">
                <div><div style="font-size:30px;"><?php echo $b[2]; ?></div><div style="font-size:9px;color:var(--muted);font-weight:700;text-transform:uppercase;">Before</div></div>
                <div style="color:var(--dp);font-size:18px;">→</div>
                <div><div style="font-size:30px;"><?php echo $b[3]; ?></div><div style="font-size:9px;color:var(--dp);font-weight:700;text-transform:uppercase;">After</div></div>
              </div>
              <div style="font-size:10px;color:var(--muted);"><?php echo esc_html($b[0]); ?></div>
              <div style="font-size:11px;font-weight:700;color:var(--dp);"><?php echo esc_html($b[1]); ?></div>
            </div>
            <?php endforeach; ?>
          </div>
          <div style="text-align:center;margin-top:16px;">
            <a class="btBtn btHollowButton" href="<?php echo esc_url( $gallery_url ); ?>" style="font-size:13px;">View Full Gallery →</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════
     STATS
     ═══════════════════════════════════════ -->
<section class="sc-stats-section">
  <div class="port">
    <div class="sc-stats-grid">
      <div class="sc-stat-item"><div class="sc-stat-number"><span class="sc-counter" data-target="10000">0</span><span class="sc-stat-suffix">+</span></div><div class="sc-stat-label">Happy Patients</div></div>
      <div class="sc-stat-item"><div class="sc-stat-number"><span class="sc-counter" data-target="15">0</span><span class="sc-stat-suffix">+</span></div><div class="sc-stat-label">Years Experience</div></div>
      <div class="sc-stat-item"><div class="sc-stat-number"><span class="sc-counter" data-target="8">0</span></div><div class="sc-stat-label">Expert Dentists</div></div>
      <div class="sc-stat-item"><div class="sc-stat-number"><span class="sc-counter" data-target="98">0</span><span class="sc-stat-suffix">%</span></div><div class="sc-stat-label">Patient Satisfaction</div></div>
      <div class="sc-stat-item"><div class="sc-stat-number"><span class="sc-counter" data-target="4">0</span><span class="sc-stat-suffix">.9★</span></div><div class="sc-stat-label">Google Review</div></div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════
     TEAM
     ═══════════════════════════════════════ -->
<section class="sc-section sc-bg-light" style="padding:80px 0;">
  <div class="port">
    <div class="sc-section-head">
      <div class="sc-section-label">Our Team</div>
      <h2>Meet Our Expert Dentists</h2>
      <p>Our skilled, compassionate team is dedicated to making every visit comfortable, efficient, and effective.</p>
    </div>

    <div class="sc-row">
      <?php
      $team = array(
        array( 'Dr. Sarah Mitchell, DDS', 'Lead Dentist &amp; Founder',  array('Cosmetic','Implants'),  'Dr. Mitchell founded SmileCare with a vision of combining artistry with science. NYU alumna, 18 years experience.', 'SM' ),
        array( 'Dr. James Okonkwo, DMD',  'Orthodontist',               array('Invisalign','Braces'),  'Certified Invisalign provider. Creates beautifully aligned smiles for patients of all ages.', 'JO' ),
        array( 'Dr. Lisa Chen, DDS',      'Pediatric Specialist',        array('Children','Prevention'),'Board-certified pediatric dentist who transforms nervous young patients into dental-care champions.', 'LC' ),
        array( 'Dr. Michael Torres, DMD', 'Oral Surgeon',                array('Implants','Surgery'),  'Fellowship-trained oral surgeon specializing in full-arch implant reconstruction.', 'MT' ),
      );
      foreach ( $team as $d ) : ?>
      <div class="sc-col-3 sc-fade-up">
        <div class="sc-team-card">
          <div class="sc-team-photo">
            <div style="width:100%;height:240px;display:flex;align-items:center;justify-content:center;background:var(--grad);font-size:52px;font-weight:900;color:rgba(255,255,255,.9);font-family:'montserrat',sans-serif;letter-spacing:2px;"><?php echo esc_html($d[4]); ?></div>
            <div class="sc-team-overlay">
              <div class="sc-team-social">
                <a href="#" class="sc-ico sc-ico-fb" title="LinkedIn" aria-label="LinkedIn">LinkedIn</a>
                <a href="mailto:<?php echo esc_attr( get_theme_mod( 'smilecare_email', 'hello@smilecaredental.com' ) ); ?>" class="sc-ico sc-ico-mail" title="Email" aria-label="Email">Email</a>
                <a href="<?php echo esc_url( $appt_url ); ?>" class="sc-ico sc-ico-fa-cal" title="Book" aria-label="Book">Book</a>
              </div>
            </div>
          </div>
          <div class="sc-team-info">
            <div class="sc-team-name"><?php echo $d[0]; ?></div>
            <div class="sc-team-role"><?php echo $d[1]; ?></div>
            <div class="sc-team-bio"><?php echo esc_html( $d[3] ); ?></div>
            <div style="margin-top:10px;"><?php foreach($d[2] as $t): ?><span class="sc-team-tag"><?php echo esc_html($t); ?></span><?php endforeach; ?></div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div style="text-align:center;margin-top:36px;">
      <a class="btBtn btHollowButton" href="<?php echo esc_url( $team_url ); ?>">Meet the Full Team</a>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════
     TESTIMONIALS
     ═══════════════════════════════════════ -->
<section class="sc-section sc-bg-white" style="padding:80px 0;">
  <div class="port">
    <div class="sc-section-head">
      <div class="sc-section-label">Patient Reviews</div>
      <h2>What Our Patients Say</h2>
      <p>Don't take our word for it — here's what our community says about their SmileCare experience.</p>
    </div>

    <div class="sc-testimonials-slider">
      <?php
      $reviews = array(
        array( 'I was terrified of the dentist for years. Dr. Mitchell was so patient and understanding. My entire family now comes here!', 'Jennifer K.', 'Patient since 2019 · General Dentistry', 5, 'JK' ),
        array( 'Had my Invisalign done with Dr. Okonkwo and I am absolutely thrilled with the results. Clear communication throughout.', 'Marcus T.', 'Patient since 2021 · Orthodontics', 5, 'MT' ),
        array( 'Two dental implants, completely painless. The before &amp; after is incredible. I finally have my confidence back!', 'Patricia W.', 'Patient since 2020 · Implants', 5, 'PW' ),
        array( 'My 6-year-old actually ASKS to go to the dentist now. Dr. Chen is a miracle worker with kids.', 'David L.', 'Patient since 2022 · Pediatric Dentistry', 5, 'DL' ),
        array( 'Professional teeth whitening — wow! 8 shades whiter. The process was comfortable and results are stunning.', 'Rachel M.', 'Patient since 2023 · Cosmetic Dentistry', 5, 'RM' ),
        array( 'Emergency appointment on a Saturday morning — they fit me in within 2 hours. Outstanding service!', 'Robert S.', 'Emergency Patient · Oral Surgery', 5, 'RS' ),
      );
      foreach ( $reviews as $r ) : ?>
      <div class="sc-testimonial-card">
        <div class="sc-rating"><?php echo str_repeat('★', $r[3]); ?></div>
        <p class="sc-review-text"><?php echo esc_html( $r[0] ); ?></p>
        <div class="sc-reviewer">
          <div class="sc-reviewer-avatar"><?php echo $r[4]; ?></div>
          <div>
            <div class="sc-reviewer-name"><?php echo esc_html( $r[1] ); ?></div>
            <div class="sc-reviewer-meta"><?php echo $r[2]; ?></div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Trust row -->
    <div style="margin-top:36px;padding:20px 0 0;border-top:1px solid var(--border);display:flex;flex-wrap:wrap;gap:20px;justify-content:center;">
      <div class="sc-trust-item"><span class="sc-trust-icon sc-ico sc-ico-fa-star" aria-hidden="true"></span>4.9/5 Average Rating</div>
      <div class="sc-trust-item"><span class="sc-trust-icon sc-ico sc-ico-fa-check" aria-hidden="true"></span>800+ Google Reviews</div>
      <div class="sc-trust-item"><span class="sc-trust-icon sc-ico sc-ico-fa-award" aria-hidden="true"></span>Best Dentist Award 2023</div>
      <div class="sc-trust-item"><span class="sc-trust-icon sc-ico sc-ico-fa-shield" aria-hidden="true"></span>HIPAA Compliant</div>
      <div class="sc-trust-item"><span class="sc-trust-icon sc-ico sc-ico-fa-heart" aria-hidden="true"></span>All Insurance Accepted</div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════
     APPOINTMENT + HOURS
     ═══════════════════════════════════════ -->
<section class="sc-appt-section">
  <div class="port">
    <div class="sc-row sc-gap-lg" style="align-items:start;">

      <div class="sc-col-7 sc-fade-up">
        <div class="sc-appt-form-card">
          <h3><span class="sc-ico sc-ico-fa-cal" aria-hidden="true"></span> Book Your Appointment</h3>
          <p style="color:rgba(255,255,255,.7);margin-bottom:24px;font-size:14px;">Fill in the form and we'll confirm your slot within 2 hours.</p>
          <form method="post" action="<?php echo esc_url( $appt_url ); ?>">
            <?php wp_nonce_field( 'dental_appt', 'sc_nonce' ); ?>
            <div class="sc-form-row">
              <div class="sc-form-group"><label>First Name</label><input type="text" name="sc_first" placeholder="Jane" required></div>
              <div class="sc-form-group"><label>Last Name</label><input type="text" name="sc_last" placeholder="Smith" required></div>
            </div>
            <div class="sc-form-row">
              <div class="sc-form-group"><label>Phone Number</label><input type="tel" name="sc_phone" placeholder="(555) 000-0000" required></div>
              <div class="sc-form-group"><label>Email Address</label><input type="email" name="sc_email" placeholder="you@email.com"></div>
            </div>
            <div class="sc-form-row">
              <div class="sc-form-group">
                <label>Service Needed</label>
                <select name="sc_service">
                  <option value="">— Select Service —</option>
                  <option>General Checkup &amp; Cleaning</option>
                  <option>Teeth Whitening</option>
                  <option>Dental Implants</option>
                  <option>Orthodontics / Invisalign</option>
                  <option>Cosmetic Dentistry</option>
                  <option>Pediatric Dentistry</option>
                  <option>Emergency Care</option>
                </select>
              </div>
              <div class="sc-form-group"><label>Preferred Date</label><input type="date" name="sc_date" id="scApptDate"></div>
            </div>
            <div class="sc-form-group sc-full">
              <label>Additional Notes</label>
              <textarea name="sc_notes" placeholder="Anything we should know before your visit?"></textarea>
            </div>
            <button type="submit" class="btBtn btSolidButton sc-btn-gold" style="width:100%;justify-content:center;padding:16px;font-size:15px;"><span class="sc-ico sc-ico-fa-cal" aria-hidden="true"></span> &nbsp;Confirm Appointment Request</button>
          </form>
        </div>
      </div>

      <div class="sc-col-5 sc-fade-up" style="transition-delay:.15s;">
        <div class="sc-hours-side-card">
          <h4><span class="sc-ico sc-ico-clock" aria-hidden="true"></span> Working Hours</h4>
          <?php
          $hrs = array(
            'Monday – Tuesday' => get_theme_mod( 'smilecare_hours_mon', '9:00 AM – 6:00 PM' ),
            'Wednesday'        => get_theme_mod( 'smilecare_hours_wed', '9:00 AM – 7:00 PM' ),
            'Thursday – Friday'=> get_theme_mod( 'smilecare_hours_fri', '9:00 AM – 5:00 PM' ),
            'Saturday'         => get_theme_mod( 'smilecare_hours_sat', '10:00 AM – 3:00 PM' ),
            'Sunday'           => get_theme_mod( 'smilecare_hours_sun', 'Closed' ),
          );
          foreach ( $hrs as $day => $time ) : $closed = ( strtolower(trim($time)) === 'closed' ); ?>
          <div class="sc-hours-row <?php echo $closed ? 'sc-closed' : ''; ?>">
            <span class="sc-hours-day"><?php echo esc_html($day); ?></span>
            <span class="sc-hours-time"><?php echo esc_html($time); ?></span>
          </div>
          <?php endforeach; ?>
        </div>

        <div class="sc-hours-side-card" style="margin-top:18px;">
          <h4><span class="sc-ico sc-ico-phone" aria-hidden="true"></span> Contact Us</h4>
          <div style="display:flex;gap:10px;align-items:center;margin-bottom:12px;">
            <span class="sc-ico sc-ico-phone" style="font-size:18px;color:rgba(255,255,255,.6);" aria-hidden="true"></span>
            <div>
              <div style="font-size:10px;color:rgba(255,255,255,.5);font-weight:700;text-transform:uppercase;letter-spacing:.06em;">Phone</div>
              <a href="<?php echo esc_attr( smilecare_phone_link($phone) ); ?>" style="color:rgba(255,255,255,.9);font-weight:700;"><?php echo esc_html($phone); ?></a>
            </div>
          </div>
          <div style="display:flex;gap:10px;align-items:center;margin-bottom:12px;">
            <span class="sc-ico sc-ico-mail" style="font-size:18px;color:rgba(255,255,255,.6);" aria-hidden="true"></span>
            <div>
              <div style="font-size:10px;color:rgba(255,255,255,.5);font-weight:700;text-transform:uppercase;letter-spacing:.06em;">Email</div>
              <a href="mailto:<?php echo esc_attr($email); ?>" style="color:rgba(255,255,255,.9);font-weight:700;"><?php echo esc_html($email); ?></a>
            </div>
          </div>
          <div style="background:linear-gradient(135deg,#8B0000,#CC2200);border-radius:var(--rad-sm);padding:14px;text-align:center;margin-top:16px;">
            <div style="font-size:13px;font-weight:700;color:#fff;margin-bottom:4px;"><span class="sc-ico sc-ico-fa-excl" aria-hidden="true"></span> Dental Emergency?</div>
            <?php $emg = get_theme_mod('smilecare_emergency','(555) 999-0000'); ?>
            <a href="<?php echo esc_attr(smilecare_phone_link($emg)); ?>" style="font-size:18px;font-weight:900;color:var(--gold);"><?php echo esc_html($emg); ?></a>
            <div style="font-size:11px;color:rgba(255,255,255,.6);margin-top:2px;">Available 24 Hours · 7 Days</div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════
     INSURANCE
     ═══════════════════════════════════════ -->
<section class="sc-insurance-section">
  <div class="port">
    <div class="sc-section-head" style="margin-bottom:32px;">
      <div class="sc-section-label">Accepted Insurance</div>
      <h2>We Work With All Major<br>Insurance Providers</h2>
    </div>
    <div class="sc-insurance-grid">
      <?php
      $ins = array(
        array('DD','Delta Dental'), array('ML','MetLife'), array('CI','Cigna'),
        array('AE','Aetna'),        array('UH','United Healthcare'), array('HU','Humana'),
        array('BC','BlueCross BlueShield'), array('GD','Guardian'),
      );
      foreach($ins as $i):?>
      <div class="sc-insurance-badge"><span class="sc-insurance-icon"><?php echo esc_html($i[0]); ?></span><?php echo esc_html($i[1]); ?></div>
      <?php endforeach; ?>
    </div>
    <p style="text-align:center;color:var(--muted);font-size:14px;margin-top:20px;">
      Don't see your insurance? <a href="<?php echo esc_url($contact_url); ?>">Contact us</a> — we work with most providers and offer flexible payment plans.
    </p>
  </div>
</section>

<!-- ═══════════════════════════════════════
     FINAL CTA
     ═══════════════════════════════════════ -->
<section class="sc-section" style="background:var(--grad);padding:80px 0;text-align:center;">
  <div class="port">
    <div class="sc-section-label" style="color:rgba(255,255,255,.7);justify-content:center;margin-bottom:14px;">Start Your Smile Journey Today</div>
    <h2 style="color:#fff;font-size:clamp(28px,4vw,48px);font-weight:900;margin-bottom:14px;">Ready for Your Best Smile Ever?</h2>
    <p style="color:rgba(255,255,255,.82);font-size:16px;max-width:480px;margin:0 auto 28px;">New patients always welcome. Book online or call us today — your first cleaning includes a complimentary smile assessment.</p>
    <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
      <a class="btBtn btSolidButton sc-btn-gold" href="<?php echo esc_url($appt_url); ?>"><span class="sc-ico sc-ico-fa-cal" aria-hidden="true"></span> &nbsp;Book Appointment</a>
      <a class="sc-btn-outline sc-btn-white btBtn" href="tel:<?php echo preg_replace('/[^0-9+]/','',$phone); ?>"><span class="sc-ico sc-ico-phone" aria-hidden="true"></span> &nbsp;<?php echo esc_html($phone); ?></a>
    </div>
    <div style="display:flex;gap:28px;justify-content:center;margin-top:28px;flex-wrap:wrap;">
      <div style="color:rgba(255,255,255,.75);font-size:13px;display:flex;align-items:center;gap:8px;"><span class="sc-ico sc-ico-fa-check" aria-hidden="true"></span> No Waitlist</div>
      <div style="color:rgba(255,255,255,.75);font-size:13px;display:flex;align-items:center;gap:8px;"><span class="sc-ico sc-ico-fa-check" aria-hidden="true"></span> Same-Day Emergency Slots</div>
      <div style="color:rgba(255,255,255,.75);font-size:13px;display:flex;align-items:center;gap:8px;"><span class="sc-ico sc-ico-fa-check" aria-hidden="true"></span> Free Smile Assessment for New Patients</div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var tomorrow = new Date(); tomorrow.setDate(tomorrow.getDate() + 1);
  var min = tomorrow.toISOString().split('T')[0];
  var max = new Date(new Date().setMonth(new Date().getMonth() + 3)).toISOString().split('T')[0];
  document.querySelectorAll('input[type="date"]').forEach(function(el){el.min=min;el.max=max;});
});
</script>

<?php get_footer(); ?>
