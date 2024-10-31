<?php

namespace RsilitechPostcodeAvailability\Config;

require RSPA_DIR_PATH.'libraries/template.php';
require RSPA_DIR_PATH.'app/model.php';

use RsilitechPostcodeAvailability\Libraries\Templates as Templates;
use RsilitechPostcodeAvailability\App\Rspa_model as Rspa_model;

if ( ! class_exists( 'Autoload' ) ) {
	
	
    class Autoload {
			private static $instance;
			private $load;
			protected $model;
			
			public function __construct() {
				self::$instance =& $this;
				$this->model=new Rspa_model;				
				$this->load=new Templates;			
			}
       
			public static function &get_instance(){
				return self::$instance;
			}
			public function __get($property){					
				return $this->load;
				
			}
			
			
		
	}
}