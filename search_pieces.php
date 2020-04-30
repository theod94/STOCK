<section class="d-md-flex justify-content-around section_accueil">

    <div class="formulaire_references m-md-3 p-3 col-lg-3">
        <h3 class="text-center mb-5">PAR REFERENCE</h3>
        <form method="POST" class="col-12" action="liste_pieces_dispos.php">
            <label class="col-4 p-0" for="">Numéro : </label>
            <input class="col-7" name="q" type="search">
            <div class="text-center">
                <button type="submit" class="bouton_ref">Valider</button>
            </div>
        </form>

    </div>


    <div class="formulaire_modele m-md-3 p-3 col-lg-3">
        <h3 class="text-center mb-5">PAR MODELE</h3>
        <form method="POST" class="col-12" action="liste_pieces_dispos.php">

        <label class="col-4  p-0" for="" class="">FABRICANT : </label>
            <select class="col-6" name="q" type="search" id="fabric-select">
                <option value=""></option>
                <option value="Michelin">MICHELIN</option>
                <option value="Continental">CONTINETAL</option>
                <option value="GoodYear">GOODYEAR</option>
                <option value="Honda">HONDA</option>
                <option value="Yamaha">YAMAHA</option>
                <option value="Suzuki">SUZUKI</option>
                <option value="Ducati">DUCATI</option>
                <option value="Aprilia">APRILIA</option>
                <option value="Harley-Davidson">HARLEY-DAVIDSON</option>
            </select>
            <br>
            <label class="col-4  p-0" for="">NOM : </label>
            <select class="col-6" name="q" type="search" id="piece-select">
                <option value=""></option>
                <option value="Pneu">PNEU</option>
                <option value="Reservoir">RESERVOIR</option>
                <option value="Phares">PHARES</option>
                <option value="Jantes">JANTES</option>
                <option value="Selle">SELLE</option>
                <option value="Clignotants">CLIGNOTANTS</option>
            </select>
            <br>

            <div class="text-center">
                <button type="submit" class="mb-3 mt-3 bouton_ref">Valider</button>
            </div>
        </form>

    </div>

</section>