<?php

namespace App\Controllers;

use App\Blocks\Pages\LoginPage;
use App\Controllers\BaseController;
use App\Models\Services\AuthService;
use App\Models\Services\SecurityService;
use App\Models\Session;
use App\Models\SqlQueries\TablePublisherQueries;
use App\Models\SqlQueries\TableUserQueries;

class LoginController extends BaseController
{
    public function render()
    {
        (new LoginPage())->render();
    }

    public function submitForm()
    {
        $id = AuthService::signIn($_POST);
        if (isset($id)) {
            Session::setClientId($id);
            $this->redirect('');
        } else {
            $this->render();
        }
    }
}
