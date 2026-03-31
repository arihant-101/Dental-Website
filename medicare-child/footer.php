<?php
/**
 * SmileCare Dental — footer.php
 */
$is_dental    = smilecare_is_dental_template();
$clinic_name  = get_theme_mod( 'smilecare_clinic_name', 'SmileCare Dental' );
$tagline      = get_theme_mod( 'smilecare_tagline',     'Your Smile, Our Passion' );
$phone        = get_theme_mod( 'smilecare_phone',       '(555) 123-4567' );
$email        = get_theme_mod( 'smilecare_email',       'hello@smilecaredental.com' );
$address      = get_theme_mod( 'smilecare_address',     '123 Smile Avenue, Suite 200, New York, NY 10001' );
$emergency    = get_theme_mod( 'smilecare_emergency',   '(555) 999-0000' );
$appt_url     = smilecare_appointment_url();

// Social
$social = array(
	'facebook'  => get_theme_mod( 'smilecare_facebook',  '#' ),
	'instagram' => get_theme_mod( 'smilecare_instagram', '#' ),
	'twitter'   => get_theme_mod( 'smilecare_twitter',   '#' ),
	'youtube'   => get_theme_mod( 'smilecare_youtube',   '#' ),
);
?>

    <?php if ( ! $is_dental ) : ?>
        </div><!-- /btContent -->
        <?php
        // Sidebar for non-dental pages (blog posts, regular pages)
        if ( class_exists( 'MedicareTheme' ) && MedicareTheme::$boldthemes_has_sidebar ) {
          echo '<aside class="btSidebar" role="complementary">';
          dynamic_sidebar( 'primary_widget_area' );
          echo '</aside>';
        }
        ?>
      </div><!-- /btContentHolder -->
    <?php endif; ?>

  </div><!-- /btContentWrap -->

  <!-- ╔══════════════════════════════════╗
       ║  DENTAL FOOTER                  ║
       ╚══════════════════════════════════╝ -->
  <footer class="sc-footer" role="contentinfo">
    <div class="port">
      <div class="boldRow" style="gap:40px;">

        <!-- Col 1: Brand & About -->
        <div class="rowItem col-lg-4 col-md-6 col-sm-12">
          <div class="sc-footer-logo">
            <div class="sc-footer-logo-icon" aria-hidden="true"><span class="sc-ico sc-ico-tooth"></span></div>
            <div>
              <div class="sc-footer-logo-name"><?php echo esc_html( $clinic_name ); ?></div>
              <div class="sc-footer-logo-tag"><?php echo esc_html( $tagline ); ?></div>
            </div>
          </div>
          <p>Providing exceptional dental care for the whole family since 2009. Our mission is to help every patient achieve and maintain a healthy, beautiful smile.</p>

          <div style="display:flex;gap:14px;margin-top:16px;flex-wrap:wrap;">
            <?php
            $trust = array(
              array( 'sc-ico-fa-award', 'Best Dentist 2023' ),
              array( 'sc-ico-fa-star',  '4.9 Google Rating' ),
            );
            foreach ( $trust as $t ) :
            ?>
            <div style="display:flex;align-items:center;gap:6px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);border-radius:var(--rad-sm);padding:6px 12px;font-size:12px;color:rgba(255,255,255,.7);">
              <span class="sc-ico <?php echo esc_attr($t[0]); ?>" style="color:var(--gold);font-size:12px;" aria-hidden="true"></span> <?php echo esc_html( $t[1] ); ?>
            </div>
            <?php endforeach; ?>
          </div>

          <div class="sc-footer-social">
            <?php foreach ( $social as $net => $url ) :
              if ( ! $url || $url === '#' ) continue;
              $icons = array( 'facebook' => 'sc-ico-fb', 'instagram' => 'sc-ico-ig', 'twitter' => 'sc-ico-tw', 'youtube' => 'sc-ico-yt' );
            ?>
            <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener" class="sc-ico <?php echo esc_attr( $icons[ $net ] ?? 'sc-ico-fb' ); ?>" aria-label="<?php echo esc_attr( $net ); ?>"><?php echo esc_html( ucfirst($net) ); ?></a>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Col 2: Quick Links -->
        <div class="rowItem col-lg-2 col-md-6 col-sm-6">
          <?php if ( is_active_sidebar( 'dental_footer_2' ) ) : ?>
            <?php dynamic_sidebar( 'dental_footer_2' ); ?>
          <?php else : ?>
          <h4>Quick Links</h4>
          <ul class="sc-footer-links">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
            <li><a href="<?php echo esc_url( smilecare_nav_url( 'services' ) ); ?>">Our Services</a></li>
            <li><a href="<?php echo esc_url( smilecare_nav_url( 'team' ) ); ?>">Meet the Team</a></li>
            <li><a href="<?php echo esc_url( smilecare_nav_url( 'gallery' ) ); ?>">Before &amp; After</a></li>
            <li><a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>">Dental Blog</a></li>
            <li><a href="<?php echo esc_url( smilecare_nav_url( 'contact' ) ); ?>">Contact Us</a></li>
            <li><a href="<?php echo esc_url( $appt_url ); ?>"><span class="sc-ico sc-ico-fa-cal" aria-hidden="true"></span> Book Appointment</a></li>
          </ul>
          <?php endif; ?>
        </div>

        <!-- Col 3: Services -->
        <div class="rowItem col-lg-3 col-md-6 col-sm-6">
          <?php if ( is_active_sidebar( 'dental_footer_3' ) ) : ?>
            <?php dynamic_sidebar( 'dental_footer_3' ); ?>
          <?php else : ?>
          <h4>Our Services</h4>
          <ul class="sc-footer-links">
            <li><a href="<?php echo esc_url( smilecare_nav_url( 'services' ) ); ?>#general">General Dentistry</a></li>
            <li><a href="<?php echo esc_url( smilecare_nav_url( 'services' ) ); ?>#cosmetic">Cosmetic Dentistry</a></li>
            <li><a href="<?php echo esc_url( smilecare_nav_url( 'services' ) ); ?>#implants">Dental Implants</a></li>
            <li><a href="<?php echo esc_url( smilecare_nav_url( 'services' ) ); ?>#ortho">Orthodontics</a></li>
            <li><a href="<?php echo esc_url( smilecare_nav_url( 'services' ) ); ?>#surgery">Oral Surgery</a></li>
            <li><a href="<?php echo esc_url( smilecare_nav_url( 'services' ) ); ?>">Pediatric Dentistry</a></li>
          </ul>
          <?php endif; ?>
        </div>

        <!-- Col 4: Contact & Hours -->
        <div class="rowItem col-lg-3 col-md-6 col-sm-12">
          <?php if ( is_active_sidebar( 'dental_footer_4' ) ) : ?>
            <?php dynamic_sidebar( 'dental_footer_4' ); ?>
          <?php else : ?>
          <h4>Contact & Hours</h4>
          <div class="sc-footer-contact-item">
            <span class="sc-footer-contact-icon sc-ico sc-ico-phone" aria-hidden="true"></span>
            <a href="<?php echo esc_attr( smilecare_phone_link( $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
          </div>
          <div class="sc-footer-contact-item">
            <span class="sc-footer-contact-icon sc-ico sc-ico-mail" aria-hidden="true"></span>
            <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
          </div>
          <div class="sc-footer-contact-item">
            <span class="sc-footer-contact-icon sc-ico sc-ico-map" aria-hidden="true"></span>
            <span style="color:rgba(255,255,255,.65);font-size:13px;"><?php echo esc_html( $address ); ?></span>
          </div>

          <div style="margin-top:16px;font-size:12px;line-height:1.7;color:rgba(255,255,255,.55);">
            <strong style="color:rgba(255,255,255,.7);display:block;margin-bottom:4px;"><span class="sc-ico sc-ico-clock" style="font-size:12px;" aria-hidden="true"></span> Working Hours</strong>
            Mon–Tue: <?php echo esc_html( get_theme_mod( 'smilecare_hours_mon', '9AM–6PM' ) ); ?><br>
            Wednesday: <?php echo esc_html( get_theme_mod( 'smilecare_hours_wed', '9AM–7PM' ) ); ?><br>
            Thu–Fri: <?php echo esc_html( get_theme_mod( 'smilecare_hours_fri', '9AM–5PM' ) ); ?><br>
            Saturday: <?php echo esc_html( get_theme_mod( 'smilecare_hours_sat', '10AM–3PM' ) ); ?><br>
            Sunday: <span style="color:rgba(255,255,255,.35);"><?php echo esc_html( get_theme_mod( 'smilecare_hours_sun', 'Closed' ) ); ?></span>
          </div>

          <!-- Emergency inline CTA -->
          <div style="margin-top:16px;background:rgba(204,34,0,.2);border:1px solid rgba(204,34,0,.3);border-radius:var(--rad-sm);padding:10px 14px;font-size:12px;">
            <span class="sc-ico sc-ico-fa-excl" style="color:var(--gold);" aria-hidden="true"></span> <strong style="color:rgba(255,255,255,.85);">Dental Emergency?</strong><br>
            <a href="<?php echo esc_attr( smilecare_phone_link( $emergency ) ); ?>" style="color:var(--gold);font-weight:700;font-size:14px;">
              <?php echo esc_html( $emergency ); ?>
            </a>
            <span style="color:rgba(255,255,255,.45);"> · 24/7</span>
          </div>
          <?php endif; ?>
        </div>

      </div><!-- .boldRow -->
    </div><!-- .port -->

    <!-- Bottom Bar -->
    <div class="sc-footer-bottom">
      <div class="port" style="width:100%;">
        <div style="display:flex;flex-wrap:wrap;gap:12px;align-items:center;justify-content:space-between;width:100%;">
          <div>
            &copy; <?php echo date( 'Y' ); ?> <?php echo esc_html( $clinic_name ); ?>. All rights reserved.
          </div>
          <div class="sc-footer-bottom-links">
            <?php
            $privacy = get_page_by_path( 'privacy-policy' );
            if ( $privacy ) :
            ?>
            <a href="<?php echo get_permalink( $privacy->ID ); ?>">Privacy Policy</a>
            <?php endif; ?>
            <a href="<?php echo esc_url( smilecare_nav_url( 'contact' ) ); ?>">Accessibility</a>
            <a href="<?php echo esc_url( smilecare_nav_url( 'contact' ) ); ?>">Terms of Service</a>
          </div>
          <div style="font-size:11px;color:rgba(255,255,255,.3);">
            Designed for SmileCare Dental
          </div>
        </div>
      </div>
    </div>

  </footer>

</div><!-- /btWrapper -->

<?php wp_footer(); ?>
</body>
</html>
