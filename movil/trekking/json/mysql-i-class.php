<?php 

// API - mysql i ----------------------------------------------------------------------------------
class Registro {
	private $conexion;

	public function __construct(){
		//$this->conexion = new mysqli('db683676912.db.1and1.com','dbo683676912','Hector-0805','db683676912');
		$this->conexion = new mysqli('localhost','root','royal2019*','ryl');
	}

	public function ejecutar($sql){
		return $this->conexion->query($sql);
	}

	public function cuantos($sql){
		return $this->conexion->affected_rows;
	}

	public function calcular($sql){
		return $this->conexion->query($sql);		
	}

	public function borrar($sql){
		return $this->conexion->query($sql);
	}

	public function consultar($sql){
		return $this->conexion->query($sql);
	}

	// --------------------------------------------------------------------------------------------
	public function cerrar(){
		$this->conexion->close();
	}

}

?>