<?php

	class ConexionDB {		
		
		private  $conexion;
		
		function __construct(){
			
			$con = mysql_connect("localhost","root","root")
			or die ("Fallo en el establecimiento de la conexión");
				
			mysql_select_db("facturacion")
			or die("Error en la selección de la base de datos");
			
			$this->conexion = $con;			
		}		
		
		function getConexion() {			
			return $this->conexion;		
		}
		
		function close($c) {
			mysql_close($c);
		}
	}

?>