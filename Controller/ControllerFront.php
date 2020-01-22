<?php
class ControllerFront {
  
  
  function __construct() {
    
    global $repertoire,$vues;
    $listeActionVisiteur = array(
      'loginView','registerView','loginRequest','modifierListePublic',
      'ajouterListePublic','registerRequest','viewList',NULL,'viewList','deleteList','addListView','addList','addInList',
      'updateTask', 'delTask');
    $listeActionUtilisateur= array('logoutRequest',NULL);
    try{
      $action=$_REQUEST['action'];
      $user = Mdl::isUser();
      var_dump($action);
      var_dump($user);
      /*if(isset($user)) {
          var_dump($_REQUEST['action']);
          if(in_array($action, $listeActionUtilisateur)) {
              global $repertoire, $vues;
              $c = new ControllerUser();
          }
      }else if(in_array($action, $listeActionVisiteur)){
        echo 'action dans visiteur';
              global $repertoire,$vues;
              $c = new ControllerVisiteur();
      }*/
      if(in_array($action, $listeActionVisiteur)){
              global $repertoire,$vues;
              $c = new ControllerVisiteur();
      }else
        if(isset($user)) {
          var_dump($_REQUEST['action']);
          if(in_array($action, $listeActionUtilisateur)) {
            global $repertoire, $vues;
            $c = new ControllerUser();
          }
        }else{
          $erreur = "action inexistante";
          require($repertoire.$vues['erreur']);
      }
    }
    catch (PDOException $e) {
    $erreur = "Erreur inattendue!!! ";
    require($repertoire.$vues['erreur']);
    }
    catch (Exception $e) {
      $erreur = $e->getMessage();
      require($vues['erreur']);  
    }
    exit(0);
  }
}
?>