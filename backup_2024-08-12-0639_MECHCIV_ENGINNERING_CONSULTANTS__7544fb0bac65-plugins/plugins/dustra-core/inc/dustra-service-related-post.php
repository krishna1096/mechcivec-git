<?php
/**
 * @version  1.0
 * @package  dustra
 * @author   Themelooks <support@themelooks.com>
 *
 * Websites: http://www.themelooks.com
 *
 */


/**************************************
*Creating Service Related Post Widget
***************************************/

class dustra_service_related_post_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'dustra_service_related_post_widget',
			// Widget name will appear in UI
			esc_html__( 'Dustra Service Related Post', 'dustra-core' ),
			// Widget description
			array( 
				'description' 	=> esc_html__( 'Add Service Related Post', 'dustra-core' ),
				'classname'		=> 'single-widget services-list',
			)
		);
	}


// This is where the action happens
public function widget( $args, $instance ) {
	$title 		= apply_filters( 'widget_title', $instance['title'] );
	$post_number= apply_filters( 'widget_post_number', $instance['post_number'] );

	// before and after widget arguments are defined by themes
	echo $args['before_widget'];
	?>


    <?php if ( ! empty( $title ) ){
		echo $args['before_title'] . $title . $args['after_title'];
    }?>
        <?php 
		$argss = array(
			'post_type'			=> 'dustra-service',
			'posts_per_page'	=> esc_attr( $post_number ),
		);
		$c_id =get_the_ID() ;
		$loop = new WP_Query( $argss );
		echo '<div class="content">';
		echo "<ul>";
		if( $loop->have_posts() ){
			while( $loop->have_posts() ) {
			$loop->the_post();
			$post_id = get_the_ID();
		?>
        	<li class=<?php if($c_id == $post_id){ echo "current-item";} ?> ><a href="<?php the_permalink();?>"><?php echo get_the_title();?></a></li>    
		<?php
            }
			wp_reset_postdata();
		}
		echo "</ul>";
		echo '</div>';

	echo $args['after_widget'];
}

//Widget Backend
public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}else {
		$title = esc_html__( 'Related Posts', 'dustra-core' );
	}
	//Post Limit
	if ( isset( $instance[ 'post_number' ] ) ) {
		$post_number = $instance[ 'post_number' ];
	}else {
		$post_number = esc_html( '2');
	}
	//	Show Date
	if ( isset( $instance[ 'show_date' ] ) ) {
		$show_date = $instance[ 'show_date' ];
	}else {
		$show_date = '';
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
	<p>
		<label for="<?php echo $this->get_field_id( 'post_number' ); ?>">
			<?php
				_e( 'Number of posts to show: ' ,'dustra-core');
			?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'post_number' ); ?>" name="<?php echo $this->get_field_name( 'post_number' ); ?>" type="number" value="<?php echo esc_attr( $post_number ); ?>" />
	</p>
	
<?php
	}
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance 					= array();
	$instance['title'] 	  		= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['post_number'] 	= ( ! empty( $new_instance['post_number'] ) ) ? strip_tags( $new_instance['post_number'] ) : '';

	return $instance;
}
} // Class dustra_subscribe_widget ends here
// Register and load the widget
function dustra_service_related_post_load_widget() {
	register_widget( 'dustra_service_related_post_widget' );
}
add_action( 'widgets_init', 'dustra_service_related_post_load_widget' );