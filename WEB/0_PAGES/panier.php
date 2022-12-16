<?php
   session_start();
$con = new DB();

include_once "../5_PHP/con_dbb.php";

   //supprimer les produits
   //si la variable del existe
   if(isset($_GET['del'])){
    $id_del = $_GET['del'] ;
    //suppression
    unset($_SESSION['bdd_projetphpty'][$id_del]);
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
    <link rel="stylesheet" href="../0_PAGES/modeles.php" />




    <title> Shop Theo & Yassine </title>
</head>

<body class="panier">
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
        $ids = array_keys($_SESSION['bdd_projetphpty']);
        //s'il n'y a aucune clé dans le tableau
        if(empty($ids)){
            echo "Votre panier est vide";
        }else {
            //si oui
            $products = mysqli_query($con, "SELECT * FROM article WHERE ID_Article IN (".implode(',', $ids).")");

            //lise des produit avec une boucle foreach
            foreach($products as $product):
                //calculer le total ( prix unitaire * quantité)
                //et aditionner chaque résutats a chaque tour de boucle
                $total = $total + $product['Prix_Article'] * $_SESSION['bdd_projetphpty'][$product['ID_Article']] ;
                ?>
                <tr>
                    <td><img src="../2_IMAGES/objets/<?=$product['Image_Article']?>"></td>
                    <td><?=$product['Nom_Article']?></td>
                    <td><?=$product['Prix_Article']?>€</td>
                    <td><?=$_SESSION['bdd_projetphpty'][$product['ID_Article']] // Quantité?></td>
                    <td><a href="panier.php?del=<?=$product['ID_Article']?>"><img src="../2_IMAGES/delete.png"></a></td>
                </tr>

            <?php endforeach ;} ?>

        <tr class="total">
            <th>Total : <?=$total?>€</th>
        </tr>
    </table>
</section>
</body>
</html>