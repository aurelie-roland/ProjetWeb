<?php

//récupération des produits
$vue = new StockArticleDB($cnx);
$liste = array();
$liste = null;

$liste = $vue->getAllProduits("Autres");
$nbr = count($liste);
?>

<div class="container table">
    <table class="table-responsive">
        <tr>
            <th class="ecart">Id</th>            
            <th class="ecart">Numero article</th>
            <th class="ecart">Stock restant</th>
            <th class="ecart">Catégorie</th>
            <th class="ecart">Prix</th>
        </tr>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td class="ecart"><?php print $liste[$i]['id']; ?></td>
                <td><span contenteditable="true" name="nom_produit" class="ecart" id="<?php print $liste[$i]['id']; ?>">
                        <?php print $liste[$i]['narticle']; ?></span>
                </td>
                <td><span contenteditable="true" name="description" class="ecart" id="<?php print $liste[$i]['id']; ?>">
                        <?php print $liste[$i]['stock']; ?></span>
                </td>
                <td><span contenteditable="true" name="prix" class="ecart" id="<?php print $liste[$i]['id']; ?>">
                        <?php print $liste[$i]['categorie']; ?></span>
                </td>
                <td><span contenteditable="true" name="stock" class="ecart" id="<?php print $liste[$i]['id']; ?>">
                        <?php print $liste[$i]['prix']; ?></span>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>  
</div>