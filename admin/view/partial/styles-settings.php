<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//$menukaartStylesSettings = [];
foreach ( $menukaartStylesSettings as $option_name => $option_value ) {
    if ( isset( $menukaartStylesSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<form name="mc_menu_style_form" role="form" class="form-horizontal" method="post" action="" id="mc-menu-style-form">
    <table class="mc-menu-style-settings-table">
        <!-- Menu Title -->
        <tr>
            <th scope="row" colspan="2">
                <hr><span><?php _e('Menu Title', MENUKAART_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', MENUKAART_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="mc-wp-color" type="text" name="mc_menu_title_bg_color" id="mc_menu_title_bg_color" value="<?php esc_attr_e( $mc_menu_title_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Border Color', MENUKAART_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="mc-wp-color" type="text" name="mc_menu_title_border_color" id="mc_menu_title_border_color" value="<?php esc_attr_e( $mc_menu_title_border_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Border Width', MENUKAART_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input type="number" min="0" max='10' step="1" name="mc_menu_title_border_width" value="<?php esc_attr_e( $mc_menu_title_border_width );?>" >
                <code><?php _e('px', MENUKAART_TXT_DOMAIN); ?></code>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Font Color', MENUKAART_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="mc-wp-color" type="text" name="mc_menu_title_font_color" id="mc_menu_title_font_color" value="<?php esc_attr_e( $mc_menu_title_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Font Size', MENUKAART_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input type="number" min="12" max='60' step="1" name="mc_menu_title_font_size" value="<?php esc_attr_e( $mc_menu_title_font_size );?>" >
                <code><?php _e('px', MENUKAART_TXT_DOMAIN); ?></code>
            </td>
        </tr>
        <!-- Food Course -->
        <tr>
            <th scope="row" colspan="2">
                <hr><span><?php _e('Food Course', MENUKAART_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', MENUKAART_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="mc-wp-color" type="text" name="mc_food_course_bg_color" id="mc_food_course_bg_color" value="<?php esc_attr_e( $mc_food_course_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Border Color', MENUKAART_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="mc-wp-color" type="text" name="mc_food_course_border_color" id="mc_food_course_border_color" value="<?php esc_attr_e( $mc_food_course_border_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Font Color', MENUKAART_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="mc-wp-color" type="text" name="mc_food_course_font_color" id="mc_food_course_font_color" value="<?php esc_attr_e( $mc_food_course_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <!-- Food Item -->
        <tr>
            <th scope="row" colspan="2">
                <hr><span><?php _e('Food Item', MENUKAART_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Item Font Color', MENUKAART_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="mc-wp-color" type="text" name="mc_food_font_color" id="mc_food_font_color" value="<?php esc_attr_e( $mc_food_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Item Font Size', MENUKAART_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input type="number" min="12" max='54' step="1" name="mc_food_font_size" value="<?php esc_attr_e( $mc_food_font_size );?>" >
                <code><?php _e('px', MENUKAART_TXT_DOMAIN); ?></code>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Price Font Color', MENUKAART_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="mc-wp-color" type="text" name="mc_food_price_font_color" id="mc_food_price_font_color" value="<?php esc_attr_e( $mc_food_price_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Price Font Size', MENUKAART_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input type="number" min="12" max='54' step="1" name="mc_food_price_font_size" value="<?php esc_attr_e( $mc_food_price_font_size );?>" >
                <code><?php _e('px', MENUKAART_TXT_DOMAIN); ?></code>
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit">
        <button id="updatemenuStyles" name="updatemenuStyles" class="button button-primary menukaart-button">
            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php _e('Save Settings', MENUKAART_TXT_DOMAIN); ?>
        </button>
    </p>
</form>