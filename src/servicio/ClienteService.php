<?php

require 'src/datos/database.php';
// require '../datos/database.php';

class ClienteService {
	
	private $dao; 
	
	public function __construct(){
		$c = new ConexionDB();
		$this->dao = $c->getConexion();
	}
	
	public function getClientes(){
		
		$sql = "SELECT * FROM partner WHERE cliente = 1";
		
		$result = mysql_query($sql, $this->dao)
					or die("Error en la consulta SQL");			
			
		if(mysql_num_rows($result) > 0){
			
			$r = array();			
			while($row = mysql_fetch_assoc($result)){
								
				$id = $row["idpartner"]; 
				$r[$id] = $row;			
			}						
			return array("success" => true, "data" => $r);
		}			
		return array("success" => false);
	}
}

// $s = new ClienteService();
// $s = $s->getClientes();
// var_dump($s);
// exit();

?>