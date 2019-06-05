<?php
header('Content-Type: application/json');
require '../pgConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Produit.class.php';
require '../classes/ProduitDB.class.php';

$cnx = Connexion::getInstance($dsn,$user,$pass);

try{       
   $update= new StockArticleDB($cnx);
   extract($_GET,EXTR_OVERWRITE);
    $parametre = 'id='.$id.'&champ='.$champ.'&nouveau='.$nouveau;
    $update->updateStock($champ, $nouveau, $id);
}
catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace()." ".$e->getCode();
}

