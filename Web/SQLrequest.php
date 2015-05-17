<?php 

##########################################################
#					  JOUEURS							 #
##########################################################

#Input : One information about a player (joueur)
#Result : Show list of player from table "joueur" who match the information
function searchJoueurDB($db)
{
	if (isset($_POST["asw"]))
	{
		$res = $_POST["asw"];
		#$reponse = $db->query('SELECT * FROM joueur WHERE licence = ' . $licence . ';');
		$reponse = $db->prepare('SELECT * FROM joueur j, club cl, categorie ca WHERE j.categorie_id = ca.categorie_id
																			AND j.club_id = cl.club_id
																			AND (j.licence LIKE ? 
																			OR j.nom_joueur LIKE ?
																			OR j.prenom_joueur LIKE ?
																			OR cl.nom_club LIKE ?
																			OR ca.nom_categorie LIKE ?)
																			ORDER BY j.licence ASC;');
		$answer = '%' . $res . '%';
		$reponse->execute(array($answer,$answer,$answer,$answer,$answer));
		if ($reponse->rowCount() == 0 or $res == "") {
			echo "Aucune ligne ne correspond à la requête.";
		}
		else
		{
			?>
			<table>
			<tr>
			   <th>Numero de licence</th>
			   <th>Nom</th>
			   <th>Prenom</th>
			   <th>Date de naissance</th>
			   <th>Date premiere licence</th>
			   <th>Club</th>
			   <th>Categorie</th>
			   <th>Photos du joueur</th>
			</tr>
			<?php
			while ($donnees = $reponse->fetch()) #stop when all data from sql request are showed
			{
				?>
				<tr>
					<td><?php echo $donnees['licence']?></td>
					<td><?php echo $donnees['nom_joueur']?></td>
					<td><?php echo $donnees['prenom_joueur']?></td>
					<td><?php echo $donnees['date_naissance']?></td>
					<td><?php echo $donnees['date_premiere_inscription']?></td>
					<td><?php echo $donnees['nom_club']?></td>
					<td><?php echo $donnees['nom_categorie']?></td>
					<td><?php $image = $donnees['image_url'];
							  print '<img src="'.$image.'" width="120" height ="70" alt="Photo du joueur" />'?></td>
				</tr>
				<?php
			}
			?>
			</table>
		<?php
		}
		$reponse->closeCursor(); // Termine le traitement de la requête
	}
	else
	{
		#echo "Exemple : 100100 - Dana - Salomon";
	}
}

#Input : database used and responses from the form
#Result : call insertJoueurDB or deleteJoueurDB (depend on button clicked)
function formValidationJoueur($db)
{
	$licence=(isset($_POST["licence"])) ? trim($_POST["licence"]) : "";
	$nom=(isset($_POST["nom"])) ? trim($_POST["nom"]) : "";
	$prenom=(isset($_POST["prenom"])) ? trim($_POST["prenom"]) : "";
	$date_naiss=(isset($_POST["date_naiss"])) ? trim($_POST["date_naiss"]) : "";
	$club=(isset($_POST["club"])) ? trim($_POST["club"]) : "";
	$date_premiere_licence = date('Y').'-'.date('m').'-'.date('d');
	$categ = 2;
	$image = "http://www.google.fr/url?source=imglanding&ct=img&q=http://ccbonline.fr/ccb/IMG/jpg/sticker-joueur-badminton-57x77-cm-decoration-868554139_ml-2.jpg&sa=X&ei=krpYVfL9FczWUcbHgZgC&ved=0CAkQ8wc&usg=AFQjCNHzEqIV36LMABjLUlZ4f2pyw3X9Hg";
	if (isset($_POST["insert"]))
	{
		insertJoueurDB($db,$licence,$nom,$prenom,$date_naiss,$date_premiere_licence,$club,$categ,$image);
	}
	if (isset($_POST["delete"]))
	{
		deleteJoueurDB($db,$licence);
	}
}


#Input : informations relative to a player (joueur)
#Result : insert a player in database "joueur"
function insertJoueurDB($db,$licence,$nom,$prenom,$date_naiss,$date_premiere_licence,$club,$categ,$image)
{
	$reponse = $db->prepare('INSERT INTO joueur VALUES (?,?,?,?,?,?,?,?)');
	if ($licence!="" and $nom!="" and $prenom!="" and $date_naiss!="" and $date_premiere_licence!="" and $club!="" and $categ!="")
	{
		$reponse->execute(array($licence,$nom,$prenom,$date_naiss,$date_premiere_licence,$club,$categ,$image));
		echo "Joueur inséré";
	}
	else
	{
		echo "Vous n'avez pas rempli toutes les valeurs";
	}
}

#Input : information relative to a player (joueur)
#Result : delete a player from database "joueur"
function deleteJoueurDB($db,$licence)
{
	$reponse = $db->prepare('DELETE FROM joueur WHERE licence = ?');
	if ($licence!="")
	{
		$reponse->execute(array($licence));
		echo "Joueur supprimé";
	}
	else
	{
		echo "Vous n'avez pas rempli de licence";
	}
}

##########################################################
#					  CLUBS 							 #
##########################################################
#Input : One information about a club
#Result : Show list of clubs from table "club" who match the information
function searchClubDB($db)
{
	if (isset($_POST["asw"]))
	{
		$res = $_POST["asw"];
		#$reponse = $db->query('SELECT * FROM joueur WHERE licence = ' . $licence . ';');
		$reponse = $db->prepare('SELECT * FROM club c, ville v WHERE v.ville_id = c.ville_id
													  AND (c.club_id LIKE ? 
													  OR c.nom_club LIKE ?
													  OR v.nom_ville LIKE ?); ');
		$answer = '%' . $res . '%';
		$reponse->execute(array($answer,$answer,$answer));
		if ($reponse->rowCount() == 0 or $res == "") {
			echo "Aucune ligne ne correspond à la requête.";
		}
		else
		{
			?>
			<table>
			<tr>
			   <th>Numero de club</th>
			   <th>Nom de club</th>
			   <th>Ville</th>
			</tr>
			<?php
			while ($donnees = $reponse->fetch()) #stop when all data from sql request are showed
			{
				?>
				<tr>
					<td><?php echo $donnees['club_id']?></td>
					<td><?php echo $donnees['nom_club']?></td>
					<td><?php echo $donnees['nom_ville']?></td>
				</tr>
				<?php
			}
			?>
			</table>
		<?php
		}
		$reponse->closeCursor(); // Termine le traitement de la requête
	}
	else
	{
		#echo "Exemple : 1 - MBC - Montpellier";
	}
}

#Input : database used and responses from the form
#Result : call insertClubDB or deleteClubDB (depend on button clicked)
function formValidationClub($db)
{
	$club_id=(isset($_POST["club_id"])) ? trim($_POST["club_id"]) : "";
	$nom_club=(isset($_POST["nom_club"])) ? trim($_POST["nom_club"]) : "";
	$ville_club=(isset($_POST["ville_club"])) ? trim($_POST["ville_club"]) : "";
	if (isset($_POST["insert"]))
	{
		insertClubDB($db,$club_id,$nom_club,$ville_club);
	}
	if (isset($_POST["delete"]))
	{
		deleteClubDB($db,$club_id);
	}
}

#Input : informations relative to a club
#Result : insert a club in database "club"
function insertClubDB($db,$club_id,$nom_club,$ville_club)
{
	$reponse = $db->prepare('INSERT INTO club VALUES (?,?,?)');
	if ($club_id!="" and $nom_club!="" and $ville_club!="")
	{
		$reponse->execute(array($club_id,$nom_club,$ville_club));
		echo "Club inséré";
	}
	else
	{
		echo "Vous n'avez pas rempli toutes les valeurs";
	}
}

#Input : information relative to a club
#Result : delete a club from database "club"
function deleteClubDB($db,$club_id)
{
	$reponse = $db->prepare('DELETE FROM club WHERE club_id = ?');
	if ($club_id!="")
	{
		$reponse->execute(array($club_id));
		echo "Club supprimé";
	}
	else
	{
		echo "Vous n'avez pas rempli de numero de club";
	}
}

##########################################################
#					  CATEGORIES						 #
##########################################################
#Input : One information about a categorie
#Result : Show list of categories from table "categorie" who match the information
function searchCategDB($db)
{
	if (isset($_POST["asw"]))
	{
		$res = $_POST["asw"];
		#$reponse = $db->query('SELECT * FROM joueur WHERE licence = ' . $licence . ';');
		$reponse = $db->prepare('SELECT * FROM categorie WHERE categorie_id LIKE ? 
													  OR nom_categorie LIKE ?
													  OR age_debut LIKE ? 
													  OR age_fin LIKE ? ; ');
		$answer = '%' . $res . '%';
		$reponse->execute(array($answer,$answer,$answer,$answer));
		if ($reponse->rowCount() == 0 or $res == "") {
			echo "Aucune ligne ne correspond à la requête.";
		}
		else
		{
			?>
			<table>
			<tr>
			   <th>Numero de categorie</th>
			   <th>Nom de categorie</th>
			   <th>Age de début</th>
			   <th>Age de fin</th>
			</tr>
			<?php
			while ($donnees = $reponse->fetch()) #stop when all data from sql request are showed
			{
				?>
				<tr>
					<td><?php echo $donnees['categorie_id']?></td>
					<td><?php echo $donnees['nom_categorie']?></td>
					<td><?php echo $donnees['age_debut']?></td>
					<td><?php echo $donnees['age_fin']?></td>
				</tr>
				<?php
			}
			?>
			</table>
		<?php
		}
		$reponse->closeCursor(); // Termine le traitement de la requête
	}
	else
	{
		#echo "Exemple : 2 - Poussin - 10 - 11";
	}
}

#Input : database used and responses from the form
#Result : call insertcategorieDB or deletecategorieDB (depend on button clicked)
function formValidationCateg($db)
{
	$categorie_id=(isset($_POST["categorie_id"])) ? trim($_POST["categorie_id"]) : "";
	$nom_categorie=(isset($_POST["nom_categorie"])) ? trim($_POST["nom_categorie"]) : "";
	$age_debut=(isset($_POST["age_debut"])) ? trim($_POST["age_debut"]) : "";
	$age_fin=(isset($_POST["age_fin"])) ? trim($_POST["age_fin"]) : "";
	if (isset($_POST["insert"]))
	{
		insertCategDB($db,$categorie_id,$nom_categorie,$age_debut,$age_fin);
	}
	if (isset($_POST["delete"]))
	{
		deleteCategDB($db,$categorie_id);
	}
}

#Input : informations relative to a categorie
#Result : insert a categorie in database "categorie"
function insertCategDB($db,$categorie_id,$nom_categorie,$age_debut,$age_fin)
{
	$reponse = $db->prepare('INSERT INTO categorie VALUES (?,?,?,?)');
	if ($categorie_id!="" and $nom_categorie!="" and $age_debut!="" and $age_fin!="")
	{
		$reponse->execute(array($categorie_id,$nom_categorie,$age_debut,$age_fin));
		echo "Categorie inséré";
	}
	else
	{
		echo "Vous n'avez pas rempli toutes les valeurs";
	}
}

#Input : information relative to a club
#Result : delete a categorie from database "categorie"
function deleteCategDB($db,$categorie_id)
{
	$reponse = $db->prepare('DELETE FROM categorie WHERE categorie_id = ?');
	if ($categorie_id!="")
	{
		$reponse->execute(array($categorie_id));
		echo "categorie supprimé";
	}
	else
	{
		echo "Vous n'avez pas rempli de numero de categorie";
	}
}