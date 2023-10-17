<?php

namespace App\Blocks\Pages;

class DeleteBookCopyPage extends BaseLayoutForm
{
    protected ?string $layout = 'delete-book-copy-page.phtml';
    protected ?string $title = 'Удаление копии книги';
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
