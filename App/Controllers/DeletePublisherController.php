<?php

namespace App\Controllers;

use App\Blocks\Pages\AddBookPage;
use App\Blocks\Pages\DeleteBookcasePage;
use App\Blocks\Pages\DeleteBookCopyPage;
use App\Blocks\Pages\DeleteBookPage;
use App\Blocks\Pages\DeletePublisherPage;
use App\Blocks\Pages\UpdateBookPage;
use App\Controllers\BaseController;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableBookCopyQueries;
use App\Models\SqlQueries\TableBookQueries;
use App\Models\SqlQueries\TablePublisherQueries;

class DeletePublisherController extends BaseController
{
    public function render()
    {
        (new DeletePublisherPage())
            ->setPublisherId($_GET['id'])
            ->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'publisher');
        TablePublisherQueries::deleteEntity($prepareFormData[':id']);
        $this->redirect('publishers');
    }
}
