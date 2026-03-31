<?php
/**
 * SmileCare Dental — Custom Widgets
 *
 * Registers:
 *  - Dental_Appointment_Widget
 *  - Dental_Hours_Widget
 *  - Dental_Services_Widget
 *  - Dental_Emergency_Widget
 *
 * @package SmileCare_Dental
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* ================================================================
   WIDGET 1: APPOINTMENT CTA
================================================================ */

class Dental_Appointment_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'dental_appointment_widget',
            __( '🦷 Dental: Appointment CTA', 'medicare_child' ),
            array( 'description' => __( 'A prominent appointment call-to-action widget for sidebars.', 'medicare_child' ) )
        );
    }

    public function widget( $args, $instance ) {
        $title    = apply_filters( 'widget_title', $instance['title'] ?? __( 'Schedule Your Visit', 'medicare_child' ) );
        $subtitle = $instance['subtitle'] ?? __( 'Our team is ready to give you a healthy, beautiful smile.', 'medicare_child' );
        $phone    = $instance['phone'] ?? get_theme_mod( 'smilecare_phone', '(555) 123-4567' );
        $btn_text = $instance['btn_text'] ?? get_theme_mod( 'smilecare_appointment_btn_text', 'Book Appointment' );
        $page_id  = get_theme_mod( 'smilecare_appointment_page', '' );
        $btn_url  = $page_id ? get_permalink( $page_id ) : '#appointment';

        echo wp_kses_post( $args['before_widget'] );
        ?>
        <div class="dental-appointment-widget" style="
            background: linear-gradient(135deg, #0077B6, #00B4D8);
            border-radius: 16px;
            padding: 28px 24px;
            color: #fff;
            text-align: center;
        ">
            <h3 style="color:#fff;font-size:18px;font-weight:800;margin-bottom:8px;"><?php echo esc_html( $title ); ?></h3>
            <p style="color:rgba(255,255,255,0.85);font-size:14px;margin-bottom:20px;"><?php echo esc_html( $subtitle ); ?></p>
            <?php if ( $phone ) : ?>
                <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"
                   style="font-size:22px;font-weight:900;color:#E8A838;display:block;margin-bottom:16px;text-decoration:none;letter-spacing:-0.02em;">
                    <?php echo esc_html( $phone ); ?>
                </a>
            <?php endif; ?>
            <a href="<?php echo esc_url( $btn_url ); ?>"
               style="display:block;background:#E8A838;color:#fff;font-weight:700;font-size:14px;padding:13px 20px;border-radius:50px;text-decoration:none;transition:all 0.25s ease;">
                📅 <?php echo esc_html( $btn_text ); ?>
            </a>
        </div>
        <?php
        echo wp_kses_post( $args['after_widget'] );
    }

    public function form( $instance ) {
        $fields = array(
            'title'    => __( 'Widget Title', 'medicare_child' ),
            'subtitle' => __( 'Subtitle Text', 'medicare_child' ),
            'phone'    => __( 'Phone Number', 'medicare_child' ),
            'btn_text' => __( 'Button Text', 'medicare_child' ),
        );
        foreach ( $fields as $key => $label ) :
            $value = $instance[ $key ] ?? '';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>"><?php echo esc_html( $label ); ?></label>
            <input class="widefat" type="text"
                   id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( $key ) ); ?>"
                   value="<?php echo esc_attr( $value ); ?>">
        </p>
        <?php endforeach;
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        foreach ( array( 'title', 'subtitle', 'phone', 'btn_text' ) as $key ) {
            $instance[ $key ] = sanitize_text_field( $new_instance[ $key ] ?? '' );
        }
        return $instance;
    }
}

/* ================================================================
   WIDGET 2: WORKING HOURS
================================================================ */

class Dental_Hours_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'dental_hours_widget',
            __( '🕐 Dental: Working Hours', 'medicare_child' ),
            array( 'description' => __( 'Displays clinic working hours with today highlighted.', 'medicare_child' ) )
        );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] ?? __( 'Working Hours', 'medicare_child' ) );

        echo wp_kses_post( $args['before_widget'] );
        echo wp_kses_post( $args['before_title'] ) . esc_html( $title ) . wp_kses_post( $args['after_title'] );
        echo do_shortcode( '[dental_hours]' );
        echo wp_kses_post( $args['after_widget'] );
    }

    public function form( $instance ) {
        $title = $instance['title'] ?? __( 'Working Hours', 'medicare_child' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'medicare_child' ); ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        return array( 'title' => sanitize_text_field( $new_instance['title'] ?? '' ) );
    }
}

/* ================================================================
   WIDGET 3: DENTAL SERVICES LIST
================================================================ */

