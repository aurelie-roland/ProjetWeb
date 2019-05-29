<?php

class CommandeDB extends Commande {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }

    public function ajoutCommande($id, $narticle, $prix, $taille) {
        try {
            $query = "insert into commande values(:id, :prix, :taille, :narticle)";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id', $id);
            $resultset->bindValue(':narticle', $narticle);
            $resultset->bindValue(':prix', $prix);
            $resultset->bindValue('taille', $taille);
            $resultset->execute();

            while ($data = $resultset->fetch()) {
                $_array[] = $data;
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($_array)) {
            return $_array;
        } else {
            return null;
        }
    }
}
