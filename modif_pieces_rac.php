<div>
    <h3 class="text-center mt-5">MODIFIER PIECES :</h3>
</div>


<section class="d-flex justify-content-center mt-5 mb-5">

    <div class="formulaire_references p-3 col-md-4">

        <form method="POST" class="col-12" action="" enctype="multipart/form-data">

            <label class="col-4 p-0" for="">Référence : </label>
            <input class="border-dark col-7" name="reference" type="text" value="<?= $resultat['reference'] ?>">
            <input class="border-dark col-7" name="piece_id" type="hidden" value="<?= $resultat['id'] ?>">
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