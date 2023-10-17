<?php

namespace App\Controllers;

use App\Blocks\Pages\AddBookCopyPage;
use App\Blocks\Pages\AddBookPage;
use App\Controllers\BaseController;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableBookCopyQueries;

class AddBookCopyController extends BaseController
{
    public function render()
    {
        (new AddBookCopyPage())
            ->setBookId($_GET['book-id'])
            ->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'book_copy');
        $this->redirect('book?id=' . TableBookCopyQueries::addBookCopy($prepareFormData));
    }
}
