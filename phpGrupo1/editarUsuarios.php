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
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "select * from usuarios_nueva where idusuarios=".$_POST["id"];
$result = $conn->query($sql);
if($result->num_rows > 0){
	$usuario = mysqli_fetch_assoc($result);
}else{
	echo "No hay resultados";	
}
$conn->close();
echo "<form method=\"post\" action=\"editarAccion.php\">
<label>Nombre</label>
<input type=\"text\" name=\"nombre\" value=\"".$usuario["nombre"]."\">
<br>
<br>
<label>Apellidos</label>
<input type=\"text\" name=\"apellidos\" value=\"".$usuario["apellidos"]."\">
<br>
<br>
<label>Username</label>
<input type=\"text\" name=\"username\" value=\"".$usuario["username"]."\">
<br>
<br>
<label>Password</label>
<input type=\"password\" name=\"password\" value=\"".$usuario["password"]."\">
<br>
<br>
<input type=\"hidden\" name=\"id\" value=\"".$usuario["idusuarios"]."\">
<input type=\"submit\" value=\"Editar\">
</form>"
?>
</table>
</body>
</html>