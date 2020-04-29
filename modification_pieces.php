<?php
session_start();
require_once('connexion_base_de_donnee.php');
require_once('include/config.php');
require_once('classes/pieces.php');

$pcs = new Pieces();

$pcs->setId($_SESSION['id']);
$pcs->setBdd($bdd);

// // au clic de modifier, ça modifie les données de la piece
if (isset($_POST['modifier'])) {

    // var_dump($bdd);
    $pcs->setReference($_POST['reference']);
    $pcs->setFabriquant($_POST['fabriquant']);
    $pcs->setName($_POST['name']);
    $pcs->setAllee($_POST['allee']);
    $pcs->setEtage($_POST['etage']);
    $pcs->setPrix($_POST['prix']);

    //  var_dump($_POST);
    if ($pcs->update()) {
        header("location:liste_pieces_dispos.php");
    }
}

// récupère les données de l'employé 
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
// var_dump($resultat);

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
        <div>
            <h3 class="text-center mt-5">MODIFIER PIECES :</h3>
        </div>


        <section class="d-flex justify-content-center mt-5 mb-5">

            <div class="formulaire_references p-3 col-md-4">

                <form method="POST" class="col-12" action="" enctype="multipart/form-data">

                    <label class="col-4 p-0" for="">Référence : </label>
                    <input class="border-dark col-7" name="reference" type="text" value="<?= $resultat['reference'] ?>">
                    <label class="col-4 p-0" for="">Fabricant : </label>
                    <input class="border-dark col-7" name="fabriquant" type="text" value="<?= $resultat['fabriquant'] ?>">
                    <label class="col-4 p-0" for="">Nom du modèle : </label>
                    <input class="border-dark col-7" name="name" type="text" value="<?= $resultat['name'] ?>">
                    <label class="col-4 p-0" for="">N° Allée : </label>
                    <input class="border-dark col-7" name="allee" type="text" value="<?= $resultat['allee'] ?>">
                    <label class="col-4 p-0" for="">N° Etage : </label>
                    <input class="border-dark col-7" name="etage" type="text" value="<?= $resultat['etage'] ?>">
                    <label class="col-4 p-0" for="">Prix : </label>
                    <input class="border-dark col-7" name="prix" type="text" value="<?= $resultat['prix'] ?>">

                    <div class="text-center">
                        <input class="bouton_ref" type="submit" name="modifier" id="modifier" value="Modifier la pièce">
                    </div>
                </form>

            </div>
        </section>
    </main>

    <?php
    require_once('include/footer.php');
    ?>

    <script src="assets/js/index.js"></script>
</body>

</html>