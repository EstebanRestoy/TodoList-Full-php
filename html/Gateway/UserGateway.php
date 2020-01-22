<?php
    require_once("../Connection.php");
    
    class UserGateway{ 
        private $con; 
        
        function __construct(Connection $con){
            $this->con = $con;
        }
        /*public function insert(User $utilisateur) {
            string $nom = $utilisateur.getName();
            string $prenom = $utilisateur.getFirstName();
            string $email = $utilisateur.getEmail();
            string $mdp = $utilisateur.getMdp();
            $query='INSERT INTO Utilisateur (Nom,Prenom,Email,mdp) VALUES (:nom,:prenom,:email,:mdp)'; 
            $this->con->executeQuery($query, 
                array(
                    ':nom' => array($nom,PDO::PARAM_STR),
                    ':prenom' => array($prenom,PDO::PARAM_STR),
                    ':email' => array($email,PDO::PARAM_STR),
                    ':mdp' => array($mdp,PDO::PARAM_STR)
                    ));
                         
        }*/
            public function select(string $mail):array {
                $query='SELECT * FROM Utilisateur WHERE email=:mail'; 
                $this->con->executeQuery($query, 
                    array(
                        ':mail' => array($mail,PDO::PARAM_STR)               
                        )); 
                $result = $this->con->getResults();
                foreach($result as $user){
                    $tabUser[] = new User($user['id'],$user['prenom'],$user['nom'],$user['email'],$user['mdp']);
                }
                return $tabUser;
            }  
            
            public function delete(int $id) {
                $query='DElETE FROM Utilisateur WHERE id=:id'; 
                $this->con->executeQuery($query, 
                    array(
                        ':id' => array($id,PDO::PARAM_STR)               
                        ));                     
            }  
            public function login(string $mail,string $mdp):bool {
                $query='SELECT COUNT(*) FROM Utilisateur WHERE Email=:mail AND Mdp=:mdp'; 
                $this->con->executeQuery($query, 
                    array(
                        ':mail' => array($mail,PDO::PARAM_STR),
                        ':mdp' => array($mdp,PDO::PARAM_STR)                   
                        )); 
                $res = $this->con->getResults();
                if( $res[0]['COUNT(*)'] == '1'){
                    return true;
                }else{ 
                    return false;
                }                  
            } 

    }
?>

