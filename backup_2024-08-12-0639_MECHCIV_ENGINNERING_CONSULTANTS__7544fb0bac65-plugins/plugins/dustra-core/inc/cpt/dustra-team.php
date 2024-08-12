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
class Dustra_Team_Post
{

    function __construct() {
        add_action( 'init', array( $this, 'dustra_team_custom_post_type' ) );
        add_filter( 'template_include', array( $this, 'dustra_team_template_include' ) );
    }
    
    public function dustra_team_template_include( $template ) {
        if ( is_singular( 'dustra-team' ) ) {
            return $this->get_template( 'single-dustra-team.php');
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
      function dustra_team_custom_post_type(){
        global $dustra_option;
        
        if(!empty($dustra_option['team_slug'])){
            $slug = $dustra_option['team_slug'];
        }else{
            $slug = 'dustra-team';
        }
        $labels = array(
            'name' => _x('Team', 'post type general name'),
            'singular_name' => _x('Team Member', 'dustra-core'),
            'add_new' => _x('Add New', 'Team'),
            'add_new_item' => __('Add New Team'),
            'edit_item' => __('Edit Team'),
            'new_item' => __('New Team'),
            'view_item' => __('View Team'),
            'all_items'          => esc_html__( 'All Teams', 'dustra-core' ),
            'search_items' => __('Search Team'),
            'not_found' =>  __('Nothing found'),
            'not_found_in_trash' => __('Nothing found in Trash'),
            'parent_item_colon' => ''
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
        register_post_type( 'dustra-team' , $args );
    }
    
}

new Dustra_Team_Post();