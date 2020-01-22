<?php
    
    class UserGateway{ 
        private $con; 
        
        public function __construct(Connection $con){
            $this->con = $con;
        }
        
        public function insert(string $email, string $pwd) {
            $query='INSERT INTO User (email,pwd) VALUES (:email,:pwd)'; 
            $this->con->executeQuery($query, 
                array(
                    ':email' => array($email,PDO::PARAM_STR),
                    ':pwd' => array(password_hash($pwd, PASSWORD_DEFAULT),PDO::PARAM_STR)
                )); 
        }
        
            public function select(string $mail):array {
                $query='SELECT * FROM User WHERE email=:mail'; 
                $this->con->executeQuery($query, 
                    array(
                        ':mail' => array($mail,PDO::PARAM_STR)               
                        )); 
                $result = $this->con->getResults();
                foreach($result as $user){
                    $tabUser[] = new User($user['id'],$user['email'],$user['pwd']);
                }
                return $tabUser;
            }  
            
            public function delete(int $id) {
                $query='DElETE FROM User WHERE id=:id'; 
                $this->con->executeQuery($query, 
                    array(
                        ':id' => array($id,PDO::PARAM_STR)               
                        ));                     
            }  
            public function login(string $mail):array {
                $query='SELECT pwd FROM User WHERE email=:mail'; 
                $this->con->executeQuery($query, 
                    array(
                        ':mail' => array($mail,PDO::PARAM_STR)                
                        )); 
                $res = $this->con->getResults();
                return $res;
            } 
    }
?>
