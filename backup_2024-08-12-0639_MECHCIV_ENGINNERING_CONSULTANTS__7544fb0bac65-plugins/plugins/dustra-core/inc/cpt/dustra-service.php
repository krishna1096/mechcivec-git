<?php 
/**
 * Class Dustra_Service_Post
 * @package PostType
 *
 * Use actual name of post type for
 * easy readability.
 *
 * Potential conflicts removed by namespace
 */
class Dustra_Service_Post
{

    function __construct() {
        add_action( 'init', array( $this, 'dustra_service_custom_post_type' ) );
        add_filter( 'template_include', array( $this, 'dustra_service_template_include' ) );
    }
    
    public function dustra_service_template_include( $template ) {
        if ( is_singular( 'dustra-service' ) ) {
            return $this->get_template( 'single-dustra-service.php');
        }
        return $template;
    }
    
    public function get_template( $template ) {
        if ( $theme_file = locate_template( array( $template ) ) ) {
            $file = $theme_file;
        } else {
            $file = Dustra_CORE_POST_DIR . 'template/'. $template;
        }
        return apply_filters( __FUNCTION__, $file, $template );
    }
    /**
     * Register post type
     */
      function dustra_service_custom_post_type(){
        global $dustra_option;
        
        if(!empty($dustra_option['service_slug'])){
            $slug = $dustra_option['service_slug'];
        }else{
            $slug = 'dustra-service';
        }

        $labels = array(
            'name'               => esc_html__( 'Services', 'post Category general name', 'dustra-core' ),
            'singular_name'      => esc_html__( 'Service', 'post Category singular name', 'dustra-core' ),
            'menu_name'          => esc_html__( 'Services', 'admin menu', 'dustra-core' ),
            'name_admin_bar'     => esc_html__( 'Service', 'add new on admin bar', 'dustra-core' ),
            'add_new'            => esc_html__( 'Add New', 'Service', 'dustra-core' ),
            'add_new_item'       => esc_html__( 'Add New Service', 'dustra-core' ),
            'new_item'           => esc_html__( 'New Service', 'dustra-core' ),
            'edit_item'          => esc_html__( 'Edit Service', 'dustra-core' ),
            'view_item'          => esc_html__( 'View Service', 'dustra-core' ),
            'all_items'          => esc_html__( 'All Services', 'dustra-core' ),
            'search_items'       => esc_html__( 'Search Services', 'dustra-core' ),
            'parent_item_colon'  => esc_html__( 'Parent Services:', 'dustra-core' ),
            'not_found'          => esc_html__( 'No Services found.', 'dustra-core' ),
            'not_found_in_trash' => esc_html__( 'No Services found in Trash.', 'dustra-core' ),
        );
  
        $args = array(
            'labels'             => $labels,
            'description'        => esc_html__( 'Description.', 'dustra-core' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'has_archive'        => true,
            'hierarchical'       => true,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-admin-tools',
            'supports'           => array( 'title','thumbnail','editor'),
            'rewrite'            => array( 'slug' => $slug, 'with_front' => true ),
        );
  
        register_post_type( 'dustra-service', $args );

        $labels = array(
            'name'                       => esc_html__( 'Categories', 'taxonomy general name', 'dustra-core' ),
            'singular_name'              => esc_html__( 'Category', 'taxonomy singular name', 'dustra-core' ),
            'search_items'               => esc_html__( 'Search Categorys', 'dustra-core' ),
            'popular_items'              => esc_html__( 'Popular Categorys', 'dustra-core' ),
            'all_items'                  => esc_html__( 'All Categorys', 'dustra-core' ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => esc_html__( 'Edit Category', 'dustra-core' ),
            'update_item'                => esc_html__( 'Update Category', 'dustra-core' ),
            'add_new_item'               => esc_html__( 'Add New Category', 'dustra-core' ),
            'new_item_name'              => esc_html__( 'New Category Name', 'dustra-core' ),
            'separate_items_with_commas' => esc_html__( 'Separate Categorys with commas', 'dustra-core' ),
            'add_or_remove_items'        => esc_html__( 'Add or remove Categorys', 'dustra-core' ),
            'choose_from_most_used'      => esc_html__( 'Choose from the most used Categorys', 'dustra-core' ),
            'not_found'                  => esc_html__( 'No Categorys found.', 'dustra-core' ),
            'menu_name'                  => esc_html__( 'Categories', 'dustra-core' ),
        );
  
        $args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array( 'slug' => $slug.'-category' ),
        );
  
        register_taxonomy( 'service-category', 'dustra-service', $args );
    }
    
}

new Dustra_Service_Post();