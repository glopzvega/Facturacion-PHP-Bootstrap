<?php

	session_start();
	require 'src/servicio/LoginService.php';
// 	require '../servicio/LoginService.php';

	
	class LoginController {
		
		private $service;
		
		public function __construct(){
			$this->service = new LoginService();
		}
			
		function iniciarSesion($user, $pass) {		
			
			$result = $this->service->verificarLogin($user, $pass);			
			
			if($result["success"]){				
				$_SESSION["login"] = $result["data"];				
			}			
			header('Location: http://localhost/facturacion/index.php');
		}
		
		function cerrarSesion() {
			session_destroy();		
			$this->salir(1);
		}
		
		function salir($valor) {
			header( 'Location: http://localhost/facturacion?login=' . $valor ) ;
		}
	}
	
// 	$c = new LoginController();
// 	$c->iniciarSesion("gera", "123");
	
	
	if(isset($v_method)){
		
		$c = new LoginController();
		
		switch($v_method){

			case "entrar" :				
				
				$user = (isset($v_username)) ? $v_username : "";
				$pass = (isset($v_password)) ? $v_password : "";
				
				if($user != "" && $pass != "")
					$c->iniciarSesion($user, $pass);
				
				else 
					$c->salir(0);				
				break;
				
			case "salir" : 
				
				$c->cerrarSesion();
				break;
			
		}
				
	}
	
?>