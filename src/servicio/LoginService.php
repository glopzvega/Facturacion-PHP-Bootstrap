<?php

require 'src/datos/database.php';
// require '../datos/database.php';

class LoginService {
	
	private $dao; 
	
	public function __construct(){
		$c = new ConexionDB();
		$this->dao = $c->getConexion();
	}
	
	public function verificarLogin($user, $pass){
		
		$sql = "SELECT * FROM usuario WHERE username = '" . $user . "' AND password = '" . $pass ."'";
		
		$result = mysql_query($sql, $this->dao)
					or die("Error en la consulta SQL");			
				
		if(mysql_num_rows($result) > 0){
			return array("success" => true, "data" => mysql_fetch_assoc($result));
		}
		
		return array("success" => false);		
	}
}

// $s = new LoginService();
// $s = $s->verificarLogin("gera", "123");
// var_dump($s);
// exit();

?>