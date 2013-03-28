<?php

  // Fonction avec la BDD 
	function connexion_db_utilisateur ($log, $mot_passe) {

		$host = "mysql5-13.60gp";
		$user = "sportconp";
		$password = "vbvF7TbF";
		$db_name = "sportconp";
		$login_mdp = false;
	
		$link = mysql_connect($host, $user, $password);
		if (!$link) {
			die('<p>ERREUR : Connexion avec '.$db_name.' impossible ! '.mysql_error().'</p>');
		}
		mysql_select_db($db_name, $link);
		if (!mysql_select_db($db_name, $link)) {
			die('<p>ERREUR : Impossible de sélectionner la base de données ! </p>');
		}
		$requete = "SELECT login, mdp FROM user";
		$result = mysql_query($requete, $link);
		if (!$result) {
			die ('ERREUR : Rêquete invalide ! </p>');
		}
		
		for ($i=0; $i<mysql_num_rows($result); $i++) {
			$login = mysql_result($result, $i, 'login');
			$mdp = mysql_result($result, $i, 'mdp');
			
			if ($log == $login) {
				if ($mot_passe == $mdp) {
					$login_mdp = true;
				}
			}
		}
		return $login_mdp;
		mysql_close();
	}
?>


<!DOCTYPE html >
<html>


<body>
<?php

	$login_rentre = $_POST['login'];
	$mot_passe = $_POST['mdp'];
	
	if (($login_rentre != null) && ($mot_passe != null)) {
		$login_ = $login_rentre;
		$mot_de_passe = $mot_passe;
		$test = connexion_db_utilisateur($login_, $mot_de_passe);
		
		if ($test == false) {
			echo '<h1>ERREUR : login ou mot de passe invalide</h1>';
			echo '<p><a href="Application.html">Recommencer</a></p>';
		}
		if ($test == true) {
			echo 'Connexion reussie !';
			echo '<p><a href="accueil.html" data-role="button">ENTRER </a></p>';
		}
	}
	else {
		echo '<p>Veuillez remplir tous les champs avant de vous connecter !</p>';
		echo '<p><a href="Application.html" data-role="button">RETOUR </a></p>';
	}	
?>

	
	
</body>

</html>
