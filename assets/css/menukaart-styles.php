<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style type="text/css">
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
}
.menukaart-menu-name {
    color: <?php esc_html_e( $mc_food_font_color ); ?>;
    font-size: <?php esc_html_e( $mc_food_font_size ); ?>px;
    line-height: <?php echo esc_html( $mc_food_font_size ) + 10; ?>px;
}
.menukaart-menu-price {
    color: <?php esc_html_e( $mc_food_price_font_color ); ?>;
    font-size: <?php esc_html_e( $mc_food_price_font_size ); ?>px;
    line-height: <?php echo esc_html( $mc_food_price_font_size ) + 10; ?>px;
}
</style>