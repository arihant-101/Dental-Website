<?php
/**
 * SmileCare Dental — Child Theme functions.php
 * Full rebuild using parent theme hooks, proper class names, and all available assets.
 */

/* ═══════════════════════════════════════════════
   1. INJECT DENTAL COLORS INTO PARENT THEME CSS
   ═══════════════════════════════════════════════ */

/**
 * Override the parent theme's dynamic CSS crush variables so every
 * accent-color rule in the 760-line css-override.php uses our dental blue.
 */
add_filter( 'boldthemes_crush_vars', function( $vars ) {
	$vars['accentColor']     = '#0077B6';
	$vars['alterColor']      = '#E8A838';
	$vars['headingFont']     = 'Montserrat,Arial,sans-serif';
	$vars['menuFont']        = 'Montserrat,Arial,sans-serif';
	$vars['bodyFont']        = 'Montserrat,Arial,sans-serif';
	return $vars;
}, 999 );

/* ═══════════════════════════════════════════════
   2. THEME SETUP
   ═══════════════════════════════════════════════ */

add_action( 'after_setup_theme', 'smilecare_setup' );
function smilecare_setup() {
	// Load the parent stylesheet
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	// Custom image sizes for dental site
	add_image_size( 'dental_hero',    1920, 800, true );
	add_image_size( 'dental_service',  600, 450, true );
	add_image_size( 'dental_team',     480, 580, true );
	add_image_size( 'dental_thumb',    400, 300, true );

	// Register navigation menus
	register_nav_menus( array(
		'dental-primary' => __( 'Dental Primary Menu', 'medicare-child' ),
		'dental-footer'  => __( 'Dental Footer Menu', 'medicare-child' ),
	) );

	load_child_theme_textdomain( 'medicare-child', get_stylesheet_directory() . '/languages' );
}

/* ═══════════════════════════════════════════════
   3. ENQUEUE STYLES & SCRIPTS
   ═══════════════════════════════════════════════ */

add_action( 'wp_enqueue_scripts', 'smilecare_enqueue', 20 );
function smilecare_enqueue() {
	// Child theme stylesheet (loads AFTER parent via style.css header dependency)
	wp_enqueue_style(
		'medicare-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'medicare-style' ),
		wp_get_theme()->get( 'Version' )
	);

	// Dental JavaScript
	wp_enqueue_script(
		'dental-js',
		get_stylesheet_directory_uri() . '/js/dental.js',
		array( 'jquery', 'boldthemes-slick' ),
		wp_get_theme()->get( 'Version' ),
		true
	);

	// Localize script with site data
	$clinic_name  = get_theme_mod( 'smilecare_clinic_name', 'SmileCare Dental' );
	$phone        = get_theme_mod( 'smilecare_phone', '(555) 123-4567' );
	$appt_page_id = (int) get_theme_mod( 'smilecare_appointment_page', 0 );
	$appt_url     = $appt_page_id ? get_permalink( $appt_page_id ) : home_url( '/appointment/' );

	wp_localize_script( 'dental-js', 'SmileCare', array(
		'ajaxurl'     => admin_url( 'admin-ajax.php' ),
		'nonce'       => wp_create_nonce( 'smilecare_nonce' ),
		'apptUrl'     => esc_url( $appt_url ),
		'clinicName'  => esc_html( $clinic_name ),
		'phone'       => esc_html( $phone ),
		'homeUrl'     => home_url( '/' ),
		'isOpen'      => smilecare_is_open_now() ? '1' : '0',
	) );
}

/* ═══════════════════════════════════════════════
   4. SET PARENT THEME OPTIONS (colours, sidebar, sticky)
   ═══════════════════════════════════════════════ */

