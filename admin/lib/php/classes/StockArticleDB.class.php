<?php

class StockArticleDB  extends StockArticle{
    private $_db;
    private $_array = array();
    
    public function __construct($db){//contenu de $cnx (index)
        $this->_db = $db;
    }
   
    public function getAllProduitsAutres() {
        try {
            $this->_db->beginTransaction();
            $query = "select * from StockArticle where categorie = 'Autres' and stock > 0 order by id";
            $resultset = $this->_db->prepare($query);
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
    
    public function getAllProduitsEnfant() {
        try {
            $this->_db->beginTransaction();
            $query = "select * from StockArticle where categorie = 'Enfant' and stock > 0";
            $resultset = $this->_db->prepare($query);
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
    
    public function getAllProduitsFemme() {
        try {
            $this->_db->beginTransaction();
            $query = "select * from StockArticle where categorie = 'Femme' and stock > 0";
            $resultset = $this->_db->prepare($query);
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
    
     public function getAllProduitsHomme() {
        try {
            $this->_db->beginTransaction();
            $query = "select * from StockArticle where categorie = 'Homme' and stock > 0";
            $resultset = $this->_db->prepare($query);
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
}
