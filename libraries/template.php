<?php

namespace RsilitechPostcodeAvailability\Libraries;

if ( ! class_exists( 'Templates' ) ) {
	
	
    class Templates {
			
			protected $filepath, $data;
			
			public function __construct() {
				$this->filepath = RSPA_DIR_PATH.'views/';	
				$this->data=array();				
			
			}
       
	
			function template($view, $data=array()){
				
				if(file_exists($this->filepath.$view.'.php')){
				$this->data=$data;
				//Extracts variables to current view scope
				
				extract($this->data);

				//Starts output buffer
				
				ob_start();

				//Includes contents
				
				include $this->filepath.$view.'.php';
				$buffer = ob_get_contents();
				@ob_end_clean();

				//Return the output buffer
				echo $buffer;
			}else{
				return "The file not found";
			}
			}
		
		function flashMessages($variable, $messages){
			
			set_transient($variable, $messages, 10 );
					
		}
		function getFlashMessages($variable){
			
			get_transient($variable);
					
		}
		
		
		
	
	}
}