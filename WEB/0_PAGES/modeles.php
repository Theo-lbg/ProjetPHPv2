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
$bdd = new PDO('mysql:host=localhost; dbname=bdd_projetphpty;', 'adminty', 'adminty');
$allarticles = $bdd->query('SELECT Reference_Article, Nom_Article, Image_Article, Prix_Article, Designation FROM article Join categorie ON ID_CAT like Cat_Article');
if (isset($_GET['s']) and !empty($_GET['s']))
{
    $recherche = htmlspecialchars($_GET['s']);
    $allarticles = $bdd->query('SELECT Reference_Article, Nom_Article, Image_Article, Prix_Article, Designation FROM article Join categorie ON ID_CAT like Cat_Article where Nom_Article likE "%' . $recherche . '%"');
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


    <div id="modeles" class="menu">
        <a href="panier.html">PANIER</a>
    </div>

</div>

<!-- -------------------------------------------------------------- -->
<div class="contenu">
        <?php
        if ($allarticles->rowCount() > 0) {
            while ($article = $allarticles->fetch()) {
                ?>
                <div class="item">
                    <div class="image_produit">
                        <?php
                        echo '<img src="../2_IMAGES/objets/' . $article['Image_Article'] . '" width="128" height="117"> </img>'
                        ?>
                    </div>
                    <div class="tout">
                        <div class="nom_produit">
                            <p>
                                <?= $article['Nom_Article'] ?>
                            </p>
                        </div>
                        <div class="descprition_produit">
                            <p><?= $article['Designation']?></p>
                        </div>
                        <div class="prix_produit">
                            <p><?= $article['Prix_Article']?> € </p>
                        </div>
                        <div class="bouton"><a href="index.php?action=ajout&amp;i=C14&amp; l=Aegis Solo&amp;q=1&amp;p=49">Ajouter au panier</a></div>
                    </div>
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
        <li><a href="../0_PAGES/panier.html">Panier</a></li>
        <li><a href="#">Produit</a></li>
    </ul>
</div>
</div>
</body>
</html>