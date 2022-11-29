<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <script src='https://kit.fontawesome.com/a076d05399.js'></script> <!--pour les icônes-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../ShopTY.png" />

    <link rel="stylesheet" href="../CSS/accueil.css" />
    <link rel="stylesheet" href="../CSS/page1.css" />
    <link rel="stylesheet" href="../CSS/login.css" />



    <title> Shop Theo & Yassine </title>
</head>
<body>
<div class="header">

    <a href="../HTML/accueil.html">
        <img class="logo" src="../ShopTY.png" alt=" LOGO Boutique">
    </a>

    <div class="banniere">
        <h1> Shop Theo & Yassine </h1>
    </div>


    <div id="purchase_in" class="menu">
        <a href="../PHP/login2.php">Connexion</a>
    </div>
    <div class="purchase_border">
    </div>


    <div id="index" class="menu">
        <a href="../HTML/produit.html">Produits</a>
    </div>

</div>

<!-- -------------------------------------------------------------- -->
<div class="contenu">

    <div class="carte">

        <div class="text-center">
            <form action="verification.php" method="POST">
                <h1 class="contact_text">Connexion</h1>
                <input type="text" class="email-bt" placeholder="Entrer le nom d'utilisateur" name="username" required>
                <br>
                <input type="password" class="email-bt" placeholder="Entrer le mot de passe" name="password" required>
                <br>
                <input class="send_bt" type="submit" id='submit' value='LOGIN' >
                <a class="call_text" href="#">Vous n'avez pas de compte ?</a>
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>

    </div>
</div>
<!-- -------------------------------------------------------------- -->



</body>
</html>