<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>Resultado de editar</h1>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "test";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "update usuarios_nueva set 
nombre='".$_POST["nombre"]."',
apellidos='".$_POST["apellidos"]."',
username='".$_POST["username"]."',
password='".$_POST["password"]."'
where idusuarios = ".$_POST["id"];
if($conn->query($sql) == TRUE){
    echo "Usuario editado con éxito!";
}else{
    echo "Error al editar usuario";
}
$conn->close();
?>
<br>
<a href="listaUsuarios.php">Volver a lista</a>
</body>
</html>