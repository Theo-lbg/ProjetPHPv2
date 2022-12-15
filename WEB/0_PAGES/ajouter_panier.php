<?php
//inclure la page de connexion
include_once "../5_PHP/verification.php";
//verifier si une session existe
if(!isset($_SESSION)){
    //si non demarer la session
    session_start();
}
//creer la session
if(!isset($_SESSION['bdd_projetphpty'])){
    //s'il nexiste pas une session on créer une et on mets un tableau a l'intérieur
    $_SESSION['bdd_projetphpty'] = array();
}
//récupération de l'id dans le lien
if(isset($_GET['$ID_Article'])){//si un id a été envoyé alors :
    $id = $_GET['$ID_Article'] ;
    //verifier grace a l'id si le produit existe dans la base de  données
    $article = mysqli_query($con ,"SELECT * FROM products WHERE ID_Article = $ID_Article") ;
    if(empty(mysqli_fetch_assoc($article))){
        //si ce produit n'existe pas
        die("Ce produit n'existe pas");
    }
    //ajouter le produit dans le panier ( Le tableau)

    if(isset($_SESSION['bdd_projetphpty'][$ID_Article])){// si le produit est déjà dans le panier
        $_SESSION['bdd_projetphpty'][$ID_Article]++; //Représente la quantité
    }else {
        //si non on ajoute le produit
        $_SESSION['bdd_projetphpty'][$ID_Article]= 1 ;
    }

    //redirection vers la page index.php  : page modeles.php donc en gros c'est produit
    header("Location:modeles.php");


}
?>