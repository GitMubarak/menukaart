<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: General Settings
*/
trait Menukaart_General_Settings
{
    protected $fields, $settings, $options;
    
    protected function menukaart_set_general_settings( $post ) {

        $this->fields = $this->menukaart_general_settings_option_fileds();

        $this->options  = $this->menukaart_build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'menukaart_general_settings', $this->options, $post );

        return update_option( 'menukaart_general_settings', $this->settings );
    }

    protected function menukaart_get_general_settings() {

        $this->fields   = $this->menukaart_general_settings_option_fileds();
		$this->settings = get_option('menukaart_general_settings');
        
        return $this->menukaart_build_get_settings_options( $this->fields, $this->settings );
	}

    protected function menukaart_general_settings_option_fileds() {

        return [
            [
                'name'      => 'mk_global_font_family',
                'type'      => 'text',
                'default'   => '"Oswald", sans-serif',
            ],
            [
                'name'      => 'mk_hide_menu_title',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'mk_menu_title_text',
                'type'      => 'text',
                'default'   => 'Menukaart',
            ],
            [
                'name'      => 'mk_order_by',
                'type'      => 'string',
                'default'   => 'title',
            ],
            [
                'name'      => 'mk_order_with',
                'type'      => 'string',
                'default'   => 'ASC',
            ],
        ];

    }
}