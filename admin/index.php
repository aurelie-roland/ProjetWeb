<?php
//session_start(); //ADMIN
?>
<!doctype html>
<?php
require './lib/php/admin_liste_include.php';
session_start();
$cnx = Connexion::getInstance($dsn, $user, $pass);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="lib/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="lib/css/custom.css"/>
        <script src="lib/js/jquery.editable.js"></script>
        <script src="lib/js/FonctionJQueryDA.js"></script>
        <title></title>
    </head>
    <body class="body">
        <header>
            <img src="images/BanniereSW2.jpg" alt="Banniere Star Wars" class="banniere"/>
        </header>
        <div class="container">
            <?php
            if (file_exists('./lib/php/a_menu.php')) {
                require './lib/php/a_menu.php';
            }
            ?>
        </div>
        <section id="main">
            <div class="container">
                <?php
                if (!isset($_SESSION['page'])) { //premiere ouverture du site
                    $_SESSION['page'] = "accueil.php"; //page par défaut
                }
                if (isset($_GET['page'])) {
                    //on a cliqué sur un lien de menu
                    $_SESSION['page'] = $_GET['page'];
                }
                $path = "./pages/" . $_SESSION['page'];
                if (file_exists($path)) {
                    include ($path);
                } else {
                    include ('./pages/page404.php'); //remplacer par page spécifique
                }
                ?>
            </div>
        </section>
        <footer>
            <div class="container">

            </div>
        </footer>
    </body>
</html>
