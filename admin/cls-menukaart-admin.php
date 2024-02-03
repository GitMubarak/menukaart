<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Master Class: Admin
*/
class Menukaart_Admin 
{
	use Menukaart_Common, Menukaart_General_Settings, Menukaart_Styles_Settings;

	private $menukaart_version;
	private $menukaart_assets_prefix;

	function __construct( $version ) {

		$this->menukaart_version = $version;
		$this->menukaart_assets_prefix = 'menukaart-';
	}

	/**
	 *	Flush Rewrite on Plugin initialization
	 */
	function menukaart_flush_rewrite() {

		if ( get_option('menukaart_plugin_settings_have_changed') == true ) {
			flush_rewrite_rules();
			update_option('menukaart_plugin_settings_have_changed', false);
		}
	}

	/**
	 *	Loading admin menu
	 */
	function menukaart_admin_menu() {

		$menukaart_cpt_menu = 'edit.php?post_type=menukaart';

		add_submenu_page(
			$menukaart_cpt_menu,
			__('Manage Views', MENUKAART_TXT_DOMAIN),
			__('Manage Views', MENUKAART_TXT_DOMAIN),
			'manage_options',
			'menukaart-manage-views',
			array($this, MENUKAART_PRFX . 'manage_views')
		);
		
		add_submenu_page(
            $menukaart_cpt_menu,
            __( 'Usage & Tutorial', MENUKAART_TXT_DOMAIN ),
            __( 'Usage & Tutorial', MENUKAART_TXT_DOMAIN ),
            'manage_options',
            'menukaart-get-help',
            array( $this, MENUKAART_PRFX . 'get_help' )
        );
	}

	/**
	 *	Loading admin panel assets
	 */
	function menukaart_enqueue_assets() {

		wp_enqueue_style( 'wp-color-picker');

		wp_enqueue_style(
			$this->menukaart_assets_prefix . 'font-awesome', 
			MENUKAART_ASSETS .'css/fontawesome/css/all.min.css',
			array(),
			$this->menukaart_version,
			FALSE
		);

		wp_enqueue_style(
			$this->menukaart_assets_prefix . 'admin',
			MENUKAART_ASSETS . 'css/' . $this->menukaart_assets_prefix . 'admin.css',
			array(),
			$this->menukaart_version,
			FALSE
		);

		if ( ! wp_script_is('jquery') ) {
			wp_enqueue_script('jquery');
		}
		
		wp_enqueue_script( 'wp-color-picker');
		
		wp_enqueue_script(
			$this->menukaart_assets_prefix . 'admin-script',
			MENUKAART_ASSETS . 'js/' . $this->menukaart_assets_prefix . 'admin.js',
			array('jquery'),
			$this->menukaart_version,
			TRUE
		);
	}

	function menukaart_custom_post_type() {

		$labels = array(
							'name'                => __('All Menu Items', MENUKAART_TXT_DOMAIN),
							'singular_name'       => __('All Menu Item', MENUKAART_TXT_DOMAIN),
							'menu_name'           => __('Menukaart', MENUKAART_TXT_DOMAIN),
							'parent_item_colon'   => __('Parent Menu Item', MENUKAART_TXT_DOMAIN),
							'all_items'           => __('All Menu Items', MENUKAART_TXT_DOMAIN),
							'view_item'           => __('View Menu Item', MENUKAART_TXT_DOMAIN),
							'add_new_item'        => __('Add New Menu Item', MENUKAART_TXT_DOMAIN),
							'add_new'             => __('Add Menu Item', MENUKAART_TXT_DOMAIN),
							'edit_item'           => __('Edit Menu Item', MENUKAART_TXT_DOMAIN),
							'update_item'         => __('Update Menu Item', MENUKAART_TXT_DOMAIN),
							'search_items'        => __('Search Menu Item', MENUKAART_TXT_DOMAIN),
							'not_found'           => __('Not Found', MENUKAART_TXT_DOMAIN),
							'not_found_in_trash'  => __('Not found in Trash', MENUKAART_TXT_DOMAIN)
						);
		$args = array(
						'label'               => __('menukaart', MENUKAART_TXT_DOMAIN),
						'description'         => __('Description For Menukaart', MENUKAART_TXT_DOMAIN),
						'labels'              => $labels,
						'supports'            => array('title', 'editor', 'thumbnail', 'page-attributes'),
						'public'              => true,
						'hierarchical'        => false,
						'show_ui'             => true,
						'show_in_menu'        => true,
						'show_in_nav_menus'   => true,
						'show_in_admin_bar'   => true,
						'has_archive'         => false,
						'can_export'          => true,
						'exclude_from_search' => false,
						'yarpp_support'       => true,
						//'taxonomies' 	      => array('post_tag'),
						'publicly_queryable'  => true,
						'capability_type'     => 'page',
						'menu_icon'           => 'dashicons-food'
					);

		register_post_type('menukaart', $args);
	}

