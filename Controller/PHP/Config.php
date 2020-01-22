<?php
$configBdd = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<bdd>
    <dsn>mysql:host=localhost;dbname=Todolist</dsn>
    <user>root</user>
    <pass></pass>
</bdd>
XML;
$vues['erreur']='View/erreur.php';
$vues['login']='View/login.php';
$vues['register']='View/register.php';
$vues['home']='View/home.php';
$vues['todolist']='View/ToDoList.php';
$vues['addList']='View/addList.php';
$repertoire=__DIR__.'/../../';
?>