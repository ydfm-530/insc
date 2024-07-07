
<?php

// vérifier si le formulaire a été soumis
if ($_SERVER ["REQUEST_METHOD"] == "POST")

{
   //Récupérez les données du formulaire
   $Name = $_POST ["Name"];
   $Email = $_POST ["Email"];
   $Age = $_POST ["Age"];
   $pseudo = $_POST ["pseudo"];
   $Mot_de_passe = $_POST ["Mot_de_passe"];

   //
   if (empty($Name) || empty($Email) || empty($Age) || empty($pseudo) || empty($Mot_de_passe)) {


        echo "veuillez remplir les champs.";
   } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {

      echo "L'adresse email est invalide.";
   } else {

        //Crypter le mot de passe
        $Mot_de_passe_crypte = password_hash($Mot_de_passe, PASSWORD_DEFAULT);

        // Insérez les données dans la base de donnée
        $conn = new mysqli ("localhost","root", "", "coordo");
        if ($conn->connect_error) {
         die("connection failed: " . $conn->connect_error);

        }

        $sql = "INSERT INTO user (Name, Email, Age, pseudo, Mot_de_passe) VALUES ('$Name', '$Email',
        '$Age', '$pseudo', '$Mot_de_passe_crypte')";

        if ($conn->query($sql) == TRUE)
        {
            echo "Inscription réussie !";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
        $conn-> close ();
   }
   
    
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Formulaire d'inscripton</title>
    <link rel="stylesheet" href="Formulaire1.css">
</head>
<body>
    <div id="couleurdefond">
        <div id="conteneur">
            <div id="haut"></div>
            <h1 style="text-align: center;">INSCRIPTION</h1>
            <p style="text-align: center;">Veuillez entrer vos coordonnées personnelles</p>
            <form   method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
            <div id="formulaire">
                <div id="form1">
                    <label for="Name">Name</label><br>
                    <input type="text" name="Name" id="Name" placeholder="Enter your name" required><br><br>
                    <label for="Email">Email</label><br>
                    <input type="email" name="Email" id="Email" placeholder="Enter your email" required><br><br>
                    <label for="Age">Age</label><br>
                    <input type="number" name="Age" id="Age" placeholder="Age" required><br><br> 
                    <label for="pseudo">pseudo</label><br>
                    <input type="text" name="pseudo" id="pseudo" placeholder="pseudo" required><br><br>
                    <label for="Mot_de _passe">Mot de Passe</label><br>
                    <input type="password" name="Mot_de_passe" id="Mot_de_passe" placeholder="Mot_de_passe" required><br><br>
                </div>
    
                <div id="submit">
                <button type="submit" id="submit">submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
</html>