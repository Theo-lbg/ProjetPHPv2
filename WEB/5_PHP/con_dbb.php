<?php
//connexion à la base de données
$con = mysqli_connect("localhost","adminty","adminty","bdd_projetphpty");
//verifier la connexion
if(!$con) die('Erreur : '.mysqli_connect_error());



?>