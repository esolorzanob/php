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
$sql = "select * from usuarios_nueva where username ='" .$_POST["username"]."'";
$result = $conn->query($sql);
if($result->num_rows > 0){
    $usuario = mysqli_fetch_assoc($result);
    if($usuario["password"] == $_POST["password"]){
        echo "Logueado exitoso!";
    }else{
        echo "Password incorrecto";
    }
}else{
	echo "Usuario no existe";	
}
$conn->close();

?>
</table>
</body>
</html>