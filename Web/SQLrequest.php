<?php 
function searchJoueurDB($db,$asw)
{
	#$reponse = $db->query('SELECT * FROM joueur WHERE licence = ' . $licence . ';');
	$reponse = $db->prepare('SELECT * FROM joueur WHERE licence LIKE ? 
												  OR nom_joueur LIKE ?
												  OR prenom_joueur LIKE ?;');
	$answer = '%' . $asw . '%';
	$reponse->execute(array($answer,$answer,$answer));
	if ($reponse->rowCount() == 0 or $asw == "") {
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
		</tr>
		<?php
		while ($donnees = $reponse->fetch())
		{
			?>
			<tr>
				<td><?php echo $donnees['licence']?></td>
				<td><?php echo $donnees['nom_joueur']?></td>
				<td><?php echo $donnees['prenom_joueur']?></td>
			</tr>
			<?php
		}
		?>
		</table>
	<?php
	}
	$reponse->closeCursor(); // Termine le traitement de la requête
}


function insertJoueurDB($db,$licence,$nom,$prenom,$date_naiss,$date_premiere_licence,$club,$categ)
{
	$reponse = $db->prepare('INSERT INTO joueur VALUES (?,?,?,?,?,?,?)');
	if ($licence!="" and $nom!="" and $prenom!="" and $date_naiss!="" and $date_premiere_licence!="" and $club!="" and $categ!="")
	{
		$reponse->execute(array($licence,$nom,$prenom,$date_naiss,$date_premiere_licence,$club,$categ));
		echo "Joueur inséré";
	}
	else
	{
		echo "Vous n'avez pas rempli toutes les valeurs";
	}
}

function deleteJoueurDB($db,$licence,$nom,$prenom,$date_naiss,$date_premiere_licence,$club,$categ)
{
	$reponse = $db->prepare('DELETE FROM joueur WHERE (?,?,?,?,?,?,?)');
	if ($licence!="" and $nom!="" and $prenom!="" and $date_naiss!="" and $date_premiere_licence!="" and $club!="" and $categ!="")
	{
		$reponse->execute(array($licence,$nom,$prenom,$date_naiss,$date_premiere_licence,$club,$categ));
		echo "Joueur inséré";
	}
	else
	{
		echo "Vous n'avez pas rempli toutes les valeurs";
	}
}