<?php

namespace App;

use App\Exceptions\ForbiddenException;
use App\Exceptions\NotFoundException;
use App\Exceptions\ServerErrorException;
use App\Models\Session;
use App\Models\SqlQueries\AbstractTableQueries;

class Router
{
    private $classController = null;
    private $method = null;
    private ?string $tableName = null;
    public const GET = 'GET';
    public const POST = 'POST';

    public function goToPage($uri): bool
    {
        $this->hendlerUri($uri);
        $this->createNewController($this->classController)
            ->{$this->method}();

        return true;
    }

    public function hendlerUri(string $uri)
    {
        Session::start();

        if (http_response_code() == 500) {
            throw new ServerErrorException();
        }
        if (!($uri === '/' || $uri === '/index')) {
            $uri = ltrim($uri, '/');
            $uriSplit = explode("?", $uri);

            $page = $uriSplit[0];

            $pageSplit = explode("-", $page);
            $pageName = null;
            $this->tableName = null;

            foreach ($pageSplit as $word) {
                $pageName .= ucfirst($word);
                $this->tableName .= $word . '_';
            }

            $this->tableName = substr($this->tableName, 0, -1);
            $this->tableName = str_replace("delete_", '', $this->tableName);
            $this->tableName = str_replace("add_", '', $this->tableName);
            $this->tableName = str_replace("update_", '', $this->tableName);

            $classController = $pageName . 'Controller';

            $allControllers = FileFinder::findControllers();
            if (!in_array($classController, $allControllers)) {
                http_response_code(404);
                throw new NotFoundException();
            }
        } else {
            $classController = 'MainPageController';
        }

        switch ($_SERVER['REQUEST_METHOD']) {
        //switch (self::GET) {
            case (self::GET):
                $this->classController = $classController;
                $this->method = 'render';
                break;
            case (self::POST):
                if (!($classController == 'LoginController' || $classController == 'RegistrationController')) {
                    if (Session::getToken() != $_POST['token'] || Session::getToken() == null) {
                        http_response_code(403);
                        throw new ForbiddenException();
                    }
                }

                $this->classController = $classController;
                $this->method = 'submitForm';
                break;
        }
    }

    protected function createNewController($className)
    {
        $classController = 'App\\Controllers\\' . $className;
        $classController = new $classController();

        if (isset($_GET['id'])) {
            $classController->setEntityId($_GET['id'], $this->tableName);
        }

        return $classController;
    }
}
