<?php

namespace App\Controllers;

use App\Blocks\Pages\PublishersPage;

class PublishersController extends BaseController
{
    public function render()
    {
        (new PublishersPage())
            ->render();
    }
}
