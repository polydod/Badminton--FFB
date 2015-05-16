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
                <h1>Joueurs de badminton - Fédération Française de Badminton</h1>
                <p class="lead">Okok cest bon</p>
                <ul class="joueur_table_recherche">
                    <p>
						Recherche d'un joueur par numéro de licence, nom ou prenom : <br />
					</p>
					<form name="search" action="" method="post">
					<p>
						<input type="text" name="asw" />
						<input type="submit" value="Rechercher" />
					</p>
					</form>
					<?php searchJoueurDB($bdd);?>
                </ul>
				<ul class="joueur_insert_delete">
					<p>
						Insertion / suppression d'un joueur <br />
					</p>
					<form name="insert_delete "action="" method="post">
					<p>
					<div>
						<label for="licence">Licence :</label>
						<input type="text" name="licence" id="licence" />
					</div>
					<div>
						<label for="nom">Nom :</label>
						<input type="text" name="nom" id="nom" />
					</div>
					<div>
						<label for="prenom">Prenom :</label>
						<input type="text" name="prenom" id="prenom" />
					</div>
					<div>
						<label for="date_naiss">Date de naissance (AAAA-MM-JJ) :</label>
						<input type="text" name="date_naiss" id="date_naiss" />
					</div>
					<div>
						<label for="date_premiere_inscription">Date de premiere inscription (AAAA-MM-JJ) :</label>
						<input type="text" name="date_prem" id="date_prem" />
					</div>
						<input type="submit" value="Insérer" name="insert" id="insert" />	
						<input type="submit" value="Supprimer" name="delete" id="delete" />	
					</p>
					</form>
					<?php formValidationJoueur($bdd);?>
				</ul>
				
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include("../linkJS.php"); ?>

</body>

</html>