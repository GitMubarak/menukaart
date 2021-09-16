<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style type="text/css">
.flex-direction-nav a {
    color: <?php esc_html_e( $menukaart_navigation_icon_color ); ?>;
    border: 2px solid <?php esc_html_e( $menukaart_navigation_icon_color ); ?>;
}
.flex-direction-nav a:hover {
    background-color: <?php esc_html_e( $menukaart_navigation_hover_bg_color ); ?>;
    color: #FFF;
}
.flex-control-paging li a {
    background-color: <?php esc_html_e( $menukaart_pagination_color ); ?>;;
}
.flex-control-paging li a.flex-active {
    background-color: <?php esc_html_e( $menukaart_pagination_active_color ); ?>;;
}
</style>