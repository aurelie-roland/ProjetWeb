<?php

class PanierDB extends Panier {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }

    public function ajoutPanier($id, $narticle, $prix, $taille) {
        try {
            $query = "insert into panier values(:id, :narticle, :prix, :taille)";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id', $id);
            $resultset->bindValue(':narticle', $narticle);
            $resultset->bindValue(':prix', $prix);
            $resultset->bindValue('taille', $taille);
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

    public function getPanier($id) {
        try {
            $query = "select * from panier where idclient = :id ";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id', $id);
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

    public function deletePanier($id, $narticle, $taille) {
        try {
            $query = "delete from panier where idclient = :id and narticle = :narticle and taille = :taille";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id', $id);
            $resultset->bindValue(':narticle', $narticle);
            $resultset->bindValue(':taille', $taille);
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
    
     public function deletePanierID($id) {
        try {
            $query = "delete from panier where idclient = :id";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id', $id);
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

?>