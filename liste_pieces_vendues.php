<?php
session_start();
require_once('connexion_base_de_donnee.php');
require_once('include/config.php');

// récupère les données de l'utilisateur 
// $stmt = $bdd->prepare("SELECT pieces.*, utilisateurs.name as username, image.name as imagename FROM post")
// // -- inner join image ON post.id=image.id_post
// // -- inner join utilisateurs ON post.id_user=utilisateurs.id;
// $result2 = $stmt->execute();
// $result = $stmt->fetchAll();
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
        <div class="d-flex col-11 mt-5 mx-auto justify-content-between">


            <div class="d-flex align-items-center">
                <input type="search" class="input-sm form-control" placeholder="Recherche">
                <button type="submit" class="btn-primary btn-sm">Chercher</button>
            </div>
            <div>
                <h2 class="text-center">PIECES VENDUES</h2>
            </div>
            <div></div>
            <div></div>

        </div>

        <table class="border table table-striped col-10 mx-auto tableau">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">REFERENCE</th>
                    <th scope="col">PIECE</th>
                    <th scope="col">CLIENT</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">PRIX</th>
                    <th scope="col">DATE</th>
                    <th scope="col">STOCK</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th scope="row">P123YM</th>
                    <td>Pneu</td>
                    <td>Jean-Michel</td>
                    <td>2</td>
                    <td>100€</td>
                    <td>12/00/2020</td>
                    <td>3</td>
                    <td><a href="fiche_produit.php" class="bouton4 btn">VOIR</a></td>
                </tr>
            </tbody>

        </table>

        <nav aria-label="Page navigation example d-flex">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>

    </main>

    <?php
    require_once('include/footer.php');
    ?>

    <script src="assets/js/index.js"></script>
</body>

</html>