<?php

namespace RsilitechPostcodeAvailability\App\controller;

require RSPA_DIR_PATH.'config/plugin-autoload.php';
use RsilitechPostcodeAvailability\Config\Autoload as Autoload;


if ( ! class_exists( 'Controllers' ) ) {
	
	
    class Controllers extends Autoload{
			
			
			public function __construct() {
				parent::__construct();
				
				add_action( 'wp_ajax_nopriv_rspa_check_postcode', array( $this, 'rspa_check_postcode' ));
				add_action( 'wp_ajax_rspa_check_postcode', array( $this, 'rspa_check_postcode' ));
				add_action( 'woocommerce_single_product_summary', array( $this, 'rspa_postcode_details' ), 10 );
				add_shortcode('rspa_postcode_availability', array($this, 'rspa_check_postcode_using_shortcode'));
			}

		
		function rspa_postcode_details(){
				global $product;
				$nonce = wp_create_nonce("rsilitech_nonce");
					
				$check_postcode_layout_row=array();
				$check_postcode_layout_row=$this->model->rspa_getRow('settings','rspa_settings_meta_key','postcode_check_availability_layout');							
				if($check_postcode_layout_row){
					$check_postcode_layout_row=@unserialize($check_postcode_layout_row['rspa_settings_meta_value']);
				}	
				$data = array(	'nonce' => $nonce, 
								'content' => 'Postcode check','rspa_product_id'=>$product->get_id(),
								'check_postcode_layout_row'=>$check_postcode_layout_row
								);	
				$this->load->template('frontend/validate_postcode', $data);
		}
		function rspa_check_postcode(){
			
			 if ( !wp_verify_nonce( $_REQUEST['nonce'], "rsilitech_nonce")) {
				  exit("Nah!");
			   }   
			  
			  $postCode=sanitize_text_field( $_POST['postcode']);
			  $postcodeRow=$this->model->rspa_getRow('postcodes','postcode',$postCode);
			  if(empty($postcodeRow)){
				 
				  $response=array('error'=>true,'message'=>'Service is unavailable in your postcode');
			  }else{
				  $today=date('Y-m-d');
				  $deliverdby=date('dS M, Y', strtotime($today. ' + '.$postcodeRow['delivered_in_days'].' days'));
				  $response=array('error'=>false,'message'=>'Service is available in ','delivered'=>$deliverdby,'postcodeRow'=>$postcodeRow);
			  }			  
			  wp_send_json($response,200);
			  wp_die();
		}
		
		
		function rspa_check_postcode_using_shortcode(){ 			
			$nonce = wp_create_nonce("rsilitech_nonce");

			$check_postcode_layout_row = array();
			$check_postcode_layout_row = $this->model->rspa_getRow('settings', 'rspa_settings_meta_key', 'postcode_check_availability_layout');
			if ($check_postcode_layout_row) {
				$check_postcode_layout_row = @unserialize($check_postcode_layout_row['rspa_settings_meta_value']);
			}
			$data = array(
				'nonce' => $nonce,
				'content' => 'Postcode check', 'rspa_product_id' => 1,
				'check_postcode_layout_row' => $check_postcode_layout_row
			);
			$this->load->template('frontend/validate_postcode', $data);
		}
	}
}