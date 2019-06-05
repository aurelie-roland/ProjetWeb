<?php
$stock = new StockArticleDB($cnx);
$liste = $stock->getAllProduits("Autres");

if (isset($_GET['OK'])) {
    $choix = $_GET['tri'];
    $liste = $stock->triStock($choix, "Autres");
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
//récupération des produits
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
                            <th scope="row"><?php echo '<img src="' . $fichier . '" alt="Bijoux Star Wars"/> '; ?></th>
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
    </div>
    <?php
} else {
    ?>
    <div class="container">
        <p>( contenu signifiant un problème ... )</p>
    </div>
    <?php
}

    