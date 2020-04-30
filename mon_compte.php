<?php
session_start();
require_once('connexion_base_de_donnee.php');
require_once('include/config.php');
require_once('classes/employes.php');

// récupère les données de l'employé 
$stmt = $bdd->prepare("SELECT * FROM employes WHERE id=:id");
$result2 = $stmt->execute([':id' => $_SESSION['id']]);
$resultat = $stmt->fetch();

$name = $resultat['name'];
$firstname = $resultat['firstname'];
$email = $resultat['email'];
$phone = $resultat['phone'];
$password = $resultat['password'];
$statut = $resultat['statut'];


// au clic de modifier, ça modifie les données de l'employé
if (isset($_POST['modifier'])) {

    $object = new Employes();

    $object->setBdd($bdd);
    $object->setId($_SESSION['id']);
    $object->setName($_POST['name']);
    $object->setFirstname($_POST['firstname']);
    $object->setEmail($_POST['email']);
    $object->setPhone($_POST['phone']);

    if ($_POST['password'] == '') {
        $password = $employesInfo['password'];
    } else {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    }

    $object->setPassword($_POST['password']);
    $object->setStatut($_POST['statut']);

    if ($object->update()) {
        header('location: mon_compte.php');
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
    ?>

    <main>
        <?php
        require_once('formulaire_mon_compte.php');
        ?>
    </main>

    <?php
    require_once('include/footer.php');
    ?>

    <script src="assets/js/index.js"></script>
</body>

</html>