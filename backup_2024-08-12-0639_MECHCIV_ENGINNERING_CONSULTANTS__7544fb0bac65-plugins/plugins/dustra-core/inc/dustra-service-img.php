<?php
/**
* @version  1.0
* @package  dustra
* @author   Validtheme<support@dustra.com>
*
* Websites: http://www.vecurosoft.com
*
*/

/**************
* Creating Service Image Widget
*************/

class dustra_service_img_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'dustra_service_img_widget',

                // Widget name will appear in UI
                esc_html__( 'Dustra :: Service Image', 'dustra-core' ),

                // Widget description
                array(
                    'classname'                     => 'single-widget quick-contact text-light',
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add service Me Widget', 'dustra' ),
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title          = apply_filters( 'widget_title', $instance['title'] );
            $service_img      = ( !empty( $instance['service_img'] ) ) ? $instance['service_img'] : "";
            $content    = ( !empty( $instance['content'] ) ) ? $instance['content'] : "";
            $content_number   = ( !empty( $instance['content_number'] ) ) ? $instance['content_number'] : "";
           

            //before and after widget arguments are defined by themes
            echo '<!-- Author Widget -->';
            echo $args['before_widget'];

                echo '<!-- Widget Content -->';
                    echo '<div class="content" style="background-image: url('.esc_url( $service_img ).');">';
                        echo '<h4>'.esc_html( $content ).'</h4>
                        <i class="fas fa-headset"></i>';
                        echo '<h2>'.esc_html( $title ).'</h2>';
                    echo '</div>';
                echo '<!-- End of Widget Content -->';
            echo $args['after_widget'];
            echo '<!-- End of Author Widget -->';
        }

        // Widget Backend
        public function form( $instance ) {

            //Title
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }

            // Content 
            if ( isset( $instance[ 'content' ] ) ) {
                $content = $instance[ 'content' ];
            }else {
                $content = '';
            }

            //Image
            if ( isset( $instance[ 'service_img' ] ) ) {
                $service_img = $instance[ 'service_img' ];
            }else {
                $service_img = '';
            }

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'dustra'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <input value="<?php echo esc_attr($service_img); ?>" name="<?php echo $this->get_field_name( 'service_img' ); ?>" type="hidden" class="widefat service_img_val" type="text" />
                <img class="service_img_show" src="<?php echo esc_url($service_img); ?>" <?php echo esc_html__( 'Dustra', 'dustra-core' ); ?> >
            </p>

            <p>
                <button class="button service-me-up-button"><?php ( empty( $service_img ) ) ?  esc_html_e("Upload Image","dustra") : esc_html_e("Change Image","dustra"); ?></button>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e( 'Content :' ,'dustra'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" type="text" value="<?php echo esc_attr( $content ); ?>" />
            </p>
            
            
            <script>
            jQuery(function($){
                'use strict';
                /**
                 *
                 * service Widget service Us upload
                 *
                 */
                $( function(){
                    $(".service_img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
                    $(document).on('widget-updated',function(event,widget){
                        var widget_id = $(widget).attr('id');
                        if(widget_id.indexOf('dustra_serviceus_widget')!=-1){
                            $imgval = $(".service_img_val").val();
                            $(".service_img_show").attr("src",$imgval);
                            $(".service_img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
                        }
                    });
                    $("body").off("click",".service-me-up-button");
                    $("body").on("click",".service-me-up-button",function( e ){

                        let frame = wp.media({
                            title: 'Select or Upload Media service Us',
                            button: {
                                text: 'Use this service Us'
                            },
                            multiple: false
                        });

                        frame.on("select",function(){
                            // Get media attachment details from the frame state
                            let $img = frame.state().get('selection').first().toJSON();

                            $(".service_img_show").attr("src",$img.url);
                            $(".service_img_val").val($img.url);

                            $(".service_img_val").trigger('change');

                            $(".service-me-up-button").text("Change Image");
                        });

                        // Open Media Modal
                        frame.open();
                        e.preventDefault();
                    });
                });
            });
            </script>
            <?php
        }


        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title']          = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['content']    = ( ! empty( $new_instance['content'] ) ) ? strip_tags( $new_instance['content'] ) : '';
            $instance['content_number']   = ( ! empty( $new_instance['content_number'] ) ) ? strip_tags( $new_instance['content_number'] ) : '';
            $instance['service_img']      = ( ! empty( $new_instance['service_img'] ) ) ? strip_tags( $new_instance['service_img'] ) : '';
            return $instance;
        }
    } // Class dustra_service_img_widget ends here


    // Register and load the widget
    function dustra_service_me_load_widget() {
        register_widget( 'dustra_service_img_widget' );
    }
    add_action( 'widgets_init', 'dustra_service_me_load_widget' );