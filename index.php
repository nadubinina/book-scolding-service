<?php
require_once 'vendor/autoload.php';

use App\Blocks\Pages\ForbiddenPage;
use App\Blocks\Pages\NotFoundPage;
use App\Blocks\Pages\ServerErrorPage;
use App\Exceptions\ForbiddenException;
use App\Exceptions\NotFoundException;
use App\Exceptions\ServerErrorException;
use App\Models\Session;
use App\Router;
const APP_ROOT =  __DIR__;

error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $requestUri = $_SERVER['REQUEST_URI'] ?? null;
    $router = new Router();
    $router->goToPage($requestUri);
} catch (NotFoundException $e) {
    (new NotFoundPage())->render();
} catch (ServerErrorException $e) {
    (new ServerErrorPage())->render();
} catch (ForbiddenException $e) {
    (new ForbiddenPage())->render();
}



