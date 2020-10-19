<?php

require_once 'controllerjson.php';

//función validando todos los parametros disponibles
//pasaremos los parámetros requeridos a esta función

function isTheseParametersAvailable($params){
	//suponiendo que todos los parametros estan disponibles
	$available = true;
	$missingparams = "";

	foreach ($params as $param) {
		if(!isset($_POST[$param]) || strlen($_POST[$param]) <= 0){
			$available = false;
			$missingparams = $missingparams . ", " . $param;
		}
	}

	//si faltan parametros
	if(!$available){
		$response = array();
		$response['error'] = true;
		$response['message'] = 'Parametro: ' . substr($missingparams, 1, strlen($missingparams)) . ' vacio';

		//error de visualización
		echo json_encode($response);

		//detener la ejecición adicional
		die();
	}
}

//una matriz para mostrar las respuestas de nuestro api
$response = array();

//si se trata de una llamada api
//que significa que un parametro get llamado se establece un la URL
//y con estos parametros estamos concluyendo que es una llamada api

if(isset($_GET['apicall'])){

	//Aqui iran todos los llamados de nuestra api
	switch ($_GET['apicall']) {

		case 'readusuarios':
			$db = new controllerjson();
			$response['error'] = false;
			$response['message'] = 'Solicitud completada correctamente';
			$response['contenido'] = $db->readUsuariosController();
		break;
	}

}else{
	//si no es un api el que se esta invocando
	//empujar los valores apropiados en la estructura json
	$response['error'] = true;
	$response['message'] = 'Llamado Invalido del API!';
}

echo json_encode($response);

?>