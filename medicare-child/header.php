<?php
/**
 * SmileCare Dental — header.php
 * Overrides the parent theme header for full dental branding.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$clinic_name = get_theme_mod( 'smilecare_clinic_name', 'SmileCare Dental' );
$tagline     = get_theme_mod( 'smilecare_tagline',     'Your Smile, Our Passion' );
$phone       = get_theme_mod( 'smilecare_phone',       '(555) 123-4567' );
$email       = get_theme_mod( 'smilecare_email',       'hello@smilecaredental.com' );
$appt_url    = smilecare_appointment_url();
$is_dental   = smilecare_is_dental_template();
$is_open     = smilecare_is_open_now();

// Social links
$social = array(
	'facebook'  => get_theme_mod( 'smilecare_facebook',  '#' ),
	'instagram' => get_theme_mod( 'smilecare_instagram', '#' ),
	'twitter'   => get_theme_mod( 'smilecare_twitter',   '#' ),
);
?>

<div id="btWrapper" class="btWrapper">

  <!-- ╔══════════════════════════════════╗
       ║  TOP INFO BAR                   ║
       ╚══════════════════════════════════╝ -->
  <div class="sc-top-bar">
    <div class="port">
      <div class="sc-top-bar-left">
        <div class="sc-top-bar-item">
          <span class="sc-ico sc-ico-phone" aria-hidden="true"></span>
          <a href="<?php echo esc_attr( smilecare_phone_link( $phone ) ); ?>">
            <?php echo esc_html( $phone ); ?>
          </a>
        </div>
        <div class="sc-top-bar-item">
          <span class="sc-ico sc-ico-mail" aria-hidden="true"></span>
          <a href="mailto:<?php echo esc_attr( $email ); ?>">
            <?php echo esc_html( $email ); ?>
          </a>
        </div>
        <div>
          <?php if ( $is_open ) : ?>
            <span class="sc-open-badge"><span class="sc-open-dot"></span>Open Now</span>
          <?php else : ?>
            <span class="sc-closed-badge"><span class="sc-closed-dot"></span>Closed</span>
          <?php endif; ?>
        </div>
      </div>
      <div class="sc-top-bar-right">
        <div class="sc-social-links">
          <?php if ( $social['facebook']  && $social['facebook']  !== '#' ) : ?>
            <a href="<?php echo esc_url( $social['facebook'] ); ?>" target="_blank" rel="noopener" class="sc-ico sc-ico-fb" aria-label="Facebook">Facebook</a>
          <?php endif; ?>
          <?php if ( $social['instagram'] && $social['instagram'] !== '#' ) : ?>
            <a href="<?php echo esc_url( $social['instagram'] ); ?>" target="_blank" rel="noopener" class="sc-ico sc-ico-ig" aria-label="Instagram">Instagram</a>
          <?php endif; ?>
          <?php if ( $social['twitter']   && $social['twitter']   !== '#' ) : ?>
            <a href="<?php echo esc_url( $social['twitter'] ); ?>"   target="_blank" rel="noopener" class="sc-ico sc-ico-tw" aria-label="Twitter">Twitter</a>
          <?php endif; ?>
        </div>
        <a href="<?php echo esc_url( $appt_url ); ?>" class="sc-header-appt-btn">
          <span class="sc-ico sc-ico-fa-cal" aria-hidden="true"></span>
          Book Appointment
        </a>
      </div>
    </div>
  </div>

  <!-- ╔══════════════════════════════════╗
       ║  MAIN HEADER                    ║
       ╚══════════════════════════════════╝ -->
  <header class="mainHeader btLightSkin" id="mainHeader" role="banner">
    <div class="port">
      <div style="display:flex;align-items:center;justify-content:space-between;padding:14px 0;gap:20px;">

        <!-- Logo -->
        <div class="logoHolder" style="flex-shrink:0;">
          <?php if ( has_custom_logo() ) : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="display:inline-block;">
              <?php the_custom_logo(); ?>
            </a>
          <?php else : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="sc-logo-wrap">
              <div class="sc-logo-icon" aria-hidden="true"><span class="sc-ico sc-ico-tooth"></span></div>
              <div class="sc-logo-text">
                <span class="sc-logo-name"><?php echo esc_html( $clinic_name ); ?></span>
                <span class="sc-logo-tag"><?php echo esc_html( $tagline ); ?></span>
              </div>
            </a>
          <?php endif; ?>
        </div>

        <!-- Navigation -->
        <nav class="menuHolder" style="flex:1;display:flex;justify-content:flex-end;align-items:center;gap:16px;" role="navigation" aria-label="Primary">
          <div class="menuPort">
            <?php if ( has_nav_menu( 'dental-primary' ) ) : ?>
              <?php wp_nav_menu( array(
                'theme_location' => 'dental-primary',
                'container'      => false,
                'menu_class'     => 'smilecare-nav',
                'fallback_cb'    => false,
              ) ); ?>
            <?php elseif ( has_nav_menu( 'primary' ) ) : ?>
              <?php wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'smilecare-nav',
                'fallback_cb'    => false,
              ) ); ?>
            <?php else : ?>
              <!-- Auto-generated fallback navigation -->
              <ul class="smilecare-nav" style="list-style:none;display:flex;gap:0;margin:0;padding:0;flex-wrap:wrap;">
                <?php
                $nav_pages = array(
                  'Home'                 => home_url( '/' ),
                  'Services'             => smilecare_nav_url( 'services' ),
                  'Meet the Team'        => smilecare_nav_url( 'team' ),
                  'Before &amp; After'   => smilecare_nav_url( 'gallery' ),
                  'Blog'                 => get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ),
                  'Contact'              => smilecare_nav_url( 'contact' ),
                );
                foreach ( $nav_pages as $label => $url ) :
                  if ( ! $url ) continue;
                  $current = ( untrailingslashit( home_url( $_SERVER['REQUEST_URI'] ?? '/' ) ) === untrailingslashit( $url ) ) ? ' class="current-menu-item"' : '';
                ?>
                <li<?php echo $current; ?>>
                  <a href="<?php echo esc_url( $url ); ?>"><?php echo $label; ?></a>
                </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>

          <!-- Desktop appointment button (hidden on mobile via CSS) -->
          <a href="<?php echo esc_url( $appt_url ); ?>" class="sc-header-appt-btn" style="white-space:nowrap;">
            <span class="sc-ico sc-ico-fa-cal" aria-hidden="true"></span>
            Book Now
          </a>

          <!-- Mobile hamburger trigger (rendered by parent theme JS) -->
          <a href="#" class="btHorizontalMenuTrigger" aria-label="Menu">
            <span class="btIco btIcoSmallSize btIcoDefaultColor btIcoDefaultType">
              <span class="btIcoHolder" aria-hidden="true"></span>
            </span>
          </a>
        </nav>

      </div>
    </div>
  </header><!-- /mainHeader -->

  <!-- Mobile nav panel (parent theme handles open/close via JS) -->
  <div class="btMobileMenu" style="display:none;">
    <div class="port">
      <?php wp_nav_menu( array(
        'theme_location' => 'dental-primary',
        'container'      => 'nav',
        'container_class'=> 'btMobileMenuInner',
        'menu_class'     => '',
        'fallback_cb'    => false,
      ) ); ?>
    </div>
  </div>

  <!-- ╔══════════════════════════════════════════════╗
       ║  CONTENT WRAPPER                            ║
       ║  For dental full-width templates: no inner  ║
       ║  btContentHolder / btContent wrappers.      ║
       ╚══════════════════════════════════════════════╝ -->
  <div class="btContentWrap btClear">

    <?php if ( ! $is_dental ) : ?>
      <?php
      // Page headline (breadcrumb + title) for non-dental pages
      if ( function_exists( 'boldthemes_header_headline' ) ) {
        boldthemes_header_headline();
      }
      ?>
      <div class="btContentHolder">
        <div class="btContent">
    <?php endif; ?>
