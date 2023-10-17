<?php

namespace App\Blocks\Pages;

use App\Blocks\DataListBlock;
use App\Models\SqlQueries\TableCountryQueries;
use App\Models\SqlQueries\TablePublisherQueries;

class AddBookPage extends BaseLayoutForm
{
    protected ?string $layout = 'add-book-page.phtml';
    protected ?string $title = 'Добавление книги';
}
