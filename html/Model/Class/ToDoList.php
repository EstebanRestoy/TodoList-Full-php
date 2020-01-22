<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of List
 *
 * @author basousa
 */
class ToDoList {
    private $name;
    private $id;
    
    function __construct(string $id, string $name) {
        $this->id=$id;
        $this->name=$name;
    }
    
    function getName() {
        return $this->name;
    }
    
    function getId() {
        return $this->id;
    }
    
    function setName($name) {
        $this->name = $name;
    }

    function setId($id) {
        $this->id = $id;
    }
}

?>
