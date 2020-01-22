<?php
require_once("Config.php");
$bdd = new SimpleXMLElement($config);
echo $bdd->dsn;
echo $bdd->user;
echo $bdd->pass;
?>