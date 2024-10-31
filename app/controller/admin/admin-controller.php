<?php

namespace RsilitechPostcodeAvailability\App\controller\admin;

require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
require RSPA_DIR_PATH.'app/controller/controller.php';
require RSPA_DIR_PATH.'libraries/wp_table.php';

use RsilitechPostcodeAvailability\App\controller\Controllers as Controllers;
Use RsilitechPostcodeAvailability\libraries\Rilitech_List_Table;
 
if ( ! class_exists( 'AdminController' ) ) {
	
	
    class AdminController extends Controllers{
			
			
			private $notices = array();
			
			public function __construct() {
				 parent::__construct();
				 add_action('admin_post_rsilitech_rspa_add_update_layout_settings', array($this, 'rspa_add_update_settings'));
				 add_action( 'admin_post_rsilitech_add_postcode',  array( $this, 'rspa_insert_postcode' ));
				 add_action( 'admin_post_rsilitech_edit_postcode',  array( $this, 'rspa_update_postcode' ));
				 
				
			}
       
			 public function rspa_admin_settings(){
				$check_postcode_layout_row = array();
				$check_postcode_layout_row = $this->model->rspa_getRow('settings', 'rspa_settings_meta_key', 'postcode_check_availability_layout');
				if ($check_postcode_layout_row) {
					$check_postcode_layout_row = @unserialize($check_postcode_layout_row['rspa_settings_meta_value']);
				}
				$nonce = wp_create_nonce('_rsilitech_general_settings_form_none');
				$data = array(
					'nonce' => $nonce,
					'notice' => get_transient('insert_postcode'),
					'check_postcode_layout_row' => $check_postcode_layout_row,
				);
				$this->load->template('admin/settings', $data);
			}

			public function rspa_add_update_settings()
        {
            if (isset($_POST['_rsilitech_general_settings_nonce']) && wp_verify_nonce($_POST['_rsilitech_general_settings_nonce'], '_rsilitech_general_settings_form_none')) {
                // sanitize the input

                $data['rspa_postcode_check_availability_text'] = sanitize_text_field($_POST['rspa_postcode_check_availability_text']);
                $data['rspa_postcode_unavailable_message'] = sanitize_text_field($_POST['rspa_postcode_unavailable_message']);

                $data['rspa_postcode_placeholder_text'] = sanitize_text_field($_POST['rspa_postcode_placeholder_text']);
                $data['rspa_postcode_check_button_text'] = sanitize_text_field($_POST['rspa_postcode_check_button_text']);

                $data['rspa_frontend_padding_top'] = sanitize_text_field($_POST['rspa_frontend_padding_top']);
                $data['rspa_frontend_padding_right'] = sanitize_text_field($_POST['rspa_frontend_padding_right']);

                $data['rspa_frontend_padding_bottom'] = sanitize_text_field($_POST['rspa_frontend_padding_bottom']);
                $data['rspa_frontend_padding_left'] = sanitize_text_field($_POST['rspa_frontend_padding_left']);

                $data['rspa_frontend_check_button_background_color'] = sanitize_text_field($_POST['rspa_frontend_check_button_background_color']);
                $data['rspa_frontend_check_button_background_color_chooser'] = sanitize_text_field($_POST['rspa_frontend_check_button_background_color_chooser']);

                $data['rspa_frontend_check_button_text_color'] = sanitize_text_field($_POST['rspa_frontend_check_button_text_color']);
                $data['rspa_frontend_check_button_border_color'] = sanitize_text_field($_POST['rspa_frontend_check_button_border_color']);

                $data['rspa_frontend_check_button_border_color_chooser'] = sanitize_text_field($_POST['rspa_frontend_check_button_border_color_chooser']);

                $data['rspa_frontend_border'] = sanitize_text_field($_POST['rspa_frontend_border']);
                $data['rspa_frontend_border_patern'] = sanitize_text_field($_POST['rspa_frontend_border_patern']);
                $data['rspa_frontend_border_color'] = sanitize_text_field($_POST['rspa_frontend_border_color']);

                $data['rspa_postcode_service_available_in'] = sanitize_text_field($_POST['rspa_postcode_service_available_in']);
                $data['rspa_postcode_delevered_by'] = sanitize_text_field($_POST['rspa_postcode_delevered_by']);
                $data['rspa_postcode_cod_available'] = sanitize_text_field($_POST['rspa_postcode_cod_available']);
                $data['rspa_postcode_shipping_details'] = sanitize_text_field($_POST['rspa_postcode_shipping_details']);

                $format = array('%s');
                $this->notices = $this->model->rspa_settings_meta_insert_update('settings', 'postcode_check_availability_layout', serialize($data), $format);
                $this->load->flashMessages('insert_update_meta', $this->notices);
                wp_redirect(admin_url('/admin.php?page=rspa-settings'));

                exit;
            } else {
                wp_die(__('Invalid nonce specified', RSPA_PLUGIN_NAME), __('Error', RSPA_PLUGIN_NAME), array(
                    'response' => 403,
                    'back_link' => 'admin.php?page=' . 'rsilitech-postcode',

                ));
            }
        }
			function rspa_list_postcode(){
				$this->notices='';
				if(isset($_GET['action'])){
					$action=sanitize_key($_GET['action']);
					
					if(isset($_GET['id'])){
						$id=sanitize_key($_GET['id']);
					}
					if($action&&$id){
						if($action=='remove'){						
							$this->notices=$this->model->rspa_deleteRow('postcodes',array( 'id' => $id ));	
							$this->load->flashMessages('delete_postcode',$this->notices);
							wp_redirect( admin_url( '/admin.php?page=list-postcodes' ) );        
							exit;
						}else{
							$this->rspa_edit_postcode($id);
							exit;
						}
						
					}
					
				}
				if (isset($_GET['export'])) {
					$csvFile = $this->model->rspa_generate_csv();
					$csvFile = mb_convert_encoding($csvFile, 'UTF-16LE', 'UTF-8');
					ob_clean();
					header('Pragma: public');
					header('Expires: 0');
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Cache-Control: private', false);
					header('Content-Encoding: UTF-8');
					header("Content-Type: application/octet-stream");
					header('Content-Type: text/csv; charset=utf-8');
					header("Content-Transfer-Encoding: binary");
					header('Content-Disposition: attachment;filename=potcodes.csv');
					
					echo $csvFile;
					exit;
				}
				$tabledata=$this->model->rspa_get('postcodes');
				$table=new Rilitech_List_Table();
				$table->prepare_items($tabledata);				
				$data = array('notice'=> $this->notices,'table'=>$table,'tabledata'=>$tabledata);								
				$this->load->flashMessages('insert_postcode',$this->notices);
				$this->load->template('admin/postcode-list', $data);
				
				

			}
			
			function rspa_insert_postcode(){
				
				if( isset( $_POST['_rsilitech_add_postcode_nonce'] ) && wp_verify_nonce( $_POST['_rsilitech_add_postcode_nonce'], '_rsilitech_add_postcode_form_none') ) {
					// sanitize the input
					$data['postcode'] 			= sanitize_key( $_POST['postcode']);
					$data['city'] 				= sanitize_text_field( $_POST['city']);
					$data['state'] 				= sanitize_text_field( $_POST['state']);
					$data['country'] 			= sanitize_text_field( $_POST['country']);
					$data['cash_on_delivery'] 	= sanitize_text_field( $_POST['cash_on_delivery']);
					$data['delivered_in_days'] 	= sanitize_text_field( $_POST['delivered_in_days']);
					$data['order_note'] 		= sanitize_text_field( $_POST['note']);
					$data['created_at'] 		= date('Y-m-d');
					
					
					$format=array('%s','%s','%s','%s','%s','%d','%s');
					$this->notices=$this->model->rspa_insert('postcodes',$data,$format);
					$this->load->flashMessages('insert_postcode',$this->notices);
					wp_redirect( admin_url( '/admin.php?page=rsilitech-postcode' ) );
        
					exit;
				}
				else {
					wp_die( __( 'Invalid nonce specified', RSPA_PLUGIN_NAME ), __( 'Error', RSPA_PLUGIN_NAME ), array(
								'response' 	=> 403,
								'back_link' => 'admin.php?page=' . 'rsilitech-postcode',

						) );
				}
			}
			function rspa_update_postcode(){
				
				if( isset( $_POST['_rsilitech_edit_postcode_nonce'] ) && wp_verify_nonce( $_POST['_rsilitech_edit_postcode_nonce'], '_rsilitech_edit_postcode_form_none') ) {
					// sanitize the input
					$id= sanitize_key( $_POST['postcode_id']);
					$data['city'] 				= sanitize_text_field( $_POST['city']);
					$data['state'] 				= sanitize_text_field( $_POST['state']);
					$data['country'] 			= sanitize_text_field( $_POST['country']);
					$data['cash_on_delivery'] 	= sanitize_text_field( $_POST['cash_on_delivery']);
					$data['delivered_in_days'] 	= sanitize_text_field( $_POST['delivered_in_days']);
					$data['order_note'] 		= sanitize_text_field( $_POST['note']);
					
					$this->notices=$this->model->rspa_update('postcodes',$data,'id',$id);
					
					$this->load->flashMessages('update_postcode',$this->notices);
					wp_redirect( admin_url( '/admin.php?page=list-postcodes&action=edit&id='.$id ) );
        
					exit;
				}
				else {
					wp_die( __( 'Invalid nonce specified', RSPA_PLUGIN_NAME ), __( 'Error', RSPA_PLUGIN_NAME ), array(
								'response' 	=> 403,
								'back_link' => 'admin.php?page=' . 'rsilitech-postcode',

						) );
				}
			}
			function rspa_add_postcode(){				
				$nonce 	= wp_create_nonce( '_rsilitech_add_postcode_form_none' );
				$data 	= array('nonce' => $nonce,'notice'=> get_transient('insert_postcode'));
				
				$this->load->template('admin/add-postcode', $data);

			}
			function rspa_import_export(){
				
				$this->model->rspa_create('postcodes');
				
				$nonce 	= wp_create_nonce( '_rsilitech_add_postcode_form_none' );
				$data 	= array('nonce' => $nonce,'notice'=> get_transient('insert_postcode'));
				
				$this->load->template('admin/import-export', $data);

			}
			function rspa_edit_postcode($id=null){
				$postcode_row=$this->model->rspa_getRow('postcodes','id',$id);				
				$nonce = wp_create_nonce( '_rsilitech_edit_postcode_form_none' );
				$data = array('nonce' => $nonce,'notice'=> get_transient('update_postcode'), 'postcode_row'=>$postcode_row);					
				$this->load->template('admin/edit-postcode', $data);

			}
			
			public function rspa_create_table(){
				$this->model->rspa_create_table_postcode();
				$this->model->rspa_addColumnToTable('postcodes','cash_on_delivery', '', '');
				$this->model->rspa_create_table_settings();
			}
 
	}
}