class Dental_Services_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'dental_services_widget',
            __( '🦷 Dental: Services List', 'medicare_child' ),
            array( 'description' => __( 'A compact list of dental services for sidebars.', 'medicare_child' ) )
        );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] ?? __( 'Our Services', 'medicare_child' ) );

        $services = array(
            __( 'General Dentistry', 'medicare_child' ),
            __( 'Cosmetic Dentistry', 'medicare_child' ),
            __( 'Orthodontics / Invisalign®', 'medicare_child' ),
            __( 'Dental Implants', 'medicare_child' ),
            __( 'Teeth Whitening', 'medicare_child' ),
            __( 'Oral Surgery', 'medicare_child' ),
            __( 'Pediatric Dentistry', 'medicare_child' ),
            __( 'Emergency Dental', 'medicare_child' ),
            __( 'Periodontal Care', 'medicare_child' ),
        );

        $services_url = get_permalink( get_page_by_path( 'services' ) ) ?: '#';

        echo wp_kses_post( $args['before_widget'] );
        echo wp_kses_post( $args['before_title'] ) . esc_html( $title ) . wp_kses_post( $args['after_title'] );
        ?>
        <ul style="list-style:none;margin:0;padding:0;">
            <?php foreach ( $services as $service ) : ?>
                <li style="border-bottom:1px solid #E8F4FD;padding:10px 0;">
                    <a href="<?php echo esc_url( $services_url ); ?>"
                       style="color:#3D4B5C;font-size:14px;text-decoration:none;display:flex;align-items:center;gap:10px;transition:all 0.2s ease;">
                        <span style="color:#0077B6;font-size:12px;font-weight:700;">▶</span>
                        <?php echo esc_html( $service ); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php
        echo wp_kses_post( $args['after_widget'] );
    }

    public function form( $instance ) {
        $title = $instance['title'] ?? __( 'Our Services', 'medicare_child' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'medicare_child' ); ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        return array( 'title' => sanitize_text_field( $new_instance['title'] ?? '' ) );
    }
}

/* ================================================================
   WIDGET 4: EMERGENCY DENTAL
================================================================ */

class Dental_Emergency_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'dental_emergency_widget',
            __( '🚨 Dental: Emergency Banner', 'medicare_child' ),
            array( 'description' => __( 'An emergency dental contact widget with urgent styling.', 'medicare_child' ) )
        );
    }

    public function widget( $args, $instance ) {
        $phone   = $instance['phone'] ?? get_theme_mod( 'smilecare_emergency_phone', get_theme_mod( 'smilecare_phone', '(555) 123-4567' ) );
        $title   = $instance['title'] ?? __( 'Dental Emergency?', 'medicare_child' );
        $message = $instance['message'] ?? __( 'Call us immediately for same-day emergency treatment.', 'medicare_child' );

        echo wp_kses_post( $args['before_widget'] );
        ?>
        <div style="
            background: linear-gradient(135deg, #FF5252, #D32F2F);
            border-radius: 16px;
            padding: 24px;
            text-align: center;
            color: #fff;
        ">
            <span style="font-size:40px;display:block;margin-bottom:10px;">🚨</span>
            <h3 style="color:#fff;font-size:16px;font-weight:800;margin-bottom:8px;"><?php echo esc_html( $title ); ?></h3>
            <p style="color:rgba(255,255,255,0.85);font-size:13px;margin-bottom:16px;"><?php echo esc_html( $message ); ?></p>
            <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"
               style="display:block;background:#fff;color:#D32F2F;font-weight:800;font-size:18px;padding:12px;border-radius:50px;text-decoration:none;">
                <?php echo esc_html( $phone ); ?>
            </a>
        </div>
        <?php
        echo wp_kses_post( $args['after_widget'] );
    }

    public function form( $instance ) {
        $fields = array(
            'title'   => __( 'Title', 'medicare_child' ),
            'message' => __( 'Message', 'medicare_child' ),
            'phone'   => __( 'Emergency Phone', 'medicare_child' ),
        );
        foreach ( $fields as $key => $label ) :
            $value = $instance[ $key ] ?? '';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>"><?php echo esc_html( $label ); ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $key ) ); ?>" value="<?php echo esc_attr( $value ); ?>">
        </p>
        <?php endforeach;
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        foreach ( array( 'title', 'message', 'phone' ) as $key ) {
            $instance[ $key ] = sanitize_text_field( $new_instance[ $key ] ?? '' );
        }
        return $instance;
    }
}

/* ================================================================
   REGISTER ALL WIDGETS
================================================================ */

function smilecare_register_widgets() {
    register_widget( 'Dental_Appointment_Widget' );
    register_widget( 'Dental_Hours_Widget' );
    register_widget( 'Dental_Services_Widget' );
    register_widget( 'Dental_Emergency_Widget' );
}
add_action( 'widgets_init', 'smilecare_register_widgets' );
