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
<form name="menukaart_general_settings_form" role="form" class="form-horizontal" method="post" action="" id="menukaart-general-settings-form">
    <table class="menukaart-manage-views-table">
    <tr>
        <th scope="row">
            <label><?php _e('Orber By', MENUKAART_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <select name="mk_order_by" class="small-text">
                <option value="title" <?php echo ( 'title' === $mk_order_by ) ? 'selected' : ''; ?>><?php _e('Title', MENUKAART_TXT_DOMAIN); ?></option>
                <option value="date" <?php echo ( 'date' === $mk_order_by ) ? 'selected' : ''; ?>><?php _e('Date', MENUKAART_TXT_DOMAIN); ?></option>
                <option value="menu_order" <?php echo ( 'menu_order' === $mk_order_by ) ? 'selected' : ''; ?>><?php _e('Post Order', MENUKAART_TXT_DOMAIN); ?></option>
            </select>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label><?php _e('Order With', MENUKAART_TXT_DOMAIN); ?>:</label>
        </th>
        <td>
            <input type="radio" name="mk_order_with" id="mk_order_with_asc" value="ASC" <?php echo ( 'ASC' === esc_attr( $mk_order_with ) ) ? 'checked' : ''; ?> >
            <label for="mk_order_with_asc"><span></span><?php _e( 'ASC', MENUKAART_TXT_DOMAIN ); ?></label>
            &nbsp;&nbsp;
            <input type="radio" name="mk_order_with" id="mk_order_with_desc" value="DESC" <?php echo ( 'DESC' === esc_attr( $mk_order_with ) ) ? 'checked' : ''; ?> >
            <label for="mk_order_with_desc"><span></span><?php _e( 'DESC', MENUKAART_TXT_DOMAIN ); ?></label>
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