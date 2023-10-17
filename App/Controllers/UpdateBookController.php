<?php

namespace App\Controllers;

use App\Blocks\Pages\AddBookPage;
use App\Blocks\Pages\UpdateBookPage;
use App\Controllers\BaseController;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableBookQueries;

class UpdateBookController extends BaseController
{
    public function render()
    {
        (new UpdateBookPage())
            ->setBookId($_GET['id'])
            ->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'book');
        $this->redirect('book?id=' . TableBookQueries::updateBook($prepareFormData));
    }
}
