<?php
session_start() ;
$db = new db();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../logoBricolage.png"/>
    <link rel="stylesheet" href="../1_CSS/css_style.css"/>
    <link rel="stylesheet" href="../0_PAGES/modeles.php" />


    <title> Shop Theo & Yassine </title>
</head>



<body>
<!-- afficher le nombre de produit dans le panier -->
<a href="panier.php" class="link">Panier<span><?=array_sum($_SESSION['bdd_projetphpty'])?></span></a>
<section class="products_list">
    <?php
    //inclure la page de connexion
    include_once "con_dbb.php";
    //afficher la liste des produits
    $req = mysqli_query($db, "SELECT * FROM article");
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
</body>
</html>