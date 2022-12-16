<!DOCTYPE html>
<?php
// Démarrer la session
session_start();
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Récupérer les données du formulaire
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Vérifier les informations de connexion de l'utilisateur
    $pdo = new PDO('mysql:host=localhost;dbname=bdd_projetphpty', 'root', '');
    $stmt = $pdo->prepare('SELECT * FROM Client WHERE Nom_Client = ? AND Mdp = ?');
  $stmt->execute([$username, $password]);
  $user = $stmt->fetch();

  if ($user) {
    // Démarrer une session et enregistrer l'utilisateur
    session_start();
    $_SESSION['ID_Client'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['bdd_projetphpty'] = array();

    // Rediriger l'utilisateur vers la page d'accueil
    header('Location: ../index.php');
    exit;
  } else {
    // Afficher un message d'erreur si les informations de connexion sont incorrectes en html
    echo '<h1>Username or password is incorrect</h1>';

  }
}
?>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../logoBricolage.png"/>

    <link rel="stylesheet" href="../1_css/css_main.css"/>
    <link rel="stylesheet" href="../1_css/css_login.css"/>


    <title> Shop Theo & Yassine </title>
</head>
<body>

<div class="header">

    <a href="../index.php">
        <img class="logo" src="../logoBricolage.png" alt=" LOGO  ">
    </a>

    <div class="banniere">
        <h1> Shop Theo & Yassine </h1>
    </div>


    <div id="purchase_in" class="menu">
        <a href="#">CONNEXION</a>
    </div>
    <div class="purchase_border">
    </div>


    <div id="modeles" class="menu">
        <a href="panier.php">PANIER</a> <!-- AJOUTER REDIRECTION PANIER PAR LA SUITE-->
    </div>

</div>
<!-- -------------------------------------------------------------- -->

<div class="page">

    <img src="../2_IMAGES/backgroundLogin.jpeg"/>  <!-- Mettre une autre image jolie pour backgorund -->

    <div class="contenu">

        <form method="post" action="">
            <fieldset class="mainBord">
                <legend>Connexion: </legend>
                <br>
                <label for="nom">Nom Client</label> </br>
                <input type="text" class="email-bt" id="nom" placeholder="Nom Client" name="username" required/>
                </br>
                <label for="mdp">Mots de Passe</label>  <!--  Mettre le id mots de passe si ca change rien au code -->
                <input type="password" class="email-bt" id="mdp" placeholder="Mots de Passe" name="password" required/>
                <input class="send_bt" type="submit" id="submit" value="Se connecter"/>
                <br>
                <a href="enregistrement.php">S'inscrire</a>

            </fieldset>

    </div>

    <div class="footer">

        <ul>
            <li>LebegueKaddouri©2022</li>
            <li><a href="conseils.pdf"> Conseils d'utilisation</a></li>
            <li><a href="../0_PAGES/contact.html">Panier</a></li>
            <li><a href="../0_PAGES/modeles.php">Produits</a></li>
        </ul>


    </div>
</div>
</body>
</html>