add_action( 'admin_init', 'smilecare_set_parent_options', 5 );
function smilecare_set_parent_options() {
	if ( get_option( 'smilecare_parent_options_v3', false ) ) {
		return;
	}
	$option_key  = 'medicare_theme_options';
	$current     = get_option( $option_key, array() );
	$dental_opts = array(
		'accent_color'       => '#0077B6',
		'alter_color'        => '#E8A838',
		'sticky_header'      => 'true',
		'buttons_shape'      => 'round',
		'sidebar'            => 'no_sidebar',
		'footer_dark_skin'   => 'true',
		'disable_preloader'  => 'false',
		'preloader_text'     => 'SmileCare',
		'menu_type'          => 'hRight',
		'boxed_menu'         => 'true',
		'capitalize_main_menu' => 'true',
	);
	update_option( $option_key, array_merge( $current, $dental_opts ) );
	// Also persist via theme_mod so Customizer reads them
	foreach ( $dental_opts as $k => $v ) {
		set_theme_mod( $k, $v );
	}
	update_option( 'smilecare_parent_options_v3', true );
}

/* ═══════════════════════════════════════════════
   5. FORCE NO SIDEBAR ON DENTAL TEMPLATES
   ═══════════════════════════════════════════════ */

add_action( 'wp', 'smilecare_force_fullwidth', 1 );
function smilecare_force_fullwidth() {
	if ( ! smilecare_is_dental_template() ) {
		return;
	}
	// Set the parent theme's sidebar static flag to false
	if ( class_exists( 'MedicareTheme' ) ) {
		MedicareTheme::$boldthemes_has_sidebar = false;
	}
	// Also override through page options array
	global $boldthemes_page_options;
	$boldthemes_page_options['sidebar'] = 'no_sidebar';
}

/* ═══════════════════════════════════════════════
   6. HELPER: IS THIS A DENTAL FULL-WIDTH PAGE?
   ═══════════════════════════════════════════════ */

function smilecare_is_dental_template() {
	// Front page is always full-width dental
	if ( is_front_page() ) {
		return true;
	}
	// Check the page template slug stored in post meta
	$tpl = get_page_template_slug();
	if ( $tpl && false !== strpos( $tpl, 'dental-' ) ) {
		return true;
	}
	// Fallback: detect by page slug
	$dental_slugs = array(
		'services', 'our-services',
		'appointment', 'book-appointment', 'book',
		'team', 'meet-the-team', 'our-team',
		'gallery', 'before-after-gallery', 'before-after',
		'contact', 'contact-us',
	);
	if ( is_page( $dental_slugs ) ) {
		return true;
	}
	return false;
}

/* ═══════════════════════════════════════════════
   7. WIDGET AREAS
   ═══════════════════════════════════════════════ */

add_action( 'widgets_init', 'smilecare_register_sidebars' );
function smilecare_register_sidebars() {
	$shared = array(
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widgetTitle">',
		'after_title'   => '</h4>',
	);

	register_sidebar( array_merge( $shared, array(
		'name' => 'Dental Footer — Col 1',
		'id'   => 'dental_footer_1',
	) ) );
	register_sidebar( array_merge( $shared, array(
		'name' => 'Dental Footer — Col 2',
		'id'   => 'dental_footer_2',
	) ) );
	register_sidebar( array_merge( $shared, array(
		'name' => 'Dental Footer — Col 3',
		'id'   => 'dental_footer_3',
	) ) );
	register_sidebar( array_merge( $shared, array(
		'name' => 'Dental Footer — Col 4',
		'id'   => 'dental_footer_4',
	) ) );
	register_sidebar( array_merge( $shared, array(
		'name' => 'Dental Blog Sidebar',
		'id'   => 'dental_blog_sidebar',
	) ) );
}

/* ═══════════════════════════════════════════════
   8. CUSTOMIZER — DENTAL SETTINGS
   ═══════════════════════════════════════════════ */

