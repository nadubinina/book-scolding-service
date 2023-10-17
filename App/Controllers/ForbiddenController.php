<?php

namespace App\Controllers;

use App\Blocks\Pages\NotFoundPage;

class ForbiddenController extends BaseController
{
    public function render()
    {
        (new ForbiddenPage())->render();
    }
}
