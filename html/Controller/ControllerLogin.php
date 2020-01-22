<?php
class ControllerLogin {
  function __construct() {
    try{
      $action=$_REQUEST['action'];
      switch($action){
        case 'login':
            $this->login();
            break;
        case NULL: 
            $this->init();
            break;
        default: throw Exception("Erreur action inexistante");
      }
    }
    catch (Exception $e) {
      $erreur = $e->getMessage();
      require("../Controller/PHP/Erreur.php");
      exit();
    }
  }
  function init(){
    require ("Home.php");
  }
  function login(){
    require ("../View/HTML/Login.html");
  }
}
?>