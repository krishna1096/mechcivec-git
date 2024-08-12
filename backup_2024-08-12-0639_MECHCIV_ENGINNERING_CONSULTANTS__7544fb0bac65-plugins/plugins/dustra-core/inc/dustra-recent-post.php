<?php
/**
* dustra-core Recent Post widget
*
* Displays Recent Post widget
*
* @author 		validthemes
* @category 	Widgets
* @package 		dustra-core/widgets
* @version 		1.0.0
* @extends 		WP_Widget
*/
class dustra_Recent_Post_Widget extends WP_Widget {

	/**
	 * Sets up a new Recent Posts widget instance.
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'recent-post',
			'description'                 => esc_html__('The most recent posts on your site', 'dustra-core'),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'dustra-recent-posts', esc_html__('Dustra Recent Posts', 'dustra-core'), $widget_ops );

	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		$show_author = isset( $instance['show_author'] ) ? $instance['show_author'] : false;

		$r = new WP_Query(
			/**
			 * Filters the arguments for the Recent Posts widget.
			 * @see WP_Query::get_posts()
			 *
			 * @param array $args     An array of arguments used to retrieve the recent posts.
			 * @param array $instance Array of settings for the current widget.
			 */
			apply_filters(
				'widget_posts_args',
				array(
					'posts_per_page'      => $number,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
				),
				$instance
			)
		);

		if ( ! $r->have_posts() ) {
			return;
		}
		?>
		<?php echo $args['before_widget']; ?>
		<?php
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>
		<ul>
			<?php foreach ( $r->posts as $recent_post ) : ?>
				<?php
				$post_title   = get_the_title( $recent_post->ID );
				$title 	= ( ! empty( $post_title ) ) ? $post_title : esc_html__( 'no title', 'dustra-core' );
				$image 	= wp_get_attachment_image_src( get_post_thumbnail_id($recent_post->ID));
				?>

				<li>
					<?php if (has_post_thumbnail( $recent_post->ID )) : ?>
                    <div class="thumb">
                        <a href="<?php the_permalink( $recent_post->ID ); ?>">
                            <img src="<?php echo esc_url( $image[0] ) ?>" alt="<?php echo esc_attr__( 'dustra', 'dustra-core' ); ?>">
                        </a>
                    </div>
                    <?php endif; ?>
                    <div class="info">
                        <div class="meta-title">
                        	<span class="post-date"><?php echo get_the_date();?></span>
				            <?php if ( $post_title ) : ?><a href="<?php the_permalink($recent_post->ID ); ?>"><?php echo $post_title; ?></a> <?php endif;
				             ?>
				        </div>
                    </div>
                </li>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		</ul>
		<?php
		echo $args['after_widget'];
	}
	/**
	 * Update the widget settings.
	 *
	 * @param array $new_instance New widget instance.
	 * @param array $old_instance Old widget instance.
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['number']    = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_author'] = isset( $new_instance['show_author'] ) ? (bool) $new_instance['show_author'] : false;
		return $instance;
	}

	/**
	 * Widget form.
	 *
	 * @param array $instance Widget instance.
	 *
	 * @return void
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$show_author = isset( $instance['show_author'] ) ? (bool) $instance['show_author'] : false;
		?>
		<p><label for="<?php echo wp_specialchars_decode( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'dustra-core' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo wp_specialchars_decode( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

        <p><label for="<?php echo wp_specialchars_decode( $this->get_field_id( 'number' ) ); ?>"><?php echo esc_html__( 'Number of posts to show:', 'dustra-core' ); ?></label>
        <input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo wp_specialchars_decode( $this->get_field_name( 'number' ) ); ?>" type="number" value="<?php echo esc_attr( $number ); ?>" size="3" /></p>

		<?php
	}
}

function dustra_register_custom_widgets() {
    register_widget( 'dustra_Recent_Post_Widget' );
}
add_action( 'widgets_init', 'dustra_register_custom_widgets' );	