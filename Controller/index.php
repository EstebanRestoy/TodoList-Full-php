
<?PHP 
//chargement autoloader pour autochargement des classes
require("PHP/config.php");
require_once("Autoload.php");
Autoload::charger();
session_start();
//le fichier de conf avec les infos pour se co à la bdd
global $rep,$vues; 
$monFront = new ControllerFront();

//require("ControllerRegister.php");
//$cr = new ControllerRegister();
?>