<?php

namespace App\Blocks\Pages;

use App\Models\Entities\DatabaseInformationHandler\EntitiesHandler;

class BooksPage extends BaseLayoutPage
{
    protected ?string $layout = 'books-page.phtml';
    protected ?string $title =  'Книги';
    protected ?string $styles = '/views/css/pages-styles/books-page-styles.css';
}