add_action( 'customize_register', 'smilecare_customizer' );
function smilecare_customizer( $wp_customize ) {

	$wp_customize->add_panel( 'smilecare_panel', array(
		'title'    => '🦷 SmileCare Dental',
		'priority' => 30,
	) );

	/* — Clinic Identity — */
	$wp_customize->add_section( 'smilecare_identity', array(
		'title' => 'Clinic Identity',
		'panel' => 'smilecare_panel',
	) );
	$fields = array(
		'smilecare_clinic_name' => array( 'label' => 'Clinic Name',   'default' => 'SmileCare Dental' ),
		'smilecare_tagline'     => array( 'label' => 'Tagline',        'default' => 'Your Smile, Our Passion' ),
		'smilecare_phone'       => array( 'label' => 'Phone',          'default' => '(555) 123-4567' ),
		'smilecare_emergency'   => array( 'label' => 'Emergency Line', 'default' => '(555) 999-0000' ),
		'smilecare_email'       => array( 'label' => 'Email',          'default' => 'hello@smilecaredental.com' ),
		'smilecare_address'     => array( 'label' => 'Address',        'default' => '123 Smile Avenue, Suite 200, New York, NY 10001' ),
	);
	foreach ( $fields as $id => $args ) {
		$wp_customize->add_setting( $id, array( 'default' => $args['default'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( $id, array( 'label' => $args['label'], 'section' => 'smilecare_identity', 'type' => 'text' ) );
	}

	/* — Working Hours — */
	$wp_customize->add_section( 'smilecare_hours', array(
		'title' => 'Working Hours',
		'panel' => 'smilecare_panel',
	) );
	$days = array(
		'smilecare_hours_mon' => array( 'Mon – Tue', '9:00 AM – 6:00 PM' ),
		'smilecare_hours_wed' => array( 'Wednesday',  '9:00 AM – 7:00 PM' ),
		'smilecare_hours_fri' => array( 'Thu – Fri',  '9:00 AM – 5:00 PM' ),
		'smilecare_hours_sat' => array( 'Saturday',   '10:00 AM – 3:00 PM' ),
		'smilecare_hours_sun' => array( 'Sunday',     'Closed' ),
	);
	foreach ( $days as $id => $d ) {
		$wp_customize->add_setting( $id, array( 'default' => $d[1], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( $id, array( 'label' => $d[0], 'section' => 'smilecare_hours', 'type' => 'text' ) );
	}

	/* — Appointment — */
	$wp_customize->add_section( 'smilecare_appt', array(
		'title' => 'Appointment',
		'panel' => 'smilecare_panel',
	) );
	$wp_customize->add_setting( 'smilecare_appointment_page', array( 'default' => 0, 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_control( 'smilecare_appointment_page', array(
		'label'   => 'Appointment Page',
		'section' => 'smilecare_appt',
		'type'    => 'dropdown-pages',
	) );

	/* — Social — */
	$wp_customize->add_section( 'smilecare_social', array(
		'title' => 'Social Media',
		'panel' => 'smilecare_panel',
	) );
	foreach ( array( 'facebook', 'instagram', 'twitter', 'youtube' ) as $net ) {
		$wp_customize->add_setting( 'smilecare_' . $net, array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( 'smilecare_' . $net, array( 'label' => ucfirst( $net ) . ' URL', 'section' => 'smilecare_social', 'type' => 'url' ) );
	}
}

/* ═══════════════════════════════════════════════
   9. HELPER FUNCTIONS
   ═══════════════════════════════════════════════ */

/** Build the appointment button URL robustly. */
function smilecare_appointment_url() {
	$page_id = (int) get_theme_mod( 'smilecare_appointment_page', 0 );
	if ( $page_id ) {
		$url = get_permalink( $page_id );
		if ( $url ) return $url;
	}
	foreach ( array( 'appointment', 'book-appointment', 'book', 'contact' ) as $slug ) {
		$p = get_page_by_path( $slug );
		if ( $p ) return get_permalink( $p->ID );
	}
	return home_url( '/appointment/' );
}

/** Format a phone number as a tel: link. */
function smilecare_phone_link( $phone ) {
	return 'tel:' . preg_replace( '/[^0-9+]/', '', $phone );
}

/** Get nav URL for a page slug. */
function smilecare_nav_url( $slug ) {
	$p = get_page_by_path( $slug );
	return $p ? get_permalink( $p->ID ) : home_url( '/' . $slug . '/' );
}

/** Is the clinic currently open? */
function smilecare_is_open_now() {
	$day  = (int) date_i18n( 'N' ); // 1=Mon … 7=Sun
	$time = (int) date_i18n( 'Hi' ); // e.g. 1430 for 2:30 PM
	$schedule = array(
		1 => array( 900, 1800 ),
		2 => array( 900, 1800 ),
		3 => array( 900, 1900 ),
		4 => array( 900, 1800 ),
		5 => array( 900, 1700 ),
		6 => array( 1000, 1500 ),
		7 => false,
	);
	if ( empty( $schedule[ $day ] ) ) return false;
	return ( $time >= $schedule[ $day ][0] && $time < $schedule[ $day ][1] );
}

/** Emergency bar above the header. */
function smilecare_emergency_bar() {
	$emergency = get_theme_mod( 'smilecare_emergency', '(555) 999-0000' );
	?>
	<div class="sc-emergency-bar btDarkSkin" id="scEmergencyBar">
		<div class="port">
			<span class="sc-emergency-icon">🚨</span>
			<strong>Dental Emergency?</strong>
			Call us 24/7:
			<a href="<?php echo esc_attr( smilecare_phone_link( $emergency ) ); ?>">
				<?php echo esc_html( $emergency ); ?>
			</a>
			<button class="sc-emergency-close" onclick="document.getElementById('scEmergencyBar').style.display='none'" aria-label="Close">✕</button>
		</div>
	</div>
	<?php
}
add_action( 'wp_body_open', 'smilecare_emergency_bar' );

/* ═══════════════════════════════════════════════
   10. SHORTCODES
   ═══════════════════════════════════════════════ */

/** [dental_hours] — compact opening hours table */
add_shortcode( 'dental_hours', function() {
	$rows = array(
		'Mon – Tue' => get_theme_mod( 'smilecare_hours_mon', '9:00 AM – 6:00 PM' ),
		'Wednesday' => get_theme_mod( 'smilecare_hours_wed', '9:00 AM – 7:00 PM' ),
		'Thu – Fri'  => get_theme_mod( 'smilecare_hours_fri', '9:00 AM – 5:00 PM' ),
		'Saturday'  => get_theme_mod( 'smilecare_hours_sat', '10:00 AM – 3:00 PM' ),
		'Sunday'    => get_theme_mod( 'smilecare_hours_sun', 'Closed' ),
	);
	ob_start();
	echo '<div class="sc-hours-widget">';
	foreach ( $rows as $day => $time ) {
		$closed = ( strtolower( trim( $time ) ) === 'closed' );
		echo '<div class="sc-hours-row' . ( $closed ? ' sc-closed' : '' ) . '">';
		echo '<span class="sc-hours-day">' . esc_html( $day ) . '</span>';
		echo '<span class="sc-hours-time">' . esc_html( $time ) . '</span>';
		echo '</div>';
	}
	echo '</div>';
	return ob_get_clean();
} );

/** [dental_cta text="..." url="..." style="primary|gold"] */
add_shortcode( 'dental_cta', function( $atts ) {
	$a = shortcode_atts( array(
		'text'  => 'Book Appointment',
		'url'   => smilecare_appointment_url(),
		'style' => 'primary',
	), $atts );
	$class = ( $a['style'] === 'gold' ) ? 'btBtn btSolidButton sc-btn-gold' : 'btBtn btSolidButton sc-btn-primary';
	return '<a class="' . esc_attr( $class ) . '" href="' . esc_url( $a['url'] ) . '">' . esc_html( $a['text'] ) . '</a>';
} );

/* ═══════════════════════════════════════════════
   11. PAGE TEMPLATES REGISTRATION
   ═══════════════════════════════════════════════ */

add_filter( 'theme_page_templates', function( $templates ) {
	return array_merge( $templates, array(
		'templates/dental-home.php'        => 'Dental: Home',
		'templates/dental-services.php'    => 'Dental: Services',
		'templates/dental-appointment.php' => 'Dental: Appointment',
		'templates/dental-team.php'        => 'Dental: Meet the Team',
		'templates/dental-contact.php'     => 'Dental: Contact',
		'templates/dental-gallery.php'     => 'Dental: Gallery',
	) );
} );

/* ═══════════════════════════════════════════════
   12. BODY CLASSES
   ═══════════════════════════════════════════════ */

add_filter( 'body_class', function( $classes ) {
	$classes[] = 'smilecare-dental';
	if ( smilecare_is_dental_template() ) {
		$classes[] = 'sc-fullwidth-page';
		$classes[] = 'btNoSidebar';
	}
	return $classes;
} );

/* ═══════════════════════════════════════════════
   13. SCHEMA.ORG — DENTIST OFFICE
   ═══════════════════════════════════════════════ */

add_action( 'wp_head', 'smilecare_schema', 99 );
function smilecare_schema() {
	if ( ! is_front_page() ) return;
	$name    = get_theme_mod( 'smilecare_clinic_name', 'SmileCare Dental' );
	$phone   = get_theme_mod( 'smilecare_phone', '(555) 123-4567' );
	$address = get_theme_mod( 'smilecare_address', '123 Smile Avenue, Suite 200, New York, NY 10001' );
	$email   = get_theme_mod( 'smilecare_email', 'hello@smilecaredental.com' );
	$schema  = array(
		'@context' => 'https://schema.org',
		'@type'    => 'Dentist',
		'name'     => $name,
		'url'      => home_url( '/' ),
		'telephone'=> $phone,
		'email'    => $email,
		'address'  => array( '@type' => 'PostalAddress', 'streetAddress' => $address ),
		'openingHours' => array( 'Mo-Tu 09:00-18:00', 'We 09:00-19:00', 'Th-Fr 09:00-17:00', 'Sa 10:00-15:00' ),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}

/* ═══════════════════════════════════════════════
   14. AUTO SETUP — CREATE PAGES & SET OPTIONS
   ═══════════════════════════════════════════════ */

add_action( 'after_switch_theme', 'smilecare_auto_setup', 5 );
add_action( 'admin_init',         'smilecare_auto_setup', 25 );

function smilecare_auto_setup() {
	if ( get_option( 'smilecare_setup_v3', false ) ) {
		return;
	}

	// 1. Set pretty permalinks
	global $wp_rewrite;
	update_option( 'permalink_structure', '/%postname%/' );
	if ( $wp_rewrite ) {
		$wp_rewrite->set_permalink_structure( '/%postname%/' );
		$wp_rewrite->flush_rules( true );
	}

	// 2. Pages to create
	$pages = array(
		array(
			'title'    => 'Home',
			'slug'     => 'home',
			'template' => '',
			'content'  => '',
		),
		array(
			'title'    => 'Our Services',
			'slug'     => 'services',
			'template' => 'templates/dental-services.php',
			'content'  => '<!-- Dental Services -->',
		),
		array(
			'title'    => 'Book Appointment',
			'slug'     => 'appointment',
			'template' => 'templates/dental-appointment.php',
			'content'  => '<!-- Dental Appointment -->',
		),
		array(
			'title'    => 'Meet the Team',
			'slug'     => 'team',
			'template' => 'templates/dental-team.php',
			'content'  => '<!-- Dental Team -->',
		),
		array(
			'title'    => 'Before & After Gallery',
			'slug'     => 'gallery',
			'template' => 'templates/dental-gallery.php',
			'content'  => '<!-- Dental Gallery -->',
		),
		array(
			'title'    => 'Contact Us',
			'slug'     => 'contact',
			'template' => 'templates/dental-contact.php',
			'content'  => '<!-- Dental Contact -->',
		),
		array(
			'title'    => 'Dental Blog',
			'slug'     => 'blog',
			'template' => '',
			'content'  => '',
		),
		array(
			'title'    => 'Privacy Policy',
			'slug'     => 'privacy-policy',
			'template' => '',
			'content'  => 'This privacy policy explains how we handle your data.',
		),
	);

	$home_id = 0;
	$blog_id = 0;
	$appt_id = 0;

	foreach ( $pages as $p ) {
		$existing = get_page_by_path( $p['slug'] );
		if ( $existing ) {
			$page_id = $existing->ID;
		} else {
			$page_id = wp_insert_post( array(
				'post_title'   => $p['title'],
				'post_name'    => $p['slug'],
				'post_content' => $p['content'],
				'post_status'  => 'publish',
				'post_type'    => 'page',
			) );
		}
		if ( is_wp_error( $page_id ) || ! $page_id ) continue;

		// Apply template
		if ( ! empty( $p['template'] ) ) {
			update_post_meta( $page_id, '_wp_page_template', $p['template'] );
		}
		// Force no sidebar via parent theme meta
		update_post_meta( $page_id, 'medicare_sidebar', 'no_sidebar' );

		if ( $p['slug'] === 'home' )        $home_id = $page_id;
		if ( $p['slug'] === 'blog' )        $blog_id = $page_id;
		if ( $p['slug'] === 'appointment' ) $appt_id = $page_id;
	}

	// 3. Reading settings
	if ( $home_id ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home_id );
	}
	if ( $blog_id ) {
		update_option( 'page_for_posts', $blog_id );
	}
	if ( $appt_id ) {
		set_theme_mod( 'smilecare_appointment_page', $appt_id );
	}

	// 4. Flush rewrite rules
	flush_rewrite_rules( true );

	update_option( 'smilecare_setup_v3', true );
}

/* ═══════════════════════════════════════════════
   15. ADMIN TWEAKS
   ═══════════════════════════════════════════════ */

// Custom admin footer text
add_filter( 'admin_footer_text', function() {
	return '<span>SmileCare Dental — Powered by <a href="https://wordpress.org" target="_blank">WordPress</a></span>';
} );

// Branded login page
add_action( 'login_enqueue_scripts', function() {
	$clinic = get_theme_mod( 'smilecare_clinic_name', 'SmileCare Dental' );
	echo '<style>
		.login h1 a {
			background-image: none !important;
			font-family: Montserrat, sans-serif;
			font-size: 28px;
			font-weight: 900;
			color: #0077B6;
			text-indent: 0;
			width: auto;
			height: auto;
			line-height: 1.2;
			display: block;
			text-align: center;
		}
		body.login { background: linear-gradient(135deg, #EBF5FF, #F4F8FD); }
		.wp-core-ui .button-primary { background: #0077B6 !important; border-color: #005F92 !important; }
	</style>';
} );
add_filter( 'login_headerurl',  fn() => home_url( '/' ) );
add_filter( 'login_headertext', fn() => get_theme_mod( 'smilecare_clinic_name', 'SmileCare Dental' ) );

/* ═══════════════════════════════════════════════
   16. CLEAN UP PARENT THEME CRUFT
   ═══════════════════════════════════════════════ */

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head',         'print_emoji_detection_script', 7 );
add_filter( 'xmlrpc_enabled', '__return_false' );

/* ═══════════════════════════════════════════════
   17. DOCUMENT TITLE
   ═══════════════════════════════════════════════ */

add_filter( 'document_title_parts', function( $parts ) {
	$clinic = get_theme_mod( 'smilecare_clinic_name', 'SmileCare Dental' );
	$parts['site'] = $clinic;
	return $parts;
} );

/* ═══════════════════════════════════════════════
   18. LOAD CUSTOM WIDGETS
   ═══════════════════════════════════════════════ */

require_once get_stylesheet_directory() . '/inc/dental-widgets.php';
