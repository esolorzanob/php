<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Practica Log In</h1>
<?php
$usuario = $_POST["username"];
$pass = $_POST["password"];
$usuarioGuardado = [];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universidad";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "select * from usuario where username='$usuario'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {		
	$usuarioGuardado = mysqli_fetch_array($result);
	
	if($usuarioGuardado["password"] == $pass){
	echo "<p>Bienvenido al sistema, ". $usuarioGuardado["nombre"]."</p>";
	
	}else{
	echo "<p>Password incorrecto</p>";
	}
} else {
    echo "<p>El usuario no se encuentra en el sistema</p>";
}
$conn->close();

?>

</body>
</html>