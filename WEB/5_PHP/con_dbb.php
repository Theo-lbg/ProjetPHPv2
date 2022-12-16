<?php
//connexion à la base de données
$con = mysqli_connect("localhost","root","","bdd_projetphpty");
//verifier la connexion
if(!$con) die('Erreur : '.mysqli_connect_error());

echo "Connexion réussie";
?>