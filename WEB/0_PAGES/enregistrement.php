<?php

session_start();
$conn = mysqli_connect("localhost", "adminty", "adminty", "bdd_projetphpty");

if (isset($_POST["submit"])) {
    $nom = $_POST["nomclient"];
    $ville = $_POST["ville"];
    $rue = $_POST["rue"];
    $numero = $_POST["numero"];
    $telephone = $_POST["telephone"];
    $CP = $_POST["CP"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $duplicate = mysqli_query($conn, "SELECT * FROM client WHERE Nom_Client = '$username' OR Mail = '$email'");
            $query = $conn->prepare('Insert into Client(Nom_Client, Prenom, MDP, Numero , Rue, CP, Ville, Mail, Tel) Values (?, ?, ?, ?, ?, ?, ?, ? , ?)');
            $query->execute(array($nom, $username, $password, $numero, $rue, $CP, $ville, $email, $telephone));
    //if successfull redirect to login page
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../logoBricolage.png"/>

    <link rel="stylesheet" href="../1_css/css_main.css"/>
    <link rel="stylesheet" href="../1_css/css_login.css"/>


    <title> Shop Theo & Yassine </title>
</head>
<body>

<div class="header">

    <a href="../index.php">
        <img class="logo" src="../logoBricolage.png" alt=" LOGO  ">
    </a>

    <div class="banniere">
        <h1> Shop Theo & Yassine </h1>
    </div>


    <div id="purchase_in" class="menu">
        <a href="#">CONNEXION</a>
    </div>
    <div class="purchase_border">
    </div>


    <div id="modeles" class="menu">
        <a href="modeles.php">PANIER</a> <!-- AJOUTER REDIRECTION PANIER PAR LA SUITE-->
    </div>

</div>
<!-- -------------------------------------------------------------- -->

<div class="page">

    <img src="../2_IMAGES/backgroundLogin.jpeg"/>  <!-- Mettre une autre image jolie pour backgorund -->

    <div class="contenu">

        <form method="post" action="">
            <fieldset class="mainBord">
                <legend>Inscription</legend>
                <br>
                <form class="" action="" method="post" autocomplete="off">
                    <label for="nomclient">Nom du client : </label>
                    <input type="text" name="nomclient" id = "nomclient" required value=""> <br>
                    <label for="username">Votre prénom : </label>
                    <input type="text" name="username" id = "username" required value=""> <br>
                    <label for="email">Email : </label>
                    <input type="email" name="email" id = "email" required value=""> <br>
                    <label for="password">Mot de passe : </label>
                    <input type="password" name="password" id = "password" required value=""> <br>
                    <label for="numero">Numero : </label>
                    <input type="number" name="numero" id = "numero" required value=""> <br>
                    <label for="rue">Rue : </label>
                    <input type="text" name="rue" id = "rue" required value=""> <br>
                    <label for="CP">Code Postal : </label>
                    <input type="number" name="CP" id = "CP" required value=""> <br>
                    <label for="ville">Ville : </label>
                    <input type="text" name="ville" id = "ville" required value=""> <br>
                    <label for="telephone">Téléphone : </label>
                    <input type="tel" name="telephone" id = "telephone" required value=""> <br>
                    <br>
                    <button type="submit" name="submit">S'enregistrer</button>
                </form>

            </fieldset>

    </div>

    <div class="footer">

        <ul>
            <li>LebegueKaddouri©2022</li>
            <li><a href="conseils.pdf"> Conseils d'utilisation</a></li>
            <li><a href="../0_PAGES/contact.html">Panier</a></li>
            <li><a href="../0_PAGES/modeles.php">Produits</a></li>
        </ul>


    </div>
</div>
</body>
</html>
