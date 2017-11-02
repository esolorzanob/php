<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>Practica Bases</h1>
<a href="login.html">Login</a>
<br>
<br>
<table>
	<tr>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Username</th>
        <th>Password</th>
        <th>Editar</th>
	</tr>
<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

/* Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "error";
} else{
	echo "Connected successfully!!";
}
*/
$usuarios = array();
$sql = "select * from usuarios_nueva";
$result = $conn->query($sql);
if($result->num_rows > 0){
	while($row = mysqli_fetch_assoc($result)) {
		array_push($usuarios, $row);	
	}	
}else{
	echo "No hay resultados";	
}
$conn->close();
echo "<br>";
$usuario = current($usuarios);
while($usuario){
	echo "<tr>";
	echo "<td>".$usuario["nombre"]."</td>";
	echo "<td>".$usuario["apellidos"]."</td>";
	echo "<td>".$usuario["username"]."</td>";
    echo "<td>".$usuario["password"]."</td>";
    echo "<td><form method=\"post\" action=\"editar.php\">
    <input type=\"hidden\" name=\"id\" value=\"".$usuario["idusuarios"]."\">
    <input type=\"submit\" value=\"Editar\">
    </form></td>";
	echo "</tr>";
	$usuario = next($usuarios);
}

?>
</table>
</body>
</html>