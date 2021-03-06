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
					$mdp = sha1(htmlspecialchars($_POST['mdp']));
					$mdp_confirm = sha1(htmlspecialchars($_POST['mdp_confirm']));

					// Vérifie la similitude du mdp et de sa confirmation
					if ($mdp == $mdp_confirm) {
						$nom = htmlspecialchars($_POST['nom']);
						$prenom = htmlspecialchars($_POST['prenom']);
						$ville = htmlspecialchars($_POST['ville']);
						$adresse = htmlspecialchars($_POST['adresse']);
						$cp = htmlspecialchars($_POST['cp']);					
						$pseudo = htmlspecialchars($_POST['pseudo']);
						$dateArrivee = date("Y-m-d");
						
						$utilisateur = new Model_Utilisateur();
						$utilisateurDetails = $utilisateur->addUtilisateur($nom,$prenom,$ville,$adresse,$cp,$mail,$pseudo,$mdp,$dateArrivee);
						
						// L'utilisateur a bien été enregistré
						// Connexion de cet utilisateur
						$connect = new Model_Utilisateur();
						$connectDetails = $connect->connectUtilisateur($pseudo,$mdp);
						
						// Enregistrement en session des infos du client
						$_SESSION['idUtilisateur'] = $connectDetails['id_utilisateur'];
						$_SESSION['idClient'] = $connectDetails['id_client'];
						$_SESSION['nom'] = $connectDetails['nom'];
						$_SESSION['prenom'] = $connectDetails['prenom'];
						$_SESSION['ville'] = $connectDetails['ville'];
						$_SESSION['adresse'] = $connectDetails['adresse'];
						$_SESSION['cp'] = $connectDetails['cp'];
						$_SESSION['mail'] = $connectDetails['mail'];
						$_SESSION['prenom'] = $connectDetails['prenom'];
						$_SESSION['dateArrivee'] = $dateArrivee;

						$getPseudo = new Model_Utilisateur();
						$pseudo = $getPseudo->getPseudo($_SESSION['idUtilisateur']);

						$_SESSION['pseudo'] = $pseudo[0];

						header("Location: index.php");
						die();

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
				$mdp = sha1(htmlspecialchars(($_POST['mdp'])));

				$connect = new Model_Utilisateur();
				$connectDetails = $connect->connectUtilisateur($pseudo,$mdp);


				if (!empty($connectDetails)) {
					$_SESSION['idUtilisateur'] = $connectDetails['id_utilisateur'];
					$_SESSION['idClient'] = $connectDetails['id_client'];
					$_SESSION['nom'] = $connectDetails['nom'];
					$_SESSION['prenom'] = $connectDetails['prenom'];
					$_SESSION['ville'] = $connectDetails['ville'];
					$_SESSION['adresse'] = $connectDetails['adresse'];
					$_SESSION['cp'] = $connectDetails['cp'];
					$_SESSION['mail'] = $connectDetails['mail'];
					$_SESSION['dateArrivee'] = $connectDetails['dateArrivee'];

					$getPseudo = new Model_Utilisateur();
					$pseudo = $getPseudo->getPseudo($_SESSION['idUtilisateur']);

					$_SESSION['pseudo'] = $pseudo[0];

					header("Location: /exo-circulaire/index.php");
					die();
				}
				
			}


		}

		public function connectAdmin() {
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/utilisateurs/connectadmin.php');

			if (!empty($_POST)) {
				$mail = htmlspecialchars(($_POST['mail']));
				$mdp = sha1(htmlspecialchars(($_POST['mdp'])));

				require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/models/admin.php');
				$connect = new Model_Admin();
				$connectDetails = $connect->connectAdmin($mail,$mdp);

				if (!empty($connectDetails)) {
					$_SESSION['idAdmin'] = $connectDetails['id_admin'];
					$_SESSION['mailAdmin'] = $connectDetails['mail'];
					$_SESSION['prenomAdmin'] = $connectDetails['prenom'];
					$_SESSION['nomAdmin'] = $connectDetails['nom'];

					header("Location: /exo-circulaire/admin/index.php");
					die();
				}
				
			}
		}

		// Fonction permettant de déconnecter l'utilisateur présentemment connecté 
		public function disconnectUtilisateur() {
			session_destroy();
			header("Location: /exo-circulaire/index.php");
			die();
		}

		// Fonction vérifiant si un utilisateur est connecté (pour ne pas afficher une page
		// (entrée par URL) sans valeur) 
		public function accountUtilisateur() {
			if (!empty($_SESSION['idUtilisateur'])) {
				require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/utilisateurs/account.php');
			}
			else {
				header("Location: exo-circulaire/index.php?c=utilisateur&a=insert");
				die();
			}
		}

		public function viewOrder($idUtilisateur,$idCommande) {

			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/utilisateurs/vieworder.php');

			$commande = new Model_Utilisateur();
			$commandeDetails = $commande->viewOrder($idUtilisateur,$idCommande);

			if (empty($commandeDetails)) {
				echo '<h2>Cette commande n\'existe pas, veuillez nous en excuser. 
				Contactez un administrateur du site si vous aviez procédé à une commande</h2>'; 
			}
			else {
				// Affichage de chaque commande (Nom/Prix)
				$article = 1;
				foreach ($commandeDetails as $commandes) {
				echo '<div class="col-xs-12 col-sm-6 col-md-4">';
					echo '<div class="order__details">';
						echo '<div class="order__title">';
						echo 'Article '.$article;
						echo '</div>';
					echo '<p>'.$commandes['nom'].'</p>';
					echo '<p>Prix: '.$commandes['prix'].'</p>';
					echo '</div>';
				echo '</div>';
				$article++;
				}
			}
			
		}

		public function updateUtilisateur ($idUtilisateur) {

			if (!empty($_SESSION['idUtilisateur'])) {
				require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/utilisateurs/update.php');

				if (!empty($_POST)) {
					$ville = htmlspecialchars($_POST['ville']);
					$adresse = htmlspecialchars($_POST['adresse']);
					$cp = htmlspecialchars($_POST['cp']);					
					$mail = htmlspecialchars($_POST['mail']);

					$queryMail = new Model_Utilisateur();
					$existMail = $queryMail->existMailUpdate($mail,$_SESSION['idClient']);
					// Vérifie l'existence ou non de l'email dans la BD
					if ($existMail == false) {
						// Tests pour éviter que l'utilisateur efface les champs, et rentre des valeurs vides en BDD
						if (empty($ville)) {
							$ville = $_SESSION['ville'];
						}
						if (empty($adresse)) {
							$adresse = $_SESSION['adresse'];
						}
						if (empty($cp)) {
							$cp = $_SESSION['cp'];
						}
						if (empty($mail)) {
							$mail = $_SESSION['mail'];
						}

						$utilisateur = new Model_Utilisateur();
						$utilisateurDetails = $utilisateur->updateUtilisateur($ville,$adresse,$cp,$mail,$_SESSION['idClient']);
					
						$_SESSION['ville'] = $ville;
						$_SESSION['adresse'] = $adresse;
						$_SESSION['cp'] = $cp;
						$_SESSION['mail'] = $mail;
						header("Location: ".$_SERVER['DOCUMENT_ROOT']."exo-circulaire/index.php?c=utilisateur&a=account");
						die();
						
					}
					else {
						echo '<h1>Cette adresse mail est deja prise</h1>';
					}
				}

			}
			else {
				header("Location: exo-circulaire/views/index.php");
				die();
			}

		}

		public function updateMdpUtilisateur($idUtilisateur) {

			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/utilisateurs/updatemdp.php');

			if (!empty($_POST)) {
				$mdpActuel = sha1(htmlspecialchars($_POST['mdpActuel']));
				$nouveauMdp = sha1(htmlspecialchars($_POST['nouveauMdp']));
				$confirmMdp = sha1(htmlspecialchars($_POST['confirmMdp']));

				$utilisateur = new Model_Utilisateur();
				$checkMdp = $utilisateur->checkMdp($mdpActuel);

				if ($checkMdp >= 1) {
					if ($nouveauMdp == $confirmMdp) {
						$changeMdp = $utilisateur->updateMdp($nouveauMdp);
						header("Location: index.php?c=utilisateur&a=account");
						die();
					}
					else {
						echo '<h2>Les deux mots de passe ne coincident pas</h2>';
					}
				}
				else {
					echo '<h2>Le mot de passe n\'est pas celui enregistré</h2>';
				}
			}
		}

		// Ajoute un élément au panier
		public function addPanier($idArt, $nomArticle, $idDesc, $prix) {
			// De 0 à la taille du panier-1
			for ($i=0; $i < $_SESSION['sizePanier'] ; $i++) { 
				// Vérifie si la planète n'est pas déjà ajoutée au panier
				if ($_SESSION['panier'][$i]['id_article'] == $idArt && $_SESSION['panier'][$i]['id_desc'] == $idDesc) {
					header("Location: index.php?c=article&a=list");
					die();
				}
			}
			// La planète n'a pas encore été ajoutée au panier

			// Indique la taille du tableau/nb d'articles
			$_SESSION['sizePanier']++;
			$_SESSION['panier'][$_SESSION['sizePanier']-1]['id_article'] = $idArt;
			$_SESSION['panier'][$_SESSION['sizePanier']-1]['nom'] = $nomArticle;
			$_SESSION['panier'][$_SESSION['sizePanier']-1]['id_desc'] = $idDesc;
			$_SESSION['panier'][$_SESSION['sizePanier']-1]['prix'] = $prix;

			// Redirige vers la liste d'articles
			header("Location: index.php?c=article&a=list");
			die();			
		}

		// Retire un élément du panier
		public function pullPanier($idArt) {
			// De 0 à la taille du panier-1
			for ($i=0; $i < $_SESSION['sizePanier']; $i++) { 
				// Trouvé
				if ($_SESSION['panier'][$i]['id_article'] == $idArt) {
					// "Head-shoooot !"
					unset($_SESSION['panier'][$i]);
					$_SESSION['panier'][$i] = $_SESSION['panier'][$_SESSION['sizePanier']-1];
					$_SESSION['sizePanier']--;
				}
				if ($_SESSION['sizePanier'] == 0) {
					unset($_SESSION['panier']);
				}
			}
			// Redirection messieurs/dames
			header("Location: index.php?c=article&a=list");
			die();
		}

		// Confirmation du panier
		public function confirmPanier() {
			if (!empty($_SESSION['panier'])) {
				require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/utilisateurs/confirmpanier.php');
			}
			else {

			}
		}

		public function finalizePanier() {
			// Il y a au moins un élément dans le panier
			if (!empty($_SESSION['panier'])) {
				// Un utilisateur est déjà connecté
				if (!empty($_SESSION['idClient'])) {
					require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/utilisateurs/finalizepanier.php');
				}
				else {
					header("Location: index.php?c=utilisateur&a=finalizeconnexion");
					die();
				}
			}
		}

		public function finalizeConnexion() {
			if (!empty($_SESSION['panier'])) {
				if (empty($_SESSION['idClient'])) {
					require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/utilisateurs/finalizeconnexion.php');

					// L'utilisateur veut s'inscrire
					if (!empty($_POST['inscription'])) {
						$mail = htmlspecialchars($_POST['mail']);
						$queryMail = new Model_Utilisateur();
						$existMail = $queryMail->existMail($mail);
						// Vérifie l'existence ou non de l'email dans la BD
						if ($existMail == false) {
							$mdp = sha1(htmlspecialchars($_POST['mdp']));
							$mdp_confirm = sha1(htmlspecialchars($_POST['mdp_confirm']));

							// Vérifie la similitude du mdp et de sa confirmation
							if ($mdp == $mdp_confirm) {
								$nom = htmlspecialchars($_POST['nom']);
								$prenom = htmlspecialchars($_POST['prenom']);
								$ville = htmlspecialchars($_POST['ville']);
								$adresse = htmlspecialchars($_POST['adresse']);
								$cp = htmlspecialchars($_POST['cp']);					
								$pseudo = htmlspecialchars($_POST['pseudo']);
								$dateArrivee = date("Y-m-d");
								
								$utilisateur = new Model_Utilisateur();
								$utilisateurDetails = $utilisateur->addUtilisateur($nom,$prenom,$ville,$adresse,$cp,$mail,$pseudo,$mdp,$dateArrivee);
								
								// L'utilisateur a bien été enregistré
								// Connexion de cet utilisateur
								$connect = new Model_Utilisateur();
								$connectDetails = $connect->connectUtilisateur($pseudo,$mdp);
								
								// Enregistrement en session des infos du client
								$_SESSION['idUtilisateur'] = $connectDetails['id_utilisateur'];
								$_SESSION['idClient'] = $connectDetails['id_client'];
								$_SESSION['nom'] = $connectDetails['nom'];
								$_SESSION['prenom'] = $connectDetails['prenom'];
								$_SESSION['ville'] = $connectDetails['ville'];
								$_SESSION['adresse'] = $connectDetails['adresse'];
								$_SESSION['cp'] = $connectDetails['cp'];
								$_SESSION['mail'] = $connectDetails['mail'];
								$_SESSION['prenom'] = $connectDetails['prenom'];
								$_SESSION['dateArrivee'] = $dateArrivee;

								$getPseudo = new Model_Utilisateur();
								$pseudo = $getPseudo->getPseudo($_SESSION['idUtilisateur']);

								$_SESSION['pseudo'] = $pseudo[0];

								// Redirection page finalisation d'achat
								echo '<script>document.location.href="index.php?c=utilisateur&a=finalizepanier"</script>';
							}
						}
					}
					// L'utilisateur est déjà membre
					elseif (!empty($_POST['connexion'])) {
						$pseudo = htmlspecialchars(($_POST['pseudoConnexion']));
						$mdp = sha1(htmlspecialchars(($_POST['mdpConnexion'])));

						$connect = new Model_Utilisateur();
						$connectDetails = $connect->connectUtilisateur($pseudo,$mdp);

						if (!empty($connectDetails)) {
							$_SESSION['idUtilisateur'] = $connectDetails['id_utilisateur'];
							$_SESSION['idClient'] = $connectDetails['id_client'];
							$_SESSION['nom'] = $connectDetails['nom'];
							$_SESSION['prenom'] = $connectDetails['prenom'];
							$_SESSION['ville'] = $connectDetails['ville'];
							$_SESSION['adresse'] = $connectDetails['adresse'];
							$_SESSION['cp'] = $connectDetails['cp'];
							$_SESSION['mail'] = $connectDetails['mail'];
							$_SESSION['dateArrivee'] = $connectDetails['dateArrivee'];

							$getPseudo = new Model_Utilisateur();
							$pseudo = $getPseudo->getPseudo($_SESSION['idUtilisateur']);

							$_SESSION['pseudo'] = $pseudo[0];

							// Redirection page finalisation d'achat
							echo '<script>document.location.href="index.php?c=utilisateur&a=finalizepanier"</script>';
						}
					}
				}	
			}
			else {
				header("Location: index.php?c=article&a=list");
				die();
			}
		}

		public function purchase() {
			$achat = new Model_Utilisateur();
			$achatDetails = $achat->purchase();
			header("Location: index.php?c=utilisateur&a=account");
			die();
			
		}
		
	}
?>