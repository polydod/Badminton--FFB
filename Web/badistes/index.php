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
                <h1>Joueurs</h1>
                <p class="lead">Fédération Française de Badminton</p>
				
				<!-- left div -->
				<div class="left">
				
					<!--Search content -->
					<div class="search">
						<p class ="search_title"> Recherche d'un joueur par numéro de licence, nom, prenom, nom de club ou catégorie : </p>
						<form name="search" action="" method="post">
						<p>
							<input type="text" name="asw" placeholder="Exemple : 100105"/>
							<input type="submit" value="Rechercher" />
						</p>
						</form>
					</div>
					<!-- /.search -->
					
					<!-- Result content -->
					<div class="result">
						<?php searchJoueurDB($bdd);?>
					</div>
					<!-- ./result -->
					
				</div>
				<!-- ./left -->
				
				<!-- insertion and deletion content -->
				<div class="insert_delete">
					<p class ="insert_delete_title"> Insertion / suppression d'un joueur</p>
					<form name="insert_delete "action="" method="post">
					<p>
					<div>
						<label for="licence">Licence :</label>
						<input type="text" name="licence" id="licence" required />
					</div>
					<div>
						<label for="nom">Nom :</label>
						<input type="text" name="nom" id="nom" required />
					</div>
					<div>
						<label for="prenom">Prenom :</label>
						<input type="text" name="prenom" id="prenom" required />
					</div>
					<div>
						<label for="date_naiss">Date de naissance :</label>
						<input type="text" name="date_naiss" id="date_naiss" required />
					</div>
					<div>
						<label for="date_premiere_inscription">Club :</label>
						<input type="text" name="club" id="club" required />
					</div>
					</br>
						<input type="submit" value="Insérer" name="insert" id="insert" />	
						<input type="submit" value="Supprimer" name="delete" id="delete" />	
					</p>
					</form>
					<?php formValidationJoueur($bdd);?>
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