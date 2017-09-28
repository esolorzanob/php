<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Practica API</h1>
<?php
function apiCall($num){
	$curl = curl_init();
     $url = "http://pokeapi.co/api/v2/pokemon/$num/";
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);    
    curl_close($curl);
	return json_decode($result);
 }
	$pokemones = array();
	for($i = 0; $i < 3; $i++){
	$pokemon = apiCall(rand(1,150));
    $pokemones[$i] = $pokemon;
	}
	$val = current($pokemones);
	echo "<table border=1>";
	echo "<tr>
		  <th>Nombre</th>
	      <th>Peso</th>
		  <th>Altura</th>
		  <th>Experiencia</th>
		  </tr>";
	while($val){
		echo "<tr>
			<td>$val->name</td>
			<td>$val->weight</td>
			<td>$val->height</td>
			<td>$val->base_experience</td>
			</tr>";
		$val = next($pokemones);
	}
	echo "</table>";
?>

</body>
</html>