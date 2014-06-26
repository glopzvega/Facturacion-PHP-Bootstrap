<?php

require 'src/servicio/ProductoService.php';

class ProductoController {
	
	private $service;
	
	public function __construct(){
		$this->service = new ProductoService();
	}
	
	function consultarProductos() {
		return $this->service->getProductos();
	}	
}

if(isset($v_method)){
	
	$c = new ProductoController();
	
	switch($v_method){

		case "load": 
			$result = $c->consultarProductos();			
			break;
		
	}	
	
	echo json_encode($result);
}

?>