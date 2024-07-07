<?php

//information de connexion à la base de données

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coordo";

//créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

//vérifier la connexion
if($conn -> connect_error) {

      die ("Connection failed: " . $conn -> connect_error);

}

// Exemple d'exécution d'une requete
$sql = "SELECT * FROM user";
$result = $conn -> query ($sql);

if ($result -> num_rows > 0) {

    //Afficher les résultats
    while ($row = $result->fetch_assoc()) {

        echo "ID: " . $row["id"] . "- Name: " . $row ["name"]"<br>";

    }
} else {

    echo "0 results";
}

?>
