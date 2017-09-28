<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Practica Bases</h1>
<?php
$estudiantes = array();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universidad";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "error";
} else{
	echo "Connected successfully!!";
}

$sql = "select c.nombre as 'nombreClase', p.nombre, p.apellidos
from clase as c, profesor as p
where c.Profesor_carnet = p.carnet";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {	
	while($row = mysqli_fetch_assoc($result)) {
	array_push($estudiantes, $row);	
	}	
} else {
    echo "0 results";
}
$conn->close();

$val = current($estudiantes);
	echo "<table border=1>";
	echo "<tr>
		  <th>NombreClase</th>
		  <th>Nombre</th>
	      <th>Apellidos</th>
		  <th>Direccion</th>
		  
		  </tr>";
	while($val){		
		echo "<tr>
			<td>".$val["nombreClase"]."</td>
			<td>".$val["nombre"]."</td>
			<td>".$val["apellidos"]."</td>
			<td></td>
			</tr>";
		$val = next($estudiantes);
	}
	echo "</table>";

?>

</body>
</html>