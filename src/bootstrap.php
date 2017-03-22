<?php

use Respect\Rest\Router;
use API\Http\Middleware\Authenticator;
use \API\Http\Exception\InvalidRequestException;
use \API\Http\Exception\UnauthorizedException;

require_once __DIR__."/../vendor/autoload.php";


$router = new Respect\Rest\Router();
$router->isAutoDispatched = false;

$router->get("/", function() {
    echo "iniciando projeto";
})->by(new Authenticator());

try {
    echo $router->run();
} catch(InvalidRequestException $e) {
    header('HTTP/1.1 400 Invalid');
    echo json_encode([
        "error" => $e->getMessage()
    ]);
} catch(UnauthorizedException $e) {
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode([
        "error" => $e->getMessage()
    ]);
} catch(\Exception $e) {
    header('HTTP/1.1 500');
    echo json_encode([
        "error" => "erro não esperado"
    ]);
}
