<?php

// getting the autoloader from the vendor folder in the root of the projet
require dirname(__DIR__) . "/vendor/autoload.php";

use App\Controller\ErrorsController;
use App\Routing;
use App\WebApp;

$routing = new Routing();
$requestedRoute = $routing->getClientUri();
try {
    $routing->checkIfRouteMatches($requestedRoute);
    // in `$ctlrInfo` I have both the controller and the method to trigger
    $ctlrInfo = $routing->getCtlrInfo($requestedRoute);
    // app instanciates the controller and displays the page
    (new WebApp())->setControllerFromInfo($ctlrInfo)->outputResponse();
} catch (Exception $e) {
    $ctlr = new ErrorsController();
    echo $ctlr->index();
}