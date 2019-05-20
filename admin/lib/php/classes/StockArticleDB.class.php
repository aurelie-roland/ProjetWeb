<?php

class StockArticleDB  extends StockArticle{
    private $_db;
    private $_array = array();
    
    public function __construct($db){//contenu de $cnx (index)
        $this->_db = $db;
    }
    
    /*public function updateStock($Nom,$Prenom,$Mail,$MDP){
        try{
            $query="insert into StockArticle(nom,prenom,mail,mdp) values(:Nom,:Prenom,:Mail,:MDP)";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':Nom',$Nom);
            $resultset->bindValue(':Prenom',$Prenom);
            $resultset->bindValue(':Mail',$Mail);
            $resultset->bindValue(':MDP',$MDP);
            $resultset->execute();      
            return 1;
        }catch(PDOException $e){
            print "Echec de l'insertion ".$e->getMessage();
        }
        //$_db->commit();
    }*/
    
    
    public function getStock(){
        try{
            $query = "select * from StockArticle";
            $resultset = $this->_db->prepare($query);
            //$resultset->bindValue(':login',$login);
            //$resultset->bindValue(':password',$password);
            $resultset->execute();

            while($data = $resultset->fetch()){
                $_array[] = new StockArticle($data);
            }   
            
        }
        catch(PDOException $e){
            print $e->getMessage(); 
        }
        if(!empty($_array)){
            return $_array;
        }
        else {
            return null;
        }
    }
    
    public function getAllProduitsAutres() {
        try {
            $this->_db->beginTransaction();
            $query = "select * from StockArticle where categorie = 'Autres'";
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
}
