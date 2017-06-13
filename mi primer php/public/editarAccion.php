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
$dbname = "universidad";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "error";
} else{
	echo "Connected successfully!!";
}

$sql = "update usuario set nombre='".$_POST["nombre"].
	   "',apellidos='".$_POST["apellidos"].
	   "',direccion='".$_POST["direccion"].
	   "',telefono='".$_POST["telefono"].
	   "',email='".$_POST["email"].
	   "',password='".$_POST["password"].	   
	   "' where idusuario='".$_POST["id"]."';";

if ($conn->query($sql) === TRUE ) {	
	echo "<p>Usuario editado con éxito</p>";
} else {
    echo "Error al registrar usuario " .$conn->error;
}
$conn->close();



?>

</body>
</html>