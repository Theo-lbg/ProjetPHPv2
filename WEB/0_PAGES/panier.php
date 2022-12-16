<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panier</title>
    <link rel="stylesheet" href="../1_CSS/css_panier.css"/>

    <link rel="icon" href="../logoBricolage.png"/>
</head>
<body>
<div id="page-wrapper">
    <!-- Header -->
    <section id="header">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <?php
                    session_start();
                    if (isset($_SESSION['connect'])) {
                        echo "<nav id='nav'>
                        <a href='apropos'>A propos</a>
                        <a href='profil'>Profil</a>
                        <a href= 'index?disconnect=true'>Déconnexion</a>
                        </nav>";
                        if (isset($_GET['disconnect'])) {
                            session_destroy();
                            header('Location: index');
                        }
                    } else {
                        echo "<nav id = 'nav'>
                        <a href='../index.php'>Accueil</a>
                        <a href='../0_PAGES/enregistrement.php'>Inscription</a>
                        <a href='../0_PAGES/login.php'>Connexion</a>
                    </nav>";
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
    <div id="banner">
        <div class="container">
            <?php
            if ($_SESSION['bdd_projetphpty'] != array()) {
                $db = new PDO('mysql:host=localhost;dbname=bdd_projetphpty', 'root', '');
                echo "<h1 style='color: #2d2a2a; font-weight: 500; font-size: xxx-large; text-align: center'>Panier</h1>";
                echo "<div class='panier'>";
                $prixtotal = 0;
                foreach ($_SESSION['bdd_projetphpty'] as $i) {
                    $article = $db->query("SELECT * FROM article WHERE ID_Article = $i")->fetch(PDO::FETCH_ASSOC);
                    echo "<div class='unArticle'>";
                    echo "<a class='lienArticle' href='article?id={$article['ID_Article']}'>";
                    echo "<h3 style='color: #2d2a2a; font-weight: 500; font-size: large'>{$article['Nom_Article']}</h3>";
                    echo "<img src='../2_IMAGES/objets/{$article['Image_Article']}'> <br>";
                    echo "<span style='font-weight: 300;color: #2d2a2a;' >Prix : {$article['Prix_Article']} €</span></a></div>";
                    $prixtotal += $article['Prix_Article'];
                }

                echo "<form action='' method='post' class='viderPanierBtn'>";
                echo "<input type='submit' name='vider_panier' value='Vider panier'>";
                echo "</form>";
                if (isset($_POST['vider_panier'])) {
                    $_SESSION['bdd_projetphpty'] = [];
                    header('refresh:0');
                }

                echo "<p style='color: #2d2a2a'>Prix total : {$prixtotal} €</p></div>";

                echo "<form method='post'>";
                echo "<input type='text' placeholder='Carte bancaire' required>";
                echo "<input type='month' placeholder='Date validite' required>";
                echo "<input type='text' placeholder='Cryptogramme' required>";
                echo "<input type='submit' name='valider' value='Commander'>";
                echo "</form>";
                echo "</div>";

                if (isset($_POST['valider'])) {
                    $db->insert("INSERT INTO commande (Date_Com, ID_Client) VALUES (NOW(),{$_SESSION['id']})");
                    $id_com = $db->select("SELECT ID_Com FROM commande WHERE ID_Client = {$_SESSION['id']}")->fetch(PDO::FETCH_ASSOC)['ID_Com'];
                    foreach ($_SESSION['panier'] as $i) {
                        $article = $db->select("SELECT * FROM article WHERE ID_Article = $i")->fetch(PDO::FETCH_ASSOC);
                        $db->insert("INSERT INTO detail_commande (ID_Com, Nom_Article, Image_Article, Prix_Article, Cat_Article, Qte_Article) VALUES ({$id_com}, '{$article['Nom_Article']}', '{$article['Image_Article']}', {$article['Prix_Article']}, '{$article['Cat_Article']}', 1)");
                    }
                    $_SESSION['bdd_projetphpty'] = array();
                    echo "<script>alert('Votre commande à été effectuée')</script>";
                    header('Location: ../index');
                }

            } else {
                echo "<p style='color: #2d2a2a'>Votre panier est vide...</p>";
            }
            ?>
        </div>
    </div>

</div>
</body>
</html>