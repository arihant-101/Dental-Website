<?php
/**
 * Template Name: Dental: Appointment
 * Template Post Type: page
 */
get_header();
$phone     = get_theme_mod( 'smilecare_phone',     '(555) 123-4567' );
$email     = get_theme_mod( 'smilecare_email',     'hello@smilecaredental.com' );
$address   = get_theme_mod( 'smilecare_address',   '123 Smile Avenue, Suite 200, New York, NY 10001' );
$emergency = get_theme_mod( 'smilecare_emergency', '(555) 999-0000' );
?>

<div class="sc-appt-hero">
  <div class="port">
    <div class="sc-hero-eyebrow" style="margin:0 auto 16px;width:fit-content;"><span class="sc-ico sc-ico-fa-cal" aria-hidden="true"></span> Appointment</div>
    <h1>Book Your Visit</h1>
    <p>We'll confirm your appointment within 2 hours. New patients always welcome!</p>
  </div>
</div>

<section class="sc-section sc-bg-soft" style="padding:64px 0;">
  <div class="port">
    <div class="sc-row sc-gap-lg" style="align-items:start;">

      <!-- Main Form -->
      <div class="sc-col-8">
        <div class="sc-appt-main-card">
          <h2><span class="sc-ico sc-ico-fa-cal" aria-hidden="true"></span> Appointment Request Form</h2>

          <form method="post" action="" class="sc-appt-light sc-contact-light">
            <?php wp_nonce_field('dental_appointment','sc_nonce'); ?>

            <div style="background:var(--bg-lt);border:1px solid var(--border);border-radius:var(--rad-sm);padding:20px 20px 4px;margin-bottom:20px;">
              <div style="font-size:12px;font-weight:800;color:var(--dp);text-transform:uppercase;letter-spacing:.1em;margin-bottom:14px;">Personal Information</div>
              <div style="display:flex;gap:16px;flex-wrap:wrap;">
                <div class="sc-form-group" style="flex:1 1 160px;"><label>First Name *</label><input type="text" name="sc_first" placeholder="Jane" required></div>
                <div class="sc-form-group" style="flex:1 1 160px;"><label>Last Name *</label><input type="text" name="sc_last" placeholder="Smith" required></div>
              </div>
              <div style="display:flex;gap:16px;flex-wrap:wrap;">
                <div class="sc-form-group" style="flex:1 1 160px;"><label>Phone Number *</label><input type="tel" name="sc_phone" placeholder="(555) 000-0000" required></div>
                <div class="sc-form-group" style="flex:1 1 160px;"><label>Email Address</label><input type="email" name="sc_email" placeholder="you@email.com"></div>
              </div>
              <div class="sc-form-group"><label>Are you a new or returning patient?</label>
                <select name="sc_patient_type"><option value="new">New Patient</option><option value="returning">Returning Patient</option></select>
              </div>
            </div>

            <div style="background:var(--bg-lt);border:1px solid var(--border);border-radius:var(--rad-sm);padding:20px 20px 4px;margin-bottom:20px;">
              <div style="font-size:12px;font-weight:800;color:var(--dp);text-transform:uppercase;letter-spacing:.1em;margin-bottom:14px;">Treatment Needed</div>
              <div class="sc-form-group">
                <label>Primary Service *</label>
                <select name="sc_service" required>
                  <option value="">— Please Select —</option>
                  <optgroup label="General Dentistry">
                    <option>Routine Checkup &amp; Cleaning</option><option>Tooth Filling</option>
                    <option>Crown or Bridge</option><option>Root Canal</option>
                    <option>Gum Treatment</option><option>Tooth Extraction</option>
                  </optgroup>
                  <optgroup label="Cosmetic Dentistry">
                    <option>Teeth Whitening</option><option>Dental Veneers</option>
                    <option>Smile Makeover Consultation</option><option>Dental Bonding</option>
                  </optgroup>
                  <optgroup label="Advanced Care">
                    <option>Dental Implants Consultation</option><option>Invisalign / Orthodontics</option>
                    <option>Oral Surgery</option><option>Pediatric Dentistry</option>
                  </optgroup>
                  <option>Emergency — Tooth Pain</option>
                  <option>Not Sure — Need Advice</option>
                </select>
              </div>
              <div class="sc-form-group">
                <label>Insurance Provider</label>
                <select name="sc_insurance">
                  <option value="">— Select Insurance —</option>
                  <option>Delta Dental</option><option>MetLife</option><option>Cigna</option>
                  <option>Aetna</option><option>United Healthcare</option><option>Humana</option>
                  <option>BlueCross BlueShield</option><option>Guardian</option>
                  <option>No Insurance / Self-Pay</option><option>Other</option>
                </select>
              </div>
            </div>

            <div style="background:var(--bg-lt);border:1px solid var(--border);border-radius:var(--rad-sm);padding:20px 20px 4px;margin-bottom:20px;">
              <div style="font-size:12px;font-weight:800;color:var(--dp);text-transform:uppercase;letter-spacing:.1em;margin-bottom:14px;">Preferred Schedule</div>
              <div style="display:flex;gap:16px;flex-wrap:wrap;">
                <div class="sc-form-group" style="flex:1 1 160px;"><label>Preferred Date *</label><input type="date" name="sc_date" id="scApptDate" required></div>
                <div class="sc-form-group" style="flex:1 1 160px;">
                  <label>Preferred Time</label>
                  <select name="sc_time">
                    <option>Morning (9AM–12PM)</option><option>Afternoon (12PM–4PM)</option>
                    <option>Late Afternoon (4PM–7PM)</option><option>Saturday Morning</option>
                  </select>
                </div>
              </div>
              <div class="sc-form-group"><label>Alternative Date</label><input type="date" name="sc_alt_date" id="scAltDate"></div>
            </div>

            <div class="sc-form-group">
              <label>Additional Notes</label>
              <textarea name="sc_notes" placeholder="Describe your concern, mention any allergies or medications..." style="height:100px;width:100%;background:var(--bg-sf);border:1px solid var(--border);border-radius:var(--rad-sm);padding:11px 14px;font-family:montserrat,sans-serif;font-size:14px;color:var(--dark);transition:var(--trans);"></textarea>
            </div>

            <div style="margin-bottom:18px;padding:12px 14px;background:#FFF8E7;border:1px solid #F4C261;border-radius:var(--rad-sm);font-size:13px;color:var(--dark);">
              <span class="sc-ico sc-ico-fa-shield" aria-hidden="true"></span> <strong>Your privacy is protected.</strong> All data is HIPAA-compliant and never shared with third parties.
            </div>

            <button type="submit" class="btBtn btSolidButton sc-btn-gold" style="width:100%;justify-content:center;padding:18px;font-size:16px;font-weight:800;">
              <span class="sc-ico sc-ico-fa-cal" aria-hidden="true"></span> &nbsp;Submit Appointment Request
            </button>
          </form>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="sc-col-4">
        <div class="sc-contact-card" style="margin-bottom:18px;">
          <h3><span class="sc-ico sc-ico-phone" aria-hidden="true"></span> Contact Us</h3>
          <div class="sc-contact-item">
            <div class="sc-contact-icon"><span class="sc-ico sc-ico-phone" aria-hidden="true"></span></div>
            <div><div class="sc-contact-label">Phone</div><div class="sc-contact-value"><a href="<?php echo esc_attr(smilecare_phone_link($phone));?>"><?php echo esc_html($phone);?></a></div></div>
          </div>
          <div class="sc-contact-item">
            <div class="sc-contact-icon"><span class="sc-ico sc-ico-mail" aria-hidden="true"></span></div>
            <div><div class="sc-contact-label">Email</div><div class="sc-contact-value"><a href="mailto:<?php echo esc_attr($email);?>"><?php echo esc_html($email);?></a></div></div>
          </div>
          <div class="sc-contact-item">
            <div class="sc-contact-icon"><span class="sc-ico sc-ico-map" aria-hidden="true"></span></div>
            <div><div class="sc-contact-label">Address</div><div class="sc-contact-value"><?php echo esc_html($address);?></div></div>
          </div>
        </div>

        <!-- Hours -->
        <div style="background:var(--white);border:1px solid var(--border);border-radius:var(--rad);padding:22px;margin-bottom:18px;">
          <div style="font-size:14px;font-weight:800;color:var(--dark);margin-bottom:14px;display:flex;align-items:center;gap:8px;"><span class="sc-ico sc-ico-clock" aria-hidden="true"></span> Working Hours</div>
          <?php
          $hrs = array(
            'Mon–Tue'  => get_theme_mod('smilecare_hours_mon','9:00 AM – 6:00 PM'),
            'Wednesday'=> get_theme_mod('smilecare_hours_wed','9:00 AM – 7:00 PM'),
            'Thu–Fri'  => get_theme_mod('smilecare_hours_fri','9:00 AM – 5:00 PM'),
            'Saturday' => get_theme_mod('smilecare_hours_sat','10:00 AM – 3:00 PM'),
            'Sunday'   => get_theme_mod('smilecare_hours_sun','Closed'),
          );
          foreach($hrs as $d=>$t): $closed=strtolower(trim($t))==='closed';?>
          <div style="display:flex;justify-content:space-between;padding:8px 0;border-bottom:1px solid var(--border);font-size:13px;">
            <span style="color:var(--muted);"><?php echo esc_html($d);?></span>
            <span style="font-weight:700;color:<?php echo $closed?'var(--muted)':'var(--dark)';?>;"><?php echo esc_html($t);?></span>
          </div>
          <?php endforeach;?>
        </div>

        <!-- Emergency -->
        <div style="background:linear-gradient(135deg,#8B0000,#CC2200);border-radius:var(--rad);padding:22px;text-align:center;color:#fff;">
          <div style="font-size:28px;margin-bottom:8px;"><span class="sc-ico sc-ico-fa-excl" style="font-size:32px;color:var(--gold);"></span></div>
          <div style="font-size:15px;font-weight:800;margin-bottom:6px;">Dental Emergency?</div>
          <div style="font-size:13px;color:rgba(255,255,255,.8);margin-bottom:12px;">Emergency slots available 7 days a week.</div>
          <a href="<?php echo esc_attr(smilecare_phone_link($emergency));?>" style="display:block;background:var(--gold);color:#fff;font-size:18px;font-weight:900;padding:12px;border-radius:var(--rad-sm);text-decoration:none;margin-bottom:4px;"><?php echo esc_html($emergency);?></a>
          <div style="font-size:11px;color:rgba(255,255,255,.6);">Available 24 hours · 7 days a week</div>
        </div>

        <!-- What to expect -->
        <div style="background:var(--white);border:1px solid var(--border);border-radius:var(--rad);padding:22px;margin-top:18px;">
          <div style="font-size:14px;font-weight:800;color:var(--dark);margin-bottom:14px;display:flex;align-items:center;gap:8px;"><span class="sc-ico sc-ico-fa-check" aria-hidden="true"></span> What to Expect</div>
          <?php
          $steps=array(
            array('1','We confirm your slot within 2 hours via phone/email.'),
            array('2','Complete new patient paperwork (link sent by email).'),
            array('3','Arrive 10 mins early. Bring your insurance card.'),
            array('4','Your dentist does a full exam &amp; discusses your plan.'),
            array('5','Treatment begins — with your full consent &amp; comfort.'),
          );
          foreach($steps as $s):?>
          <div style="display:flex;gap:10px;margin-bottom:10px;font-size:13px;align-items:flex-start;">
            <div style="width:22px;height:22px;background:var(--grad);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-size:10px;font-weight:700;flex-shrink:0;margin-top:1px;"><?php echo $s[0];?></div>
            <span style="color:var(--text);"><?php echo $s[1];?></span>
          </div>
          <?php endforeach;?>
        </div>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded',function(){
  var t=new Date(); t.setDate(t.getDate()+1);
  var min=t.toISOString().split('T')[0];
  var max=new Date(new Date().setMonth(new Date().getMonth()+3)).toISOString().split('T')[0];
  document.querySelectorAll('input[type="date"]').forEach(function(el){el.min=min;el.max=max;});
});
</script>

<?php get_footer(); ?>
