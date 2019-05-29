<?php
include ('lib/php/verifier_connexion.php');

$set_name = false;
$mail = $_SESSION['admin'];
$admin = $mail[0]['idclient'];


$panier = new PanierDB($cnx);

$liste = $panier->getPanier($admin);
if ($liste != null) {
    foreach ($liste as $num) {
        $number = $num['narticle'];
        $taille = $num['taille'];
        if (isset($_POST[$number])) {
            $id = $admin;
            $panier->deletePanier($id, $number, $taille);
        }
    }
}
if (isset($_POST['sub'])) {
    foreach ($liste as $num) {
        $number = $num['narticle'];
        $taille = $num['taille'];
        $prix = $num['prix'];
        $stock = new StockArticleDB($cnx);
        $array = $stock->getStock($number);
        $stock1 = $array[0]['stock'] - 1;
        if ($stock1 + 1 > 0) {
            $com = new CommandeDB($cnx);
            $com->ajoutCommande($admin, $number, $prix, $taille);
            $stock->supStock($number, $stock1);
        }
    }
    $panier->deletePanierID($admin);
    header('Location:index.php?page=success.php');
}

$liste = $panier->getPanier($admin);
?>


<?php
if ($liste != null) {
    $nbr = count($liste);
    ?>
    <div class="container ecartTop3pc">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Article</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Taille</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <form name="Variable" method="post" action="">
                <?php
                for ($i = 0; $i < $nbr; $i++) {
                    $fichier = '../admin/images/' . $liste[$i]['narticle'] . '.jpg';
                    $numero = $liste[$i]['narticle'];
                    $prix = $liste[$i]['prix'];
                    $taille = $liste[$i]['taille'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo '<img src="' . $fichier . '" alt="Element du panier"/> '; ?></th>
                        <td>Prix : <?php echo $prix . '€'; ?></td>
                        <td> <?php echo $taille; ?></td>   

                        <td>
                            <?php
                            $stock = new StockArticleDB($cnx);
                            $array = $stock->getStock($numero);
                            $stockRest = $array[0]['stock'];
                            if ($stockRest == 0) {
                                ?>
                                <p id="parag1">Plus en stock</p>
                                <?php
                            } else {
                                echo '<input type="submit" name="' . $numero . '" id="' . $numero . '" value="Suprimer" class="Send">';
                            }
                            ?></td>
                    </tr>

                    <?php
                }
                ?>
                <tfoot>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td><input type="submit" name="sub" id="sub" value="Commander" class="Send"></td>
                    </tr>
                </tfoot>
            </form>
            </tbody>
        </table>
        <hr>
    </div>
    <?php
} else {
    ?>
    <div class="container">
        <p>Votre panier est vide</p>
    </div>
    <?php
}
?>  