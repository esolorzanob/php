<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>Practica Bases</h1>
<a href="login.html">Log In</a>
<table>
	<tr>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Carnet</th>
		<th>Dirección</th>
		<th>Teléfono</th>
	</tr>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);
/* check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "error";
} else{
	echo "Connected successfully!!";
}
*/
$sql = "select * from estudiantes limit 10";
$estudiantes = array();
$result = $conn->query($sql);
if($result->num_rows > 0){
	while($row = mysqli_fetch_assoc($result)) {
		array_push($estudiantes, $row);	
	}	
}else{
	echo "No hay resultados";	
}
$conn->close();
$estudiante = current($estudiantes);
while($estudiante){
	echo "<tr>";
	echo "<td>".$estudiante["nombre"]."</td>";
	echo "<td>".$estudiante["apellidos"]."</td>";
	echo "<td>".$estudiante["carnet"]."</td>";
	echo "<td>".$estudiante["direccion"]."</td>";
	echo "<td>".$estudiante["telefono"]."</td>";
	echo "</tr>";
	$estudiante = next($estudiantes);
}
?>
</table>
</body>
</html>