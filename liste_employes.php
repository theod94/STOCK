<?php
session_start();
require_once('connexion_base_de_donnee.php');
require_once('include/config.php');

// récupère les données de l'utilisateur 
$stmt = $bdd->prepare("SELECT * FROM employes");
//  -- inner join image ON post.id=image.id_post
//  -- inner join utilisateurs ON post.id_user=utilisateurs.id;
$result2 = $stmt->execute();
$result = $stmt->fetchAll();

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
            <h2 class="text-center titre_liste_piece">LISTE DES EMPLOYES</h2>
        </div>


        <table class="border table table-striped col-10 mx-auto tableau">
            <tbody>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">NOM</th>
                        <th scope="col">PRENOM</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">PHONE</th>
                        <th scope="col">STATUT</th>
                    </tr>
                </thead>

                <?php
                foreach ($result as $place) {
            


                    echo '<tr>';
                    echo   '<td>' . $place['name'] . '</td>';
                    echo   '<td>' . $place['firstname']  .'</td>';
                    echo   '<td>' . $place['email'] .'</td>';
                    echo   '<td>' . $place['phone'] . '</td>';
                    echo   '<td>' . $place['statut'] . '</td>';
                    echo   '<td>';
                    echo   '<a href="modification_employe.php"><button type="submit" class="btn-success">MODIFIER</button></a>';
                    echo   '</td>';
                    echo   '<td>';
                    echo   '<a class="btn bouton5" href="delete_employes.php?Action=Suppression&id='.$place['id'] .      '">SUPPRIMER</a>';
                    echo   '</td>';
                    echo '</tr>';

                }
                ?>
            </tbody>
        </table>
        <div class="mx-auto col-10 p-0 pb-5">
            <a class="btn btn-info" href="ajout_employe.php">Ajouter</a>
        </div>
    </main>

    <?php
    require_once('include/footer.php');
    ?>

    <script src="assets/js/index.js"></script>
</body>

</html>