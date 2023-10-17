<?php

namespace App\Blocks\Pages;

class DeleteLibraryPage extends BaseLayoutForm
{
    protected ?string $layout = 'delete-library-page.phtml';
    protected ?string $title = 'Удаление библиотеки';
    private $libraryId = null;

    public function getLibraryId(): int
    {
        return $this->libraryId;
    }

    public function setLibraryId($libraryId): self
    {
        $this->libraryId = $libraryId;
        return $this;
    }
}
