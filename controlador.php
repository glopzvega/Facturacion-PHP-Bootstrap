<?php
	
	import_request_variables("gp", "v_");
	
	if(isset($v_action)){
		
		require "src/web/" . $v_action . '.php';		
		
	}
?>