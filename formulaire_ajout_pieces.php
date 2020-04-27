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