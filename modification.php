<!DOCTYPE html >
<html>


<body>
<?php
  if (($_POST['now_login'] != null) && ($_POST['now_mdp'] != null) && ($_POST['new_login'] != null) && ($_POST['new_mdp'] != null) && ($_POST['new_mdp_confirm'] != null)) {
		$ancien_login = $_POST['now_login'];
		$nouveau_login_ = $_POST['new_login'];
		$nouveau_mot_de_passe = $_POST['new_mdp'];
		$confirm_mot_de_passe = $_POST['new_mdp_confirm'];

			if ($nouveau_mot_de_passe == $confirm_mot_de_passe) {
				$login_ok = modifierLogin_Password($ancien_login, $nouveau_login_, $nouveau_mot_de_passe);
				if ($login_ok == true) {
					echo '<p>Modifications Enregistrees</p>';
					echo '<p><a href="accueil.html">Retour MENU</a></p>';
				}
				else {
					echo '<h1>ERREUR : veuillez verifier votre login </h1>';
					echo '<p><a href="accueil.html">Recommencer</a></p>';					
				}
			}
			else {
				echo '<h1>ERREUR : veuillez confirmer le mot de passe correctement</h1>';
				echo '<p><a href="accueil.html">Recommencer</a></p>';
			}
		
	}
	else {
		echo '<p>Veuillez remplir tous les champs avant de modifier !</p>';
		echo '<p><a href="accueil.html" data-role="button">RETOUR </a></p>';
	}	
?>

	
	
</body>

</html>
