<?php
/**
 * General action, hooks loader
*/
class Menukaart_Loader {

	protected $menukaart_actions;
	protected $menukaart_filters;

	/**
	 * Class Constructor
	*/
	function __construct() {
		$this->menukaart_actions = array();
		$this->menukaart_filters = array();
	}

	function add_action( $hook, $component, $callback ) {
		$this->menukaart_actions = $this->add( $this->menukaart_actions, $hook, $component, $callback );
	}

	function add_filter( $hook, $component, $callback ) {
		$this->menukaart_filters = $this->add( $this->menukaart_filters, $hook, $component, $callback );
	}

	private function add( $hooks, $hook, $component, $callback ) {
		$hooks[] = array( 'hook' => $hook, 'component' => $component, 'callback' => $callback );
		return $hooks;
	}

	public function menukaart_run() {
		foreach( $this->menukaart_filters as $hook ){
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
		}
		foreach( $this->menukaart_actions as $hook ){
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
		}
	}
}
?>