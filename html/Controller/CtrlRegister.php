<?php

class CtrlRegister {

function __construct() {
 // nécessaire pour utiliser variables globales
// on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
session_start();

//debut
//on initialise un tableau d'erreur

try{
$action=$_REQUEST['action'];

switch($action) {

//pas d'action, on r�initialise 1er appel
case NULL:
	$this->Reinit();
	break;

case "validationFormulaire":
	$this->ValidationFormulaire($dVueEreur);
	break;

//mauvaise action
default:
$dVueEreur[] =	"Erreur d'appel php";
require ($rep.$vues['vuephp1']);
break;
}

} catch (PDOException $e)
{
	//si erreur BD, pas le cas ici
	$dVueEreur[] =	"Erreur inattendue!!! ";
	require ($rep.$vues['erreur']);

}
catch (Exception $e2)
	{
	$dVueEreur[] =	"Erreur inattendue!!! ";
	require ($rep.$vues['erreur']);
	}


//fin
exit(0);
}//fin constructeur


function Reinit() {
	require ("../../View/Register.html");
}

function ValidationFormulaire(array $dVueEreur) {

//si exception, ca remonte !!!
 try{
    Validation::Valid_Mail($_GET["email"]);
    Validation::Valid_Pass($_GET["pass"]);
 } catch (Exception $ex) {
     $erreur = $ex->getMessage();
     require("../PHP/Erreur.php");
 }
 
$user = new User();
$data=$model->get_data();

}

}//fin class

?>

