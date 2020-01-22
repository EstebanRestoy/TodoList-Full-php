<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TaskGateway
 *
 * @author basousa
 */
class ItemGateway {
   private $con;
    
    public function __construct(Connexion $con) {
        $this->con=$con;
    }
    
    public function insert(Item $item) {
        $query="INSERT INTO Item VALUES ('?', '?', '?')";
        $this->con->executeQuery($query, array(
            1 => array($item->getContenu(), PDO::PARAM_STR),
            2 => array($item->getFait(), PDO::PARAM_BOOL),
            3 => array($item->getTitre(), PDO::PARAM_STR)
            ));
    }
    
    public function update(Item $item) {
        $query="UPDATE Item SET contenu=?, fait=?, titre=?  WHERE id=?";
        $this->con->executeQuery($query, array(
            1 => array($item->getContenu(), PDO::PARAM_STR),
            2 => array($item->getFait(), PDO::PARAM_BOOL),
            3 => array($item->getTitre(), PDO::PARAM_STR),
            4 => array($item->getId(), PDO::PARAM_INT)
            ));
    }
    
    public function remove(ToDoList $list) {
        $query="DELETE FROM Item WHERE id=?";
        $this->con->executeQuery($query, array(
            1 => array($list->getId(), PDO::PARAM_INT)
            ));
    }
}
