<?php

require 'src/servicio/FacturaService.php';
session_start();
//  var_dump($_SESSION["login"]);
//  exit();


class FacturaController {
	
	private $service;
		
	public function __construct(){
		$this->service = new FacturaService();
	}
	
	function consultarFacturas($usuario) {
		return $this->service->getFacturas($usuario);
	}

	function registrarFactura($factura) {
		return $this->service->addFactura($factura);
	}
}


if(isset($v_method)){
	
	$c = new FacturaController();
	
	switch($v_method){

		case "load": 
			$result = $c->consultarFacturas($_SESSION["login"]);
			break;
			
		case "add":
			
			$usuario = $_SESSION["login"];	
			
			$f = array("fecha_registro" => $v_fecha_registro,
					"cliente" => $v_cliente,
					"producto" => $v_producto,
					"usuario" => $usuario["idusuario"],
					"metodo_pago" => $v_metodo_pago,
					"cantidad" => $v_cantidad,
					"precio" => $v_precio,
					"IVA" => $v_IVA,
					"total" => $v_total);
			
			
			$result = $c->registrarFactura($f);
			break;
		
	}
	
	echo json_encode($result);
	
}

?>