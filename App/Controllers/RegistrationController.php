<?php

namespace App\Controllers;

use App\Blocks\Pages\RegistrationPage;
use App\CheckingDataCorrectness;
use App\Models\Services\SecurityService;
use App\Models\Session;
use App\Models\SqlQueries\TableUserQueries;
use App\Models\UserDataValidator;

class RegistrationController extends BaseController
{
    public function render()
    {
        (new RegistrationPage())->render();
    }

    public function submitForm()
    {
        $isError = UserDataValidator::checkDataSignUp($_POST);
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'user_sign_up');

        if ($isError == false) {
            $clientId = TableUserQueries::signUp($prepareFormData);

            Session::setClientId($clientId);
            $this->redirect('personal-account');
        } else {
            $this->render();
        }
    }
}
