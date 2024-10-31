<?php

namespace RsilitechPostcodeAvailability\App;

if ( ! class_exists( 'Rspa_model' ) ) {
	
	
    class Rspa_model {
			private $prefix;
			private $db;
			public function __construct() {
				//print "Model Initiated";	
				global $wpdb;	
				$this->db=$wpdb;
				$this->prefix=$this->db->prefix;
			}
       
			function rspa_create_table_postcode(){
				$tablename='postcodes';
				$tablename=$this->prefix.$tablename;
				$query = $this->db->prepare( 'SHOW TABLES LIKE %s', $this->db->esc_like( $tablename ) );

				if ( ! $this->db->get_var( $query ) == $tablename ) {
							$sql="CREATE TABLE `".$tablename."` (
								  `id` int(11) NOT NULL AUTO_INCREMENT,
								  `postcode` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
								  `area` longtext CHARACTER SET utf8mb4 NOT NULL,
								  `city` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
								  `state` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
								  `country` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
								  `cash_on_delivery` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'no',
								  `delivered_in_days` INT NOT NULL,
								  `order_note` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
								  `created_at` date NOT NULL,
								   PRIMARY KEY `id`(`id`)
								) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
				
				require_once(ABSPATH . '/wp-admin/includes/upgrade.php');

				dbDelta($sql);
				}
				
			}
			
	 	
			function rspa_addColumnToTable($tablename=null,$field=null, $fieldType, $fieldComment ){
				$tablename=$this->prefix.$tablename;
				$query = $this->db->prepare( 'SHOW TABLES LIKE %s', $this->db->esc_like( $tablename ) );				
				if (  $this->db->get_var( $query ) == $tablename ) {				
					$columns = $this->db->get_row("select column_name from information_schema.columns where table_name='".$tablename."' and COLUMN_NAME ='".$field."'");					
					if(!$columns) {
						//$sql="ALTER TABLE `".$tablename."` ADD `".$field."` ".$fieldType." NOT NULL COMMENT '".$fieldComment."' AFTER `state`;";
						$sql="ALTER TABLE `".$tablename."` ADD `cash_on_delivery` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'no' AFTER `country`;";					
						$this->db->query($sql);
					}
					
				}
			}
			
			
			
			function rspa_insert($table,$data,$format){
			
				if(!empty($data['postcode'])){
				$record_exists = $this->db->get_var(
					$this->db->prepare("SELECT postcode FROM ".$this->prefix.$table." WHERE postcode = %s", $data['postcode'])
				);
				if($record_exists) {
					$returnData=array('message'=>'Postcode already exists', 'value'=>"0", 'class'=>'error');					
				}
				else {
					$this->db->insert($this->prefix.$table,$data,$format);
					$insert_id = $this->db->insert_id;
					$returnData=array('message'=>'Postcode inserted successfully', 'value'=>$insert_id, 'class'=>'success');	
				}
				}else{
					$returnData=array('message'=>'Please fill mendatory fileds', 'value'=>'0', 'class'=>'error');	
				}
				return $returnData;
			}
			
			function rspa_update($table,$data,$field,$fieldVal){
				if($fieldVal){
					$this->db->update( $this->prefix.$table, $data, array( $field => $fieldVal ) );
					$returnData=array('message'=>'Postcode updated successfully', 'value'=>$fieldVal, 'class'=>'success');	
				}else{
					$returnData=array('message'=>'Please fill mendatory fileds', 'value'=>'0', 'class'=>'error');	
				}
				return $returnData;
			}
			function rspa_get($table){
				$results = $this->db->get_results( "SELECT * FROM ".$this->prefix.$table,ARRAY_N );
				return $results;
			}
			function rspa_getRow($table,$fieldName, $fieldValue){
				$sql="SELECT * FROM ".$this->prefix.$table." where ".$fieldName." like '".$fieldValue."'";				
				$row = $this->db->get_row($sql , ARRAY_A );				
				if($row)
					return $row;
				else 
					return false;
			}
			
			function rspa_deleteRow($table,$data){
			
				$results = $this->db->delete( $this->prefix.$table,$data );
				
				if($results==1){
					$returnData=array('message'=>'Postcode deleted successfully', 'value'=>'Postcode', 'class'=>'success');	
				}else{
					$returnData=array('message'=>'Something went wrong', 'value'=>'0', 'class'=>'error');	
				}
				return $returnData;
			
			}
			
			public function rspa_generate_csv() {
				$csv_output = '';            
				$separator=',';
				$table = $this->prefix . 'postcodes';             
				$result = $this->db->get_results("SHOW COLUMNS FROM " . $table . "");   
				if (count($result) > 0) {
					foreach($result as $row) {							
						if(($row->Field !='created_at')&&($row->Field !='updated_at')&&($row->Field !='id')){								
							$csv_output = $csv_output . $row->Field . $separator;
						}							
					}
					$csv_output = substr($csv_output, 0, -1);            
				}				
				$csv_output .= "\n";
				$values = $this->db->get_results("SELECT * FROM " . $table . "");      
				foreach ($values as $rowr) {
					$fields = array_values((array) $rowr);    
					unset($fields[0]);   
					unset($fields[9]);
					unset($fields[10]);           
					$csv_output .= implode($separator, $fields);     
					$csv_output .= "\n";   
				}
				return $csv_output; 
		}
		
		function rspa_create_table_settings(){
				$tablename='settings';
				$tablename=$this->prefix.$tablename;
				$query = $this->db->prepare( 'SHOW TABLES LIKE %s', $this->db->esc_like( $tablename ) );

				if ( ! $this->db->get_var( $query ) == $tablename ) {
							$sql="CREATE TABLE `".$tablename."` (
								`id` int(11) NOT NULL AUTO_INCREMENT,
								`rspa_settings_meta_key` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
								`rspa_settings_meta_value` longtext CHARACTER SET utf8mb4 NOT NULL,
								`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
								`updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
									PRIMARY KEY `id`(`id`)
								) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
				
				require_once(ABSPATH . '/wp-admin/includes/upgrade.php');

				dbDelta($sql);
				}
				
			}
			
		function rspa_settings_meta_insert_update($table,$meta_key,$meta_value,$format){
				if(!empty($meta_key)){
					$record_exists = $this->db->get_var(
						$this->db->prepare("SELECT rspa_settings_meta_key FROM ".$this->prefix.$table." where rspa_settings_meta_key like %s ",$meta_key)
					);
					
					if($record_exists) {
						
						$update=$this->db->update( $this->prefix.$table, array('rspa_settings_meta_value'=>$meta_value), array('rspa_settings_meta_key' => $meta_key ) );
						
						$returnData=array('message'=>'Updated Successfully', 'value'=>"", 'class'=>'success');					
					}else{
						
						$data['rspa_settings_meta_key']=$meta_key;
						$data['rspa_settings_meta_value']=$meta_value;
						
						$this->db->insert($this->prefix.$table,$data,$format);						
						$returnData=array('message'=>'Inserted Successfully', 'value'=>"", 'class'=>'success');	
					}
				}
			}
	}
}