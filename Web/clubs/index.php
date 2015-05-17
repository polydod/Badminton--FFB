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
                <h1>Clubs</h1>
                <p class="lead">Fédération Française de Badminton </p>

				<!-- left div -->
				<div class="left">
				
					<!--Search content -->
					<div class="search">
						<p class ="search_title"> Recherche d'un club par numéro de club, nom ou ville :</p>
						<form name="search" action="" method="post">
						<p>
							<input type="text" name="asw" placeholder="Exemple : MBC"/>
							<input type="submit" value="Rechercher" />
						</p>
						</form>
					</div>
					<!-- ./search -->
					
					<!-- Result content -->
					<div class="result">
						<?php searchClubDB($bdd);?>
					</div>
					<!-- ./result -->
				
				</div>
				<!-- ./left -->
				
				<!-- insertion and deletion content -->
				<div class="insert_delete">
					<p class ="insert_delete_title"> Insertion / suppression d'un club</p>
					<form name="insert_delete "action="" method="post">
					<p>
					<div>
						<label for="club_id">Numero de club :</label>
						<input type="text" name="club_id" id="club_id" required />
					</div>
					<div>
						<label for="nom_club">Nom de club :</label>
						<input type="text" name="nom_club" id="nom_club" required />
					</div>
					<div>
						<label for="ville_club">Ville :</label>
						<input type="text" name="ville_club" id="ville_club" required />
					</div>
					</br>
						<input type="submit" value="Insérer" name="insert" id="insert" />	
						<input type="submit" value="Supprimer" name="delete" id="delete" />	
					</p>
					</form>
					<?php formValidationClub($bdd);?>
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