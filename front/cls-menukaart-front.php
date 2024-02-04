<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Master Class: Front
*/
class Menukaart_Front 
{
	use Menukaart_Common, Menukaart_General_Settings, Menukaart_Styles_Settings;

	private $menukaart_version;

	function __construct( $version ) {
		$this->menukaart_version = $version;
		$this->menukaart_assets_prefix = 'menukaart-';
	}
	
	function menukaart_front_assets() {
		
		wp_enqueue_style( 'custom-google-fonts', '//fonts.googleapis.com/css2?family=Oswald&display=swap', false );
		wp_enqueue_style( 'mk-jquery-modal', '//cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css', false );

		wp_enqueue_style(
			$this->menukaart_assets_prefix . 'font-awesome', 
			MENUKAART_ASSETS .'css/fontawesome/css/all.min.css',
			array(),
			$this->menukaart_version,
			FALSE
		);

		wp_enqueue_style('menukaart-front',
			MENUKAART_ASSETS . 'css/' . $this->menukaart_assets_prefix . 'front.css',
			array(),
			$this->menukaart_version,
			false
		);
		
		if ( ! wp_script_is( 'jquery' ) ) {
			wp_enqueue_script('jquery');
		}

		wp_register_script( 'mk-jquery-modal', '//cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js', null, null, true );
		wp_enqueue_script('mk-jquery-modal');

		wp_enqueue_script('menukaart-front',
			MENUKAART_ASSETS . 'js/' . $this->menukaart_assets_prefix . 'front.js',
			array('jquery'),
			$this->menukaart_version,
			true
		);

		wp_localize_script( 'menukaart-front', 'mkAdminScriptObj', ['ajaxurl' => admin_url('admin-ajax.php')] );
	}

	function menukaart_load_shortcode() {
		add_shortcode( 'menukaart', array( $this, 'menukaart_load_shortcode_view' ) );
	}

	function menukaart_load_shortcode_view( $mkAttr ) {
		
		$output = '';
		ob_start();
		include MENUKAART_PATH . 'front/view/menukaart.php';
		$output .= ob_get_clean();
		return $output;
	}

	function mk_load_menu_detail_modal() {
		$post_id = sanitize_text_field( $_POST['postId'] );
		include MENUKAART_PATH . 'front/view/detail-modal.php';
		exit;
	}
}
?>