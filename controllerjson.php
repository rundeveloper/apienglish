<?php

require_once 'modelojson.php';
/**
 *
 */
class ControllerJson
{
	#usuarios

	public function readUsuariosController(){

		$respuesta = Datos::readUsuarioModel("tbl_users");
		return $respuesta;
	}
}

?>