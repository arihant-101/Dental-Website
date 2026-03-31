<?php
/**
 * Template Name: Dental: Gallery
 * Template Post Type: page
 */
get_header();
$appt_url = smilecare_appointment_url();
?>

<div class="sc-appt-hero">
  <div class="port">
    <div class="sc-hero-eyebrow" style="margin:0 auto 16px;width:fit-content;">📸 Gallery</div>
    <h1>Before &amp; After Transformations</h1>
    <p>Real results from real patients. See what's possible at SmileCare Dental.</p>
  </div>
</div>

<section class="sc-section sc-bg-soft" style="padding:72px 0;">
<div class="port">

  <!-- Stats -->
  <div style="display:flex;flex-wrap:wrap;gap:16px;justify-content:center;margin-bottom:48px;">
    <?php foreach(array(array('5,000+','Smile Transformations'),array('99%','Patient Satisfaction'),array('4.9★','Average Rating'),array('15+','Years of Excellence')) as $s):?>
    <div style="text-align:center;background:var(--white);border:1px solid var(--border);border-radius:var(--rad);padding:18px 28px;box-shadow:0 2px 10px rgba(0,0,0,.05);">
      <div style="font-size:28px;font-weight:900;color:var(--dp);"><?php echo esc_html($s[0]);?></div>
      <div style="font-size:11px;color:var(--muted);font-weight:600;text-transform:uppercase;letter-spacing:.08em;"><?php echo esc_html($s[1]);?></div>
    </div>
    <?php endforeach;?>
  </div>

  <!-- Filter -->
  <div class="sc-gallery-filter" id="scGalleryFilter">
    <button class="sc-filter-btn sc-active" data-filter="all">All Cases</button>
    <button class="sc-filter-btn" data-filter="whitening">Whitening</button>
    <button class="sc-filter-btn" data-filter="veneers">Veneers</button>
    <button class="sc-filter-btn" data-filter="implants">Implants</button>
    <button class="sc-filter-btn" data-filter="ortho">Orthodontics</button>
    <button class="sc-filter-btn" data-filter="cosmetic">Full Makeover</button>
  </div>

  <!-- Grid -->
  <div class="sc-gallery-grid" id="scGalleryGrid">
    <?php
    $items = array(
      array('whitening','Yellow/Stained Enamel','Professional Whitening','8 Shades Whiter','Jennifer, 34','😬','😁'),
      array('veneers','Chipped Front Teeth','Porcelain Veneers','Perfect Symmetry','Marcus, 29','😟','😊'),
      array('implants','Missing Molar','Dental Implant','Permanent Fix','Patricia, 52','😶','😃'),
      array('ortho','Crowded Teeth','Invisalign 14 months','Straight &amp; Aligned','Tyler, 22','😬','😄'),
      array('cosmetic','Worn, Discoloured','Full Smile Makeover','Complete Rebuild','Sandra, 47','😔','🌟'),
      array('whitening','Coffee &amp; Tea Stains','Zoom Whitening','6 Shades Brighter','Robert, 41','😕','😁'),
      array('veneers','Gaps &amp; Spaces','Composite Veneers','Gap Closed','Emma, 27','😬','😊'),
      array('implants','Multiple Missing Teeth','All-on-4 Implants','Full Arch Restored','George, 63','😞','😃'),
      array('ortho','Overbite Issue','Traditional Braces','Perfect Bite','Kayla, 16','😟','😄'),
      array('cosmetic','Uneven Gumline','Gum Reshaping + Veneers','Frame Perfected','Laura, 38','😕','✨'),
      array('whitening','Tetracycline Staining','Advanced Whitening','Dramatically Brighter','David, 45','😬','😁'),
      array('veneers','Short, Worn Teeth','Full Porcelain Veneers','Lengthened &amp; Bright','Nina, 33','😔','🌟'),
    );
    $cats = array('whitening'=>'Whitening','veneers'=>'Veneers','implants'=>'Implants','ortho'=>'Orthodontics','cosmetic'=>'Full Makeover');
    foreach($items as $i):?>
    <div class="sc-gallery-item" data-category="<?php echo esc_attr($i[0]);?>">
      <div style="width:100%;height:100%;display:flex;background:linear-gradient(135deg,var(--bg-lt),var(--border));position:relative;">
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:10px;background:rgba(255,255,255,.6);">
          <div style="font-size:36px;margin-bottom:4px;"><?php echo $i[5];?></div>
          <div style="font-size:9px;font-weight:700;color:var(--muted);text-transform:uppercase;">Before</div>
          <div style="font-size:10px;color:var(--dark);font-weight:600;text-align:center;margin-top:3px;"><?php echo $i[1];?></div>
        </div>
        <div style="width:2px;background:var(--dp);opacity:.3;"></div>
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:10px;background:rgba(0,119,182,.06);">
          <div style="font-size:36px;margin-bottom:4px;"><?php echo $i[6];?></div>
          <div style="font-size:9px;font-weight:700;color:var(--dp);text-transform:uppercase;">After</div>
          <div style="font-size:10px;color:var(--dark);font-weight:600;text-align:center;margin-top:3px;"><?php echo $i[2];?></div>
        </div>
        <div class="sc-ba-tag"><?php echo esc_html($cats[$i[0]]??$i[0]);?></div>
      </div>
      <div class="sc-gallery-overlay">
        <div><div class="sc-gallery-caption"><?php echo $i[4];?></div><div style="font-size:11px;color:rgba(255,255,255,.7);"><?php echo $i[3];?></div></div>
        <span class="sc-gallery-tag">View</span>
      </div>
    </div>
    <?php endforeach;?>
  </div>

  <!-- CTA -->
  <div style="text-align:center;margin-top:52px;padding:40px;background:var(--white);border-radius:var(--rad);border:1px solid var(--border);">
    <div class="sc-section-label" style="justify-content:center;margin-bottom:10px;">Start Your Journey</div>
    <h3 style="font-size:28px;font-weight:900;color:var(--dark);margin-bottom:10px;">Your Transformation Awaits</h3>
    <p style="color:var(--muted);font-size:15px;max-width:440px;margin:0 auto 20px;">Schedule a complimentary smile assessment and let our experts design your personalised treatment plan.</p>
    <a class="btBtn btSolidButton sc-btn-gold" href="<?php echo esc_url($appt_url);?>">📅 &nbsp;Book Free Smile Assessment</a>
  </div>

</div>
</section>

<script>
document.addEventListener('DOMContentLoaded',function(){
  var btns=document.querySelectorAll('#scGalleryFilter .sc-filter-btn');
  var items=document.querySelectorAll('#scGalleryGrid .sc-gallery-item');
  btns.forEach(function(btn){
    btn.addEventListener('click',function(){
      btns.forEach(function(b){b.classList.remove('sc-active');});
      btn.classList.add('sc-active');
      var f=btn.getAttribute('data-filter');
      items.forEach(function(item){
        item.style.transition='opacity .3s ease, transform .3s ease';
        if(f==='all'||item.getAttribute('data-category')===f){
          item.style.display='';
          setTimeout(function(){item.style.opacity='1';item.style.transform='';},10);
        } else {
          item.style.opacity='0';item.style.transform='scale(.9)';
          setTimeout(function(){item.style.display='none';},300);
        }
      });
    });
  });
});
</script>

<?php get_footer(); ?>
