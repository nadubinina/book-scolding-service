<?php

namespace App\Blocks\Pages;

use App\Blocks\ListBlock;
use App\Blocks\Pages\BaseLayoutPage;
use App\Models\Session;
use App\Models\SqlQueries\TableUserQueries;

class MyBooksPage extends BaseLayoutPage
{
    protected ?string $layout = 'my-books-page.phtml';
    protected ?string $title =  'Мои книги';
    protected ?string $styles = '/views/css/pages-styles/books-page-styles.css';

    public function renderListMyBooks()
    {
        (new ListBlock())
            ->setData(TableUserQueries::getListMyBooks(Session::getClientId()))
            ->setPageLink('/book-copy')
            ->render();
    }
}
