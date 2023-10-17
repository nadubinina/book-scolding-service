<?php

namespace App\Controllers;

use App\Blocks\Pages\CategoryPage;

class CategoryController extends BaseController
{
    protected $id = null;

    public function render()
    {
        (new CategoryPage())
            ->setCategoryId($this->id)
            ->render();
    }
}
