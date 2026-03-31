<?php
/**
 * Template Name: Dental: Meet the Team
 * Template Post Type: page
 */
get_header();
$appt_url = smilecare_appointment_url();
?>

<div class="sc-appt-hero">
  <div class="port">
    <div class="sc-hero-eyebrow" style="margin:0 auto 16px;width:fit-content;"><span class="sc-ico sc-ico-fa-user" aria-hidden="true"></span> Our Team</div>
    <h1>Meet Our Expert Dentists</h1>
    <p>Highly trained, compassionate professionals dedicated to your oral health and comfort.</p>
  </div>
</div>

<!-- Intro -->
<section class="sc-section sc-bg-white" style="padding:72px 0;">
  <div class="port">

    <div class="sc-row sc-vcenter sc-gap-lg" style="margin-bottom:64px;">
      <div class="sc-col-6 sc-fade-up">
        <div class="sc-section-label">Why Our Team Stands Apart</div>
        <h2>Expertise You Can Trust,<br>Care You Can Feel</h2>
        <p style="color:var(--muted);font-size:15px;line-height:1.7;">Every member of our clinical team is board-certified, undergoes 50+ hours of continuing education annually, and is personally committed to your comfort and long-term oral health.</p>
        <div style="display:flex;flex-wrap:wrap;gap:14px;margin-top:22px;">
          <?php foreach(array(array('sc-ico-fa-award','ADA Members'),array('sc-ico-fa-check','Board Certified'),array('sc-ico-fa-star','50+ hrs CE/yr'),array('sc-ico-fa-shield','Sedation Trained')) as $b):?>
          <div style="display:flex;align-items:center;gap:8px;background:var(--bg-lt);border:1px solid var(--border);border-radius:var(--rad-sm);padding:10px 14px;font-size:13px;font-weight:700;color:var(--dark);">
            <span class="sc-ico <?php echo esc_attr($b[0]); ?>" style="font-size:16px;color:var(--dp);" aria-hidden="true"></span> <?php echo esc_html($b[1]);?>
          </div>
          <?php endforeach;?>
        </div>
      </div>
      <div class="sc-col-6 sc-fade-up" style="transition-delay:.12s;">
        <div style="background:var(--grad-dk);border-radius:var(--rad-lg);padding:36px;color:#fff;text-align:center;">
          <div style="font-size:60px;margin-bottom:12px;"><span class="sc-ico sc-ico-fa-award" style="font-size:56px;color:var(--gold);"></span></div>
          <h3 style="color:#fff;font-size:22px;margin-bottom:8px;">Best Dental Practice 2023</h3>
          <p style="color:rgba(255,255,255,.75);font-size:14px;margin-bottom:20px;">Awarded by NY State Dental Association for excellence in patient care and clinical outcomes.</p>
          <div style="display:flex;justify-content:center;gap:28px;padding-top:20px;border-top:1px solid rgba(255,255,255,.12);">
            <div><div style="font-size:28px;font-weight:900;color:var(--gold);">4.9★</div><div style="font-size:12px;color:rgba(255,255,255,.6);">Google Rating</div></div>
            <div><div style="font-size:28px;font-weight:900;color:#fff;">800+</div><div style="font-size:12px;color:rgba(255,255,255,.6);">Reviews</div></div>
            <div><div style="font-size:28px;font-weight:900;color:var(--ice);">8</div><div style="font-size:12px;color:rgba(255,255,255,.6);">Dentists</div></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Team Grid -->
    <div class="sc-section-head"><div class="sc-section-label">Clinical Team</div><h2>Our Dental Professionals</h2></div>

    <div class="sc-row">
      <?php
      $team = array(
        array('Dr. Sarah Mitchell, DDS','Lead Dentist &amp; Founder',array('Cosmetic','Implants','General'),'Dr. Mitchell founded SmileCare with a vision of combining artistry with science. NYU College of Dentistry alumna, 18 years experience.','SM','NYU College of Dentistry','ADA · AACD Member'),
        array('Dr. James Okonkwo, DMD','Orthodontist',array('Invisalign','Braces','Teen Ortho'),'Certified Invisalign Provider and AAO member. Creates beautifully aligned smiles for patients of all ages.','JO','Columbia University, DMD','AAO · Invisalign Certified'),
        array('Dr. Lisa Chen, DDS','Pediatric Specialist',array('Children','Prevention','Special Needs'),'Board-certified pediatric dentist who transforms nervous young patients into dental-care champions.','LC','University of Michigan, DDS','AAPD · Board Certified'),
        array('Dr. Michael Torres, DMD','Oral Surgeon',array('Implants','Surgery','Bone Graft'),'Fellowship-trained oral surgeon with expertise in full-arch implant reconstruction. Over 3,000 implants placed.','MT','Boston University, DMD','AAOMS · Fellowship Trained'),
        array('Dr. Amara Patel, DDS','Endodontist',array('Root Canal','Pain Relief','Microsurgery'),'Specialist in gentle, pain-free root canal therapy using the latest rotary endodontic systems.','AP','Tufts University, DDS','AAE Member · Endodontics'),
        array('Dr. Robert Kim, DMD','Periodontist',array('Gum Disease','Laser Therapy','Implants'),'Specialist in periodontal disease management and laser gum therapy.','RK','University of Pennsylvania','AAP Member · Laser Certified'),
        array('Jessica Park, RDH','Lead Dental Hygienist',array('Cleaning','Prevention','Education'),'12 years of experience delivering thorough, gentle cleanings and exceptional patient education.','JP','LaGuardia Community College, RDH','ADHA Member'),
        array('Carlos Rivera, DA','Patient Coordinator',array('Scheduling','Insurance','Financing'),'Ensures your experience at SmileCare is seamless from first call through follow-up care.','CR','Dental Administration Certified','ADAA Member'),
      );
      foreach($team as $m):?>
      <div class="sc-col-3 sc-fade-up">
        <div class="sc-team-card">
          <div class="sc-team-photo">
            <div style="width:100%;height:240px;display:flex;align-items:center;justify-content:center;background:var(--grad);font-size:52px;font-weight:900;color:rgba(255,255,255,.9);font-family:'montserrat',sans-serif;letter-spacing:2px;"><?php echo esc_html($m[4]);?></div>
            <div class="sc-team-overlay">
              <div class="sc-team-social">
                <a href="#" class="sc-ico sc-ico-fb" title="LinkedIn" aria-label="LinkedIn">LinkedIn</a>
                <a href="mailto:<?php echo esc_attr(get_theme_mod('smilecare_email','hello@smilecaredental.com'));?>" class="sc-ico sc-ico-mail" title="Email" aria-label="Email">Email</a>
                <a href="<?php echo esc_url($appt_url);?>" class="sc-ico sc-ico-fa-cal" title="Book" aria-label="Book">Book</a>
              </div>
            </div>
          </div>
          <div class="sc-team-info">
            <div class="sc-team-name"><?php echo $m[0];?></div>
            <div class="sc-team-role"><?php echo $m[1];?></div>
            <div class="sc-team-bio"><?php echo esc_html($m[3]);?></div>
            <div style="margin-top:10px;padding-top:10px;border-top:1px solid var(--border);">
              <div style="font-size:11px;color:var(--muted);margin-bottom:4px;display:flex;align-items:center;gap:5px;"><span class="sc-ico sc-ico-fa-award" style="color:var(--dp);font-size:11px;" aria-hidden="true"></span> <?php echo esc_html($m[5]);?></div>
              <div style="font-size:11px;color:var(--dp);font-weight:700;display:flex;align-items:center;gap:5px;"><span class="sc-ico sc-ico-fa-check" style="font-size:11px;" aria-hidden="true"></span> <?php echo esc_html($m[6]);?></div>
            </div>
            <div style="margin-top:8px;"><?php foreach($m[2] as $t):?><span class="sc-team-tag"><?php echo esc_html($t);?></span><?php endforeach;?></div>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>

  </div>
