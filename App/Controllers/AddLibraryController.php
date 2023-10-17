<?php

namespace App\Controllers;

use App\Blocks\Pages\AddLibraryPage;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableLibraryQueries;

class AddLibraryController extends BaseController
{
    public function render()
    {
        (new AddLibraryPage())->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'library');
        $this->redirect('library?id=' . TableLibraryQueries::addLibrary($prepareFormData));
    }
}
