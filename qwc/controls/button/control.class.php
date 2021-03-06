<?php
qwc_register_control( 'button', 'Qwc_Control_Button' );

function qwc_register_control_button( $wp_customize ){
	class Qwc_Control_Button extends WP_Customize_Control {
		public $type = 'button';
		public $args = array();

		public function __construct( $manager, $id, $args = array() ) {
			$this->args = $args;
			parent::__construct( $manager, $id, $args);
		}

		public function render_content() {
			?>
				<label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php if ( ! empty( $this->description ) ) : ?>
						<span class="description customize-control-description"><?php echo $this->description ; ?></span>
					<?php endif; ?>
				</label>
					
				<?php 
					$button_id    = ( !empty($this->args['button_id']) ) ? ' id="'. $this->args['button_id'] .'"' : '';
					$button_value = ( !empty($this->args['button_value']) ) ? $this->args['button_value'] : '';
					echo '<button'. $button_id . '>'. esc_html($button_value) .'</button>';
				?>
			<?php
		}
	}
}
add_action( 'customize_register', 'qwc_register_control_button' );