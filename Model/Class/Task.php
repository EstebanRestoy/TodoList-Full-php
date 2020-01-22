<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Item
 *
 * @author basousa
 */
class Task {
    private $id;
    private $content;
    private $isMade;
    
    function __construct(int $id, string $content, bool $isMade) {
        $this->id = $id;
        $this->content = $content;
        $this->isMade = $isMade;
    }
    
    function getId() {
        return $this->id;
    }

    function getContent() {
        return $this->content;
    }

    function getIsMade() {
        return $this->isMade;
    }
    

    function setId(int $id) {
        $this->id = $id;
    }

    function setContent(string $content) {
        $this->content = $content;
    }

    function setIsMade(bool $isMade) {
        $this->isMade = $isMade;
    }

}
