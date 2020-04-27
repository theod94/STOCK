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
            <input class="col-7" type="password" name="password" value="">
            <label class="col-4 p-0" for="">Statut : </label>
            <input class="col-7" type="text" name="statut" value="<?= $statut ?>">
            <div class="text-center">
                <button type="submit" name="modifier" class="bouton_ref">Modifier</button>
            </div>
        </form>

    </div>
</section>