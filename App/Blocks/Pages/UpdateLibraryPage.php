<?php

namespace App\Blocks\Pages;

use App\Models\SqlQueries\TableLibraryQueries;

class UpdateLibraryPage extends BaseLayoutForm
{
    protected ?string $layout = 'update-library-page.phtml';
    protected ?string $title = 'Изменение библиотеки';
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
