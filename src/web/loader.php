<?php

	class LoaderController {
		
		public function __construct($module){
			require "web/views/" . $module . '.php';
		}				
	}

	if(isset($v_module)){
		$loader = new LoaderController($v_module);				
	}

?>