<?php

namespace sjsu_174\hw4; 

use sjsu_174\hw4\src\controllers as control; 

use monolog as SYC;

require_once("vendor/autoload.php");


if (!empty($_GET['d'])) {
	$controller = $_GET['d']; 
} 
else {
	$controller = 'LandingView'; 

}

if ($controller == 'LandingView') {
	require_once("./src/controllers/LandingConnector.php"); 
	$controllers = new control\LandingConnector(); 
}

$controllers->run(); 