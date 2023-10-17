<?php

namespace App\Controllers;

use App\Blocks\Pages\AddBookPage;
use App\Blocks\Pages\UpdateBookPage;
use App\Blocks\Pages\UpdatePublisherPage;
use App\Controllers\BaseController;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableBookQueries;
use App\Models\SqlQueries\TablePublisherQueries;

class UpdatePublisherController extends BaseController
{
    public function render()
    {
        (new UpdatePublisherPage())
            ->setPublisherId($_GET['id'])
            ->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'publisher');
        $this->redirect('publisher?id=' . TablePublisherQueries::updatePublisher($prepareFormData));
    }
}
