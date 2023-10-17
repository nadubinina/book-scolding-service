<?php

namespace App\Controllers;

use App\Blocks\Pages\AddBookPage;
use App\Blocks\Pages\DeleteBookcasePage;
use App\Blocks\Pages\DeleteBookPage;
use App\Blocks\Pages\UpdateBookPage;
use App\Controllers\BaseController;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableBookcaseQueries;
use App\Models\SqlQueries\TableBookQueries;

class DeleteBookcaseController extends BaseController
{
    public function render()
    {
        (new DeleteBookcasePage())
            ->setBookcaseId($_GET['id'])
            ->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'bookcase');

        TableBookcaseQueries::deleteEntity($prepareFormData[':id']);
        $this->redirect('library?id=' . $prepareFormData[':library_id']);
    }
}
