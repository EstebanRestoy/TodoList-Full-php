<?php
  class Validation{
    public static function Valid_Mail($email) :bool{
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        else{
            throw new Exception('Mail pas Valide');
            return false;
        }
    }
    public static function Valid_Pass($mdp) :bool{
      if(preg_match("[\']",$mdp,$matches, PREG_OFFSET_CAPTURE)or preg_match("[/]",$mdp,$matches, PREG_OFFSET_CAPTURE) or preg_match("[\"]",$mdp,$matches, PREG_OFFSET_CAPTURE)){
        throw new Exception('mdp pas Valide');
        return false;
      }
      else{
        return true;  
      }
  }
    public static function Valid_User($email,$pass) :bool{
      try
      {
        $bdd = new PDO('mysql:host=localhost;dbname=ToDoList;charset=utf8', 'root', '');
        
      }
      catch (Exception $e)
      {
              echo('Erreur : ' . $e->getMessage());
              return false;
      } 
      
        $requete = $bdd->query("SELECT COUNT(*) AS EXIST FROM User WHERE EMAIL=\"$email\" AND PASS=\"$pass\"");
        $donnees = $requete->fetch();
        $requete->closeCursor();
        if($donnees['EXIST'] == 0){
          echo '<br> Utilisateur inexistant';
          return false;
        }else{
          echo '<br> Utilisateur existant';
          return true;
        }
        
    }
    public static function Already_Exist_Mail($email) :bool{
      try
      {
        $bdd = new PDO('mysql:host=localhost;dbname=ToDoList;charset=utf8', 'root', '');
        
      }
      catch (Exception $e)
      {
              echo('Erreur : ' . $e->getMessage());
              return false;
      } 
      $requete = $bdd->query("SELECT COUNT(*) AS EXIST FROM User WHERE EMAIL=\"$email\"");
      $donnees = $requete->fetch();
      $requete->closeCursor();
      
      if($donnees['EXIST'] != 0){ 
        return false;
      }
      return true;
  }
}
?>