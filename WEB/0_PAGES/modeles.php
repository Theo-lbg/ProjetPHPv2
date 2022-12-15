<?php
session_start() ;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../logoBricolage.png"/>
    <link rel="stylesheet" href="../1_css/css_main.css"/>
    <link rel="stylesheet" href="../1_CSS/css_style.css"/>
    <title> Shop Theo & Yassine </title>
</head>



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
        <a href="panier.php">PANIER</a>
    </div>

</div>

<!-- afficher le nombre de produit dans le panier -->
<a href="panier.php" class="link">Panier<span><?=array_sum($_SESSION['panier'])?></span></a>
<section class="products_list">
    <?php
    //inclure la page de connexion
    include_once "con_dbb.php";
    //afficher la liste des produits
    $req = mysqli_query($db, "SELECT * FROM products");
    while($row = mysqli_fetch_assoc($req)){
        ?>
        <form action="" class="product">
            <div class="image_product">
                <img src="project_images/<?=$row['Image_Article']?>">
            </div>
            <div class="content">
                <h4 class="name"><?=$row['Nom_Article']?></h4>
                <h2 class="price"><?=$row['Prix_Article']?>€</h2>
                <a href="ajouter_panier.php?id=<?=$row['ID_Article']?>" class="id_product">Ajouter au panier</a>
            </div>
        </form>

    <?php } ?>

</section>

<div class="footer">
    <ul>
        <li>LebegueKaddouri©2022</li>
        <li><a href="../0_PAGES/conseils.pdf">Conseils d'utilisation</a></li>
        <li><a href="panier.php">Panier</a></li>
        <li><a href="#">Produit</a></li>
    </ul>
</div>

</body>
</html>