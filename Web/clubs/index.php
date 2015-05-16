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
                <h1>Clubs - Fédération Française de Badminton</h1>
                <p class="lead">Okok cest bon</p>
                <ul class="club_table_recherche">
                    <p>
						Recherche d'un club par numéro de club, nom ou ville : <br />
					</p>
					<form name="search" action="" method="post">
					<p>
						<input type="text" name="asw" />
						<input type="submit" value="Rechercher" />
					</p>
					</form>
					<?php searchClubDB($bdd);?>
                </ul>
				<ul class="club_insert_delete">
					<p>
						Insertion / suppression d'un club <br />
					</p>
					<form name="insert_delete "action="" method="post">
					<p>
					<div>
						<label for="club_id">Numero de club :</label>
						<input type="text" name="club_id" id="club_id" />
					</div>
					<div>
						<label for="nom_club">Nom de club :</label>
						<input type="text" name="nom_club" id="nom_club" />
					</div>
					<div>
						<label for="ville_club">Ville :</label>
						<input type="text" name="ville_club" id="ville_club" />
					</div>
						<input type="submit" value="Insérer" name="insert" id="insert" />	
						<input type="submit" value="Supprimer" name="delete" id="delete" />	
					</p>
					</form>
					<?php formValidationClub($bdd);?>
				</ul>
				
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include("../linkJS.php"); ?>

</body>

</html>