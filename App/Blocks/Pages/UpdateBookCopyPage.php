<?php

namespace App\Blocks\Pages;

use App\Blocks\DataListBlock;
use App\Models\SqlQueries\TableBookcaseQueries;
use App\Models\SqlQueries\TableBookCopyQueries;

class UpdateBookCopyPage extends BaseLayoutForm
{
    protected ?string $layout = 'update-book-copy-page.phtml';
    protected ?string $title = 'Изменение копии книги';
    private $bookCopyId = null;

    public function getBookCopyId(): int
    {
        return $this->bookCopyId;
    }

    public function setBookCopyId($bookCopyId): self
    {
        $this->bookCopyId = $bookCopyId;
        return $this;
    }
}
