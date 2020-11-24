<?php

$path = $_SERVER['DOCUMENT_ROOT']; 

require_once($path.'/hw4/vendor/autoload.php');
use MonologLogger;
use MonologHandlerStreamHandler;
use MonologHandlerFirePHPHandler;

$logger = new Logger('logger');
$logger->pushHandler(new StreamHandler('jigsaw.log', Logger::DEBUG));
$logger->pushHandler(new FirePHPHandler());
$logger->error('Logger is now Ready');

?>