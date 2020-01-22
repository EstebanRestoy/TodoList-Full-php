<?php


    class MdlUser {
    
    public static function isUser():bool {
        if (isset($_SESSION['login'])){
            $login = Validation::nettoyer_String($_SESSION['login']);
            return true;
        }
        return null;
    }
    public static function loginUser(string $mail,string $pass):bool {
        global $configBdd;
        $bdd = new SimpleXMLElement($configBdd);
        $gat = new UserGateway(new Connection($bdd->dsn,$bdd->user,$bdd->pass));
   
        $passBdd = $gat->login($mail);
        
        if(isset($passBdd[0])){
            if(password_verify($pass,$passBdd[0]['mdp']))
                return true;
        }
        return false;
        
    }
    public static function registerUser(string $mail,string $pass):bool {
        global $configBdd;
        $bdd = new SimpleXMLElement($configBdd);
        $gat = new UserGateway(new Connection($bdd->dsn,$bdd->user,$bdd->pass));
        try{
            $gat->insert($mail,$pass);
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
        return true;     
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

