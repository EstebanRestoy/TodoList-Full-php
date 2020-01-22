<?php


    class Mdl {
    
    public static function isUser():?User//a mettre user
     {
        if (isset($_SESSION['login'])){

            $id = Validation::nettoyer_String($_SESSION['login']->getId());
            $email = Validation::nettoyer_String($_SESSION['login']->getEmail());
            $pwd = Validation::nettoyer_String($_SESSION['login']->getPwd());
            return new User($id,$email,$pwd);//a cganger avec l'utilisateur
        }
        return null;
    }
    public static function loginUser(string $mail,string $pass):?User {
        global $configBdd;
        $bdd = new SimpleXMLElement($configBdd);
        $gat = new UserGateway(new Connection($bdd->dsn,$bdd->user,$bdd->pass));
        $passBdd = $gat->login($mail);
        if(isset($passBdd[0])){
            if(password_verify($pass,$passBdd[0]['pwd'])){
                $result = $gat->select($mail);

                $user = $result[0];
                $_SESSION['login'] = $user;
                return $user;
            }
        }
        return NULL;
        
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
    public static function getList($id):?array {
        global $configBdd;
        $bdd = new SimpleXMLElement($configBdd);
        $gat = new ListGateway(new Connection($bdd->dsn,$bdd->user,$bdd->pass));
        try{
            $tabList = $gat->getList($id);
        }catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
        if(isset($tabList)){
            return $tabList;
        }
        return NULL;

    }
    public static function viewList($id):?array {
        global $configBdd;
        $tab = [];
        $bdd = new SimpleXMLElement($configBdd);
        $con = new Connection($bdd->dsn,$bdd->user,$bdd->pass);
        $gatListe = new ListGateway($con);
        $gatTask = new TaskGateway($con);
        try{
            $tab[] = $gatListe->getListById($id);
            if(!isset($tab[0])){
                return NULL;
            }
            $tab[] = $gatTask->getTasks($id);
        }catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }

        return $tab;
    }
    public static function deletelist($id) {
        global $configBdd;
        $bdd = new SimpleXMLElement($configBdd);
        $con = new Connection($bdd->dsn,$bdd->user,$bdd->pass);
        $gatListe = new ListGateway($con);
        try{
            $gatListe->remove($id);
        }catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }
    public static function addList($list) {
        global $configBdd;
        $bdd = new SimpleXMLElement($configBdd);
        $con = new Connection($bdd->dsn,$bdd->user,$bdd->pass);
        $gatListe = new ListGateway($con);
        try{
            $gatListe->insert($list);
        }catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }
    public static function addInList($id, $taskName) {
        global $configBdd;
        $bdd = new SimpleXMLElement($configBdd);
        $con = new Connection($bdd->dsn,$bdd->user,$bdd->pass);
        $gatTask = new TaskGateway($con);
        $gatList = new ListGateway($con);
        try {
            $tab[] = $gatList->getListById($id);
            if(!isset($tab[0])){
                return NULL;
            }
            $gatTask->insert(new Task(0,$taskName, FALSE),$tab[0]);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return null;
        }
    }
    
    public static function delInList($id, $idTask) {
        global $configBdd;
        $bdd = new SimpleXMLElement($configBdd);
        $con = new Connection($bdd->dsn,$bdd->user,$bdd->pass);
        $gatTask = new TaskGateway($con);
        $gatList = new ListGateway($con);
        try {
            $tab[] = $gatList->getListById($id);
            if(!isset($tab[0])){
                return NULL;
            }
            $gatTask->remove($idTask,$tab[0]);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return null;
        }
    }
    
    public static function updateTaskInList($id, $idTask, $value) {
        global $configBdd;
        $bdd = new SimpleXMLElement($configBdd);
        $con = new Connection($bdd->dsn,$bdd->user,$bdd->pass);
        $gatTask = new TaskGateway($con);
        $gatList = new ListGateway($con);
        try {
            $tab[] = $gatList->getListById($id);
            if(!isset($tab[0])){
                return NULL;
            }
            $task = $gatTask->getTask($id, $idTask);
            if(!isset($task)){
                return NULL;
            }
            if($value == "on") {
                $task->setIsMade(true);
            } else {
                $task->setIsMade(false);
            }
            $gatTask->update($task,$tab[0]);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return null;
        }
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

