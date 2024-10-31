<?php

define( 'RSPA_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'RSPA_PLUGIN_NAME', 'Rsilitech Postcode Availability' ); 

/**
 * Plugin Name: Rsilitech postcode availability
 * Plugin URI: https://rsilitech.com/plugins/rsilitech-postcode-availability/
 * Description: Check Shipping availability along with shipping fees of product and product variations by postcode,zipcode, with customer note. 
 * Author: RSilitech
 * Author URI: https://www.rsilitech.com/
 * Version: 1.0.6
 * Text Domain: rsilitech-postcode-availability
 * WC requires at least: 5.3
 * WC tested up to: 5.6
 */
	
	require RSPA_DIR_PATH.'config/plugin-settings.php';	
    use RsilitechPostcodeAvailability\Config\PluginSettings;
	
if ( ! class_exists( 'RsilitechPostcode' ) ) {	
    class RsilitechPostcode {
     
		private $settings;
		
        /**
         * Constructor
         */
        public function __construct() {
			
			add_action( 'admin_notices', array( $this, 'rspa_admin_notices' ), 15 );
			$this->settings=new PluginSettings();				
			add_action( 'admin_enqueue_scripts', array($this->settings,'load_style_scripts'), 10, 1);				
			add_action( 'wp_enqueue_scripts', array($this->settings,'load_frontend_style_scripts'), 10, 1);				
			add_action( 'admin_post_nopriv_your_action_name', 'submitForm' );				
			$this->rspa_setup_actions();
        }
        
        /**
         * Setting up Hooks
         */
        public function rspa_setup_actions() {			            
            register_activation_hook( RSPA_DIR_PATH, array( 'RsilitechPostcode', 'activate' ) );
            register_deactivation_hook( RSPA_DIR_PATH, array( 'RsilitechPostcode', 'deactivate' ) );			
			add_action( 'plugins_loaded', array($this,'rspa_activate' ));				
			add_filter( 'plugin_action_links_'. plugin_basename(__FILE__), array( $this, 'rspa_plugin_setting_link' ),10,1 );
			add_action( 'admin_menu', array($this, 'setup_admin_menu') );			
			
        }
        public function setup_admin_menu() {
			add_menu_page( 'Postcodes', 'Rspa Postcode', 'manage_options', 'rsilitech-postcode', array($this->settings,'rspa_add_postcode'),plugin_dir_url( __FILE__ ) .'/public/images/icon.png','6');			
			add_submenu_page('rsilitech-postcode', __('Add Postcode Code','rsilitech-postcode-availability'), __('Add Postcode','rsilitech-postcode-availability'), 'manage_options', 'rsilitech-postcode', array($this->settings,'rspa_add_postcode'));
			add_submenu_page('rsilitech-postcode', __('Postcode List','rsilitech-postcode-availability'), __('Postcode List','rsilitech-postcode-availability'), 'manage_options', 'list-postcodes', array($this->settings,'rspa_list_postcode'));			
			add_submenu_page('rsilitech-postcode', __('Settings','rsilitech-postcode-availability'), __('Settings','rsilitech-postcode-availability'), 'manage_options', 'rspa-settings', array($this->settings,'rspa_settings'));
			add_submenu_page('rsilitech-postcode', __('Pro Version','rsilitech-postcode-availability'), __('Pro Version','rsilitech-postcode-availability'), 'manage_options', 'rspa-pro-version', array($this->settings,'rspa_pro_version'));
		}
	
		public static function rspa_plugin_setting_link( $actions) {
			$actions['settings'] = '<a href="' . admin_url( 'admin.php?page=rspa-settings' ) . '" aria-label="' . esc_attr__( 'settings', 'rsilitech-postcode-availability' ) . '">' . esc_html__( 'Settings', 'rsilitech-postcode-availability' ) . '</a>';
			return $actions;
		}
		
		function rspa_admin_notices(){
			$this->settings->admin_notices();
		}
        /**
         * Activate callback function
         */
        public function rspa_activate() {
            $this->settings->rspa_create_table();			
        }
        
        /**
         * Deactivate callback function
         */
        public static function rspa_deactivate() {
            //Deactivation code in here
        }		    
	}

    // instantiate the plugin class
    $rspa_plugin_template = new RsilitechPostcode();
}