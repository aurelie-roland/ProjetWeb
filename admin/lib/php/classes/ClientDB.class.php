<?php

class ClientDB extends Client {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }

    public function addClient($Nom, $Prenom, $Mail, $MDP) {
        try {
            $query = "insert into client(nom,prenom,mail,mdp) values(:Nom,:Prenom,:Mail,:MDP)";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':Nom', $Nom);
            $resultset->bindValue(':Prenom', $Prenom);
            $resultset->bindValue(':Mail', $Mail);
            $resultset->bindValue(':MDP', $MDP);
            $resultset->execute();
            return 1;
        } catch (PDOException $e) {
            print "Echec de l'insertion " . $e->getMessage();
        }
        //$_db->commit();
    }

    public function getIdClient($mail) {
        try {
            $query = "select * from client where mail= :mail";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':mail', $mail);
            $resultset->execute();

            while ($data = $resultset->fetch()) {
                $_array[] = new Client($data);
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