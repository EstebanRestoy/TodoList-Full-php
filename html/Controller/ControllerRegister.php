<?php
class ControllerRegister {
  function __construct() {
    try{
      $action=$_REQUEST['action'];
      switch($action){
        case 'register': 
            $this->register();
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
  function register(){
    require ("../View/HTML/Register.html");
  }
}
?>