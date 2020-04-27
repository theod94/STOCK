<?php
session_start();
require_once('connexion_base_de_donnee.php');

if (isset($_POST['login'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $reponse = $bdd->query("SELECT * FROM employes where email='$email'");
    $resultat = $reponse->fetch();
    //   var_dump($resultat);
    if (count($resultat) > 0 && password_verify($password, $resultat['password'])) {
        $_SESSION['email'] = $resultat['email'];
        $_SESSION['id'] = $resultat['id'];
        header('location: accueil.php');
    } else {
        $erreur = 'Non valide';
    };
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>STOCKAPP</title>
</head>

<body class="body_connexion">




    <?php
    require_once('include/header.php');
    // echo password_hash("poiuyt", PASSWORD_DEFAULT);
    ?>

    <main>


        <div class="gallery">
            <div class="gallery-container mt-5">
                <a id="btnPopup" class="btnPopup"><img class="gallery-item" src="assets/img/ryan.jpg?text=Ryan"></a>
                <a  class="btnPopup"><img class="gallery-item" src="assets/img/leonardo.jpg?text=Jean"></a>
                <a  class="btnPopup"><img class="gallery-item" src="assets/img/jean.jpg?text=Jean"></a>
                <a  class="btnPopup"><img class="gallery-item" src="assets/img/js.jpg?text=Jason"></a>
                <a  class="btnPopup"><img class="gallery-item" src="assets/img/mj.jpg?text=Michael"></a>
            </div>
            <div class="gallery-controls"></div>
        </div>


        <div id="overlay" class="overlay">
            <div id="popup" class="popup">

                <h2 style="color: white;" class="text-center">
                    CONNEXION
                    <span id="btnClose" class="btnClose">&times;</span>
                </h2>

                <form method="POST" style="color: white;">

                    <label for="">Email : </label>
                    <input type="email" name="email">

                    <label for="">Password : </label>
                    <input type="password" name="password">

                    <button type="submit" name="login" class="bouton_valider">valider</button>

                </form>
            </div>
        </div>

        <?php

        if (isset($erreur)) {
            echo "<div><span>$erreur</span></div>";
        }

        ?>



    </main>
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

    <script src="assets/js/index.js"></script>
  
</body>

</html>