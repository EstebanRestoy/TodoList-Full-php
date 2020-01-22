<?php
  require('validation.php');
  $mail = $_POST["email"];
  $pass = $_POST["pass"];

  $ok = validation::Already_Exist_Mail($_POST["email"]);
  if (!$ok){
    echo "<br> mail deja existant !";
   
    sleep(2);
    header('Location: ../HTML/index.html');
    exit();
  }
  try {
    $connect = new PDO('mysql:host=localhost;dbname=ToDoList;charset=utf8', 'root', '');
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO User (EMAIL,PASS) VALUES (\"$mail\", \"$pass\")";
    // use exec() because no results are returned
    $connect->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
  $connect = null;
  sleep(2);
  header('Location: ../HTML/index.html');
  exit();
?>