<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Registro</h1>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parqueoupi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "update usuarios set Nombre='".$_POST["nombre"].
	   "',Apellidos='".$_POST["apellidos"].
	   "',Direccion='".$_POST["direccion"].
	   "',Telefono='".$_POST["telefono"].
	   "',Email='".$_POST["email"].
	   "',password='".$_POST["password"].	   
	   "' where idUsuarios='".$_POST["id"]."';";

if ($conn->query($sql) === TRUE ) {	
	echo "<p>Usuario editado con éxito</p>";
} else {
    echo "Error al registrar usuario ".$conn->error;
}
$conn->close();



?>

</body>
</html>