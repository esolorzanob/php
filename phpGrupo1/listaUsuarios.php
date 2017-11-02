<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>Listar usuarios</h1>
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
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "select * from usuarios_nueva";
$usuarios = array();
$result = $conn->query($sql);
if($result->num_rows > 0){
	while($row = mysqli_fetch_assoc($result)) {
		array_push($usuarios, $row);	
	}	
}else{
	echo "No hay resultados";	
}
$conn->close();
$usuario = current($usuarios);
while($usuario){
	echo "<tr>";
	echo "<td>".$usuario["nombre"]."</td>";
	echo "<td>".$usuario["apellidos"]."</td>";
	echo "<td>".$usuario["username"]."</td>";
    echo "<td>".$usuario["password"]."</td>";
    echo "<td><form action=\"editarUsuarios.php\" method=\"POST\">
    <input type=\"hidden\" 
    name=\"id\" value=\"".$usuario["idusuarios"]."\">
                <input type=\"submit\" value=\"editar\">
    </form>
    </td>";
	echo "</tr>";
	$usuario = next($usuarios);
}
?>
</table>
</body>
</html>