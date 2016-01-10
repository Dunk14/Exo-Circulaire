<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/models/utilisateur.php');
	class Controller_Utilisateur {
		// Fonction permettant d'ajouter un utilisateur
		public function addUtilisateur() {

			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/utilisateurs/insert.php');	

			if (!empty($_POST)) {
				$mail = htmlspecialchars($_POST['mail']);
				$queryMail = new Model_Utilisateur();
				$existMail = $queryMail->existMail($mail);
				// Vérifie l'existence ou non de l'email dans la BD
				if ($existMail == false) {
					$mdp = htmlspecialchars($_POST['mdp']);
					$mdp_confirm = htmlspecialchars($_POST['mdp_confirm']);

					// Vérifie la similitude du mdp et de sa confirmation
					if ($mdp == $mdp_confirm) {
						$nom = htmlspecialchars($_POST['nom']);
						$prenom = htmlspecialchars($_POST['prenom']);
						$ville = htmlspecialchars($_POST['ville']);
						$adresse = htmlspecialchars($_POST['adresse']);
						$cp = htmlspecialchars($_POST['cp']);					
						$pseudo = htmlspecialchars($_POST['pseudo']);
						
						$utilisateur = new Model_Utilisateur();
						$utilisateurDetails = $utilisateur->addUtilisateur($nom,$prenom,$ville,$adresse,$cp,$mail,$pseudo,$mdp);

					}
					else {
						echo "<h2>Les mots de passe ne correspondent pas</h2>";
					}
				}
				else {
					echo "<h2>L'e-mail existe déjà dans la base de données</h2>";
				}

			}
		}

		public function connectUtilisateur () {

			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/utilisateurs/connect.php');

			if (!empty($_POST)) {
				$pseudo = htmlspecialchars(($_POST['pseudo']));
				$mdp = htmlspecialchars(($_POST['mdp']));

				$connect = new Model_Utilisateur();
				$connectDetails = $connect->connectUtilisateur($pseudo,$mdp);
			}


		}
	}
?>