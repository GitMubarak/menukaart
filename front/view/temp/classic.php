<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( is_front_page() ) {
    $page = ( get_query_var('page') ) ? get_query_var('page') : 1;
  } 
  else {
    $page = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
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

if ( $mk_enable_pagination ) {
    $menukaartArr['paged'] = $page;
}

if ( '' !== $mkCategory ) {
    $menukaartArr['tax_query'] = array(
        array(
            'taxonomy' => 'menukaart_courses',
            'field' => 'name',
            'terms' => urldecode ( $mkCategory )
        )
    );
}

// Loading styles
include MENUKAART_PATH . 'assets/css/classic-styles.php';
?>
<div class="menukaart-content-wrapper">

    <?php
    // Load Search Panel
    if ( 'hide' !== $mkSearch ) {
        include MENUKAART_PATH . 'front/view/search.php';
    }

    $menukaartData = new WP_Query( $menukaartArr );
    
    if ( $menukaartData->have_posts() ) {
        ?>
        <div class="menukaart-menu-item-container">
            <?php
            while ( $menukaartData->have_posts() ) {

                $menukaartData->the_post();
                $mk_price	= get_post_meta( $post->ID, 'mk_price', true );
                $mk_wc_prod	= get_post_meta( $post->ID, 'mk_wc_prod', true );
                $mk_img 	= MENUKAART_ASSETS . 'img/no-image.jpg';

                if ( has_post_thumbnail() ) {
                    $mk_img = get_the_post_thumbnail_url( $post->ID, 'thumbnail' );
                }

                if ( ! $mk_disable_price_number_format ) {
                    $mk_price = number_format( ( esc_html( $mk_price ) / 100 ), 2, ",", "" );
                }

                //$mk_wc_url = esc_url( home_url( $mk_wc_url_prefix . $mk_wc_prod ) );
                ?>
                <div class="menukaart-menu-item">
                    <div class="mk-menu-image">
                        <a class="mk-popup" data-post_id="<?php esc_attr_e( $post->ID ); ?>" href="#">
                            <img src="<?php echo esc_url( $mk_img ); ?>" alt="<?php _e('No Image Available', 'menukaart'); ?>">
                            <span class="mk-menu-url-icon"><i class="fa-solid fa-link"></i></span>
                        </a>
                    </div>
                    <div class="mk-menu-content">
                        <div class="menukaart-menu-name mk-popup" data-post_id="<?php esc_attr_e( $post->ID ); ?>">
                            <h3><a class="mk-menu-title"><?php echo get_the_title(); ?></a></h3>
                        </div>
                        <div class="menukaart-menu-price"><?php echo esc_html( $mk_currency ) . '' . $mk_price; ?></div>
                        <div class="menukaart-menu-desc">
                            <?php
                            $menu_desc = strip_tags(get_the_content());
                            if ( strlen( $menu_desc ) > 150 ) {
                                echo substr( $menu_desc, 0, 150 ) . ' ...';
                            } else {
                                echo $menu_desc;
                            }
                            ?>
                        </div>
                        <?php
                        if ( $mk_enable_online_ordering ) {
                            ?>
                            <a href="<?php echo esc_url( home_url( '?add-to-cart=' . $mk_wc_prod ) );; ?>" class="button mk-button">
                                <i class="fa-solid fa-cart-shopping"></i>&nbsp;<?php _e('Order Now', 'menukaart'); ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        if ( $mk_enable_pagination ) {
            ?>
            <div class="mk-pagination">
                <?php
                if ( $menukaartData->max_num_pages > 1 ) {

                $wbgPaginateBig = 999999999;
                $wbgPaginateArgs = array(
                    'base' => str_replace( $wbgPaginateBig, '%#%', esc_url( get_pagenum_link( $wbgPaginateBig ) ) ),
                    'format' => '?page=%#%',
                    'total' => $menukaartData->max_num_pages,
                    'current' => max( 1, $page ),
                    'end_size' => 1,
                    'mid_size' => 2,
                    'prev_text' => __('« '),
                    'next_text' => __(' »'),
                    'type' => 'list',
                );
                echo paginate_links( $wbgPaginateArgs );
                }
                ?>
            </div>
            <?php
        }
        wp_reset_postdata();
    } else {
        _e('No food availalble right now', 'menukaart');
    }
    ?>
</div>