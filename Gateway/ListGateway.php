<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListeGateway
 *
 * @author basousa
 */
class ListGateway {
    private $con;
    
    public function __construct(Connection $con) {
        $this->con=$con;
    }
    
    public function findByUser(int $id):array {
        $query='SELECT * FROM Utilisateur_ToDoList WHERE id_utilisateur=?';
        $this->con->executeQuery($query, array(1 => array($id, PDO::PARAM_INT)));
        return $this->con->getResults();
    }
    
    public function insert(Liste $list) {
        $query="INSERT INTO List(name,owner) VALUES (?,?)";
        $this->con->executeQuery($query, array(
            1 => array($list->getName(), PDO::PARAM_STR),
            2 => array($list->getOwner(), PDO::PARAM_INT)
        ));
    }
    
    public function update(Liste $list) {
        $query="UPDATE ToDoList SET nom=? WHERE id=?";
        $this->con->executeQuery($query, array(
            1 => array($list->getNom(), PDO::PARAM_STR),
            2 => array($list->getId(), PDO::PARAM_INT)
        ));
    }
    
    public function remove(int $id) {
        $query="DELETE FROM list WHERE id=?";
        $this->con->executeQuery($query, array(
            1 => array($id, PDO::PARAM_INT)
            ));
    }
    public function getList(?int $owner):?array {

        if(!isset($owner)){

            $query="SELECT * FROM List WHERE Owner IS NULL";
        }
        else{
            $query="SELECT * FROM List WHERE Owner =?";
        }

        $this->con->executeQuery($query, array(
            1 => array($owner, PDO::PARAM_INT),
        ));
        $result = $this->con->getResults();

        if(!isset($result)){
            return null;
        }
        foreach($result as $liste){
            $tabListe[] = new Liste($liste['id'],$liste['name'],$liste['owner']);
        }

        return $tabListe;
    }
    public function getListById(int $id):?Liste {
        $query="SELECT * FROM List WHERE id=? ";
        $this->con->executeQuery($query, array(
            1 => array($id, PDO::PARAM_INT),
        ));
        $result = $this->con->getResults();

        if(!isset($result[0])){
            return null;
        }
        $liste = new Liste($result[0]['id'],$result[0]['name'],$result[0]['owner']);
        return $liste;
    }
    
}
?>
