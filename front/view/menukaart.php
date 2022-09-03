<?php
if ( ! defined('ABSPATH') ) exit;

global $post;

$menukaartGeneralSettings = $this->menukaart_get_general_settings();
//print_r( $menukaartGeneralSettings );
foreach ( $menukaartGeneralSettings as $option_name => $option_value ) {
    if ( isset( $menukaartGeneralSettings[$option_name] ) ) {
        ${"" . $option_name}  = $option_value;
    }
}

$menukaartStylesSettings = $this->menukaart_get_styles_settings();
foreach ( $menukaartStylesSettings as $option_name => $option_value ) {
    if ( isset( $menukaartStylesSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}

// Shortcoded Options
$mkTemp = isset( $mkAttr['template'] ) ? $mkAttr['template'] : null;

// Loading styles
include MENUKAART_PATH . 'assets/css/menukaart-styles.php';

$mk_meals  = get_terms( array( 'taxonomy' => 'menukaart_courses', 'hide_empty' => true, 'orderby' => 'name', 'order' => 'ASC', 'parent' => 0 ) );

$mk_currency = $this->menukaart_get_currency_symbol( $mk_currency );

if ( 'classic' === $mkTemp ) {
	include 'temp/classic.php';
} else {
	include 'temp/menucart.php';
}