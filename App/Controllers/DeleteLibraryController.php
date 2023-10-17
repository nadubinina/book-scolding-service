<?php

namespace App\Controllers;

use App\Blocks\Pages\AddBookPage;
use App\Blocks\Pages\DeleteBookPage;
use App\Blocks\Pages\DeleteLibraryPage;
use App\Blocks\Pages\UpdateBookPage;
use App\Controllers\BaseController;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableBookQueries;
use App\Models\SqlQueries\TableLibraryQueries;

class DeleteLibraryController extends BaseController
{
    public function render()
    {
        (new DeleteLibraryPage())
            ->setLibraryId($_GET['id'])
            ->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'library');
        TableLibraryQueries::deleteEntity($prepareFormData[':id']);
        $this->redirect('libraries');
    }
}
