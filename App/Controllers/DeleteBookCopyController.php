<?php

namespace App\Controllers;

use App\Blocks\Pages\AddBookPage;
use App\Blocks\Pages\DeleteBookcasePage;
use App\Blocks\Pages\DeleteBookCopyPage;
use App\Blocks\Pages\DeleteBookPage;
use App\Blocks\Pages\UpdateBookPage;
use App\Controllers\BaseController;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableBookCopyQueries;
use App\Models\SqlQueries\TableBookQueries;

class DeleteBookCopyController extends BaseController
{
    public function render()
    {
        (new DeleteBookcasePage())
            ->setBookcaseId($_GET['id'])
            ->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'book_copy');
        TableBookCopyQueries::deleteEntity($prepareFormData[':id']);
        $this->redirect('bookcase?id=' . $prepareFormData[':bookcase_id']);
    }
}
