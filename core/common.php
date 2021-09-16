<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: Common Functions
*/
trait Menukaart_Common 
{
	protected $data;

    protected function menukaart_admin_sidebar() {
		?>
		<div class="menukaart-admin-sidebar" style="width: 20%; float: left; margin-top: 5px;">
			<div class="postbox">
				<h3 class="hndle"><span>Support / Bug / Customization</span></h3>
				<div class="inside centered">
					<p>Please feel free to let us know if you have any bugs to report. Your report / suggestion can make the plugin awesome!</p>
					<p style="margin-bottom: 1px! important;"><a href="https://hmplugin.com/contact/" target="_blank" class="button button-primary">Get Support</a></p>
				</div>
			</div>
			<div class="postbox">
				<h3 class="hndle"><span>Buy us a coffee</span></h3>
				<div class="inside centered">
					<p>If you like the plugin, would you like to support the advancement of this plugin?</p>
					<p style="margin-bottom: 1px! important;"><a href='https://www.paypal.me/mhmrajib' class="button button-primary" target="_blank">Donate</a></p>
				</div>
			</div>

			<div class="postbox">
				<h3 class="hndle"><span>Join HM Plugin on facebook</span></h3>
                <div class="inside centered">
                    <p style="margin-bottom: 1px! important;"><a href='https://wwww.facebook.com/hmplugin' class="button button-info" target="_blank">Join HM Plugin<span class="dashicons dashicons-facebook" style="position: relative; top: 3px; margin-left: 3px; color: #0fb9da;"></span></a></p>
                </div>
            </div>

			<div class="postbox">
				<h3 class="hndle"><span>Follow HM Plugin on twitter</span></h3>
				<div class="inside centered">
					<a href="https://twitter.com/hmplugin" target="_blank" class="button button-secondary">Follow @hmplugin<span class="dashicons dashicons-twitter" style="position: relative; top: 3px; margin-left: 3px; color: #0fb9da;"></span></a>
				</div>
			</div>
		</div> 
		<?php
	}

	protected function menukaart_build_set_settings_options( $fields, $post ) {

		$this->data = [];

		$i=0;
        foreach ( $fields as $field => $value ) {

            if ( 'string' === $fields[$i]['type'] ) {

                $this->data[$fields[$i]['name']] = isset( $post[$fields[$i]['name']] ) && filter_var( $post[$fields[$i]['name']], FILTER_SANITIZE_STRING ) ? $post[$fields[$i]['name']] : $fields[$i]['default'];

            }
            if ( 'number' === $fields[$i]['type'] ) {

                $this->data[$fields[$i]['name']] = isset( $post[$fields[$i]['name']] ) && filter_var( $post[$fields[$i]['name']], FILTER_SANITIZE_NUMBER_INT ) ? $post[$fields[$i]['name']] : $fields[$i]['default'];

            }
            if ( 'boolean' === $fields[$i]['type'] ) {

                $this->data[$fields[$i]['name']] = isset( $post[$fields[$i]['name']] ) ? rest_sanitize_boolean( $post[$fields[$i]['name']] ) : $fields[$i]['default'];

            }
            if ( 'text' === $this->fields[$i]['type'] ) {

                $this->data[$this->fields[$i]['name']] = isset( $post[$this->fields[$i]['name']] ) ? sanitize_text_field( $post[$this->fields[$i]['name']] ) : $this->fields[$i]['default'];

            }
            $i++;
        }

		return $this->data;
	}

	protected function menukaart_build_get_settings_options( $fields, $settings ) {
		
		$this->data = [];
        $i=0;

        foreach ( $fields as $option => $value ) {
            $this->data[$fields[$i]['name']]  = isset( $settings[$fields[$i]['name']] ) ? $settings[$fields[$i]['name']] : $fields[$i]['default'];
            $i++;
        }

		return $this->data;

	}
}