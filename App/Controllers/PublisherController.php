<?php

namespace App\Controllers;

use App\Blocks\Pages\PublisherPage;

class PublisherController extends BaseController
{
    protected $id = null;

    public function render()
    {
        (new PublisherPage())
            ->setPublisherId($this->id)
            ->render();
    }
}
