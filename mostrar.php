
<?php
include_once("dbconfig.php");
$result = $DB_con->query("SELECT userID, productName, productId, price, userPic, location FROM tbl_users ORDER BY userID ASC");
?>

<html>
<head>
	<title>Listado de Estudiantes</title>
</head>

<body>
<a href="index.php">Mostrar Registros</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Identificacion</td>
		<td>Nombre</td>
		<td>Producto</td>
		<td>Precio</td>
		<td>Imagen</td>
		<td>mp3</td>
	</tr>
	<?php
	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr>";
		echo "<td>".$row['userID']."</td>";
		echo "<td>".$row['productName']."</td>";
		echo "<td>".$row['productId']."</td>";
		echo "<td>".$row['price']."</td>";
		echo "<td><img src='user_images/".$row['userPic']."' width='80px' height='80px'></td>";
		echo "<td><video src='".$row['location']."' controls width='180px' height='80px'></td>";
		echo "</tr>";
	}
	?>
	</table>
</body>
</html>
