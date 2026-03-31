<?php
/**
 * Template Name: Dental: Services
 * Template Post Type: page
 */
get_header();
$appt_url = smilecare_appointment_url();
?>

<div class="sc-appt-hero">
  <div class="port">
    <div class="sc-hero-eyebrow" style="margin:0 auto 16px;width:fit-content;"><span class="sc-ico sc-ico-tooth" aria-hidden="true"></span> Our Services</div>
    <h1>Comprehensive Dental Treatments</h1>
    <p>World-class dental care using the latest technology, tailored to you.</p>
  </div>
</div>

<!-- Services Overview -->
<section class="sc-section sc-bg-soft" style="padding:72px 0;">
<div class="port">

  <div class="sc-section-head" style="margin-bottom:52px;">
    <div class="sc-section-label">What We Offer</div>
    <h2>Everything Your Smile Needs</h2>
    <p>From your first checkup to a complete smile transformation — we have the expertise and technology to deliver outstanding results.</p>
  </div>

  <!-- General Dentistry -->
  <div class="sc-service-feature-row" id="general">
    <div class="sc-row sc-vcenter sc-gap-lg">
      <div class="sc-col-6 sc-fade-up">
        <span class="sc-service-badge">Preventive Care</span>
        <h2 style="font-size:32px;font-weight:900;color:var(--dark);margin:10px 0 14px;"><span class="sc-ico sc-ico-tooth" aria-hidden="true" style="color:var(--dp);margin-right:8px;"></span>General Dentistry</h2>
        <p style="color:var(--muted);font-size:15px;line-height:1.7;margin-bottom:20px;">Foundation of a healthy smile. Our general dental services focus on prevention, early detection, and maintaining the health of your teeth and gums.</p>
        <ul class="sc-feature-list">
          <li>Comprehensive oral exams &amp; X-rays</li>
          <li>Professional cleaning &amp; polishing</li>
          <li>Tooth-coloured composite fillings</li>
          <li>Root canal therapy (pain-free)</li>
          <li>Porcelain crowns &amp; bridges</li>
          <li>Gum disease (periodontal) treatment</li>
          <li>Tooth extractions &amp; wisdom teeth</li>
          <li>Mouth guards &amp; night guards</li>
        </ul>
        <a class="btBtn btSolidButton" href="<?php echo esc_url($appt_url); ?>">Book a Checkup</a>
      </div>
      <div class="sc-col-6 sc-fade-up" style="transition-delay:.15s;">
        <div style="aspect-ratio:4/3;display:flex;align-items:center;justify-content:center;background:var(--grad);border-radius:var(--rad);"><span class="sc-ico sc-ico-tooth" style="font-size:90px;color:rgba(255,255,255,.85);"></span></div>
      </div>
    </div>
  </div>

  <!-- Cosmetic Dentistry -->
  <div class="sc-service-feature-row" id="cosmetic" style="margin-top:48px;">
    <div class="sc-row sc-vcenter sc-gap-lg sc-reverse">
      <div class="sc-col-6 sc-fade-up">
        <span class="sc-service-badge">Cosmetic Care</span>
        <h2 style="font-size:32px;font-weight:900;color:var(--dark);margin:10px 0 14px;"><span class="sc-ico sc-ico-fa-star" aria-hidden="true" style="color:var(--dp);margin-right:8px;"></span>Cosmetic Dentistry</h2>
        <p style="color:var(--muted);font-size:15px;line-height:1.7;margin-bottom:20px;">Transform your smile with our comprehensive range of cosmetic dental procedures. We combine artistry with science to create natural, stunning results.</p>
        <ul class="sc-feature-list">
          <li>Professional teeth whitening (in-office &amp; take-home)</li>
          <li>Porcelain veneers &amp; lumineers</li>
          <li>Dental bonding &amp; contouring</li>
          <li>Smile design &amp; makeover planning</li>
          <li>Gum reshaping &amp; crown lengthening</li>
        </ul>
        <a class="btBtn btSolidButton" href="<?php echo esc_url($appt_url); ?>">Get a Smile Consult</a>
      </div>
      <div class="sc-col-6 sc-fade-up" style="transition-delay:.15s;">
        <div style="aspect-ratio:4/3;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,var(--gold),#F4C261);border-radius:var(--rad);"><span class="sc-ico sc-ico-fa-star" style="font-size:90px;color:rgba(255,255,255,.85);"></span></div>
      </div>
    </div>
  </div>

  <!-- Implants -->
  <div class="sc-service-feature-row" id="implants" style="margin-top:48px;">
    <div class="sc-row sc-vcenter sc-gap-lg">
      <div class="sc-col-6 sc-fade-up">
        <span class="sc-service-badge">Restorative Care</span>
        <h2 style="font-size:32px;font-weight:900;color:var(--dark);margin:10px 0 14px;"><span class="sc-ico sc-ico-fa-shield" aria-hidden="true" style="color:var(--dp);margin-right:8px;"></span>Dental Implants</h2>
        <p style="color:var(--muted);font-size:15px;line-height:1.7;margin-bottom:20px;">The gold standard for tooth replacement. Dental implants look, feel, and function exactly like natural teeth — and can last a lifetime with proper care.</p>
        <ul class="sc-feature-list">
          <li>Single tooth implants</li>
          <li>Multiple teeth implants</li>
          <li>All-on-4 &amp; All-on-6 full arch</li>
          <li>Implant-supported dentures</li>
          <li>Bone grafting &amp; sinus lift</li>
          <li>Immediate load (same-day) implants</li>
        </ul>
        <a class="btBtn btSolidButton" href="<?php echo esc_url($appt_url); ?>">Free Implant Consultation</a>
      </div>
      <div class="sc-col-6 sc-fade-up" style="transition-delay:.15s;">
        <div style="aspect-ratio:4/3;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,var(--deep),var(--dp));border-radius:var(--rad);"><span class="sc-ico sc-ico-fa-shield" style="font-size:90px;color:rgba(255,255,255,.85);"></span></div>
      </div>
    </div>
  </div>

  <!-- Orthodontics -->
  <div class="sc-service-feature-row" id="ortho" style="margin-top:48px;">
    <div class="sc-row sc-vcenter sc-gap-lg sc-reverse">
      <div class="sc-col-6 sc-fade-up">
        <span class="sc-service-badge">Alignment</span>
        <h2 style="font-size:32px;font-weight:900;color:var(--dark);margin:10px 0 14px;"><span class="sc-ico sc-ico-fa-award" aria-hidden="true" style="color:var(--dp);margin-right:8px;"></span>Orthodontics</h2>
        <p style="color:var(--muted);font-size:15px;line-height:1.7;margin-bottom:20px;">Straight teeth are healthy teeth. Our orthodontic treatments are discreet, efficient, and designed for both teens and adults.</p>
        <ul class="sc-feature-list">
          <li>Invisalign clear aligners (certified provider)</li>
          <li>Traditional metal braces</li>
          <li>Ceramic &amp; tooth-coloured braces</li>
          <li>Lingual (hidden) braces</li>
          <li>Retainers &amp; post-treatment care</li>
          <li>Phase 1 treatment for children (age 7+)</li>
        </ul>
        <a class="btBtn btSolidButton" href="<?php echo esc_url($appt_url); ?>">Free Ortho Scan</a>
      </div>
      <div class="sc-col-6 sc-fade-up" style="transition-delay:.15s;">
        <div style="aspect-ratio:4/3;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,var(--sky),var(--ice));border-radius:var(--rad);"><span class="sc-ico sc-ico-fa-award" style="font-size:90px;color:rgba(255,255,255,.85);"></span></div>
      </div>
    </div>
  </div>

  <!-- Additional Services Grid -->
  <div style="margin-top:64px;">
    <div class="sc-section-head" style="margin-bottom:36px;">
      <div class="sc-section-label">More Services</div>
      <h2>Additional Treatments We Offer</h2>
    </div>
    <div class="sc-row">
      <?php
      $more = array(
        array('sc-ico-fa-steth',  'Oral Surgery',         'Wisdom teeth, bone grafting, complex extractions, and corrective jaw surgery.','#surgery'),
        array('sc-ico-fa-heart',  'Pediatric Dentistry',  'Gentle, fun dental care for children from first tooth through teenage years.','#pediatric'),
        array('sc-ico-fa-shield', 'Sedation Dentistry',   'Nitrous oxide, oral sedation, and IV sedation for anxiety-free treatment.','#sedation'),
        array('sc-ico-fa-clock',  'Sleep Apnea',          'Custom oral appliances for snoring and sleep apnea — an alternative to CPAP.','#sleep'),
        array('sc-ico-tooth',     'Dentures',             'Full and partial dentures, precision attachments, and same-day emergency repairs.','#dentures'),
        array('sc-ico-fa-award',  'Digital X-Rays',       'Low-radiation digital radiography for faster, clearer diagnostic imaging.','#xrays'),
      );
      foreach($more as $s):?>
      <div class="sc-col-4 sc-fade-up">
        <div class="sc-service-card" id="<?php echo esc_attr(ltrim($s[3],'#')); ?>">
          <div class="sc-service-icon"><span class="sc-ico <?php echo esc_attr($s[0]); ?>" aria-hidden="true"></span></div>
          <h3><?php echo esc_html($s[1]); ?></h3>
          <p><?php echo esc_html($s[2]); ?></p>
          <a class="sc-service-link" href="<?php echo esc_url($appt_url); ?>">Book →</a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

