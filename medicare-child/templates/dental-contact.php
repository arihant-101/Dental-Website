<?php
/**
 * Template Name: Dental: Contact
 * Template Post Type: page
 */
get_header();
$phone     = get_theme_mod('smilecare_phone','(555) 123-4567');
$email     = get_theme_mod('smilecare_email','hello@smilecaredental.com');
$address   = get_theme_mod('smilecare_address','123 Smile Avenue, Suite 200, New York, NY 10001');
$emergency = get_theme_mod('smilecare_emergency','(555) 999-0000');
$appt_url  = smilecare_appointment_url();
?>

<div class="sc-appt-hero">
  <div class="port">
    <div class="sc-hero-eyebrow" style="margin:0 auto 16px;width:fit-content;"><span class="sc-ico sc-ico-map" aria-hidden="true"></span> Contact</div>
    <h1>Get In Touch</h1>
    <p>We'd love to hear from you. Our friendly team is ready to help.</p>
  </div>
</div>

<!-- Quick Contact Cards -->
<section class="sc-section sc-bg-soft" style="padding:40px 0 0;margin-top:-20px;">
  <div class="port">
    <div class="sc-row">
      <?php
      $cards = array(
        array('sc-ico-phone',   'Phone',    $phone,    smilecare_phone_link($phone),                              'Call us now'),
        array('sc-ico-mail',    'Email',    $email,    'mailto:'.$email,                                         'Send a message'),
        array('sc-ico-map',     'Address',  $address,  'https://maps.google.com/?q='.urlencode($address),        'Get directions'),
        array('sc-ico-fa-excl', 'Emergency',$emergency, smilecare_phone_link($emergency),                        '24/7 available'),
      );
      foreach($cards as $c):?>
      <div class="sc-col-3">
        <div style="background:var(--white);border-radius:var(--rad);border:1px solid var(--border);padding:22px;box-shadow:var(--shad);text-align:center;height:100%;transition:var(--trans);">
          <div style="width:52px;height:52px;background:var(--grad);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;"><span class="sc-ico <?php echo esc_attr($c[0]); ?>" style="font-size:20px;color:#fff;" aria-hidden="true"></span></div>
          <div style="font-size:11px;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:.08em;margin-bottom:4px;"><?php echo esc_html($c[1]);?></div>
          <div style="font-size:13px;font-weight:700;color:var(--dark);margin-bottom:6px;"><?php echo esc_html($c[2]);?></div>
          <a href="<?php echo esc_url($c[3]);?>" style="font-size:12px;color:var(--dp);font-weight:700;text-decoration:none;"><?php echo esc_html($c[4]);?> →</a>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</section>

