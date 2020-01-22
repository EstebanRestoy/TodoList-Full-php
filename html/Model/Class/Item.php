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
class Item {
    private $id;
    private $contenu;
    private $fait;
    private $titre;
    
    function __construct($id, $contenu, bool $fait, $titre) {
        $this->id = $id;
        $this->contenu = $contenu;
        $this->fait = $fait;
        $this->titre = $titre;
    }
    
    function getId() {
        return $this->id;
    }

    function getContenu() {
        return $this->contenu;
    }

    function getFait() {
        return $this->fait;
    }
    
    function getTitre() {
        return $this->titre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    function setFait($fait) {
        $this->fait = $fait;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }


}
