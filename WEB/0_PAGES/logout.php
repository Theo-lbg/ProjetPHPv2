<?php
session_start();
$conn = mysqli_connect("localhost", "adminty", "adminty", "bdd_projetphpty");
$_SESSION = [];
session_unset();
session_destroy();
header("Location: ../");
?>