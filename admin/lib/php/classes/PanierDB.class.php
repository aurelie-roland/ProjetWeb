<?php

class PanierDB extends Panier {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }

    public function getPanier($id) {
        try {
            $query = "select * from panier where idclient = :id ";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id', $id);
            $resultset->execute();

            while ($data = $resultset->fetch()) {
                $_array[] = new Panier($data);
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

    public function updatePanier($id, $narticle, $prix, $taille) {
        try {
            $query = "update panier set values($id,$narticle,$prix,$taille";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();

            while ($data = $resultset->fetch()) {
                $_array[] = new Panier($data);
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

    public function deletePanier($id) {
        try {
            $query = "delete * from panier where idclient = :id";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id', $id);
            $resultset->execute();

            while ($data = $resultset->fetch()) {
                $_array[] = new Panier($data);
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

?>