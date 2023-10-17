<?php

namespace App\Controllers;

use App\Blocks\Pages\MyBooksPage;
use App\Controllers\BaseController;

class MyBooksController extends BaseController
{
    public function render()
    {
        (new MyBooksPage())->render();
    }
}
