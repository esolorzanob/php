<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Practica Bases</h1>
<?php
if(empty($_GET["id"])){
	header('Refresh: 3; URL=login.php');
	echo "<h1 class=\"rojo\">Usted no está autorizado para ver esta página</h1>";
}else{
	
$estudiantes = array();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parqueoupi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$traerUsuario = "Select * from usuarios 
where idUsuarios=".$_GET["id"];
$result = $conn->query($traerUsuario);
if ($result->num_rows > 0 ) {		
	$usuarioGuardado = mysqli_fetch_array($result);
	if($usuarioGuardado["Rol"] == 0){
		$sql = "select * from usuarios";
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
			<td class='rojo'>".$val["Nombre"]."</td>			
			<td>".$val["Apellidos"]."</td>
			<td>".$val["Direccion"]."</td>
			<td>".$val["Telefono"]."</td>
			<td>".$val["Email"]."</td>
			<td>
			<form action=\"editar.php\" method=\"POST\">
			<input type=\"hidden\" 
			name=\"id\" value=\"".$val["idUsuarios"]."\">
						<input type=\"submit\" value=\"editar\">
			</form>
			</td>
			</tr>";
		$val = next($estudiantes);
	}
	echo "</table>";
	}else{
		header('Refresh: 3; URL=login.php');
	echo "<h1 class=\"rojo\">Usted no está autorizado para ver esta página</h1>";
	}
}


}
?>

</body>
</html>