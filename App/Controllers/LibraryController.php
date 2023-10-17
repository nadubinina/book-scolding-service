<?php

namespace App\Controllers;

use App\Blocks\Pages\LibraryPage;

class LibraryController extends BaseController
{
    protected $id = null;

    public function render()
    {
        (new LibraryPage())
            ->setLibraryId($this->id)
            ->render();
    }
}
