<?php
/**
 * Plugin Name: Dustra Core
 * Plugin URI: https://themeforest.net/user/droitthemes/portfolio
 * Description: This plugin adds the core features to the Dustra WordPress theme. You must have to install this plugin to get all the features included with the theme.
 * Version: 1.6
 * Author: ValidThemes
 * Author URI: https://themeforest.net/user/droitthemes/portfolio
 * Text domain: dustra-core
 */

if ( !defined('ABSPATH') )
    die('-1');

define( 'Dustra_CORE_POST_DIR', plugin_dir_path( __FILE__ ) );
// Make sure the same class is not loaded twice in free/premium versions.
if ( !class_exists( 'Dustra_core' ) ) {
	/**
	 * Main Dustra Core Class
	 *
	 * The main class that initiates and runs the Dustra Core plugin.
	 *
	 * @since 1.7.0
	 */
	final class Dustra_core {
		/**
		 * Dustra Core Version
		 *
		 * Holds the version of the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string The plugin version.
		 */
		const VERSION = '1.0' ;
		/**
		 * Minimum Elementor Version
		 *
		 * Holds the minimum Elementor version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum Elementor version required to run the plugin.
		 */
		const MINIMUM_ELEMENTOR_VERSION = '1.7.0';
		/**
		 * Minimum PHP Version
		 *
		 * Holds the minimum PHP version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum PHP version required to run the plugin.
		 */
		const  MINIMUM_PHP_VERSION = '5.4' ;
        /**
         * Plugin's directory paths
         * @since 1.0
         */
        const CSS = null;
        const JS = null;
        const IMG = null;
        const VEND = null;

		/**
		 * Instance
		 *
		 * Holds a single instance of the `Dustra_core` class.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 * @static
		 *
		 * @var Dustra_core A single instance of the class.
		 */
		private static  $_instance = null ;
		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 * @static
		 *
		 * @return Dustra_core An instance of the class.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Clone
		 *
		 * Disable class cloning.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'dustra-core' ), '1.7.0' );
		}

		/**
		 * Wakeup
		 *
		 * Disable unserializing the class.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'dustra-core' ), '1.7.0' );
		}

		/**
		 * Constructor
		 *
		 * Initialize the Dustra Core plugins.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function __construct() {
			$this->core_includes();
			$this->init_hooks();
			do_action( 'Dustra_core_loaded' );
		}

		/**
		 * Include Files
		 *
		 * Load core files required to run the plugin.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function core_includes() {
			// Elementor custom field icons
			require_once __DIR__ . '/inc/dustra-icons.php';

			// // Custom post types
			require_once __DIR__ . '/inc/cpt/dustra-service.php';
			require_once __DIR__ . '/inc/cpt/dustra-portfolio.php';
			require_once __DIR__ . '/inc/cpt/dustra-team.php';
			require_once __DIR__ . '/inc/dustra-contact-us.php';
			require_once __DIR__ . '/inc/dustra-service-img.php';
			require_once __DIR__ . '/inc/dustra-recent-post.php';
			require_once __DIR__ . '/inc/dustra-service-img.php';
			require_once __DIR__ . '/inc/dustra-service-related-post.php';
			require_once __DIR__ . '/inc/dustra-service-pdf.php';
		}

		/**
		 * Init Hooks
		 *
		 * Hook into actions and filters.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 */
		private function init_hooks() {
			add_action( 'init', [ $this, 'i18n' ] );
			add_action( 'plugins_loaded', [ $this, 'init' ] );
		}

		/**
		 * Load Textdomain
		 *
		 * Load plugin localization files.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function i18n() {
			load_plugin_textdomain( 'dustra-core', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
		}


		/**
		 * Init Dustra Core
		 *
		 * Load the plugin after Elementor (and other plugins) are loaded.
		 *
		 * @since 1.0.0
		 * @since 1.7.0 The logic moved from a standalone function to this class method.
		 *
		 * @access public
		 */
		public function init() {

			if ( !did_action( 'elementor/loaded' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
				return;
			}

			// Check for required Elementor version

			if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
				return;
			}

			// Check for required PHP version

			if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
				return;
			}

			// Add new Elementor Categories
			add_action( 'elementor/init', [ $this, 'add_elementor_category' ] );

			// Register Widget Styles
			add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_widget_styles' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );

			// Register Widget Scripts
			add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_widget_scripts' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'register_widget_scripts' ] );

			// Register New Widgets
			add_action( 'elementor/widgets/register', [ $this, 'on_widgets_registered' ] );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_missing_main_plugin() {
			$message = sprintf(
			/* translators: 1: Dustra Core 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'dustra-core' ),
				'<strong>' . esc_html__( 'Dustra core', 'dustra-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'dustra-core' ) . '</strong>'
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required Elementor version.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_minimum_elementor_version() {
			$message = sprintf(
			/* translators: 1: Dustra Core 2: Elementor 3: Required Elementor version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'dustra-core' ),
				'<strong>' . esc_html__( 'Dustra Core', 'dustra-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'dustra-core' ) . '</strong>',
				self::MINIMUM_ELEMENTOR_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required PHP version.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function admin_notice_minimum_php_version() {
			$message = sprintf(
			/* translators: 1: Dustra Core 2: PHP 3: Required PHP version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'dustra-core' ),
				'<strong>' . esc_html__( 'Dustra Core', 'dustra-core' ) . '</strong>',
				'<strong>' . esc_html__( 'PHP', 'dustra-core' ) . '</strong>',
				self::MINIMUM_PHP_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Add new Elementor Categories
		 *
		 * Register new widget categories for Dustra Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function add_elementor_category() {
			\Elementor\Plugin::instance()->elements_manager->add_category( 'dustra-elements', [
				'title' => __( 'Dustra Elements', 'dustra-core' ),
			], 1 );
		}


		/**
		 * Register Widget Scripts
		 *
		 * Register custom scripts required to run Saasland Core.
		 *
		 * @since 1.6.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function register_widget_scripts() {
			wp_register_script( 'mainjs', plugins_url( '/assets/js/main.js', __FILE__ ), array( 'jquery' ), false, true );
			wp_register_script( 'customjs', plugins_url( '/assets/js/custom.js', __FILE__ ), array( 'jquery' ), false, true );
			wp_localize_script( 'mainjs', 'Dustra_loadmore_params', array(
	            'ajaxurl'       => admin_url( 'admin-ajax.php' ), 
	        ) );
		}



		/**
		 * Register Widget Styles
		 *
		 * Register custom styles required to run Saasland Core.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		
		public function enqueue_widget_styles() {
            wp_enqueue_style( 'Dustra-flaticons', plugins_url( 'assets/vendors/flaticon/flaticon-set.css', __FILE__ ) );
            wp_enqueue_style( 'Dustra-flaticons2', plugins_url( 'assets/vendors/flaticon2/flaticon-set.css', __FILE__ ) );
		}

		/**
		 * Register New Widgets
		 *
		 * Include Dustra Core widgets files and register them in Elementor.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function on_widgets_registered() {
			$this->include_widgets();
			$this->register_widgets();
		}

		/**
		 * Include Widgets Files
		 *
		 * Load Dustra Core widgets files.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function include_widgets() {
			require_once( __DIR__ . '/widgets/dustra-slider-widget.php');
			require_once( __DIR__ . '/widgets/dustra-about.php');
			require_once( __DIR__ . '/widgets/dustra-services.php');
			require_once( __DIR__ . '/widgets/dustra-work-process.php');
			require_once( __DIR__ . '/widgets/dustra-team-member.php');
			require_once( __DIR__ . '/widgets/dustra-testimonial.php');
			require_once( __DIR__ . '/widgets/dustra-project-status.php');
			require_once( __DIR__ . '/widgets/dustra-blog.php');
			require_once( __DIR__ . '/widgets/dustra-portfolio.php');	
			require_once( __DIR__ . '/widgets/dustra-choose.php');
			require_once( __DIR__ . '/widgets/dustra-project.php');
			require_once( __DIR__ . '/widgets/dustra-contact.php');
			require_once( __DIR__ . '/widgets/dustra-consulting.php');
			require_once( __DIR__ . '/widgets/dustra-clients.php');
			require_once( __DIR__ . '/widgets/dustra-support-area.php');
			require_once( __DIR__ . '/widgets/dustra-featured.php');			
							
        }
			
		/**
		 * Register Widgets
		 *
		 * Register Dustra Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function register_widgets() {
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Slider_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_About_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Services_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Workprocess_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Team_Member_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Testimonial_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Project_Status_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Blog_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Portfolio_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Chose_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Project_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Contact_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Consulting_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Clients_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Support_Widget() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Featured_Widget() );
			
		}
	}
} 
// Make sure the same function is not loaded twice in free/premium versions.

if ( !function_exists( 'Dustra_core_load' ) ) {
	/**
	 * Load Dustra Core
	 *
	 * Main instance of Dustra_core.
	 *
	 * @since 1.0.0
	 * @since 1.7.0 The logic moved from this function to a class method.
	 */
	function Dustra_core_load() {
		return Dustra_core::instance();
	}

	// Run Dustra Core
    Dustra_core_load();
}

function dustra_mime_types( $mimes ) {
        $mimes['svg'] = 'image/svg+xml';
        $mimes['svgz'] = 'image/svgz+xml';
        $mimes['exe'] = 'program/exe';
        $mimes['dwg'] = 'image/vnd.dwg';
        return $mimes;
    }
add_filter('upload_mimes', 'dustra_mime_types');