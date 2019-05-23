<br>
<div id="Tri">
    <form name="Variable" method="post" action="index.php?page=Bijoux.php">
        <label for="tri"><b>Trier par : </b></label>
        <select name="tri">
            <option value="1">Pertinence</option>
            <option value="2">Ordre croissant</option>
            <option value="3">Ordre decroissant</option>
        </select>
        <input type="submit" value="OK" name="OK"/>
    </form>
</div>



<?php
//récupération des produits
$stock = new StockArticleDB($cnx);

$liste = array();
$liste = null;
$liste = $stock->getAllProduitsEnfant();
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
                </tr>
            </thead>
            <tbody>
            <form name="Variable" method="post" action="">
                <?php
                for ($i = 0; $i < $nbr; $i++) {
                    ?>
                    <?php
                    $fichier = './admin/images/' . $liste[$i]['narticle'] . '.jpg';
                    $numero = $liste[$i]['narticle'];
                    $prix = $liste[$i]['prix'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo '<img src="' . $fichier . '" alt="Vetement enfant Star Wars"/> '; ?></th>
                        <td>Prix : <?php echo $prix . '€'; ?></td>

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

