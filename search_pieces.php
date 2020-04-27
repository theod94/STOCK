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
            <label class="col-4  p-0" for="">PIECE : </label>
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
            <label class="col-4  p-0" for="" class="">FABRICANT : </label>
            <select class="col-6" name="fabricant" id="fabric-select">
                <option value=""></option>
                <option value="Michelin">Michelin</option>
                <option value="Continental">Continental</option>
                <option value="GoodYear">GoodYear</option>
                <!-- <option value="Harley-Davidson">Harley-Davidson</option>
                        <option value="Aprilia">Aprilia</option>
                        <option value="Suzuki">Suzuki</option> -->
            </select>
            <div class="text-center">
                <button type="submit" class="mb-3 mt-3 bouton_ref">Valider</button>
            </div>
        </form>

    </div>

</section>