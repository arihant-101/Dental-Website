<?php
/**
 * SmileCare Dental — 404 Page
 */
get_header();
$appt_url = smilecare_appointment_url();
?>

<section class="boldSection sc-bg-light btDoubleTopSpaced btDoubleBottomSpaced">
  <div class="port">
    <div class="sc-404">
      <div class="sc-404-code">404</div>
      <div style="font-size:60px;margin:16px 0;">🦷</div>
      <div class="sc-404-msg">Oops! This page has wandered off…</div>
      <div class="sc-404-sub">The page you're looking for doesn't exist. Maybe it moved, or perhaps the URL has a typo.</div>
      <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
        <a class="btBtn btSolidButton" href="<?php echo esc_url( home_url( '/' ) ); ?>">
          🏠 &nbsp;Go to Homepage
        </a>
        <a class="btBtn btHollowButton" href="<?php echo esc_url( $appt_url ); ?>">
          📅 &nbsp;Book Appointment
        </a>
      </div>
      <div style="margin-top:40px;padding-top:32px;border-top:1px solid var(--border);">
        <div style="font-size:14px;color:var(--muted);margin-bottom:16px;">Or explore these pages:</div>
        <div style="display:flex;gap:10px;justify-content:center;flex-wrap:wrap;">
          <?php
          $links = array(
            'Services'    => smilecare_nav_url( 'services' ),
            'Our Team'    => smilecare_nav_url( 'team' ),
            'Gallery'     => smilecare_nav_url( 'gallery' ),
            'Contact Us'  => smilecare_nav_url( 'contact' ),
          );
          foreach ( $links as $label => $url ) :
          ?>
          <a href="<?php echo esc_url( $url ); ?>" style="background:var(--white);border:1px solid var(--border);border-radius:var(--rad-sm);padding:8px 18px;font-size:13px;font-weight:700;color:var(--dp);text-decoration:none;">
            <?php echo esc_html( $label ); ?>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
