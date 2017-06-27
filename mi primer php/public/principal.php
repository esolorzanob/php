<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Practica Log In</h1>
<?php
$usuario = $_POST["name"];
$pass = $_POST["password"];
$usuarioGuardado = [];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parqueoupi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "select * from usuarios where email='$usuario'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {		
	$usuarioGuardado = mysqli_fetch_array($result);
	
	if($usuarioGuardado["password"] == $pass){
	echo "<p>Bienvenido al sistema, ". $usuarioGuardado["Nombre"]."</p>";
	if($usuarioGuardado["Rol"] == 0){
		echo "<a href=\"index.php\">Principal</a>
			  <a href=\"listaUsuarios.php?id=".$usuarioGuardado["idUsuarios"]."\">Listar Usuarios</a>
			  <a href=\"registro.php?id=".$usuarioGuardado["idUsuarios"]."\">Registrar Usuarios</a>";
	}else{
		echo "<a href=\"index.php\">Principal</a>
			  <a href=\"miPerfil.php?id=".$usuarioGuardado["idUsuarios"]."\">Mi perfil</a>";
	}
	
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