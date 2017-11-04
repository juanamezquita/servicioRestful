<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '/vendor/autoload.php';

require '/scr/config/db.php';
//implementacion del app Slim para generar el servicio restful
$app = new \Slim\App;

//customer Routes
require '/scr/routes/sensores.php';

$app->run();
?>
