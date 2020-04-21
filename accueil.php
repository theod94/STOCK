<?php
session_start();
require_once('connexion_base_de_donnee.php');
require_once('include/config.php');

$ref = $bdd->query('SELECT pieces FROM reference WHERE pieces ORDER BY id DESC');

if(isset($_GET['q']) AND !empty($_GET['q'])) {
    $q = htmlspecialchars($_GET['q']);
    $ref = $bdd->query('SELECT pieces FROM reference WHERE pieces LIKE "%'.$q.'%" ORDER BY id DESC');
    header('location: liste_pieces_dispos.php');
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
        <section class="d-md-flex justify-content-around section_accueil">

            <div class="formulaire_references m-md-3 p-3 col-lg-3">
                <h3 class="text-center mb-5">PAR REFERENCE</h3>
                <form method="GET"  class="col-12" action="">
                    <label class="col-4 p-0" for="">Numéro : </label>
                    <input class="col-7" name="q" type="search">
                </form>
                <div class="text-center">
                    <button type="submit" class="bouton_ref">Valider</button>
                </div>
            </div>


            <div class="formulaire_modele m-md-3 p-3 col-lg-3">
                <h3 class="text-center mb-5">PAR MODELE</h3>
                <form method="POST" class="col-12" action="">
                    <label class="col-4 p-0" for="">MARQUE :</label>
                    <select class="col-6" name="marque" id="marque-select">
                        <option value=""></option>
                        <option value="Honda">Honda</option>
                        <option value="Yamaha">Yamaha</option>
                        <option value="Ducati">Ducati</option>
                        <option value="Harley-Davidson">Harley-Davidson</option>
                        <option value="Aprilia">Aprilia</option>
                        <option value="Suzuki">Suzuki</option>
                    </select>
                    <br>
                    <label  class="col-4  p-0" for="">PIECE : </label>
                    <select class="col-6" name="piece" id="piece-select">
                        <option value=""></option>
                        <option value="Pneu">Pneu</option>
                        <option value="Reservoir">Reservoir</option>
                        <option value="Phares">Phares</option>
                        <option value="Jantes">Jantes</option>
                        <option value="Selle">Selle</option>
                        <option value="Clignotants">Clignotants</option>
                    </select>
                    <br>
                    <label  class="col-4  p-0" for="" class="">FABRICANT : </label>
                    <select class="col-6" name="fabricant" id="fabric-select">
                        <option value=""></option>
                        <option value="Michelin">Michelin</option>
                        <option value="Continental">Continental</option>
                        <option value="GoodYear">GoodYear</option>
                         <!-- <option value="Harley-Davidson">Harley-Davidson</option>
                        <option value="Aprilia">Aprilia</option>
                        <option value="Suzuki">Suzuki</option> -->
                    </select>
                </form>
                <div class="text-center">
                    <a href="liste_pieces_dispos.php"><button type="submit" class="mb-3 mt-3 bouton_ref">Valider</button></a>
                </div>
            </div>

        </section>



    </main>

    <?php
    require_once('include/footer.php');
    ?>

    <script src="assets/js/index.js"></script>
</body>

</html>