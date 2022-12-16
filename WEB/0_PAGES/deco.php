<!DOCTYPE html>
<?php
session_start();
$conn = mysqli_connect("localhost", "adminty", "adminty", "bdd_projetphpty");
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM client WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location: login.php");
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
        <a href="modeles.php">PANIER</a> <!-- AJOUTER REDIRECTION PANIER PAR LA SUITE-->
    </div>

</div>
<!-- -------------------------------------------------------------- -->

<div class="page">

    <img src="../2_IMAGES/backgroundLogin.jpeg"/>  <!-- Mettre une autre image jolie pour backgorund -->

    <div class="contenu">

        <form method="post" action="">
            <fieldset class="mainBord">
                <legend>Deconnexion</legend>
                <label for="mdp">Se deconnecter :</label>  <!--  Mettre le id mots de passe si ca change rien au code -->
                <a HREF="logout.php" value="Oui"/>
                <br>
                <a class="call_text" type="submit" value="Non"/>

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