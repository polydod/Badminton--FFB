<!DOCTYPE html>
<html lang="fr">
	
<head>
	<?php include("../header.php"); ?>
</head>

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
                <h1>Categories de badminton</h1>
                <p class="lead">Fédération Française de Badminton</p>
				
				<!-- left div -->
				<div class="left">
				
					<!--Search content -->
					<div class="search">
						<p class ="search_title"> Recherche d'une categorie par numéro, nom, age de début ou age de fin : </p>
						<form name="search" action="" method="post">
						<p>
							<input type="text" name="asw" placeholder="Exemple : Poussin" />
							<input type="submit" value="Rechercher" />
						</p>
						</form>
					</div>
					<!-- /.search -->
					
					<!-- Result content -->
					<div class="result">
						<?php searchCategDB($bdd);?>
					</div>
					<!-- ./result -->
					
				</div>
				<!-- ./left -->
				
				<!-- insertion and deletion content -->
				<div class="insert_delete">
					<p class ="insert_delete_title"> Insertion / suppression d'une categorie</p>
					<form name="insert_delete "action="" method="post">
					<p>
					<div>
						<label for="categorie_id">Numero de categorie :</label>
						<input type="text" name="categorie_id" id="categorie_id" required />
					</div>
					<div>
						<label for="nom_categorie">Nom de categorie :</label>
						<input type="text" name="nom_categorie" id="nom_categorie" required />
					</div>
					<div>
						<label for="age_debut">Age de début : </label>
						<input type="text" name="age_debut" id="age_debut" required />
					</div>
					<div>
						<label for="age_fin">Age de fin :</label>
						<input type="text" name="age_fin" id="age_fin" required />
					</div>
					</br>
						<input type="submit" value="Insérer" name="insert" id="insert" />	
						<input type="submit" value="Supprimer" name="delete" id="delete" />	
					</p>
					</form>
					<?php formValidationCateg($bdd);?>
				</div>
				<!-- ./insert_delete -->
				
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include("../linkJS.php"); ?>

</body>

</html>