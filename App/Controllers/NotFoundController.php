<?php

namespace App\Controllers;

use App\Blocks\Pages\NotFoundPage;

class NotFoundController extends BaseController
{
    public function render()
    {
        (new NotFoundPage())->render();
    }
}
