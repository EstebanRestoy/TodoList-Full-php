<?php
  require('validation.php');
  echo $_GET["email"];
  echo '<br>';
  echo $_GET["pass"];
  try{
    validation::Valid_Mail($_GET["email"]);
  } 
  catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
  try{
    $ok = validation::Valid_User($_GET["email"],$_GET["pass"]);
    echo $ok;
    if($ok){
      header('Location: ../HTML/ToDOList.html');
    }
  } 
  catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
?>