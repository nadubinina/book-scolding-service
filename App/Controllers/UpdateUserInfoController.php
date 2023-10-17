<?php

namespace App\Controllers;

use App\Blocks\Pages\PersonalAccountPage;
use App\Blocks\Pages\UpdateUserInfoPage;
use App\CheckingDataCorrectness;
use App\Models\Services\SecurityService;
use App\Models\Session;
use App\Models\SqlQueries\TableUserQueries;
use App\Models\UserDataValidator;

class UpdateUserInfoController extends BaseController
{
    public function render()
    {
        (new UpdateUserInfoPage())->render();
    }

    public function submitForm()
    {
        if (isset($_POST['logout'])) {
            Session::destroy();
            $this->redirect('');
        } elseif (isset($_POST['update'])) {
            $isError = UserDataValidator::checkDataUpdate($_POST);
            $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'user_update');
            if ($isError == false) {
                TableUserQueries::updateUserInfo($prepareFormData);
                $this->redirect('personal-account');
            }

            $this->render();
        }
    }
}
