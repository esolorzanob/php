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

echo "<p>El username es $usuario";
echo "<p>El pass es $pass";


?>

</body>
</html>