<?php

namespace App\Blocks\Pages;

class DeleteBookPage extends BaseLayoutForm
{
    protected ?string $layout = 'delete-book-page.phtml';
    protected ?string $title = 'Удаление книги';
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
