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
class Liste {
    private $name;
    private $id;
    private $owner;
    
    function __construct(int $id, string $name,?int $owner) {
        $this->id=$id;
        $this->name=$name;
        $this->owner=$owner;
    }
    
    public function getName() {
        return $this->name;
    }
    
    function getId() {
        return $this->id;
    }
    
    function setName(string $name) {
        $this->name = $name;
    }

    function setId(string $id) {
        $this->id = $id;
    }

    function setOwner(int $owner) {
        $this->owner = $owner;
    }

    function getOwner() {
        return $this->owner;
    }
    function isPublic():bool {
        if(isset($this->owner))return true;
        return false;
    }
}


?>
