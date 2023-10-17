<?php

namespace App\Controllers;

use App\Blocks\Pages\MainPage;

class MainPageController extends BaseController
{
    public function render()
    {
        (new MainPage())->render();
    }
}
