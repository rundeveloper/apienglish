<?php
require_once 'database.php';

class Datos extends Database
{
	#Metodos
	//----------------------------------------------------------------------------------

	public function readUsuarioModel($tabla){
		$stmt = Database::getConnection()->prepare("SELECT userID, productName, productId, price, userPic, location FROM $tabla ORDER BY userID ASC");
		$stmt->execute();

		$stmt->bindColumn("userID", $userID);
		$stmt->bindColumn("productName", $productName);
		$stmt->bindColumn("productId", $productId);
		$stmt->bindColumn("price", $price);
		$stmt->bindColumn("userPic", $userPic);
		$stmt->bindColumn("location", $location);
		$usuarios = array();

		while ($fila = $stmt->fetch(PDO::FETCH_BOUND)){

			$user = array();

			$user["userID"] = utf8_encode($userID);
			$user["productName"] = utf8_encode($productName);
			$user["productId"] = utf8_encode($productId);
			$user["price"] = utf8_encode($price);
			$user["userPic"] = utf8_encode($userPic);
			$user["location"] = utf8_encode($location);

			array_push($usuarios, $user);
		}	
		return $usuarios;
	}
}
?>