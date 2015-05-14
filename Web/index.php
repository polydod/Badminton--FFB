<!DOCTYPE html>
<html lang="fr">

<?php include("header.php"); ?>

<body>
	<?php include("menu.php"); 
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=badminton_ffb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}
	
	$reponse = $bdd->query('SELECT * FROM joueur');
	
	while ($donnees = $reponse->fetch())
	{
		echo $donnees['licence'] . ' apelle ' . $donnees['nom_joueur'] . '<br />';
	}

	$reponse->closeCursor(); // Termine le traitement de la requête

	?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>A Bootstrap Starter Template</h1>
                <p class="lead">Complete with pre-defined file paths that you won't have to change!</p>
                <ul class="list-unstyled">
                    <li>Bootstrap v3.3.1</li>
                    <li>jQuery v1.11.1</li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include("linkJS.php"); ?>

</body>

</html>
