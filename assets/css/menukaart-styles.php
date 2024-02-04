<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style type="text/css">
.menukaart-content-wrapper {
    font-family: <?php echo stripslashes( esc_html( $mk_global_font_family ) ); ?>;
    width: <?php echo esc_html( $mk_menu_width ) . esc_html( $mk_menu_width_type ); ?>;
}
.menukaart-master-title {
    background-color: <?php esc_html_e( $mc_menu_title_bg_color ); ?>;
    border: <?php esc_html_e( $mc_menu_title_border_width ); ?>px solid <?php esc_html_e( $mc_menu_title_border_color ); ?>;
    color: <?php esc_html_e( $mc_menu_title_font_color ); ?>;
    font-size: <?php esc_html_e( $mc_menu_title_font_size ); ?>px;
}
.menukaart-course h4 {
    background-color: <?php esc_html_e( $mc_food_course_bg_color ); ?>;
    border: 2px solid <?php esc_html_e( $mc_food_course_border_color ); ?>;
    color: <?php esc_html_e( $mc_food_course_font_color ); ?>;
    font-size: <?php esc_html_e( $mc_food_course_font_size ); ?>px;
}
.menukaart-menu-name,
.menukaart-menu-name a.mk-menu-title {
    color: <?php esc_html_e( $mc_food_font_color ); ?>;
    font-size: <?php esc_html_e( $mc_food_font_size ); ?>px;
    line-height: <?php echo esc_html( $mc_food_font_size ) + 10; ?>px;
}
.menukaart-menu-name a.mk-menu-title::before {
    background-color: <?php esc_html_e( $mc_food_font_color ); ?>;
}
.menukaart-menu-price {
    color: <?php esc_html_e( $mc_food_price_font_color ); ?>;
    font-size: <?php esc_html_e( $mc_food_price_font_size ); ?>px;
    line-height: <?php echo esc_html( $mc_food_price_font_size ) + 10; ?>px;
}
</style>