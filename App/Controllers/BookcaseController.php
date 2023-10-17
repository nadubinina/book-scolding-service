<?php

namespace App\Controllers;

use App\Blocks\Pages\BookcasePage;

class BookcaseController extends BaseController
{
    protected $id = null;

    public function render()
    {
        (new BookcasePage())
            ->setBookcaseId($this->id)
            ->render();
    }
}
