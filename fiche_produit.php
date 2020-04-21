<?php
session_start();
require_once('connexion_base_de_donnee.php');
require_once('include/config.php');

// récupère les données de la table
$stmt = $bdd->prepare("SELECT * FROM pieces
where pieces.id=:id");
$id = (int)$_GET['id'];
$result2 = $stmt->execute(['id' => $id]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// récupère les données de la table
$stmt = $bdd->prepare("SELECT pieces.*, images.name as imagename FROM pieces 
inner join images ON pieces.id=images.id_pieces
where pieces.id=:id");
$id = (int)$_GET['id'];
$result2 = $stmt->execute(['id' => $id]);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
        <section class="d-md-flex col-md-10 mx-auto">
            <div class="col-6 mb-5">
                <h2 class="titre_liste_piece pb-4"><?= $result['name'] ?></h2>

                <?php
                foreach ($posts as $post) {
                ?>

                    <img class="taille_image_fiche_produit" src="assets/img/<?= $post['imagename'] ?>" alt="récuperation image de la piece">

                <?php
                }
                ?>

            </div>


            <div class="col-md-6 mb-5 mx-auto d-flex align-items-center div_droite_stock">
                <form method="POST" action="">
                    <div class="d-flex">
                        <label for="" class="pr-2 m-0 col-8">STOCK DISPO : </label>
                        <br>
                        <input class="col-2 pl-0 pr-0" type="text" value="5">
                    </div>

                    <br>
                    <div class="d-flex">
                        <label for="" class="pr-2 m-0 col-8">NOMBRE COMMANDE : </label>
                        <br>
                        <input class="col-2 pl-0 pr-0" type="text">
                    </div>
                    <div class="text-center">
                        <button class="btn-success mt-5">Valider</button>
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