<!DOCTYPE html>
<html lang="fr">

<?php include("../header.php"); ?>

<body>
	<?php 
	include("../menu.php"); 
	include ("../connexionBD.php");
	include("../SQLrequest.php");
	$bdd = connectionDB();
	?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Categories de badminton - Fédération Française de Badminton</h1>
                <p class="lead">Okok cest bon</p>
                <ul class="categ_table_recherche">
                    <p>
						Recherche d'une categorie par numéro, nom, age de début ou age de fin : <br />
					</p>
					<form name="search" action="" method="post">
					<p>
						<input type="text" name="asw" />
						<input type="submit" value="Rechercher" />
					</p>
					</form>
					<?php searchCategDB($bdd);?>
                </ul>
				<ul class="categ_insert_delete">
					<p>
						Insertion / suppression d'une categorie <br />
					</p>
					<form name="insert_delete "action="" method="post">
					<p>
					<div>
						<label for="categorie_id">Numero de categorie :</label>
						<input type="text" name="categorie_id" id="categorie_id" />
					</div>
					<div>
						<label for="nom_categorie">Nom de categorie :</label>
						<input type="text" name="nom_categorie" id="nom_categorie" />
					</div>
					<div>
						<label for="age_debut">Age de début : </label>
						<input type="text" name="age_debut" id="age_debut" />
					</div>
					<div>
						<label for="age_fin">Age de fin :</label>
						<input type="text" name="age_fin" id="age_fin" />
					</div>
						<input type="submit" value="Insérer" name="insert" id="insert" />	
						<input type="submit" value="Supprimer" name="delete" id="delete" />	
					</p>
					</form>
					<?php formValidationCateg($bdd);?>
				</ul>
				
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include("../linkJS.php"); ?>

</body>

</html>