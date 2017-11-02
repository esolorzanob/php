<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>Practica Bases</h1>
<a href="login.html">Login</a>
<a href="registroProducto">Login</a>
<br>
<br>
<table>
	<tr>
		<th>Carnet</th>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Direccion</th>
		<th>Teléfono</th>
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
$estudiantes = array();
$sql = "select * from estudiantes limit 10";
$result = $conn->query($sql);
if($result->num_rows > 0){
	while($row = mysqli_fetch_assoc($result)) {
		array_push($estudiantes, $row);	
	}	
}else{
	echo "No hay resultados";	
}
$conn->close();
echo "<br>";
$estudiante = current($estudiantes);
while($estudiante){
	echo "<tr>";
	echo "<td>".$estudiante["carnet"]."</td>";
	echo "<td>".$estudiante["nombre"]."</td>";
	echo "<td>".$estudiante["apellidos"]."</td>";
	echo "<td>".$estudiante["direccion"]."</td>";
	echo "<td>".$estudiante["telefono"]."</td>";
	echo "</tr>";
	$estudiante = next($estudiantes);
}

?>
</table>
</body>
</html>