<?php
try{
    $acess = new PDO('mysql:host=localhost;dbname=bdd_projetphpty;charset=utf8', 'root', '');
}catch (Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}

?>