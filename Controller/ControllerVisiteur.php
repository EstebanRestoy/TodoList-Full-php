<?php
class ControllerVisiteur{
  function __construct() {
    global $repertoire,$vues;
    try{
      $action=$_REQUEST['action'];
      switch($action){
          case 'loginView':
            $this->loginView();
            break;
          case 'loginRequest':
            $this->loginRequest();
            break;
          case 'registerView':
            $this->registerView();
            break;
          case 'registerRequest':
            $this->registerRequest();
            break;
          case 'viewList':
              $this->viewList();
              break;
          case 'deleteList':
              $this->deleteList();
              break;
          case 'addListView':
              $this->addListView();
            break;
          case 'addList':
              $this->addList();
            break;
          case 'addInList':
              $this->addInList();
              break;
          case 'delTask':
              $this->delTask();
              break;
          case 'updateTask':
              $this->updateTask();
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
  function init(){
      global $repertoire,$vues;
      $tabPublicList = Mdl::getList(NULL);
      $user = Mdl::isUser($_SESSION['login']);
      if(isset($user)){
          $tabPrivateList = Mdl::getList($user->getId());
          var_dump($tabPrivateList);
      }
      require($repertoire.$vues['home']);
  }

  function loginView(){
    global $repertoire,$vues;
    require($repertoire.$vues['login']);
  }
  /*function loginRequest()
  {
      global $repertoire, $vues, $configBdd;
      if (isset($_POST['email']) && isset($_POST['pass'])) {

          $email = Validation::Nettoyer_String($_POST['email']);
          $pass = Validation::Nettoyer_String($_POST['pass']);
          $user = Mdl::loginUser($email,$pass);

          if(!isset($user)){
              $fail="Identifiant inexistant";
              require($repertoire.$vues['login']);
          }


      }
  }*/
  function loginRequest(){
    global $repertoire,$vues,$configBdd;
    var_dump($_REQUEST['action']);
    if(Mdl::isUser() != null){
      //already login we do do nothing then
      unset($_REQUEST['action']);
      $controller = new ControllerFront();
    }else{
     if(isset($_POST['email'])&&isset($_POST['pass'])){ 
        $email = Validation::Nettoyer_String($_POST['email']);
        $pass = Validation::Nettoyer_String($_POST['pass']);
        $user = Mdl::loginUser($email,$pass);
        if(!isset($user)){
            $fail="Identifiant inexistant";
            require($repertoire.$vues['login']);
        }
        else{
         $controller = new ControllerFront();
        }
     }
    } 
  }
  function registerView(){
    global $repertoire,$vues;
    require($repertoire.$vues['register']);
  }

  function registerRequest(){
    global $repertoire,$vues,$configBdd;
     if(isset($_POST['email'])&&isset($_POST['pass'])){ 
     
        $email = Validation::Nettoyer_String($_POST['email']);
        $pass = Validation::Nettoyer_String($_POST['pass']);
        if(!Mdl::registerUser($email,$pass)){
            $fail="Utilisateur deja existant";
            require($repertoire.$vues['register']);
        }
     }
  }
     function viewList(){
        global $repertoire,$vues;
        $id = Validation::Nettoyer_String($_REQUEST['id']);
        if(Mdl::isUser() != null){
          $idUser=Mdl::isUser()->getId();
        }else{
          $idUser=null;
        }
        echo $idUser;
        if(!isset($id)){
            $erreur="erreur id liste non set";
            require($repertoire.$vues['erreur']);
        }
        $tabL = Mdl::viewList($id);
        if(isset($tabL)){
            $list = $tabL[0];
            $tasks = $tabL[1];
            if($list->getOwner() != NULL && $list->getOwner() != $idUser){
                $erreur="erreur pas acces a cette liste privée";
                require($repertoire.$vues['erreur']);
            }else{
                require($repertoire.$vues['todolist']);
            }
        }
        else{
            $erreur="erreur id liste inexistant";
            require($repertoire.$vues['erreur']);
        }
    }
    function deleteList(){
      global $repertoire,$vues;
        $id = Validation::Nettoyer_String($_REQUEST['id']);
        if(!isset($id)){
            $erreur="erreur id liste non set";
            require($repertoire.$vues['erreur']);
        }
        Mdl::deletelist($id);
        unset($_REQUEST['action']);
        $controller = new ControllerFront();
      }
      function addListView(){
        global $repertoire,$vues;
        $user = mdl::isUser();
        require($repertoire.$vues['addList']);
      }   
      function addList(){
        global $repertoire,$vues;
        if(isset($_POST['visible']) && isset($_POST['title'])){
          $visible = Validation::Nettoyer_String($_POST['visible']);
          $title = Validation::Nettoyer_String($_POST['title']);
        }else{
          $erreur="erreur manque des champs";
          require($repertoire.$vues['erreur']);
        }
        $user = Mdl::isUser();
        $idUser = null;
        if($visible != "public" && $user !=null){
          echo "bonsoir";
          $idUser = $user->getId();
        }
        echo $visible;
        if($visible == "privée" && $user == null)/*pas normal*/{
            $erreur="erreur pas acces a cette liste privée";
            require($repertoire.$vues['erreur']);
        }
        else{
          var_dump($idUser);
            $liste = new Liste(0/*on s'en fiche car la bdd va generer un nombre incrementé*/,$title,$idUser);
            Mdl::addList($liste);
          }
          unset($_REQUEST['action']);
          $controller = new ControllerFront();
      } 
      
    function addInList(){
        global $repertoire,$vues;
        $id = Validation::Nettoyer_String($_REQUEST['id']);
        if(!isset($id)){
            $erreur="erreur id liste non set";
            require($repertoire.$vues['erreur']);
        }
        $taskName = Validation::Nettoyer_String($_POST['taskfield']);
        if(!isset($taskName)){
            $erreur="erreur taskName";
            require($repertoire.$vues['erreur']);
        }
        Mdl::addInList($id, $taskName);
        $this->viewList();
    }
    
    function delTask(){
        global $repertoire,$vues;
        $id = Validation::Nettoyer_String($_REQUEST['id']);
        if(!isset($id)){
            $erreur="erreur id liste non set";
            require($repertoire.$vues['erreur']);
        }
        $idTask = Validation::Nettoyer_String($_REQUEST['idTask']);
        if(!isset($idTask)){
            $erreur="erreur idTask";
            require($repertoire.$vues['erreur']);
        }
        Mdl::delInList($id, $idTask);
        $this->viewList();
    }
    
    function updateTask() {
        global $repertoire,$vues;
        $id = Validation::Nettoyer_String($_REQUEST['id']);
        if(!isset($id)){
            $erreur="erreur id liste non set";
            require($repertoire.$vues['erreur']);
        }
        foreach($_POST as $index=>$valeur){
            $value = Validation::Nettoyer_String($valeur);
            if(!isset($value)){
                $erreur="erreur value";
                require($repertoire.$vues['erreur']);
            }
            Mdl::updateTaskInList($id, $index, $value);
        }
        $this->viewList();
    }

}
?>