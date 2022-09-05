<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
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
    @media only screen and (max-width: 767px) {
        .menukaart-content-wrapper {
            padding: 0px;
        }
        .menukaart-menu-item-wrapper, .menukaart-menu-item {
            margin-bottom: 20px;
        }
    }
</style>
<div class="menukaart-content-wrapper">
    <div class="menukaart-course">
        
        <div class="menukaart-menu-item-container">
            <?php
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

            $menukaartData = new WP_Query( $menukaartArr );

            if ( $menukaartData->have_posts() ) {

                while ( $menukaartData->have_posts() ) {

                    $menukaartData->the_post();
                    $mk_price	= get_post_meta( $post->ID, 'mk_price', true );
                    $mk_img 	= MENUKAART_ASSETS . 'img/no-image.jpg';

                    if ( has_post_thumbnail() ) {
                        $mk_img = get_the_post_thumbnail_url($post->ID,'full');
                    }

                    if ( ! $mk_disable_price_number_format ) {
                        $mk_price = number_format( ( esc_html( $mk_price ) / 100 ), 2, ",", "" );
                    }
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
                        </div>
                    </div>
                    <?php
                }
                
            } else {
                _e('No Item Availalble', MENUKAART_TXT_DOMAIN);
            }
            wp_reset_postdata();
            ?>
        </div>

    </div>
</div>