<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitementt</title>
</head>
<body>
    <?php
       //connexion à la base de données:
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'info_recolt';
        try{
            $connexion = new PDO("mysql:host=$hostname; dbname=$dbname;", $username, $password);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        } 

       //récupérer less données du formulaire
        $nom = $_POST['first_name'];
        $prenom = $_POST['last_name'];
        $tel = $_POST['tel'];
        $mail = $_POST['mail'];
        $sexe = $_POST['gender'];

        // Requête d'insertion des données
            $sql = "INSERT INTO formulaire (nom, prenom, tel, mail, sexe) VALUES (:nom, :prenom, :tel, :mail, :sexe)";
            $stmt = $connexion->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':tel', $tel);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':sexe', $sexe);

        // Exécution de la requête
            if ($stmt->execute()) {
                echo "Les données du formulaire ont été enregistrées avec succès dans la base de données.";
            } else {
                echo "Une erreur s'est produite lors de l'enregistrement des données dans la base de données.";
            }
  
    ?>
</body>
</html>