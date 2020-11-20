<?php 

namespace sjsu_174\hw4\src\controllers; 

use sjsu_174\hw4\src\views as views; 



class LandingConnector {

	private $view; 


	function __construct() {
		
		require_once("./src/views/LandingView.php"); 
		$this->$view = new views\LandingView(); 
	}

	function run() {
		$this->$view->display(); 
	}
}