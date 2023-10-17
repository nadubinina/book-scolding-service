<?php

namespace App\Controllers;

use App\Blocks\Pages\PersonalAccountPage;
use App\CheckingDataCorrectness;
use App\Models\Session;
use App\Models\SqlQueries\TableUserQueries;

class PersonalAccountController extends BaseController
{
    public function render()
    {
        (new PersonalAccountPage())->render();
    }

    public function submitForm()
    {
        if (isset($_POST['logout'])) {
            Session::destroy();
            $this->redirect('');
        }
    }
}
