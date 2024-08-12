<?php
/**
 * @version  1.0
 * @package  dustra
 * @author   Themelooks <support@themelooks.com>
 */
/**************************************
*Creating Service Pdf Widget
***************************************/
class dustra_service_pdf extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'dustra_service_pdf',
			// Widget name will appear in UI
			esc_html__( 'Dustra Service Pdf', 'dustra-core' ),
			// Widget description
			array( 
				'description' 	=> esc_html__( 'Add Service Pdf', 'dustra-core' ),
				'classname'		=> 'single-widget brochure',
			)
		);
	}


// This is where the action happens
public function widget( $args, $instance ) {
	$title 		= apply_filters( 'widget_title', $instance['title'] );
	// before and after widget arguments are defined by themes
	echo $args['before_widget'];
	?>

    <?php if ( ! empty( $title ) ){
		echo $args['before_title'] . $title . $args['after_title'];
    }
    $files = get_post_meta( get_the_ID(), '_service_meta', true );
    if(!empty($files)){ 
    	echo "<ul>";
	    foreach ( $files as $entry) {
	    	$title  =!empty($entry['_accordion-title']) ?  $entry['_accordion-title'] : '';
            $file   =!empty($entry['_pdf_attachment']) ?  $entry['_pdf_attachment'] : '';

			echo '<li><a href="'.$file.'"><i class="fas fa-file-pdf"></i>'.esc_html($title,'dustra').'</a></li>';
		}
		echo "</ul>";
	}
    ?>
	<?php 
	echo $args['after_widget'];
}

//Widget Backend
public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}else {
		$title = esc_html__( 'Pdfs', 'dustra-core' );
	}

// Widget admin form
?>
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">
			<?php
				echo esc_html__( 'Title:' ,'dustra-core');
			?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	
<?php
	}
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance 					= array();
	$instance['title'] 	  		= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

	return $instance;
}
} // Class dustra_subscribe_widget ends here
// Register and load the widget
function dustra_service_related_pdf_widget() {
	register_widget( 'dustra_service_pdf' );
}
add_action( 'widgets_init', 'dustra_service_related_pdf_widget' );