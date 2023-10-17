<?php

namespace App\Controllers;

use App\Blocks\Pages\CountryPage;

class CountryController extends BaseController
{
    protected $id = null;

    public function render()
    {
        (new CountryPage())
            ->setCountryId($this->id)
            ->render();
    }
}
