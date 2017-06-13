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

$usuarioGuardado = [];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universidad";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "select * from usuario where idusuario='".$_POST["id"]."';";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {		
	$usuarioGuardado = mysqli_fetch_array($result);	
	echo "<form action=\"editarAccion.php\" method=\"post\">
Nombre: <input type=\"text\" name=\"nombre\" value=\"".$usuarioGuardado["nombre"]."\"><br>
Apellidos: <input type=\"text\" name=\"apellidos\" value=\"".$usuarioGuardado["apellidos"]."\"><br>
Dirección: <input type=\"text\" name=\"direccion\" value=\"".$usuarioGuardado["direccion"]."\"><br>
Teléfono: <input type=\"text\" name=\"telefono\" value=\"".$usuarioGuardado["telefono"]."\"><br>
Email: <input type=\"text\" name=\"email\" value=\"".$usuarioGuardado["email"]."\"><br>
Contraseña: <input type=\"password\" name=\"password\" value=\"".$usuarioGuardado["password"]."\"><br>
<input type=\"hidden\" name=\"id\" value=\"".$_POST["id"]."\"><br>
<input type=\"submit\" value=\"Editar\" >
</form>";
} else {
    echo "<p>El usuario no se encuentra en el sistema</p>";
}
$conn->close();

?>

</body>
</html>