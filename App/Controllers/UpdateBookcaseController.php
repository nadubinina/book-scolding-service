<?php

namespace App\Controllers;

use App\Blocks\Pages\AddBookPage;
use App\Blocks\Pages\UpdateBookcasePage;
use App\Blocks\Pages\UpdateBookPage;
use App\Controllers\BaseController;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableBookcaseQueries;
use App\Models\SqlQueries\TableBookQueries;

class UpdateBookcaseController extends BaseController
{
    public function render()
    {
        (new UpdateBookcasePage())
            ->setBookcaseId($_GET['id'])
            ->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'bookcase');
        $this->redirect('bookcase?id=' . TableBookcaseQueries::updateBookcase($prepareFormData));
    }
}
