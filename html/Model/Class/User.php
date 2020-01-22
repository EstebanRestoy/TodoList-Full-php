<?php
    /*
    * To change this license header, choose License Headers in Project Properties.
    * To change this template file, choose Tools | Templates
    * and open the template in the editor.
    */


    /**
    * Description of List
    *
    * @author esrestoy
    */
    class User {
        private $id;
        private $nom;
        private $prenom;
        private $email;
        private $mdp;

        function __construct($id, $nom, $prenom, $email, $mdp) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email = $email;
            $this->mdp = $mdp;
        }
        
        function getId() {
            return $this->id;
        }

        function getNom() {
            return $this->nom;
        }

        function getPrenom() {
            return $this->prenom;
        }

        function getEmail() {
            return $this->email;
        }

        function getMdp() {
            return $this->mdp;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setNom($nom) {
            $this->nom = $nom;
        }

        function setPrenom($prenom) {
            $this->prenom = $prenom;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setMdp($mdp) {
            $this->mdp = $mdp;
        }
    }
?>

