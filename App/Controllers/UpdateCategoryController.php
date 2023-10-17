<?php

namespace App\Controllers;

use App\Blocks\Pages\AddBookPage;
use App\Blocks\Pages\UpdateBookPage;
use App\Blocks\Pages\UpdateCategoryPage;
use App\Controllers\BaseController;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableBookQueries;
use App\Models\SqlQueries\TableCategoryQueries;

class UpdateCategoryController extends BaseController
{
    public function render()
    {
        (new UpdateCategoryPage())
            ->setCategoryId($_GET['id'])
            ->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'category');
        $this->redirect('category?id=' . TableCategoryQueries::updateCategory($prepareFormData));
    }
}