	function menukaart_taxonomy_for_testimonials() {

		$labels = array(
			'name' 				=> __('Courses', MENUKAART_TXT_DOMAIN),
			'singular_name' 	=> __('Course', MENUKAART_TXT_DOMAIN),
			'search_items' 		=> __('Search Courses', MENUKAART_TXT_DOMAIN),
			'all_items' 		=> __('All Courses', MENUKAART_TXT_DOMAIN),
			'parent_item' 		=> __('Parent Course', MENUKAART_TXT_DOMAIN),
			'parent_item_colon'	=> __('Parent Course:', MENUKAART_TXT_DOMAIN),
			'edit_item' 		=> __('Edit Course', MENUKAART_TXT_DOMAIN),
			'update_item' 		=> __('Update Course', MENUKAART_TXT_DOMAIN),
			'add_new_item' 		=> __('Add New Course', MENUKAART_TXT_DOMAIN),
			'new_item_name' 	=> __('New Course Name', MENUKAART_TXT_DOMAIN),
			'menu_name' 		=> __('Courses', MENUKAART_TXT_DOMAIN),
		);

		register_taxonomy('menukaart_courses', array('menukaart'), array(
			'hierarchical' 		=> true,
			'labels' 			=> $labels,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'query_var' 		=> true,
			'rewrite' 			=> array('slug' => 'testimonial-category'),
		));

		// Meals are combination of multiple courses
		// Course are combination of multiple dishes
	}

	function menukaart_metaboxes() {

		add_meta_box(
			'menukaart-metaboxes',
			__('Menu Item Information', MENUKAART_TXT_DOMAIN),
			array( $this, MENUKAART_PRFX . 'metabox_content' ),
			'menukaart',
			'normal',
			'high'
		);
	}

	function menukaart_metabox_content() {

		wp_nonce_field( basename(__FILE__), 'menukaart_fields' );
	
		require_once MENUKAART_PATH . 'admin/view/partial/add-menu.php';
	}

	/**
	 * Save the metabox data
	 */
	function menukaart_save_meta_value( $post_id ) {
		
		global $post;

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}

		if ( ! isset( $_POST['mk_price'] ) || ! wp_verify_nonce( $_POST['menukaart_fields'], basename(__FILE__) ) ) {
			return $post_id;
		}

		$menukaart_meta['mk_price'] 	= isset( $_POST['mk_price'] ) ? sanitize_text_field( $_POST['mk_price'] ) : '';
		$menukaart_meta['mk_wc_prod']	= isset( $_POST['mk_wc_prod'] ) ? sanitize_text_field( $_POST['mk_wc_prod'] ) : '';
		$menukaart_meta['mk_status']	= isset( $_POST['mk_status'] ) ? sanitize_text_field( $_POST['mk_status'] ) : '';

		foreach ( $menukaart_meta as $key => $value ) {

			if ('revision' === $post->post_type) {
				return;
			}

			if ( get_post_meta( $post_id, $key, false ) ) {
				update_post_meta( $post_id, $key, $value );
			} else {
				add_post_meta( $post_id, $key, $value );
			}

			if ( ! $value ) {
				delete_post_meta( $post_id, $key );
			}

		}
	}

	function menukaart_manage_views() {

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
	
		$menukaartTab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : null;

		$menukaartMessage	= false;

		if ( isset( $_POST['btnGeneralSettings'] ) ) {

			$menukaartMessage = $this->menukaart_set_general_settings( $_POST );
		}

		$menukaartGeneralSettings = $this->menukaart_get_general_settings();

		if ( isset( $_POST['updatemenuStyles'] ) ) {

			$menukaartMessage = $this->menukaart_set_styles_settings( $_POST );
		}

		$menukaartStylesSettings = $this->menukaart_get_styles_settings();

		require_once MENUKAART_PATH . 'admin/view/manage-views.php';
	}

	function menukaart_get_help() {
        require_once MENUKAART_PATH . 'admin/view/help-usage.php';
    }

	function menukaart_display_notification( $type, $msg ) { 
		?>
		<div class="menukaart-alert <?php esc_attr_e( $type ); ?>">
			<span class="menukaart-closebtn">&times;</span>
			<strong><?php esc_html_e( ucfirst( $type ) ); ?>!</strong>
			<?php esc_html_e( $msg, MENUKAART_TXT_DOMAIN ); ?>
		</div>
		<?php 
	}
}
?>