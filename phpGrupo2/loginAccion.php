<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>Resultado de login</h1>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "select * from usuarios_nueva where username='".$_POST["username"]."'";
$result = $conn->query($sql);
if($result->num_rows > 0){
    $usuarioGuardado = mysqli_fetch_assoc($result);
    if($usuarioGuardado["password"] == $_POST["password"]){
        echo "Login Exitoso!";
    }else{
        echo "Password incorrecto";
    }
}else{
	echo "Usuario no encontrado.";	
}
$conn->close();
?>
</body>
</html>