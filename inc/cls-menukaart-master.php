<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include_once MENUKAART_PATH . 'core/common.php';
include_once MENUKAART_PATH . 'core/general-settings.php';
include_once MENUKAART_PATH . 'core/styles-settings.php';

class Menukaart_Master 
{
	protected $menukaart_loader;
	protected $menukaart_version;

	/**
	 * Class Constructor
	 */
	function __construct() {
		$this->menukaart_version = MENUKAART_VERSION;
		$this->menukaart_load_dependencies();
		$this->menukaart_trigger_admin_hooks();
		$this->menukaart_trigger_front_hooks();
	}

	private function menukaart_load_dependencies() {
		require_once MENUKAART_PATH . 'admin/' . MENUKAART_CLS_PRFX . 'admin.php';
		require_once MENUKAART_PATH . 'front/' . MENUKAART_CLS_PRFX . 'front.php';
		require_once MENUKAART_PATH . 'inc/' . MENUKAART_CLS_PRFX . 'loader.php';
		$this->menukaart_loader = new Menukaart_Loader();
	}

	private function menukaart_trigger_admin_hooks() {
		$menukaart_admin = new Menukaart_Admin($this->menukaart_version());
		$this->menukaart_loader->add_action('admin_enqueue_scripts', $menukaart_admin, MENUKAART_PRFX . 'enqueue_assets');
		$this->menukaart_loader->add_action('init', $menukaart_admin, MENUKAART_PRFX . 'custom_post_type', 0);
		$this->menukaart_loader->add_action('add_meta_boxes', $menukaart_admin, MENUKAART_PRFX . 'metaboxes');
		$this->menukaart_loader->add_action('save_post', $menukaart_admin, MENUKAART_PRFX . 'save_meta_value', 1, 1);
		$this->menukaart_loader->add_action('admin_menu', $menukaart_admin, MENUKAART_PRFX . 'admin_menu', 0);
		$this->menukaart_loader->add_action('admin_init', $menukaart_admin, MENUKAART_PRFX . 'flush_rewrite');
		$this->menukaart_loader->add_action('init', $menukaart_admin, MENUKAART_PRFX . 'taxonomy_for_testimonials', 0);
	}

	function menukaart_trigger_front_hooks() {
		$menukaart_front = new Menukaart_Front($this->menukaart_version());
		$this->menukaart_loader->add_action('wp_enqueue_scripts', $menukaart_front, MENUKAART_PRFX . 'front_assets');
		$menukaart_front->menukaart_load_shortcode();
	}

	function menukaart_run() {
		$this->menukaart_loader->menukaart_run();
	}

	function menukaart_version() {
		return $this->menukaart_version;
	}
}