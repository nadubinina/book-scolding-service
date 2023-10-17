<?php

namespace App\Controllers;

use App\Blocks\Pages\CategoriesPage;

class CategoriesController extends BaseController
{
    public function render()
    {
        (new CategoriesPage())->render();
    }
}
