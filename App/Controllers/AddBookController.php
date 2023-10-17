<?php

namespace App\Controllers;

use App\Blocks\Pages\AddBookPage;
use App\Controllers\BaseController;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableBookQueries;

class AddBookController extends BaseController
{
    public function render()
    {
        (new AddBookPage())->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'book');
        $this->redirect('book?id=' . TableBookQueries::addBook($prepareFormData));
    }
}
