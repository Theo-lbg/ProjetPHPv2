<?php
$con = mysqli_connect("localhost","root","","bdd_projetphpty");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="icon" href="../logoBricolage.png"/>
    <link rel="stylesheet" href="../1_css/css_main.css"/>
    <link rel="stylesheet" href="../1_css/css_login.css"/>
    <link rel="stylesheet" href="../1_CSS/css_style.css"/>
    <!-- CSS only -->

    <title> Panier </title>
</head>

<body class="panier">
<a href="modeles.php" class="link">Retour</a>
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
        $ids = $_SESSION['bdd_projetphpty'];
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
                    <td><img src="project_images/<?=$product['Image_Article']?>"></td>
                    <td><?=$product['Nom_Article']?></td>
                    <td><?=$product['Prix_Article']?>€</td>
                    <td><?=$_SESSION['bdd_projetphpty'][$product['ID_Article']] // Quantité?></td>
                    <td><a href="panier.php?del=<?=$product['ID_Article']?>"><img src="delete.png"></a></td>
                </tr>

            <?php endforeach ;} ?>

        <tr class="total">
            <th>Total : <?=$total?>€</th>
        </tr>
    </table>
</section>

</body>
</html>