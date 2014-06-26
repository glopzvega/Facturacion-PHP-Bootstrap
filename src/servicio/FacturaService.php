<?php

require 'src/datos/database.php';
// require '../datos/database.php';

class FacturaService {
	
	private $dao; 
	
	public function __construct(){
		$c = new ConexionDB();
		$this->dao = $c->getConexion();
	}
	
	public function getFacturas($usuario){
		
		$sql = "SELECT * FROM factura as f, partner as c, producto as p WHERE 
				f.usuario = " . $usuario["idusuario"] .
				" AND f.cliente = c.idpartner" . 
				" AND f.producto = p.id_producto";
		
		$result = mysql_query($sql, $this->dao)
					or die("Error en la consulta SQL");			
			
		if(mysql_num_rows($result) > 0){
			
			$r = array();			
			while($row = mysql_fetch_assoc($result)){
								
				$id = $row["idfactura"]; 
				$r[$id] = $row;			
			}						
			return array("success" => true, "data" => $r);
		}			
		return array("success" => false);
	}
	
	public function addFactura($factura){
		
		$sql = "INSERT INTO factura SET " .  
				"fecha_registro='" . $factura["fecha_registro"] . "', " .
				"cliente='" . $factura["cliente"] . "', " .
				"producto='" . $factura["producto"] . "', " .
				"usuario='" . $factura["usuario"] . "', " .
				"cantidad='" . $factura["cantidad"] . "', " .
				"IVA='" . $factura["IVA"] . "', " .
				"total='" . $factura["total"] . "'";
		
		mysql_query($sql, $this->dao) or die("Error en la consulta SQL");
		
		if(mysql_affected_rows() > 0){
			$factura["idfactura"] = mysql_insert_id();
			return array("success" => true, "data" => $factura);
		}
		
		return array("success" => false);
		
	}
}

// $f = array("fecha_registro" => "2013-08-09 00:00:00", 
// 		"cliente" => "1",
// 		"producto" => "1",
// 		"usuario" => "1",
// 		"cantidad" => "1",
// 		"IVA" => "16",
// 		"total" => "116");

// $s = new FacturaService();
// $s->addFactura($f);

// var_dump($s);
// exit();

?>