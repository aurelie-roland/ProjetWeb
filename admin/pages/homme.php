<?php
include ('lib/php/verifier_connexion.php');

$stock = new StockArticleDB($cnx);
$liste = array();
$liste = null;
$liste = $stock->getAllProduits("Homme");

if (isset($_GET['OK'])) {
    $choix = $_GET['tri'];
    $liste = $stock->triStock($choix, "Homme");
}
?>

<br>
<div id="Tri">
    <form name="Variable" method="get" action="">
        <label for="tri"><b>Trier par : </b></label>
        <select name="tri" id="triSel">
            <option value="1">Pertinence</option>
            <option value="2">Ordre croissant</option>
            <option value="3">Ordre decroissant</option>
        </select>
        <input type="submit" value="OK" name="OK" id="OK"/>
    </form>
</div>


<?php
$mail = $_SESSION['admin'];
$admin = $mail[0]['idclient'];
foreach ($liste as $num) {
    $number = $num['narticle'];
    $prix = $num['prix'];
    if (isset($_POST[$number])) {
        $Taille = $_POST['Taille' . $number];
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
    <div class="table-responsive">
        <div class="container ecartTop3pc">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Article</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Taille</th>
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
                            <th scope="row"><?php echo '<img src="' . $fichier . '" alt="Vetements homme Star Wars"/> '; ?></th>
                            <td>Prix : <?php echo $prix . '€'; ?>
                                <br><br><br><?php
                                $stock = new StockArticleDB($cnx);
                                $array = $stock->getStock($numero);
                                echo "Stock restant : " . $array[0]['stock'];
                                ?></td>

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
    </div>
    <?php
} else {
    ?>
    <div class="container">
        <p>( contenu signifiant un problème ... )</p>
    </div>
    <?php
}

