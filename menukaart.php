<?php
/**
 * Plugin Name: 	    Menukaart
 * Plugin URI:		    http://wordpress.org/plugins/menukaart/
 * Description: 	    Best food menu plugin that displays menu items in your webpage by using the shortcode: [menukaart]
 * Version: 		    1.2
 * Author:		        HM Plugin
 * Author URI:	        https://hmplugin.com
 * Requires at least:   5.2
 * Requires PHP:        7.2
 * Tested up to:        5.9.3
 * Text Domain:         menukaart
 * Domain Path:         /languages/
 * License:             GPL-2.0+
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'men_fs' ) ) {
    // Create a helper function for easy SDK access.
    function men_fs() {
        global $men_fs;

        if ( ! isset( $men_fs ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/freemius/start.php';

            $men_fs = fs_dynamic_init( array(
                'id'                  => '10227',
                'slug'                => 'menukaart',
                'type'                => 'plugin',
                'public_key'          => 'pk_7bcfa68372216700582a0bedb5e6d',
                'is_premium'          => false,
                'has_addons'          => false,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'slug'           => 'edit.php?post_type=menukaart',
                ),
            ) );
        }

        return $men_fs;
    }

    // Init Freemius.
    men_fs();
    // Signal that SDK was initiated.
    do_action( 'men_fs_loaded' );
}

define('MENUKAART_PATH', plugin_dir_path(__FILE__));
define('MENUKAART_ASSETS', plugins_url('/assets/', __FILE__));
define('MENUKAART_SLUG', plugin_basename(__FILE__));
define('MENUKAART_PRFX', 'Menukaart_');
define('MENUKAART_CLS_PRFX', 'cls-menukaart-');
define('MENUKAART_TXT_DOMAIN', 'menukaart');
define('MENUKAART_VERSION', '1.2');

//require_once MENUKAART_PATH . '/lib/freemius-integrator.php';
//  - Restaurant Menu Plugin for WordPress
require_once MENUKAART_PATH . 'inc/' . MENUKAART_CLS_PRFX . 'master.php';

$menukaart = new Menukaart_Master();
$menukaart->menukaart_run();

// Donate link to plugin description
function menukaart_display_donation_link( $links, $file ) {

    if ( MENUKAART_SLUG === $file ) {
        $row_meta = array(
        'menukaart_donation'  => '<a href="' . esc_url( 'https://www.paypal.me/mhmrajib/' ) . '" target="_blank" aria-label="' . esc_attr__('Donate us', 'menukaart') . '" style="color:green; font-weight: bold;">' . esc_html__('Donate us', 'menukaart') . '</a>'
        );

        return array_merge( $links, $row_meta );
    }
    return (array) $links;
}
add_filter( 'plugin_row_meta', 'menukaart_display_donation_link', 10, 2 );

// Add settikngs page afetr deactivate | settings in plugin page
function menukaart_show_extra_link( $links ) {

	$links = array_merge( array(
		'<a href="' . esc_url( admin_url( 'edit.php?post_type=menukaart&page=menukaart-manage-views' ) ) . '">' . __( 'Manage Views', MENUKAART_TXT_DOMAIN ) . '</a>'
	), $links );

	return $links;

}
add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'menukaart_show_extra_link' );