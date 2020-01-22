<?php
class ControllerUser extends ControllerVisiteur {
    function __construct() {
    global $repertoire,$vues;
    try{

      $action=$_REQUEST['action'];
        switch($action){
            case 'logoutRequest':
                $this->logoutRequest();
                break;
            case NULL:
                $this->init();
                break;
            default: throw new Exception("Erreur action inexistante");
        }
    }
    catch (PDOException $e) {
      $erreur = $e->getMessage();
      require($repertoire.$vues['erreur']);
      }
    catch (Exception $e) {
      $erreur = $e->getMessage();
      require($repertoire.$vues['erreur']);  
    }
    exit(0);
  }
  function logoutRequest() {
      global $repertoire,$vues;
      unset($_SESSION['login']);
      session_destroy();
      unset($_REQUEST['action']);//remise a null
      $c = new ControllerFront();
    }
    function loginRequest()
    {
        $this->init();
    }
    function loginView(){
        global $repertoire,$vues;
        require($repertoire.$vues['login']);
      }
    function registerView(){
        global $repertoire,$vues;
        require($repertoire.$vues['register']);
    }
    
}
