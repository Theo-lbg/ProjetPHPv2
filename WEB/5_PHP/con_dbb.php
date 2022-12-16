<?php
//connexion à la base de données
$db = mysqli_connect("localhost","adminty","adminty","bdd_projetphpty");
//verifier la connexion
if(!$db) die('Erreur : '.mysqli_connect_error());



?>