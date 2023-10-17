<?php

namespace App\Controllers;

use App\Blocks\Pages\AddBookPage;
use App\Blocks\Pages\AddPublisherPage;
use App\Controllers\BaseController;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TablePublisherQueries;

class AddPublisherController extends BaseController
{
    public function render()
    {
        (new AddPublisherPage())->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'publisher');
        $this->redirect('publisher?id=' . TablePublisherQueries::addPublisher($prepareFormData));
    }
}