</div>
</section>

<!-- Pricing Section -->
<section class="sc-section sc-bg-light" style="padding:72px 0;">
<div class="port">
  <div class="sc-section-head">
    <div class="sc-section-label">Transparent Pricing</div>
    <h2>Clear, Honest Dental Pricing</h2>
    <p>No hidden fees. We'll always explain your costs before any treatment begins.</p>
  </div>
  <div class="sc-row sc-center">
    <?php
    $plans = array(
      array('Essential','89','/visit','Great for routine care',false,array('Exam &amp; X-rays','Professional cleaning','Fluoride treatment','Take-home whitening tray','10% off future treatments')),
      array('Complete','149','/visit','Best value for families',true,array('Everything in Essential','Full gum assessment','Oral cancer screening','Digital smile preview','15% off cosmetic work','Priority scheduling')),
      array('Premium','249','/visit','Ultimate smile care',false,array('Everything in Complete','In-office whitening session','3D jaw scan','Custom night guard','20% off all treatments','Dedicated care coordinator')),
    );
    foreach($plans as $p):?>
    <div class="sc-col-4">
      <div class="sc-pricing-card <?php echo $p[4]?'sc-popular':''; ?>">
        <?php if($p[4]):?><div class="sc-pricing-badge">Most Popular</div><?php endif;?>
        <div class="sc-pricing-plan"><?php echo $p[0];?></div>
        <div class="sc-pricing-price"><sup>$</sup><?php echo $p[1];?><sub><?php echo $p[2];?></sub></div>
        <div class="sc-pricing-desc"><?php echo $p[3];?></div>
        <ul class="sc-pricing-features">
          <?php foreach($p[5] as $f):?><li><?php echo $f;?></li><?php endforeach;?>
        </ul>
        <a class="btBtn btSolidButton <?php echo $p[4]?'sc-btn-gold':'';?>" href="<?php echo esc_url($appt_url);?>" style="width:100%;justify-content:center;">Get Started</a>
      </div>
    </div>
    <?php endforeach;?>
  </div>
  <p style="text-align:center;color:var(--muted);font-size:13px;margin-top:20px;">
    * Prices are indicative. Final cost depends on individual assessment. Insurance billing available. 0% APR financing available.
  </p>
</div>
</section>

<!-- CTA -->
<section class="sc-section" style="background:var(--grad);padding:64px 0;text-align:center;">
  <div class="port">
    <h2 style="color:#fff;font-size:clamp(24px,3.5vw,40px);font-weight:900;margin-bottom:12px;">Not Sure Which Service You Need?</h2>
    <p style="color:rgba(255,255,255,.8);font-size:16px;max-width:440px;margin:0 auto 28px;">Book a complimentary consultation and our team will create a personalised treatment plan just for you.</p>
    <a class="btBtn btSolidButton sc-btn-gold" href="<?php echo esc_url($appt_url);?>">Book Free Consultation</a>
  </div>
</section>

<?php get_footer(); ?>
