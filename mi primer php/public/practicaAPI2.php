<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="principal">
<h1>Pokemon Herramienta de Comparación</h1>
<div class="pokemonContainer">
<?php
function apiCall($num){
	$curl = curl_init();
    $url = "https://pokeapi.co/api/v2/pokemon/$num/";
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);    
    curl_close($curl);
	return json_decode($result);
 }
 $pokemon1 = apiCall($_POST["poke1"]);
 $pokemon2 = apiCall($_POST["poke2"]);
 echo "<div class='izquierda'>";
 echo "<h3 class='nombre'>".ucfirst($pokemon1->name)."</h3>";
 echo "<img class='imagen' src='".$pokemon1->sprites->front_default."'>";
 echo "<p><b>Peso:</b> $pokemon1->weight</p>";
 echo "<p><b>Altura:</b> $pokemon1->height</p>";
 $tipo = $pokemon1->types[0]->type->name;
 echo "<p><b>Tipo:</b> <span class='$tipo'>$tipo</span></p>";
 $stats = $pokemon1->stats;
 echo "<p><b>Stats</b></p><ul>";
 for ($i=0; $i < sizeof($stats); $i++) { 
    echo "<li><p><b>".$stats[$i]->stat->name.": </b>".$stats[$i]->base_stat."</p></li>";
 }
 echo "</ul>";
 echo "</div>";
 echo "<div class='derecha'>";
 echo "<h3 class='nombre'>".ucfirst($pokemon2->name)."</h3>";
 echo "<img class='imagen' src='".$pokemon2->sprites->front_default."'>";
 echo "<p><b>Peso:</b> $pokemon2->weight</p>";
 echo "<p><b>Altura:</b> $pokemon2->height</p>";
 $tipo = $pokemon2->types[0]->type->name;
 echo "<p><b>Tipo:</b> <span class='$tipo'>$tipo</span></p>";
 $stats = $pokemon2->stats;
 echo "<p><b>Stats</b></p><ul>";
 for ($i=0; $i < sizeof($stats); $i++) { 
    echo "<li><p><b>".$stats[$i]->stat->name.": </b>".$stats[$i]->base_stat."</p></li>";
 }
 echo "</ul>";
 echo "</div>";
 
?>
</div>
</div>
</body>
</html>