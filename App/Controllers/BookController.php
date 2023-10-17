<?php

namespace App\Controllers;

use App\Blocks\Pages\BookPage;
use App\Blocks\Pages\BooksPage;

class BookController extends BaseController
{
    protected $id = null;

    public function render()
    {
        (new BookPage())
            ->setBookId($this->id)
            ->render();
    }
}