<!-- Map + Form -->
<section class="sc-section sc-bg-soft" style="padding:48px 0 72px;">
  <div class="port">
    <div class="sc-row sc-gap-lg" style="align-items:start;">

      <!-- Left: Map + Transport -->
      <div class="sc-col-6 sc-fade-up">
        <div style="height:300px;display:flex;flex-direction:column;align-items:center;justify-content:center;background:var(--grad);border-radius:var(--rad);border:1px solid var(--border);margin-bottom:24px;position:relative;overflow:hidden;">
          <div style="position:absolute;inset:0;background:url('<?php echo esc_url(get_template_directory_uri()); ?>/gfx/stripe.png') repeat;opacity:.08;pointer-events:none;"></div>
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/gfx/map-pin.png" alt="Map pin" style="width:56px;height:auto;margin-bottom:12px;filter:drop-shadow(0 4px 12px rgba(0,0,0,.3));position:relative;z-index:1;">
          <div style="font-weight:800;color:#fff;font-size:16px;margin-bottom:4px;position:relative;z-index:1;">SmileCare Dental</div>
          <div style="color:rgba(255,255,255,.8);font-size:12px;text-align:center;max-width:260px;margin-bottom:16px;position:relative;z-index:1;"><?php echo esc_html($address);?></div>
          <a href="https://maps.google.com/?q=<?php echo urlencode($address);?>" target="_blank" rel="noopener" class="btBtn btSolidButton sc-btn-gold" style="font-size:13px;padding:10px 22px;position:relative;z-index:1;">Get Directions <span class="sc-ico sc-ico-map" style="margin-left:6px;"></span></a>
        </div>

        <div style="background:var(--white);border-radius:var(--rad);border:1px solid var(--border);padding:24px;">
          <div style="font-size:14px;font-weight:800;color:var(--dark);margin-bottom:14px;display:flex;align-items:center;gap:8px;"><span class="sc-ico sc-ico-map" style="color:var(--dp);" aria-hidden="true"></span> Getting Here</div>
          <?php
          $transport=array(
            array('sc-ico-fa-shield','Subway','Lines 4, 5, 6 to 59th St. · 2-min walk north.'),
            array('sc-ico-fa-check', 'Bus',   'M15 and M31 stop directly outside the building.'),
            array('sc-ico-clock',    'Parking','Free 2-hour parking in our building garage (Level B1).'),
            array('sc-ico-fa-heart', 'Access', 'Fully wheelchair accessible. Elevator from ground floor.'),
          );
          foreach($transport as $t):?>
          <div style="display:flex;gap:10px;align-items:flex-start;margin-bottom:12px;font-size:13px;">
            <span class="sc-ico <?php echo esc_attr($t[0]); ?>" style="font-size:16px;color:var(--dp);flex-shrink:0;margin-top:1px;" aria-hidden="true"></span>
            <div><strong style="color:var(--dark);"><?php echo esc_html($t[1]);?></strong><span style="color:var(--muted);"> — <?php echo esc_html($t[2]);?></span></div>
          </div>
          <?php endforeach;?>
        </div>
      </div>

      <!-- Right: Contact Form -->
      <div class="sc-col-6 sc-fade-up" style="transition-delay:.12s;">
        <div class="sc-contact-form-card">
          <h3><span class="sc-ico sc-ico-mail" aria-hidden="true"></span> Send Us a Message</h3>
          <form method="post" action="" class="sc-contact-light">
            <?php wp_nonce_field('dental_contact','sc_nonce');?>
            <div style="display:flex;gap:14px;flex-wrap:wrap;">
              <div class="sc-form-group" style="flex:1 1 130px;"><label>First Name *</label><input type="text" name="sc_first" placeholder="Jane" required></div>
              <div class="sc-form-group" style="flex:1 1 130px;"><label>Last Name</label><input type="text" name="sc_last" placeholder="Smith"></div>
            </div>
            <div class="sc-form-group"><label>Email Address *</label><input type="email" name="sc_email" placeholder="you@email.com" required></div>
            <div class="sc-form-group"><label>Phone Number</label><input type="tel" name="sc_phone" placeholder="(555) 000-0000"></div>
            <div class="sc-form-group">
              <label>Subject</label>
              <select name="sc_subject">
                <option value="">— Select a Topic —</option>
                <option>General Inquiry</option><option>Book an Appointment</option>
                <option>Insurance &amp; Billing</option><option>Dental Emergency</option>
                <option>Feedback / Compliment</option><option>Other</option>
              </select>
            </div>
            <div class="sc-form-group">
              <label>Message *</label>
              <textarea name="sc_message" placeholder="How can we help you?" required style="height:120px;width:100%;background:var(--bg-sf);border:1px solid var(--border);border-radius:var(--rad-sm);padding:11px 14px;font-family:montserrat,sans-serif;font-size:14px;color:var(--dark);transition:var(--trans);"></textarea>
            </div>
            <button type="submit" class="btBtn btSolidButton" style="width:100%;justify-content:center;padding:16px;font-size:15px;">Send Message →</button>
            <p style="font-size:12px;color:var(--muted);margin-top:10px;text-align:center;display:flex;align-items:center;justify-content:center;gap:6px;"><span class="sc-ico sc-ico-fa-shield" aria-hidden="true"></span> We respond within 2 business hours.</p>
          </form>
        </div>

        <div style="background:var(--white);border:1px solid var(--border);border-radius:var(--rad);padding:18px 22px;margin-top:18px;display:flex;flex-wrap:wrap;gap:10px;align-items:center;">
          <div style="font-size:20px;"><span class="sc-ico sc-ico-clock" style="font-size:20px;color:var(--dp);" aria-hidden="true"></span></div>
          <div style="flex:1;">
            <div style="font-size:14px;font-weight:800;color:var(--dark);">Working Hours</div>
            <div style="font-size:13px;color:var(--muted);">Mon–Fri: 9AM–6PM &nbsp;·&nbsp; Sat: 10AM–3PM &nbsp;·&nbsp; Sun: Closed</div>
          </div>
          <?php if(smilecare_is_open_now()):?><span class="sc-open-badge">Open Now</span><?php else:?><span class="sc-closed-badge">Closed</span><?php endif;?>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- FAQ -->
<section class="sc-section sc-bg-white" style="padding:72px 0;">
  <div class="port">
    <div class="sc-section-head"><div class="sc-section-label">FAQ</div><h2>Frequently Asked Questions</h2></div>
    <div class="sc-row">
      <?php
      $faqs = array(
        array('Do you accept walk-ins?','We welcome walk-in patients for urgent or emergency care. For routine appointments, booking in advance is recommended.'),
        array('How do I book an appointment?','Book online 24/7, call us at '.$phone.', or email us. We confirm within 2 hours.'),
        array('What insurance do you accept?','Delta Dental, MetLife, Cigna, Aetna, United Healthcare, Humana, BlueCross BlueShield, Guardian, and most major plans.'),
        array('Do you offer payment plans?','Yes! 0% interest financing through CareCredit and Sunbit. Manageable monthly payments available.'),
        array('What should I bring to my first visit?','Insurance card, photo ID, previous X-rays, and a list of medications. Arrive 15 minutes early.'),
        array('Do you offer sedation dentistry?','Yes. Nitrous oxide, oral sedation, and IV sedation for patients with dental anxiety or complex procedures.'),
      );
      foreach($faqs as $f):?>
      <div class="sc-col-6">
        <div style="background:var(--bg-sf);border:1px solid var(--border);border-radius:var(--rad-sm);padding:18px 20px;height:100%;">
          <div style="font-size:15px;font-weight:800;color:var(--dark);margin-bottom:8px;display:flex;align-items:center;gap:8px;"><span class="sc-ico sc-ico-tooth" style="color:var(--dp);" aria-hidden="true"></span><?php echo esc_html($f[0]);?></div>
          <div style="font-size:14px;color:var(--muted);line-height:1.65;"><?php echo esc_html($f[1]);?></div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
    <div style="text-align:center;margin-top:32px;">
      <p style="color:var(--muted);font-size:15px;margin-bottom:14px;">Still have a question?</p>
      <a class="btBtn btSolidButton" href="<?php echo esc_url($appt_url);?>">Book a Free Consultation</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
