<?php

namespace App\Blocks\Pages;

use App\Blocks\DataListBlock;
use App\Models\SqlQueries\TableBookcaseQueries;
use App\Models\SqlQueries\TableBookCopyQueries;

class AddBookCopyPage extends BaseLayoutForm
{
    protected ?string $layout = 'add-book-copy-page.phtml';
    protected ?string $title = 'Добавление копии книги';

    private $bookId = null;

    public function getBookId()
    {
        return $this->bookId;
    }

    public function setBookId($bookId): self
    {
        $this->bookId = $bookId;
        return  $this;
    }
}
