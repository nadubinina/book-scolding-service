<?php

namespace App\Controllers;

use App\Blocks\Pages\AddBookPage;
use App\Blocks\Pages\UpdateBookPage;
use App\Blocks\Pages\UpdateLibraryPage;
use App\Controllers\BaseController;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableBookQueries;
use App\Models\SqlQueries\TableLibraryQueries;

class UpdateLibraryController extends BaseController
{
    public function render()
    {
        (new UpdateLibraryPage())
            ->setLibraryId($_GET['id'])
            ->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'library');
        $this->redirect('library?id=' . TableLibraryQueries::updateLibrary($prepareFormData));
    }
}
