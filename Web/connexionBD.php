<?php function connectionDB()
{
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=badminton_ffb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $bdd;
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}
}
?>