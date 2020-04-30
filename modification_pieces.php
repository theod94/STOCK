<?php
session_start();
require_once('connexion_base_de_donnee.php');
require_once('include/config.php');
require_once('classes/pieces.php');

$pcs = new Pieces();

// au clic de modifier, ça modifie les données de la piece
if (isset($_POST['modifier'])) {

    $pcs->setId($_POST['piece_id']);
    $pcs->setBdd($bdd);

    $pcs->setReference($_POST['reference']);
    $pcs->setFabriquant($_POST['fabriquant']);
    $pcs->setName($_POST['name']);
    $pcs->setAllee($_POST['allee']);
    $pcs->setEtage($_POST['etage']);
    $pcs->setPrix($_POST['prix']);


    if ($pcs->update()) {
        header("location:liste_pieces_dispos.php");
    }
}

// récupère les données de la piece 
$stmt = $bdd->prepare("SELECT pieces.*, images.name as imagename FROM pieces 
inner join images ON pieces.id=images.id_pieces
WHERE pieces.id=:id");

$id = (int) $_GET['id'];
$result2 = $stmt->execute(['id' => $id]);
$resultat = $stmt->fetch();

$reference = $resultat['reference'];
$fabriquant = $resultat['fabriquant'];
$name = $resultat['name'];
$allee = $resultat['allee'];
$etage = $resultat['etage'];
$prix = $resultat['prix'];


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
        require_once('modif_pieces_rac.php');
        ?>
    </main>

    <?php
    require_once('include/footer.php');
    ?>

    <script src="assets/js/index.js"></script>
</body>

</html>