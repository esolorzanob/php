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


$sql = "select * from usuario";
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
		  <th>Nombre</th>
		  <th>Apellidos</th>
	      <th>Direccion</th>
		  <th>Telefono</th>
		  <th>Email</th>
		  <th>Editar</th>
		  
		  </tr>";
	while($val){		
		echo "<tr>
			<td>".$val["nombre"]."</td>			
			<td>".$val["apellidos"]."</td>
			<td>".$val["direccion"]."</td>
			<td>".$val["telefono"]."</td>
			<td>".$val["email"]."</td>
			<td>
			<form action=\"editar.php\" method=\"POST\">
			<input type=\"hidden\" 
			name=\"id\" value=\"".$val["idusuario"]."\">
			<input type=\"submit\" value=\"editar\">
			</form>
			</td>
			</tr>";
		$val = next($estudiantes);
	}
	echo "</table>";

?>

</body>
</html>