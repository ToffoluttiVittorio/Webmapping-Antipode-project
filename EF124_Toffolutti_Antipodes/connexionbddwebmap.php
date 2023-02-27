<?php

$host = 'localhost';
$port = '5432';
$dbname = 'postgres';
$user = 'postgres';
$password = 'postgres';

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    echo "Erreur de connexion à la base de données.\n";
    exit;
}

$_réponse = json_decode(file_get_contents('php://input'), true);

// j'obtiens les coordonnées de deux points de chaque emprise : en haut à droite et en bas à gauche

$dlat1 = $_réponse['dlat1'];
$dlat2 = $_réponse['dlat2'];
$glat1 = $_réponse['glat1'];
$glat2 = $_réponse['glat2'];
$dlng1 = $_réponse['dlng1'];
$dlng2 = $_réponse['dlng2'];
$glng1 = $_réponse['glng1'];
$glng2 = $_réponse['glng2'];

// $dlat1 = 65.25670649344259;
// $dlat2 = 26.718750000000004;
// $glat1 = 24.607069137709708;
// $glat2 = -21.972656250000004;
// $dlng1 = -24.607069137709694;
// $dlng2 = 201.97265625;
// $glng1 = -65.25670649344259;
// $glng2 = 153.28125;

$query = "SELECT city , population, longitude , latitude FROM villewebmap WHERE latitude > $glat1 AND latitude < $dlat1 AND longitude > $glng1 AND longitude < $dlng1 ORDER BY population DESC LIMIT 5";
$result = pg_query($conn, $query);

if (!$result) {
    echo "Erreur de requête SQL.\n";
    exit;
}



$rows = pg_fetch_all($result);

$villes = array();

foreach ($rows as $row) {
    $nom = $row['city'];
    $pop = $row['population'];
    $lat = $row['latitude'];
    $lon = $row['longitude'];
    array_push($villes, array("city"=>$nom, "population"=>$pop, "latitude"=>$lat, "longitude"=>$lon));
}

$response = array("villes"=>$villes);

// foreach ($villes as $ville) {
//     echo "Nom de la ville : " . $ville['city'] . "<br>";
//     echo "Population :" . $ville['population'] . "<br>";
//     echo "Latitude : " . $ville['latitude'] . "<br>";
//     echo "Longitude : " . $ville['longitude'] . "<br>";
//     echo "<br>";
// }

echo json_encode($response);

pg_close($conn);

?>
