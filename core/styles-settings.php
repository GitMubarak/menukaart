<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: Styles Settings
*/
trait Menukaart_Styles_Settings
{
    protected $fields, $settings, $options;
    
    protected function menukaart_set_styles_settings( $post ) {

        $this->fields = $this->menukaart_styles_settings_option_fileds();

        $this->options  = $this->menukaart_build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'menukaart_styles_settings', $this->options, $post );

        return update_option( 'menukaart_styles_settings', $this->settings );
    }

    protected function menukaart_get_styles_settings() {

        $this->fields   = $this->menukaart_styles_settings_option_fileds();
		$this->settings = get_option('menukaart_styles_settings');
        
        return $this->menukaart_build_get_settings_options( $this->fields, $this->settings );
	}

    protected function menukaart_styles_settings_option_fileds() {

        return [
            [
                'name'      => 'mc_menu_title_bg_color',
                'type'      => 'text',
                'default'   => '#DAABB5',
            ],
            [
                'name'      => 'mc_menu_title_border_color',
                'type'      => 'text',
                'default'   => '#DAABB5',
            ],
            [
                'name'      => 'mc_menu_title_font_color',
                'type'      => 'text',
                'default'   => '#FFFFFF',
            ],
            [
                'name'      => 'mk_order_with',
                'type'      => 'string',
                'default'   => 'ASC',
            ],
        ];

    }
}