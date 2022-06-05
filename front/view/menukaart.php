<?php
if ( ! defined('ABSPATH') ) exit;

global $post;

$menukaartGeneralSettings = $this->menukaart_get_general_settings();
//print_r( $menukaartGeneralSettings );
foreach ( $menukaartGeneralSettings as $option_name => $option_value ) {
    if ( isset( $menukaartGeneralSettings[$option_name] ) ) {
        ${"" . $option_name}  = $option_value;
    }
}

$menukaartStylesSettings = $this->menukaart_get_styles_settings();
foreach ( $menukaartStylesSettings as $option_name => $option_value ) {
    if ( isset( $menukaartStylesSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}

// Shortcoded Options
//$menukaartCategory = isset( $mkAttr['category'] ) ? $mkAttr['category'] : null;

// Loading styles
include MENUKAART_PATH . 'assets/css/menukaart-styles.php';

$mk_meals  = get_terms( array( 'taxonomy' => 'menukaart_courses', 'hide_empty' => true, 'orderby' => 'name', 'order' => 'ASC', 'parent' => 0 ) );

$mk_currency = $this->menukaart_get_currency_symbol( $mk_currency );
?>
<div class="menukaart-content-wrapper">
	<?php
	if ( ! $mk_hide_menu_title ) {
		?>
		<div class="menukaart-master-title">
			<?php esc_html_e( $mk_menu_title_text ); ?>
		</div>
		<?php
	}
	?>
<?php
foreach ( $mk_meals as $meal ) { 
	?>
	<div class="menukaart-meal">
		<h3><?php esc_html_e( $meal->name ); ?></h3>
	</div> 
	<?php
	$mk_courses = get_terms( array( 'taxonomy' => 'menukaart_courses', 'hide_empty' => true, 'orderby' => 'name', 'order' => 'ASC',  'parent' => $meal->term_id ) );
	
	if ( $mk_courses ) {

		foreach ( $mk_courses as $key => $course ) {
			?>
			<div class="menukaart-course">
				
				<h4><?php esc_html_e( $course->name ); ?></h4>
				
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
						'tax_query'	=> array(
							array(
								'taxonomy'  => 'menukaart_courses',
								'field'     => 'name',
								'terms'     => $course->name
							)
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
							?>
							<div class="menukaart-menu-item">
								<div class="mk-menu-image">
									<img src="<?php echo esc_url( $mk_img ); ?>" alt="<?php _e( 'No Image Available', MENUKAART_TXT_DOMAIN ); ?>">
								</div>
								<div class="mk-menu-content">
									<div class="menukaart-menu-name"><?php echo get_the_title(); ?></div>
									<div class="menukaart-menu-price"><?php echo esc_html( $mk_currency ) . '' . number_format( ( esc_html( $mk_price ) / 100 ), 2, ",", "" ); ?></div>
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
			<?php
	  	}
	}
}
?>
	<div class="menukaart-bottom-border"></div>
</div>