<?php

namespace RsilitechPostcodeAvailability\Config;

require RSPA_DIR_PATH.'app/controller/admin/admin-controller.php';

use RsilitechPostcodeAvailability\App\controller\admin\AdminController as AdminController;


if ( ! class_exists( 'PluginSettings' ) ) {
	
		
    class PluginSettings{
		
        const VERSION = '1.0.2';
		const RSPA_PLUGIN_ID = 'rsilitech-postcode-availability';
		const PLUGIN_VERSION = self::VERSION;
		
		/** minimum PHP version required by this plugin */
		const MINIMUM_PHP_VERSION = '5.6';

		/** minimum WordPress version required by this plugin */
		const MINIMUM_WP_VERSION = '4.0';

		/** minimum WooCommerce version required by this plugin */
		const MINIMUM_WC_VERSION = '2.2.3';
	

	
		protected $admin;
		protected $front;
		
		private $notices = array();
        /**
         * Constructor
         */
       public function __construct () {
			$this->admin=new AdminController;	
			
			register_activation_hook( __FILE__, array( $this, 'activation_check' ) );
			
		}
       
	/**
	 * Displays any admin notices 
	 *
	 */
	public function admin_notices() {

		foreach ( (array) $this->notices as $notice_key => $notice ) {

			?>
			<div class="<?php echo esc_attr( $notice['class'] ); ?>">
				<p><?php echo wp_kses( $notice['message'], array( 'a' => array( 'href' => array() ) ) ); ?></p>
			</div>
			<?php
		}
	}
	
	/**
	* Load scripts and styles for frontend
	*
	*/
	function load_frontend_style_scripts() {
		  
			wp_register_script( 'rsilitech_script', plugin_dir_url( __FILE__ ) . '../public/js/rsilitech_script.js',  array('jquery'), '1.0.0', true );
		
			wp_localize_script( 'rsilitech_script', 'rsilitech_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        

			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'rsilitech_script' );
		   
			wp_enqueue_style( 'rsilitech-style', plugin_dir_url( __FILE__ ) . '../public/css/rsilitech_style.css' );
					
			wp_enqueue_style( 'rsilitech-style' );
		

		}
	
	/**
	* Load scripts and styles for admin
	*
	*/
	function load_style_scripts() {
		
		wp_enqueue_style( 'rsilitech-admin-style', plugin_dir_url( __FILE__ ) . '../public/css/rsilitech_admin_style.css' );
					
		wp_enqueue_style( 'rsilitech-admin-style' );
		
		wp_register_script( 'rsilitech-admin-script', plugin_dir_url( __FILE__ ) . '../public/js/rsilitech_admin_script.js',  array(), '1.0.0', true );
		
		wp_enqueue_script('rsilitech-admin-script');
				
	}

	function rspa_settings(){
			
		$this->admin->rspa_admin_settings();
	}
	function rspa_list_postcode(){
		
		$this->admin->rspa_list_postcode();
	}
	function rspa_add_postcode(){
		
		$this->admin->rspa_add_postcode();
	}
	function rspa_import_export(){
		
		$this->admin->rspa_import_export();
	}
	
	public function rspa_create_table()
    {
            $this->admin->rspa_create_table();
    }
	
	public function rspa_pro_version()
    {
            echo 'Comming soon';
    }
	
	
	/**
	 * Admin notice to be displayed.
	 *
	
	*/
	private function add_admin_notice( $slug, $class, $message ) {

		$this->notices[ $slug ] = array(
			'class'   => $class,
			'message' => $message
		);
	}
	
	
	/**
	 * Adds notice for out-of-date WordPress and/or WooCommerce versions.
	 *	
	 */
	public function add_plugin_notices() {

		if ( $this->is_wp_compatible()<0 ) {

			$this->add_admin_notice( 'update_wordpress', 'error', sprintf(
				'%s requires WordPress version %s or higher. Please %supdate WordPress &raquo;%s',
				'<strong>' . self::RSPA_PLUGIN_NAME . '</strong>',
				self::MINIMUM_WP_VERSION,
				'<a href="' . esc_url( admin_url( 'update-core.php' ) ) . '">', '</a>'
			) );
		}

		if ( ! $this->is_wc_compatible() ) {

			$this->add_admin_notice( 'update_woocommerce', 'error', sprintf(
				'%1$s requires WooCommerce version %2$s or higher. Please %3$supdate WooCommerce%4$s to the latest version, or %5$sdownload the minimum required version &raquo;%6$s',
				'<strong>' . self::RSPA_PLUGIN_NAME . '</strong>',
				self::MINIMUM_WC_VERSION,
				'<a href="' . esc_url( admin_url( 'update-core.php' ) ) . '">', '</a>',
				'<a href="' . esc_url( 'https://downloads.wordpress.org/plugin/woocommerce.' . self::MINIMUM_WC_VERSION . '.zip' ) . '">', '</a>'
			) );
		}
	}
	
	/**
	 * Determines if the required plugins are compatible.
	 *	
	 */
	private function plugins_compatible() {

		return $this->is_wp_compatible() && $this->is_wc_compatible();
	}


	/**
	 * Determines if the WordPress compatible.
	*/
	private function is_wp_compatible() {

		if ( ! self::MINIMUM_WP_VERSION ) {
			
			return true;
		}

		return version_compare( get_bloginfo( 'version' ), self::MINIMUM_WP_VERSION );
	}


	/**
	 * Determines if the WooCommerce compatible.
	 *
	 */
	private function is_wc_compatible() {

		if ( ! self::MINIMUM_WC_VERSION ) {
			return true;
		}

		return defined( 'WC_VERSION' ) && version_compare( WC_VERSION, self::MINIMUM_WC_VERSION, '>=' );
	}

	
        
    }
	
		
	}