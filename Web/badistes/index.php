<!DOCTYPE html>
<html lang="fr">

<?php include("../header.php"); ?>

<body>
	<?php include("../menu.php"); 
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
					<form action="" method="post">
					<p>
						<input type="text" name="asw" />
						<input type="submit" value="Rechercher" />
					</p>
					</form>
					<?php 
						$licence=(isset($_POST["asw"])) ? $_POST["asw"] : "";
						$licence!="" ? searchJoueurDB($bdd,$licence) : "";
						#searchJoueurDB($bdd,$licence);
					?>
                </ul>
				<ul class="joueur_insertion">
					<p>
						Insertion d'un joueur <br />
					</p>
					<form action="" method="post">
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
						<label for="date_naiss">Date de naissance :</label>
						<input type="text" name="date_naiss" id="date_naiss" />
					</div>
						<input type="submit" value="Insérer" />	
					</p>
					</form>
					<?php 
						$licence=(isset($_POST["licence"])) ? $_POST["licence"] : "";
						$nom=(isset($_POST["nom"])) ? $_POST["nom"] : "";
						$prenom=(isset($_POST["prenom"])) ? $_POST["prenom"] : "";
						$date_naiss=(isset($_POST["date_naiss"])) ? $_POST["date_naiss"] : "";
						#$licence!="" ? searchJoueurDB($bdd,$licence) : "";
						insertJoueurDB($bdd,$licence,$nom,$prenom,$date_naiss,'2005-11-11',1,3);
					?>
				</ul>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include("../linkJS.php"); ?>

</body>

</html>