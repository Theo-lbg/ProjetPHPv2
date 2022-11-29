<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../logoBricolage.png" />
    	
    <link rel="stylesheet" href="../1_css/css_main.css" />
    <link rel="stylesheet" href="../1_css/css_login.css" />



    <title> Shop Theo & Yassine </title>
</head>
<body>

<div class="header">

	<a href="../index.html">
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
		<a href="modeles.html">Panier</a> <!-- AJOUTER REDIRECTION PANIER PAR LA SUITE-->
	</div>

</div>
<!-- -------------------------------------------------------------- -->

<div class="page">

	<img src="../2_images/DIAPO/Levante_1.jpg"/>  <!-- Mettre une autre image jolie pour backgorund -->

<div class="contenu">

<form method="post" action="verification.php">
  <fieldset class="mainBord">
		 <legend>Connexion</legend>
	  <br>
		 
		 <label for="nom">Nom Client</label> </br>
		 <input type="text" class="email-bt"  id="nom" placeholder="Nom Client" name="username" required/>
		</br>

		 <label for="mdp">Mots de Passe</label>  <!--  Mettre le id mots de passe si ca change rien au code -->
		 <input type="password" class="email-bt"  id="mdp" placeholder="Mots de Passe" name="password" required/>


		<input class="send_bt" type="submit" id="submit"  value="LOGIN" />
	  <br>
		<input class="call_text" type="submit"  value="S'inscire"/>
	  <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
	  }
	  ?>

	</fieldset>

</div>

<div class="footer">

<ul>
  <li>LebegueKaddouri © 2022</li>
  <li><a href="conseils.pdf"> Conseils d'utilisation</a></li>
	<li><a href="0_PAGES/contact.html">Panier</a></li>   <!-- A MODIFIER ET METTRE LE PATH DE PANIER -->
	<li><a href="0_PAGES/contact.html">Produits</a></li>  <!-- A MODIFIER ET METTRE LE PATH DE Produit -->
</ul>


</div>
</div>
</body>
</html>