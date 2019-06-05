<div class="container">
    <div class="row">
        <div class="col-sm">
            <a class="nav-link" href="./index.php?page=accueil.php">Accueil</a>
        </div>
        <div class="col-sm">
            <a class="nav-link" href="./index.php?page=homme.php">Vêtements hommes</a>
        </div>
        <div class="col-sm">
            <a class="nav-link" href="./index.php?page=femme.php">Vêtements femmes</a>
        </div>
        <div class="col-sm">
            <a class="nav-link" href="./index.php?page=enfant.php">Vêtements enfants</a>
        </div>
        <div class="col-sm">
            <a class="nav-link" href="./index.php?page=bijoux.php">Produits dérivés</a>
        </div>
        <div class="col-sm">
            <a class="nav-link" href="./index.php?page=panier.php">Panier</a>
        </div>
        <?php 
        $mail = $_SESSION['admin'];
        $admin = $mail[0]['idclient'];
        if($admin == 17){?>
            <div class="col-sm">
            <a class="nav-link" href="./index.php?page=ideeRajout.php">Admin</a>
        </div>
        <?php
        }
        ?>
        
        <div class="col-sm">
            <a class="nav-link" href="./index.php?page=disconnect.php">Déconnexion</a>
        </div>
    </div>
</div>