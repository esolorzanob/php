<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>Editar Usuario</h1>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "test";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "select * from usuarios_nueva where idusuarios=".$_POST["id"];
$result = $conn->query($sql);
if($result->num_rows > 0){
    $usuarioGuardado = mysqli_fetch_assoc($result);
}else{
	echo "Usuario no encontrado.";	
}
$conn->close();
echo "<form method=\"post\" action=\"editarAccion.php\">
<label>Nombre:</label>
<input type=\"text\" name=\"nombre\" value=\"".$usuarioGuardado["nombre"]."\">
<br>
<br>
<label>Apellidos:</label>
<input type=\"text\" name=\"apellidos\" value=\"".$usuarioGuardado["apellidos"]."\">
<br>
<br>
<label>Username:</label>
<input type=\"text\" name=\"username\" value=\"".$usuarioGuardado["username"]."\">
<br>
<br>
<label>Password:</label>
<input type=\"text\" name=\"password\" value=\"".$usuarioGuardado["password"]."\">
<br>
<br>
<input type=\"hidden\" name=\"id\" value=\"".$usuarioGuardado["idusuarios"]."\">
<input type=\"submit\" value=\"Editar\">
</form>";
?>
</body>
</html>