</section>

<!-- Join + CTA -->
<section class="sc-section sc-bg-light" style="padding:64px 0;text-align:center;">
  <div class="port">
    <div class="sc-section-label" style="justify-content:center;">Join Our Team</div>
    <h2>Passionate About Dentistry?</h2>
    <p style="color:var(--muted);font-size:16px;max-width:460px;margin:0 auto 24px;">We're always looking for exceptional dental professionals. See current openings or send us your CV.</p>
    <a class="btBtn btHollowButton" href="<?php echo esc_url(smilecare_nav_url('contact'));?>">View Openings</a>
  </div>
</section>

<section class="sc-section" style="background:var(--grad);padding:64px 0;text-align:center;">
  <div class="port">
    <h2 style="color:#fff;font-size:clamp(24px,3.5vw,40px);font-weight:900;margin-bottom:12px;">Ready to Meet Your Dentist?</h2>
    <p style="color:rgba(255,255,255,.8);font-size:16px;max-width:420px;margin:0 auto 26px;">Book an appointment and we'll match you with the right specialist for your needs.</p>
    <a class="btBtn btSolidButton sc-btn-gold" href="<?php echo esc_url($appt_url);?>"><span class="sc-ico sc-ico-fa-cal" aria-hidden="true"></span> &nbsp;Book an Appointment</a>
  </div>
</section>

<?php get_footer(); ?>
