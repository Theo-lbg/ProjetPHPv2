<?php
   session_start();
   include_once "verification.php";

   //supprimer les produits
   //si la variable del existe
   if(isset($_GET['del'])){
    $id_del = $_GET['del'] ;
    //suppression
    unset($_SESSION['panier'][$id_del]);
   }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../logoBricolage.png" />

    <link rel="stylesheet" href="../1_css/css_main.css" />
    <link rel="stylesheet" href="../1_CSS/css_style.css" />



    <title> Shop Theo & Yassine </title>
</head>

<body class="panier">
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


<a href="modeles.php" class="link">Boutique</a>
<section>
    <table>
        <tr>
            <th></th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Action</th>
        </tr>
        <?php
        $total = 0 ;
        // liste des produits
        //récupérer les clés du tableau session
        $ids = array_keys($_SESSION['panier']);
        //s'il n'y a aucune clé dans le tableau
        if(empty($ids)){
            echo "Votre panier est vide";
        }else {
            //si oui
            $article = mysqli_query($db, "SELECT * FROM products WHERE id IN (".implode(',', $ids).")");

            //lise des produit avec une boucle foreach
            foreach($article as $article):
                //calculer le total ( prix unitaire * quantité)
                //et aditionner chaque résutats a chaque tour de boucle
                $total = $total + $article['Prix_Article'] * $_SESSION['panier'][$article['ID_Article']] ;
                ?>
                <tr>
                    <td><img src="project_images/<?=$article['Image_Article']?>"></td>
                    <td><?=$article['Nom_Article']?></td>
                    <td><?=$article['Prix_Article']?>€</td>
                    <td><?=$_SESSION['panier'][$article['ID_Article']] // Quantité?></td>
                    <td><a href="panier.php?del=<?=$article['ID_Article']?>"><img src="delete.png"></a></td>
                </tr>

            <?php endforeach ;} ?>

        <tr class="total">
            <th>Total : <?=$total?>€</th>
        </tr>
    </table>
</section>

<div class="footer">
    <ul>
        <li>LebegueKaddouriÂ©2022</li>
        <li><a href="../0_PAGES/conseils.pdf">Conseils d'utilisation</a></li>
        <li><a href="#">Panier</a></li>
        <li><a href="../0_PAGES/modeles.php">Produit</a></li>
    </ul>
</div>

</body>
</html>