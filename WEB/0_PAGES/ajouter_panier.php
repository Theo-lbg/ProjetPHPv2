<?php
//connexion à la base de données
$con = mysqli_connect("localhost","root","","bdd_projetphpty");
//verifier la connexion
if(!$con) die('Erreur : '.mysqli_connect_error());

//verifier si une session existe
if(!isset($_SESSION)){
    //si non demarer la session
    session_start();
}
//creer la session
if(!isset($_SESSION['bdd_projetphpty'])){
    //s'il n'existe pas une session, on crée une et on met un tableau à l'intérieur
    $_SESSION['bdd_projetphpty'] = array();
}
//récupération de l'id dans le lien
if(isset($_GET['ID_Article'])){//si un id a été envoyé alors :
    $id = $_GET['ID_Article'] ;
    //verifier grace a l'id si le produit existe dans la base de  données
    $produit = mysqli_query($con ,"SELECT * FROM article WHERE ID_Article = $id") ;
    if(empty(mysqli_fetch_assoc($produit))){
        //si ce produit n'existe pas
        die("Ce produit n'existe pas");
    }
    //ajouter le produit dans le panier ( Le tableau)

    if(isset($_SESSION['bdd_projetphpty'][$id])){// si le produit est déjà dans le panier
        $_SESSION['bdd_projetphpty'][$id]++; //Représente la quantité
    }else {
        //si non on ajoute le produit
        $_SESSION['bdd_projetphpty'][$id]= 1 ;
        echo "Le produit a bien été mis dans le panier";
        //afficher le tableau associé
        var_dump($_SESSION('bdd_projetphpty'));
    }

    //redirection vers la page index.php
    header("Location: ../0_PAGES/modeles.php");


}
?>