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
    
    public function __construct(Connexion $con) {
        $this->con=$con;
    }
    
    public function findByUser(int $id):array {
        $query='SELECT * FROM Utilisateur_ToDoList WHERE id_utilisateur=?';
        $this->con->executeQuery($query, array(1 => array($id, PDO::PARAM_INT)));
        return $this->con->getResults();
    }
    
    public function insert(ToDoList $list) {
        $query="INSERT INTO ToDoList VALUES ('?')";
        $this->con->executeQuery($query, array(1 => array($list->getNom(), PDO::PARAM_INT)));
    }
    
    public function update(ToDoList $list) {
        $query="UPDATE ToDoList SET nom=? WHERE id=?";
        $this->con->executeQuery($query, array(
            1 => array($list->getNom(), PDO::PARAM_STR),
            2 => array($list->getId(), PDO::PARAM_INT)
            ));
    }
    
    public function remove(ToDoList $list) {
        $query="DELETE FROM ToDoList WHERE id=?";
        $this->con->executeQuery($query, array(
            1 => array($list->getId(), PDO::PARAM_INT)
            ));
    }
}
?>
