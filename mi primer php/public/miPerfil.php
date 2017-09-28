<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Mi perfil</h1>

<?php
if(!empty($_GET["id"])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parqueoupi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "select * from usuarios where idUsuarios='".$_GET["id"]."';";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {		
	$usuarioGuardado = mysqli_fetch_array($result);	
	echo "<h2>Mi informacion:</h2>
	<p>Nombre: ".$usuarioGuardado["Nombre"]."</p>
	<p>Apellidos: ".$usuarioGuardado["Apellidos"]."</p>
	<p>Direccion: ".$usuarioGuardado["Direccion"]."</p>
	<p>Telefono: ".$usuarioGuardado["Telefono"]."</p>
	<p>Email: ".$usuarioGuardado["Email"]."</p>";
	echo "<form action=\"editar.php\" method=\"POST\">
		<input type=\"hidden\" value=\"".$usuarioGuardado["idUsuarios"]."\" name=\"id\">
		<input type=\"submit\" value=\"Editar\">
		</form>";
} else {
    echo "<p>El usuario no se encuentra en el sistema</p>";
}
$conn->close();
}else{
	header('Refresh: 3; URL=login.php');
	echo "<h1 class=\"rojo\">Usted no está autorizado para ver esta página</h1>";
}
?>

</body>
</html>