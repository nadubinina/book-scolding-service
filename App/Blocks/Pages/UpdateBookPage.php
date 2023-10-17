<?php

namespace App\Blocks\Pages;

use App\Blocks\DataListBlock;
use App\Models\SqlQueries\TableBookQueries;
use App\Models\SqlQueries\TableCategoryQueries;
use App\Models\SqlQueries\TableCountryQueries;
use App\Models\SqlQueries\TablePublisherQueries;

class UpdateBookPage extends BaseLayoutForm
{
    protected ?string $layout = 'update-book-page.phtml';
    protected ?string $title = 'Изменение книги';
    private $bookId = null;

    public function getBookId(): int
    {
        return $this->bookId;
    }

    public function setBookId($bookId): self
    {
        $this->bookId = $bookId;
        return  $this;
    }
}
