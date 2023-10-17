<?php

namespace App\Controllers;

use App\Blocks\Pages\AddBookPage;
use App\Blocks\Pages\DeleteBookPage;
use App\Blocks\Pages\DeleteCategoryPage;
use App\Blocks\Pages\UpdateBookPage;
use App\Controllers\BaseController;
use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableBookQueries;
use App\Models\SqlQueries\TableCategoryQueries;

class DeleteCategoryController extends BaseController
{
    public function render()
    {
        (new DeleteCategoryPage())
            ->setCategoryId($_GET['id'])
            ->render();
    }

    public function submitForm()
    {
        $prepareFormData = SecurityService::prepareDataForQuery($_POST, 'category');
        TableCategoryQueries::deleteCategory($prepareFormData[':id'], $prepareFormData[':parent_id']);
        $this->redirect('categories');
    }
}
