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

		wp_enqueue_style('menukaart-front',
			MENUKAART_ASSETS . 'css/' . $this->menukaart_assets_prefix . 'front.css',
			array(),
			$this->menukaart_version,
			false
		);
		
		if ( ! wp_script_is( 'jquery' ) ) {
			wp_enqueue_script('jquery');
		}

		wp_enqueue_script('menukaart-front',
			MENUKAART_ASSETS . 'js/' . $this->menukaart_assets_prefix . 'front.js',
			array('jquery'),
			$this->menukaart_version,
			true
		);
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
}
?>