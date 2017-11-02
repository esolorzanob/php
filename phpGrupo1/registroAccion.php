<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>Resultado del login</h1>

<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "insert into usuarios_nueva (nombre, apellidos, username, password)
values('"
.$_POST["nombre"]."','"
.$_POST["apellidos"]."','"
.$_POST["username"]."','"
.$_POST["password"]."')";
if($conn->query($sql) == TRUE){
    echo "Usuario resgistrado con exito";
}else{
    echo "Error al registrar usuario";
}
$conn->close();

?>

</body>
</html>