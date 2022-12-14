<!-- LEBEGUE Theo / KADDOURI_Yassine -->
<?php


// Vérifier que la session a été démarrée
if (session_status() == PHP_SESSION_ACTIVE) {
    // Vérifier si la clé 'username' existe dans la session
    if (isset($_SESSION['username'])) {
        // Afficher le nom de la session
        echo "Bienvenue, " . $_SESSION['username'];
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="logoBricolage.png"/>

    <link rel="stylesheet" href="../WEB/1_CSS/css_main.css"/>
    <link rel="stylesheet" href="../WEB/1_CSS/css_PAGE_1.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


    <title> Shop Theo & Yassine </title>
</head>
<body>

<div class="header">
    <a href="#">
        <img class="logo" src="logoBricolage.png" alt=" LOGO  ">
    </a>

    <div class="banniere">
        <h1> Shop Theo & Yassine </h1>
    </div>
    <div id="purchase_in" class="menu">
        <a href="0_PAGES/login.php">CONNEXION</a>
    </div>
    <div id="out" class="menu">
        <a href="0_PAGES/login.php?disconnect=true">DECONNEXION</a>
        <?php
        if (isset($_GET['disconnect'])) {
            session_destroy();
        }
        ?></div>


    <div id="modeles" class="menu">
        <a href="0_PAGES/panier.php">PANIER</a>
    </div>


</div>
<!-- -------------------------------------------------------------- -->

<div class="espaceVideo">


    <video width="100%" loop="true" muted="true" autoplay="true">
        <source src="brico.mp4" type="video/mp4"/>
    </video>

    <div class="bio">

        <div id="modeles" class="menu">
            <a href="0_PAGES/modeles.php">NOS PRODUITS</a>
        </div>

        <h1> Du choix a porter de main ! </h1>
        <p>Un choix parmis de nombreuses pièces à porter de mains juste pour vous !</p>
    </div>
</div>


<div class="espaceDiapo">

    <div class="Boxdiapo">
        <div class="slides">
            <div><img class="diapo" src="2_IMAGES/DIAPO/bague.jpg"/></div>
            <div><img class="diapo" src="2_IMAGES/DIAPO/boulonPivot.jpg"/></div>
            <div><img class="diapo" src="2_IMAGES/DIAPO/cavalier.jpg"/></div>
            <div><img class="diapo" src="2_IMAGES/DIAPO/clavette.jpg"/></div>
            <div><img class="diapo" src="2_IMAGES/DIAPO/crochet.jpg"/></div>
        </div>
    </div>

    <h1> Notre savoir faire mise a contribution</h1>

    <p>Une qualité de produits certifiés Française ! avec un service après vente à votre disposition pour régler
        n'importe quel problème.Acheter des pièces automobiles de haute qualité, c'est beaucoup plus que rajouter
        simplement quelque chose dans votre panier. Il faut vous assurer que les pièces que vous commandez persistent
        dans le temps. Vous pouvez être sûr que chaque élément choisi pour votre véhicule sera soigneusement
        sélectionné.

        Lorsque vous faites confiance à Taros Trade, vous serez convaincu que notre équipe travaillera avec vous pour
        votre entière satisfaction à chaque étape du processus.

        Notre politique c’est la vraie transparence et communication auprès nos clients. Cela signifie que vous aurez
        accès à notre équipe multilingue de spécialistes passionnés des pièces automobiles, 7 jours sur 7, sans
        exception.

        Testez-nous!</p>


</div>
<!-- -------------------------------------------------------------- -->

<div class="footer">
    <ul>
        <li>LebegueKaddouri©2022</li>
        <li><a href="0_PAGES/conseils.pdf">Conseils d'utilisation</a></li>
        <li><a href="0_PAGES/panier.php">Panier</a></li>
        <li><a href="0_PAGES/modeles.php">Produits</a></li>
    </ul>
</div>
</body>
</html>