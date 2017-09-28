<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Editar Usuario</h1>
<h2>Cambie la información en el formulario y haga click en cambiar
<?php
if(!empty($_POST["id"])){
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parqueoupi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "select * from usuarios where idUsuarios='".$_POST["id"]."';";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {		
	$usuarioGuardado = mysqli_fetch_array($result);	
	echo "<form action=\"editarAccion.php\" method=\"post\">
Nombre: <input type=\"text\" name=\"nombre\" value=\"".$usuarioGuardado["Nombre"]."\"><br>
Apellidos: <input type=\"text\" name=\"apellidos\" value=\"".$usuarioGuardado["Apellidos"]."\"><br>
Dirección: <input type=\"text\" name=\"direccion\" value=\"".$usuarioGuardado["Direccion"]."\"><br>
Teléfono: <input type=\"text\" name=\"telefono\" value=\"".$usuarioGuardado["Telefono"]."\"><br>
Email: <input type=\"text\" name=\"email\" value=\"".$usuarioGuardado["Email"]."\"><br>
Contraseña: <input type=\"password\" name=\"password\" value=\"".$usuarioGuardado["password"]."\"><br>
<input type=\"hidden\" name=\"id\" value=\"".$_POST["id"]."\"><br>
<input type=\"submit\" value=\"Editar\" >
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