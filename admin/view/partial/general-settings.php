<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//print_r( $menukaartGeneralSettings );
foreach ( $menukaartGeneralSettings as $option_name => $option_value ) {
    if ( isset( $menukaartGeneralSettings[$option_name] ) ) {
        ${"" . $option_name}  = $option_value;
    }
}
?>
<form name="mc_general_settings_form" role="form" class="form-horizontal" method="post" action="" id="mc-general-settings-form">
    <table class="mc-general-settings-table">
        <tr>
            <th scope="row">
                <label><?php _e('Global Font Family', MENUKAART_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="text" name="mk_global_font_family" class="regular-text" placeholder="<?php echo stripslashes( esc_attr( $mk_global_font_family ) ); ?>"
                    value="<?php echo stripslashes( esc_attr( $mk_global_font_family ) ); ?>">
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="mk_hide_menu_title"><?php _e('Hide Menu Title', MENUKAART_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="checkbox" name="mk_hide_menu_title" id="mk_hide_menu_title" value="1" <?php echo $mk_hide_menu_title ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Menu Title Text', MENUKAART_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="mk_menu_title_text" class="medium-text" placeholder="<?php esc_attr_e( $mk_menu_title_text ); ?>"
                    value="<?php esc_attr_e( $mk_menu_title_text ); ?>">
            </td>
        </tr>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Orber By', MENUKAART_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <select name="mk_order_by" class="small-text">
                    <option value="title" <?php echo ( 'title' === $mk_order_by ) ? 'selected' : ''; ?>><?php _e('Title', MENUKAART_TXT_DOMAIN); ?></option>
                    <option value="date" <?php echo ( 'date' === $mk_order_by ) ? 'selected' : ''; ?>><?php _e('Date', MENUKAART_TXT_DOMAIN); ?></option>
                    <option value="menu_order" <?php echo ( 'menu_order' === $mk_order_by ) ? 'selected' : ''; ?>><?php _e('Post Order', MENUKAART_TXT_DOMAIN); ?></option>
                </select>
            </td>
            <th scope="row">
                <label><?php _e('Order With', MENUKAART_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="radio" name="mk_order_with" id="mk_order_with_asc" value="ASC" <?php echo ( 'ASC' === esc_attr( $mk_order_with ) ) ? 'checked' : ''; ?> >
                <label for="mk_order_with_asc"><span></span><?php _e( 'ASC', MENUKAART_TXT_DOMAIN ); ?></label>
                &nbsp;&nbsp;
                <input type="radio" name="mk_order_with" id="mk_order_with_desc" value="DESC" <?php echo ( 'DESC' === esc_attr( $mk_order_with ) ) ? 'checked' : ''; ?> >
                <label for="mk_order_with_desc"><span></span><?php _e( 'DESC', MENUKAART_TXT_DOMAIN ); ?></label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Menu Width', MENUKAART_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="number" min="1" max="1200" step="1" name="mk_menu_width" value="<?php esc_attr_e( $mk_menu_width ); ?>">
                <select name="mk_menu_width_type" class="medium-text">
                    <option value="px" <?php echo ( 'ps' === $mk_menu_width_type ) ? 'selected' : ''; ?> ><?php echo 'px'; ?></option>
                    <option value="%" <?php echo ( '%' === $mk_menu_width_type ) ? 'selected' : ''; ?> ><?php echo '%'; ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Currency', MENUKAART_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <select name="mk_currency" class="medium-text" style="max-width: 250px;">
                    <?php
                    $wbgCurrency = $this->menukaart_get_all_currency();
                    foreach ( $wbgCurrency as $currency ) {
                        ?>
                        <option value="<?php esc_attr_e( $currency->abbreviation ); ?>" <?php echo ( $mk_currency === $currency->abbreviation ) ? 'selected="selected"' : ''; ?> >
                            <?php esc_html_e( $currency->currency ); ?>-<?php esc_html_e( $currency->abbreviation ); ?>-<?php esc_html_e( $currency->symbol ); ?>
                        </option>
                        <?php 
                    } 
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="mk_disable_price_number_format"><?php _e('Disable Price Number Format', MENUKAART_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="checkbox" name="mk_disable_price_number_format" id="mk_disable_price_number_format" value="1" <?php echo $mk_disable_price_number_format ? 'checked' : ''; ?> >
                <code><?php _e('This will disable price number format $99,99 and will display $99 only.', MENUKAART_TXT_DOMAIN); ?></code>
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit">
        <button id="button-general-settings" name="btnGeneralSettings" class="button button-primary menukaart-button">
            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php _e('Save Settings', MENUKAART_TXT_DOMAIN); ?>
        </button>
    </p>
</form>