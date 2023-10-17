<?php

namespace App\Controllers;

use App\Blocks\Pages\UpdateBookCopyPage;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableBookCopyQueries;

class UpdateBookCopyController extends BaseController
{
    public function render()
    {
        (new UpdateBookCopyPage())
            ->setBookCopyId($_GET['id'])
            ->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'book_copy');
        $this->redirect('book-copy?id=' . TableBookCopyQueries::updateBookCopy($prepareFormData));
    }
}
