<?php
include ('lib/php/verifier_connexion.php');
//récupération des produits
$stock = new StockArticleDB($cnx);

$liste = $stock->getAllProduitsFemme();
$set_name = false;
$mail = $_SESSION['admin'];
$admin = $mail[0]['idclient'];
foreach ($liste as $num) {
    $number = $num['narticle'];
    $prix = $num['prix'];

    if (isset($_POST[$number])) {
        $Taille = $_POST['Taille'.$number];;
        $Article = $number;
        $Prix1 = $prix;
        $id = $admin;
        $panier = new panierDB($cnx);
        $panier->ajoutPanier($id, $Article, $Prix1, $Taille);
    }
}
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
                    <th scope="col">Commander</th>
                </tr>
            </thead>
            <tbody>
            <form name="Variable" method="post" action="">
                <?php
                for ($i = 0; $i < $nbr; $i++) {
                    ?>
                    <?php
                    $fichier = '../admin/images/' . $liste[$i]['narticle'] . '.jpg';
                    $numero = $liste[$i]['narticle'];
                    $prix = $liste[$i]['prix'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo '<img src="' . $fichier . '" alt="Vetements femme Star Wars"/> '; ?></th>
                        <td>Prix : <?php echo $prix . '€'; ?></td>
                        <td> <?php echo '<select name="Taille' . $numero . '">
											<option value="XS">XS</option>
											<option value="S">S</option>
											<option value="M">M</option>
											<option value="L">L</option>
											<option value="XL">XL</option>
											<option value="XXL">XXL</option>
										</select>';
                    ?>
                        </td>
                        <td> 
                            <?php
                            echo '<input type="submit" name="' . $numero . '" id="' . $numero . '" value="Ajouter au panier" class="Send">';
                            ?></td>
                    </tr>

                    <?php
                }
                ?>
            </form>
            </tbody>
        </table>
        <hr>
    </div>
    <?php
} else {
    ?>
    <div class="container">
        <p>( contenu signifiant un problème ... )</p>
    </div>
    <?php
}

