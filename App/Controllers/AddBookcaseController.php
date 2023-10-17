<?php

namespace App\Controllers;

use App\Blocks\Pages\AddBookcasePage;
use App\Blocks\Pages\AddLibraryPage;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableBookcaseQueries;

class AddBookcaseController extends BaseController
{
    public function render()
    {
        (new AddBookcasePage())
            ->setLibraryId($_GET['library-id'])
            ->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'bookcase');
        $this->redirect('bookcase?id=' . TableBookcaseQueries::addBookcase($prepareFormData));
    }
}
