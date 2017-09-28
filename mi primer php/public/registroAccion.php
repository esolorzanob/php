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

$sql = "insert into usuario (nombre, apellidos, direccion, 
telefono, email, password) values ('".$_POST["nombre"]."',
'".$_POST["apellidos"]."','".$_POST["direccion"]."','".$_POST["telefono"]."',
'".$_POST["email"]."','".$_POST["password"]."');";

if ($conn->query($sql) == TRUE ) {	
	echo "<p>Usuario registrado con éxito</p>";
} else {
    echo "Error al registrar usuario " .$conn->error;
}
$conn->close();



?>

</body>
</html>