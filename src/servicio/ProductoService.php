<?php

require 'src/datos/database.php';
// require '../datos/database.php';

class ProductoService {
	
	private $dao; 
	
	public function __construct(){
		$c = new ConexionDB();
		$this->dao = $c->getConexion();
	}
	
	public function getProductos(){
		
		$sql = "SELECT * FROM producto";
		
		$result = mysql_query($sql, $this->dao)
					or die("Error en la consulta SQL");			
			
		if(mysql_num_rows($result) > 0){
			
			$r = array();			
			while($row = mysql_fetch_assoc($result)){
								
				$id = $row["id_producto"]; 
				$r[$id] = $row;			
			}						
			return array("success" => true, "data" => $r);
		}			
		return array("success" => false);
	}
}

// $s = new ProductoService();
// $s = $s->getProductos();
// var_dump($s);
// exit();

?>