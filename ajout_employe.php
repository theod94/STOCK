<?php
session_start();
require_once('connexion_base_de_donnee.php');
require_once('include/config.php');
require_once('classes/employes.php');

// récupère les données de l'utilisateur 
$stmt = $bdd->prepare("SELECT * FROM employes");
$result2 = $stmt->execute();
$result = $stmt->fetchAll();


if (isset($_POST['ajouter'])) {

    $object = new Employes();

    $object->setBdd($bdd);
    $object->setName($_POST['name']);
    $object->setFirstname($_POST['firstname']);
    $object->setEmail($_POST['email']);
    $object->setPhone($_POST['phone']);
    $password = password_hash(($_POST['password']), PASSWORD_BCRYPT);
    $object->setPassword($_POST['password']);
    $object->setStatut($_POST['statut']);

    if ($object->insert()) {
        header("location:liste_employes.php");
    }
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

<body class="body_accueil">

    <?php
    require_once('include/header2.php');
    // echo password_hash("poiuyt", PASSWORD_DEFAULT);
    ?>

    <main>

        <div>
            <h2 class="text-center titre_liste_piece">AJOUTER UN EMPLOYE</h2>
        </div>

        <div class="col-10 mx-auto">
            <div class="panel panel-default mx-auto">

                <form class="formulaire_references mt-5 mb-5 p-3 col-md-3 mx-auto" method="POST" action="">
                    <div class="">
                        <label class="col-4" for="">Nom : </label>
                        <input class="col-7" type="text" name="name" placeholder="name">
                        <label class="col-4 p-0" for="">Prénom : </label>
                        <input class="col-7" type="text" name="firstname" placeholder="firstname">
                        <label class="col-4" for="">Email : </label>
                        <input class="col-7" type="email" name="email" placeholder="email">
                        <label class="col-4" for="">Phone : </label>
                        <input class="col-7" type="text" name="phone" placeholder="phone">
                        <label class="col-4 p-0" for="">Password : </label>
                        <input class="col-7" type="password" name="password" placeholder="password">
                        <label class="col-4" for="">Statut : </label>
                        <input class="col-7" type="text" name="statut" placeholder="statut">
                        <div class="text-center mt-4">
                            <a><input class="bouton5" type="submit" name="ajouter" value="ajouter"></a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php
    require_once('include/footer.php');
    ?>

    <script src="assets/js/index.js"></script>
</body>

</html>