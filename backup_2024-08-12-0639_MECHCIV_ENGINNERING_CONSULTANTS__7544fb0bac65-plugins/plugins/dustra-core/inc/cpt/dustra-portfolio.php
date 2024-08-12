<?php 
/**
 * Class dustra_Service_Post
 * @package PostType
 *
 * Use actual name of post type for
 * easy readability.
 *
 * Potential conflicts removed by namespace
 */
class Dustra_Portfolio_Post
{

    function __construct() {
        add_action( 'init', array( $this, 'dustra_portfolio_custom_post_type' ) );
        add_filter( 'template_include', array( $this, 'dustra_portfolio_template_include' ) );
    }
    
    public function dustra_portfolio_template_include( $template ) {
        if ( is_singular( 'dustra-portfolio' ) ) {
            return $this->get_template( 'single-dustra-portfolio.php');
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
      function dustra_portfolio_custom_post_type(){
        global $dustra_option;
        
        if(!empty($dustra_option['gallery_slug'])){
            $slug = $dustra_option['gallery_slug'];
        }else{
            $slug = 'dustra-portfolio';
        }

        $labels = array(
            'name' => _x('Portfolio', 'portfolio'),
            'singular_name' => _x('Portfolio', 'portfolio'),
            'add_new' => _x('Add New', 'portfolio'),
            'add_new_item' => __('Add New Portfolio'),
            'edit_item' => __('Edit Portfolio'),
            'new_item' => __('New Portfolio'),
            'view_item' => __('View Portfolio'),
            'all_items'          => esc_html__( 'All Portfolio', 'dustra-core' ),
            'search_items' => __('Search Portfolio'),
            'not_found' =>  __('Nothing found'),
            'not_found_in_trash' => __('Nothing found in Trash'),
            'parent_item_colon' => ''
            );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite'   => array( 'slug' => $slug, 'with_front' => true ),
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => 8,
            'supports' => array('title','editor','thumbnail')
        ); 
        register_post_type( 'dustra-portfolio' , $args );

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
  
        register_taxonomy( 'dustra_portfolio_categories', 'dustra-portfolio', $args );
    }
    
}

new Dustra_Portfolio_Post();