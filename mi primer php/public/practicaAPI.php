<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Practica API</h1>
<?php
function apiCall(){
	$curl = curl_init();

     $url = "http://pokeapi.co/api/v2/pokemon/1/";
    

    
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);
    
    curl_close($curl);
	return json_decode($result);
    }
	$pokemon = apiCall();
    echo json_encode($pokemon);

?>

</body>
</html>