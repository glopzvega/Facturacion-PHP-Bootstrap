<?php

require 'src/servicio/ClienteService.php';

class ClienteController {
	
	private $service;
		
	public function __construct(){
		$this->service = new ClienteService();
	}
	
	function consultarClientes() {
		return $this->service->getClientes();
	}	
}


if(isset($v_method)){
	
	$c = new ClienteController();
	
	switch($v_method){

		case "load": 
			$result = $c->consultarClientes();
			break;
		
	}
	
	echo json_encode($result);
	
}

?>