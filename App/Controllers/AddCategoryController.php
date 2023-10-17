<?php

namespace App\Controllers;

use App\Blocks\Pages\AddBookPage;
use App\Blocks\Pages\AddCategoryPage;
use App\Controllers\BaseController;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableCategoryQueries;

class AddCategoryController extends BaseController
{
    public function render()
    {
        (new AddCategoryPage())->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'category');
        $this->redirect('category?id=' . TableCategoryQueries::addCategory($prepareFormData));
    }
}
