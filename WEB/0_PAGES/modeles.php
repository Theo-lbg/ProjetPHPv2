<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../logoBricolage.png"/>

    <link rel="stylesheet" href="../1_css/css_main.css"/>
    <link rel="stylesheet" href="../1_css/css_modeles.css"/>


    <title> Shop Theo & Yassine </title>
</head>

<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=bdd_projetphpty;', 'root', '');
$allarticles = $bdd->query('SELECT ID_Article, Reference_Article, Nom_Article, Image_Article, Prix_Article, Designation FROM article Join categorie ON ID_CAT like Cat_Article');
if (isset($_GET['s']) and !empty($_GET['s'])) {
    $recherche = htmlspecialchars($_GET['s']);
    $allarticles = $bdd->query('SELECT ID_Article, Reference_Article, Nom_Article, Image_Article, Prix_Article, Designation FROM article Join categorie ON ID_CAT like Cat_Article where Nom_Article likE "%' . $recherche . '%"');
}
?>

<body>

<div class="header">

    <a href="../index.php">
        <img class="logo" src="../logoBricolage.png" alt=" LOGO ">
    </a>

    <div class="banniere">
        <h1> Shop Theo & Yassine </h1>
    </div>


    <div id="purchase_in" class="menu">
        <a href="login.php">CONNEXION</a>
    </div>
    <div class="purchase_border">
    </div>

    <div id="out" class="menu">
        <a href="../0_PAGES/login.php?disconnect=true">DECONNEXION</a>
        <?php
        if (isset($_GET['disconnect'])) {
            session_destroy();
        }
        ?>
    </div>


    <div id="modeles" class="menu">
        <a href="panier.php">PANIER</a>
    </div>

</div>

<!-- -------------------------------------------------------------- -->
<?php
//connexion à la base de données
$con = mysqli_connect("localhost", "root", "", "bdd_projetphpty");
//verifier la connexion
if (!$con) die('Erreur : ' . mysqli_connect_error());

echo "Connexion réussie";
?>
<form action="" method="GET">
    <input type="search" name="s" placeholder="Rechercher un article ">
    <input type="submit" name="envoyer">
</form>
<br>

<div class="contenu">
    <?php
    if ($allarticles->rowCount() > 0) {
    while ($article = $allarticles->fetch()) {
    ?>
    <div class="item">
        <div class="image_Article">
            <?php
            echo '<img src="../2_IMAGES/objets/' . $article['Image_Article'] . '" width="128" height="117"> </img>';
            ?>
        </div>

        <div class="nom_Article">
            <p>
                <?= $article['Nom_Article'] ?>
            </p>
        </div>
        <div class="descprition_Article">
            <p><?= $article['Designation'] ?></p>
        </div>
        <div class="prix_Article">
            <p><?= $article['Prix_Article'] ?> € </p>
        </div>
        <div class="bouton">
            <form method=post>
                <?php
                echo '<input type="submit" value="Ajouter au panier" name="ajout' . $article["ID_Article"] . '">';
                ?> </form>
            <?php
            if (isset($_POST['ajout' . $article["ID_Article"]])){
                array_push($_SESSION['bdd_projetphpty'], $article['ID_Article']);
                header('Location: panier.php');
            }else
            ?>

        </div>
        <?php
        }
        } else {
            ?>
            <p>Aucun article trouvé</p>
            <?php
        }
        ?>


</div>
<!-- -------------------------------------------------------------- -->


<div class="footer">
    <ul>
        <li>LebegueKaddouri©2022</li>
        <li><a href="../0_PAGES/conseils.pdf">Conseils d'utilisation</a></li>
        <li><a href="panier.php">Panier</a></li>
        <li><a href="#">Produit</a></li>
    </ul>
</div>
</div>
</body>
</html>












