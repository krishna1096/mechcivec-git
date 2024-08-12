<?php
	
	/**
	 * dustra Contact Us Widget
	 *
	 *
	 * @author 		Validthemes
	 * @category 	Widgets
	 * @package 	dustra-core/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'dustra_contact_widget');
	function dustra_contact_widget() {
		register_widget('dustra_contact_widget');
	}
	
	class dustra_contact_widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('dustra_contact_widget',esc_html__('Dustra:: Contact Us','dustra-core'),array(
				'field_one' => esc_html__('Dustra:: Contact Us','dustra-core'),
			));
		}
		
		public function widget($args,$instance){
			
			$wi_title = !empty($instance['title'])?$instance['title']:'';
			$mail     = !empty($instance['mail'])?$instance['mail']:'';
			$address  = !empty($instance['address'])?$instance['address']:'';
			$subtitle    = !empty($instance['subtitle'])?$instance['subtitle']:'';
			
			$title = $args['before_title'];
			$title .= $wi_title;
			$title .= $args['after_title'];
			$widget = $args['before_widget'];
				$widget .='<div class="f-item contact">';
	                $widget .=$title;
	                	$widget .='<p>'.htmlspecialchars_decode(esc_html($subtitle)).'</p>';
	                    $widget .= '<ul>';
	                        $widget .='<li>';
	                            $widget .='<i class="fas fa-map-marker-alt"></i>'; 
	                            $widget .=esc_html($address);
	                        $widget .= '</li>';
	                        $widget .= '<li>';
	                            $widget .= '<i class="fas fa-envelope-open"></i>'; 
	                            $widget .= '<a href="mailto:'.esc_url($mail).'">'.esc_html($mail).'</a>';
	                        $widget .= '</li>';
	                    $widget .='</ul>';
	            $widget .= '</div>';
			$widget .= $args['after_widget'];
			print $widget;
		}
		
		/**
		 * widget function.
		 *
		 * @see WP_Widget
		 * @access public
		 * @param array $instance
		 * @return void
		 */
		public function form($instance){
			
			$title    = isset($instance['title'])? $instance['title']:'';
			$mail     = isset($instance['mail'])? $instance['mail']:'';
			$address  = isset($instance['address'])? $instance['address']:'';
			$subtitle    = isset($instance['subtitle'])? $instance['subtitle']:'';
			
			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','dustra-core'); ?></label>
			</p>
			<input type="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"  name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
			<p>
				<label for="subtitle"><?php esc_html_e('SubTitle:','dustra-core'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('subtitle')); ?>" value="<?php echo esc_attr($subtitle); ?>" name="<?php echo esc_attr($this->get_field_name('subtitle')); ?>">
			<p>
				<label for="title"><?php esc_html_e('Mail:','dustra-core'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('mail')); ?>" value="<?php echo esc_attr($mail); ?>" name="<?php echo esc_attr($this->get_field_name('mail')); ?>">

			<p>
				<label for="title"><?php esc_html_e('Address:','dustra-core'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('address')); ?>" value="<?php echo esc_attr($address); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>">
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['mail'] = ( ! empty( $new_instance['mail'] ) ) ? strip_tags( $new_instance['mail'] ) : '';
			$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';
			$instance['subtitle'] = ( ! empty( $new_instance['subtitle'] ) ) ? strip_tags( $new_instance['subtitle'] ) : '';
			return $instance;
		}
	}