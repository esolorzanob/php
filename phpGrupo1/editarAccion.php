<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>Resultado del editar</h1>
<a href="listaUsuarios.php">Volver a lista</a>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "update usuarios_nueva set
nombre = '".$_POST["nombre"]."',
apellidos = '".$_POST["apellidos"]."',
username = '".$_POST["username"]."',
password = '".$_POST["password"]."'
where idusuarios = ".$_POST["id"];
var_dump($sql);
/*
if($conn->query($sql) == TRUE){
    echo "Usuario editado con exito";
}else{
    echo "Error al editar usuario";
}
*/
$conn->close();
?>
</body>
</html>