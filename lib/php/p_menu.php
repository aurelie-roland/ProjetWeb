<?php 

//si on a cliqué sur le bouton d'envoi du formulaire
if(isset($_POST['submit_login'])){
    if ( $_POST['login'] == "" || $_POST['password'] == "") {
        echo "Veuillez remplir tous les champs";
    } else {
        //pour pouvoir utiliser les données hors tabl $_GET ou $_POST
        extract($_POST, EXTR_OVERWRITE);
        $log = new AdminDB($cnx);
        //$admin et $password sont les noms des champs du formulaire
        $admin = $log->getAdmin($login, $password);
        if (is_null($admin)) {
            print "<br/>Données incorrectes";
        } else {
            $_SESSION['admin'] = $admin;
            unset($_SESSION['page']);
            print "<meta http-equiv=\"refresh\": Content=\"0;URL=./admin/index.php\">";
        }
    }
    
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm">
           <a class="nav-link" href="./index.php?page=accueil.php">Accueil</a>
        </div>
        <div class="col-sm">
          <a class="nav-link" href="./index.php?page=hommeP.php">Vetements hommes</a>
        </div>
        <div class="col-sm">
          <a class="nav-link" href="./index.php?page=femmeP.php">Vetements femmes</a>
        </div>
        <div class="col-sm">
          <a class="nav-link" href="./index.php?page=enfantP.php">Vetements enfants</a>
        </div>
         <div class="col-sm">
          <a class="nav-link" href="./index.php?page=bijouxP.php">Produits dérivés</a>
        </div>
         <div class="col-sm">
            <div class="dropdown">
                <button class="DropDownConnexion" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <a class="nav-link">Connexion</a>
                </button>
                <div class="dropdown-menu">
                    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group">
                            <label for="exampleDropdownFormEmail1">Adresse email</label>
                            <input type="login" name ="login" class="form-control" id="login" placeholder="email@example.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleDropdownFormPassword1">Mot de passe</label>
                            <input type="password" name="password"class="form-control" id="password" placeholder="Password">
                        </div>
                        <input type="submit" name="submit_login" id="submit_login" value="Se connecter"/>
                    </form>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./index.php?page=inscription.php">S'inscrire</a>
                    <a class="dropdown-item" href="#">Mot de passe oublié ?</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>