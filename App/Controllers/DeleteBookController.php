<?php

namespace App\Controllers;

use App\Blocks\Pages\AddBookPage;
use App\Blocks\Pages\DeleteBookPage;
use App\Blocks\Pages\UpdateBookPage;
use App\Controllers\BaseController;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableBookQueries;

class DeleteBookController extends BaseController
{
    public function render()
    {
        (new DeleteBookPage())
            ->setBookId($_GET['id'])
            ->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'book');
        TableBookQueries::deleteEntity($prepareFormData[':id']);
        $this->redirect('books');
    }
}
