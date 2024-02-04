<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;

$mk_price		= get_post_meta( $post->ID, 'mk_price', true );
$mk_wc_prod		= get_post_meta( $post->ID, 'mk_wc_prod', true );
$mk_status		= get_post_meta( $post->ID, 'mk_status', true );
?>
<table class="form-table">
<tr>
    <th scope="row">
        <label><?php _e('Sale Price', MENUKAART_TXT_DOMAIN); ?></label>
    </th>
    <td>
        <input type="number" min="0" max="10000000" step="1" name="mk_price" value="<?php esc_attr_e( $mk_price ); ?>" class="medium-text">
        <code><?php _e('1050 will display as 10,50 if you do not disable nummber format.', MENUKAART_TXT_DOMAIN); ?></code>
    </td>
</tr>
<tr>
    <th scope="row">
        <label><?php _e('WooCommerce Product', MENUKAART_TXT_DOMAIN); ?></label>
    </th>
    <td>
        <?php
        // WooCommerce Product List
        if ( class_exists( 'WooCommerce' ) ) {
            $wbg_wc_args = array(
                'status'            => array('publish'),
                'type'              => array_merge( array_keys( wc_get_product_types() ) ),
                'parent'            => null,
                'sku'               => '',
                'category'          => array(),
                'tag'               => array(),
                'limit'             => -1,
                'offset'            => null,
                'page'              => 1,
                'include'           => array(),
                'exclude'           => array(),
                'orderby'           => 'date',
                'order'             => 'DESC',
                'return'            => 'objects',
                'paginate'          => false,
                'shipping_class'    => array(),
            );

            $wbg_wc_products = wc_get_products( $wbg_wc_args );
            ?>
            <select name="mk_wc_prod" id="mk_wc_prod">
                <option value=""><?php _e('Select a Product', MENUKAART_TXT_DOMAIN); ?></option>
                <?php
                foreach( $wbg_wc_products as $product ) {

                    $product_id   = $product->get_id();
                    $product_name = $product->get_name();
                    ?>
                    <option value="<?php esc_attr_e( $product_id ); ?>" <?php echo ( $mk_wc_prod == $product_id ) ? 'selected' : ''; ?>><?php esc_html_e( $product_name ); ?></option>
                    <?php
                }
                ?>
            </select>
            <?php
        }
        ?>
    </td>
</tr>
<tr>
    <th scope="row">
        <label for="mk_status"><?php _e('Status', MENUKAART_TXT_DOMAIN); ?></label>
    </th>
    <td>
        <input type="radio" name="mk_status" class="mk_status" id="menukaart_status_active" value="active" <?php echo ( 'inactive' !== esc_attr( $mk_status ) ) ? 'checked' : ''; ?> >
        <label for="menukaart_status_active"><span></span><?php _e( 'Active', MENUKAART_TXT_DOMAIN ); ?></label>
        &nbsp;&nbsp;
        <input type="radio" name="mk_status" class="mk_status" id="menukaart_status_inactive" value="inactive" <?php echo ( 'inactive' === esc_attr( $mk_status ) ) ? 'checked' : ''; ?> >
        <label for="menukaart_status_inactive"><span></span><?php _e( 'Inactive', MENUKAART_TXT_DOMAIN ); ?></label>
    </td>
</tr>
</table>