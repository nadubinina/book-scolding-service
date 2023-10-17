<?php

namespace App\Controllers;

use App\Blocks\Pages\NotFoundPage;
use App\Blocks\Pages\ServerErrorPage;

class ServerErrorController extends BaseController
{
    public function render()
    {
        (new ServerErrorPage())->render();
    }
}
