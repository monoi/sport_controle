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
			echo '<p><a href="index.html">Recommencer</a></p>';
		}
		if ($test == true) {
			echo 'Connexion reussie !';
			echo '<p><a href="accueil.html" data-role="button">ENTRER </a></p>';
		}
	}
	else {
		echo '<p>Veuillez remplir tous les champs avant de vous connecter !</p>';
		echo '<p><a href="index.html" data-role="button">RETOUR </a></p>';
	}	
?>

	
	
</body>

</html>