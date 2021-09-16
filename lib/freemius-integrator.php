<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Create a helper function for easy SDK access.
if ( ! function_exists( 'menukaart_fs' ) ) {

    // Create a helper function for easy SDK access.
    function menukaart_fs() {
		
        global $menukaart_fs;

        if ( ! isset( $menukaart_fs ) ) {
            // Include Freemius SDK.
            require_once MENUKAART_PATH . '/freemius/start.php';

            $menukaart_fs = fs_dynamic_init( array(
                'id'                  => '8734',
                'slug'                => 'hm-testimonial',
                'type'                => 'plugin',
                'public_key'          => 'pk_cb5da1e11853b735f0a15ead9dd99',
                'is_premium'          => true,
                'premium_suffix'      => 'Professional',
                // If your plugin is a serviceware, set this option to false.
                'has_premium_version' => true,
                'has_addons'          => false,
                'has_paid_plans'      => true,
                'trial'               => array(
                    'days'               => 14,
                    'is_require_payment' => true,
                ),
                'menu'                => array(
                    'slug'           => 'edit.php?post_type=hm_testimonial',
                ),
                // Set the SDK to work in a sandbox mode (for development & testing).
                // IMPORTANT: MAKE SURE TO REMOVE SECRET KEY BEFORE DEPLOYMENT.
                'secret_key'          => 'sk_bGn9*Gc=6F&:%1HhiY[)8L;jm}>mP',
            ) );
        }

        return $menukaart_fs;
    }

    // Init Freemius.
    menukaart_fs();

    // Signal that SDK was initiated.
    do_action( 'menukaart_fs_loaded' );

    function menukaart_fs_support_forum_url( $wp_support_url ) {
        return 'https://wordpress.org/support/plugin/hm-testimonial/';
    }
    menukaart_fs()->add_filter( 'support_forum_url', 'menukaart_fs_support_forum_url' );
    
    function menukaart_fs_custom_connect_message_on_update(
        $message,
        $user_first_name,
        $plugin_title,
        $user_login,
        $site_link,
        $freemius_link
    ) {
        return sprintf(
            __( 'Hey %1$s' ) . ',<br>' .
            __( 'Please help us improve %2$s! If you opt-in, some data about your usage of %2$s will be sent to %5$s. If you skip this, that\'s okay! %2$s will still work just fine.', 'hm-testimonial' ),
            $user_first_name,
            '<b>' . $plugin_title . '</b>',
            '<b>' . $user_login . '</b>',
            $site_link,
            $freemius_link
        );
    }
    menukaart_fs()->add_filter('connect_message_on_update', 'menukaart_fs_custom_connect_message_on_update', 10, 6);
}