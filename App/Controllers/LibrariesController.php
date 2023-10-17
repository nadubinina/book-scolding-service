<?php

namespace App\Controllers;

use App\Blocks\Pages\LibrariesPage;

class LibrariesController extends BaseController
{
    public function render()
    {
        (new LibrariesPage())->render();
    }
}
