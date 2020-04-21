<?php
session_start();
require_once('connexion_base_de_donnee.php');
require_once('include/config.php');

// récupère les données de l'employé 
$stmt = $bdd->prepare("SELECT * FROM employes where id=:id");
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

    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $phone = $_POST['phone']; 
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $statut = $_POST['statut'];
    // var_dump($_POST);
    // die;


    $update = "UPDATE employes SET 
    name=:name,
    firstname=:firstname,
    email=:email,
    phone=:phone,
    password=:password,
    statut=:statut, 
    WHERE id=:id";


    $stmt = $bdd->prepare($update);
    $result2 = $stmt->execute([':name' => $name, ':firstname' => $firstname, ':email' => $email, ':phone' => $phone, ':password' => $password, 'statut' => $statut, ':id' => ($_SESSION['id'])]);

    header('location: mon_compte.php');
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
        <section class="d-flex justify-content-center form_profil">
            <div class="formulaire_references m-3 p-3 col-lg-3">
                <h3 class="text-center mb-5">MES INFOS :</h3>
                <form method="POST" class="col-12" action="">

                    <label class="col-4 p-0" for="">Name : </label>
                    <input class="col-7" type="text" name="name" value="<?= $name ?>">
                    <label class="col-4 p-0" for="">Firstname : </label>
                    <input class="col-7" type="text" name="firstname" value="<?= $firstname ?>">
                    <label class="col-4 p-0" for="">Email : </label>
                    <input class="col-7" type="email" name="email" value="<?= $email ?>">
                    <label class="col-4 p-0" for="">Phone : </label>
                    <input class="col-7" type="text" name="phone" value="<?= $phone ?>">
                    <label class="col-4 p-0" for="">Password : </label>
                    <input class="col-7" type="password" name="password" value="<?= $password ?>">
                    <div class="text-center">
                        <button type="submit" name="modifier" class="bouton_ref">Modifier</button>
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