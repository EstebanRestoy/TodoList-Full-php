<?php
  require("Mail.php");
  try{
    $SQL = new PDO('mysql:host=localhost;dbname=ToDoList','root','');
  }catch (Exception $e)
  {
          echo('Erreur : ' . $e->getMessage());
          die();
  }
  echo 'Connecté correctement';
  $email = $_GET['email'];
  $result = $SQL->query("SELECT COUNT(*) AS EXIST FROM User WHERE EMAIL=\"$email\"");
  $donnees = $result->fetch();
  $result->closeCursor();
  if($donnees['EXIST'] == 0){
    echo '<br> Utilisateur inexistant';
    die();
  }
  echo '<br> Utilisateur existant';
  //$NEW_PASS = uniqid(uniqid());
  $NEW_PASS =  substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789123456789*'),1, 15); 
  //echo '<br>'.$NEW_PASS;
  $contenu = "Voici votre nouveau mot de passe : $NEW_PASS";
  //$select = $SQL->exec("SELECT * AS coucou WHERE EMAIL=\"$email\"");
  //$modif = $SQL->exec("UPDATE User SET PASS=\"$NEW_PASS\" WHERE EMAIL=$email");
  try {
    $connect = new PDO('mysql:host=localhost;dbname=ToDoList','root','');
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlReq = "UPDATE User SET PASS=\"$NEW_PASS\" WHERE EMAIL=\"$email\"";

    // Prepare statement
    $stmt = $connect->prepare($sqlReq);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo '<br>'.$stmt->rowCount() . " records UPDATED successfully";
    }
    catch(PDOException $e)
      {
      echo $sqlReq . "<br>" . $e->getMessage();
      }

    $connect = null;

    $requete = $SQL->query("SELECT PASS AS EXIST FROM User WHERE EMAIL=\"$email\"");
    $donnees = $requete->fetch();
    echo '<br> NEW_PASS : '.$donnees['EXIST'];
    $requete->closeCursor();

  

  try{
    Mail::Send_Mail($_GET['email'],$contenu);
  }catch(Exception $e){
    echo('Erreur : ' . $e->getMessage());
    die();
  }
   
?>