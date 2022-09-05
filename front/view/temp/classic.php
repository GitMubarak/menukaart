<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$menukaartArr = array(
    'post_type'   => 'menukaart',
    'post_status' => 'publish',
    'orderby'     => $mk_order_by,
    'order'       => $mk_order_with,
    'meta_query'  => array(
        'relation' => 'and',
        array(
        'key' => 'mk_status',
        'value' => 'active',
        'compare' => '='
        ),
    ),
);

if ( '' !== $mkCategory ) {
    $menukaartArr['tax_query'] = array(
        array(
            'taxonomy' => 'menukaart_courses',
            'field' => 'name',
            'terms' => urldecode ( $mkCategory )
        )
    );
}

// Load Search Panel
if ( 'hide' !== $mkSearch ) {
    include MENUKAART_PATH . 'front/view/search.php';
}

$menukaartData = new WP_Query( $menukaartArr );
?>
<style type="text/css">
    .menukaart-content-wrapper {
        margin: 0 auto;
        padding: 30px;
        display: inline-block;
        box-shadow: none;
        border: none;
    }
    .menukaart-menu-item-container {
        margin-bottom: 0px;
        grid-gap: 60px;
    }
    .menukaart-menu-item-wrapper, .menukaart-menu-item {
        display: inline-block;
    }
    .mk-button {
        display: inline-block;
        margin: 0;
        margin-top: 5px;
        padding: 12px 15px;
        cursor: pointer;
        border-style: solid;
        -webkit-appearance: none;
        border-radius: 3px;
        white-space: nowrap;
        box-sizing: border-box;
        line-height: 14px;
        font-size: 14px;
        text-align: center;
        text-decoration: none!important;
        width: auto;
        color: #242424;
        background: #DDDDDD;
    }
    .mk-button:hover {
        background: #242424;
        color: #FFFFFF;
    }
    @media only screen and (max-width: 767px) {
        .menukaart-content-wrapper {
            padding: 0px;
        }
        .menukaart-menu-item-wrapper, .menukaart-menu-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #DDDDDD;
        }
    }
</style>
<div class="menukaart-content-wrapper">
    <div class="menukaart-course">
        
        <div class="menukaart-menu-item-container">
            <?php
            if ( $menukaartData->have_posts() ) {

                while ( $menukaartData->have_posts() ) {

                    $menukaartData->the_post();
                    $mk_price	= get_post_meta( $post->ID, 'mk_price', true );
                    $mk_wc_prod	= get_post_meta( $post->ID, 'mk_wc_prod', true );
                    $mk_img 	= MENUKAART_ASSETS . 'img/no-image.jpg';

                    if ( has_post_thumbnail() ) {
                        $mk_img = get_the_post_thumbnail_url($post->ID,'full');
                    }

                    if ( ! $mk_disable_price_number_format ) {
                        $mk_price = number_format( ( esc_html( $mk_price ) / 100 ), 2, ",", "" );
                    }

                    $mk_wc_url = esc_url( home_url( $mk_wc_url_prefix . $mk_wc_prod ) );
                    ?>
                    <div class="menukaart-menu-item">
                        <div class="mk-menu-image">
                            <img src="<?php echo esc_url( $mk_img ); ?>" alt="<?php _e( 'No Image Available', MENUKAART_TXT_DOMAIN ); ?>">
                        </div>
                        <div class="mk-menu-content">
                            <div class="menukaart-menu-name"><?php echo get_the_title(); ?></div>
                            <div class="menukaart-menu-price"><?php echo esc_html( $mk_currency ) . '' . $mk_price; ?></div>
                            <div class="menukaart-menu-desc">
                                <?php the_content(); ?>
                            </div>
                            <a href="<?php echo $mk_wc_url; ?>" class="button mk-button" target="_blank">
                                <i class="fa-solid fa-cart-shopping"></i>&nbsp;<?php _e('Order Now', MENUKAART_TXT_DOMAIN); ?>
                            </a>
                        </div>
                    </div>
                    <?php
                }
                
            } else {
                _e('No food availalble. Please add one.', MENUKAART_TXT_DOMAIN);
            }
            wp_reset_postdata();
            ?>
        </div>

    </div>
</div>