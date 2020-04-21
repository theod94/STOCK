<?php
session_start();
require_once('connexion_base_de_donnee.php');
require_once('include/config.php');

// récupère les données de l'utilisateur 
$stmt = $bdd->prepare("SELECT * FROM pieces");
$result2 = $stmt->execute();
$result = $stmt->fetchAll();


if (isset($_POST['ajout_pieces'])) {

    $reference = $_POST['reference'];
    $fabriquant = $_POST['fabriquant'];
    $name = $_POST['name'];
    $allee = $_POST['allee'];
    $etage = $_POST['etage'];
    $prix = $_POST['prix'];

    $insert = "INSERT INTO pieces 
    (reference, fabriquant, name, allee, etage, prix, isActive)
    VALUES (:reference, :fabriquant, :name, :allee, :etage, :prix, 1)";
    $stmt = $bdd->prepare($insert);
    $stmt->execute([
        'reference' => $reference, 'fabriquant' => $fabriquant, 'name' => $name, 'allee' => $allee, 'etage' => $etage,
        'prix' => $prix
    ]);

        echo "\nPDO::errorInfo():\n";
        print_r($bdd->errorInfo());

    $idPieces = $bdd->lastInsertId();
    // var_dump($idPieces);

    /* script pour upload file */
    var_dump($_FILES);
    $target_dir = "assets/img/";
    $target_file = $target_dir . basename($_FILES["fichier"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $filename = $_FILES["fichier"]["name"];
    // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fichier"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        }
    // Check file size
    if ($_FILES["fichier"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fichier"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
    /************************ */
        // var_dump($idPieces);
                        
        $insert = "INSERT INTO images (name, id_pieces, isActive) VALUES (:name, :id_pieces, 1)";
                   
        $stmt = $bdd->prepare($insert);
        $stmt->execute(['name' => $filename, ':id_pieces' => $idPieces]);
        header("location:liste_pieces_dispos.php");       
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
        <div>
            <h3 class="text-center mt-5">AJOUTER PIECES :</h3>
        </div>


        <section class="d-flex justify-content-center mt-5 mb-5">

            <div class="formulaire_references p-3 col-md-4">

                <form method="POST" class="col-12" action="" enctype="multipart/form-data">

                    <label class="col-4 p-0" for="">Référence : </label>
                    <input class="border-dark col-7" name="reference" type="text">
                    <label class="col-4 p-0" for="">Fabricant : </label>
                    <input class="border-dark col-7" name="fabriquant" type="text">
                    <label class="col-4 p-0" for="">Image : </label>
                    <input class="border-dark col-7 p-0" type="file" name="fichier" id="">
                    <label class="col-4 p-0" for="">Nom du modèle : </label>
                    <input class="border-dark col-7" name="name" type="text">
                    <label class="col-4 p-0" for="">N° Allée : </label>
                    <input class="border-dark col-7" name="allee" type="text">
                    <label class="col-4 p-0" for="">N° Etage : </label>
                    <input class="border-dark col-7" name="etage" type="text">
                    <label class="col-4 p-0" for="">Prix : </label>
                    <input class="border-dark col-7" name="prix" type="text">
                    
                    <div class="text-center">
                        <input class="bouton_ref" type="submit" name="ajout_pieces" id="ajout_pieces" value="Ajouter nouvelle pièce">
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