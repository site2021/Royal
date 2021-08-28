<?php
	// genera array de elementos
	function add_array($lista){
		$cols = array();
		$longitud = strlen($lista);
		$campo = '';
		for($i=0;$i<$longitud;$i++){
			$car = substr($lista,$i,1);		
			if($car==','){
				array_push($cols,$campo);
				$campo = '';
			} else {
				$campo = $campo.$car;
			}
		}
		// adiciona ultimo elemento
		array_push($cols,$campo);

		//echo 'en la funcion: array='.sizeof($cols);
		return $cols;

	}


?>