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
        private $email;
        private $psw;

        function __construct(int $id, string $email, string $psw) {
            $this->id = $id;
            $this->email = $email;
            $this->psw = $psw;
        }
        
        function getId() {
            return $this->id;
        }
    
        function getEmail() {
            return $this->email;
        }

        function getPwd() {
            return $this->psw;
        }

        function setId(int $id) {
            $this->id = $id;
        }
        function setEmail(string $email) {
            $this->email = $email;
        }

        function setPwd(string $psw) {
            $this->psw = $psw;
        }
    }
?>

