<?php

namespace App\Controllers;

use App\Blocks\Pages\AddBookPage;
use App\Blocks\Pages\BooksPage;
use App\Database;

class BooksController extends BaseController
{
    public function render()
    {
        (new BooksPage())->render();
    }
}
