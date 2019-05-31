<?php

class StockArticleDB extends StockArticle {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }

    public function getAllProduits($categorie) {
        try {
            $this->_db->beginTransaction();
            $query = "select * from StockArticle where categorie = :categorie and stock > 0";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':categorie', $categorie);
            $resultset->execute();
            $this->_db->commit();
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

    public function getStock($narticle) {
        try {
            $this->_db->beginTransaction();
            $query = "select * from StockArticle where narticle = :narticle ";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':narticle', $narticle);
            $resultset->execute();
            $this->_db->commit();
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

    public function supStock($narticle, $stock) {
        try {
            $this->_db->beginTransaction();
            $query = "update StockArticle set stock = :stock where narticle = :narticle ";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':narticle', $narticle);
            $resultset->bindValue(':stock', $stock);
            $resultset->execute();
            $this->_db->commit();
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

    public function triStock($i, $categorie) {
        try {
            $this->_db->beginTransaction();
            if ($i == 1) {
                $query = "select * from StockArticle where categorie = :categorie and stock > 0";
            }
            else if($i == 2){
                $query = "select * from StockArticle where categorie = :categorie and stock > 0 order by prix";
            } else {
                $query = "select * from StockArticle where categorie = :categorie and stock > 0 order by prix desc";
            }
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':categorie', $categorie);
            $resultset->execute();
            $this->_db->commit();
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
