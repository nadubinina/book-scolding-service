<?php

namespace App\Blocks\Pages;

use App\Blocks\DataListBlock;
use App\Models\SqlQueries\TableBookcaseQueries;

class AddBookcasePage extends BaseLayoutForm
{
    protected ?string $layout = 'add-bookcase-page.phtml';
    protected ?string $title = 'Добавление книжного стелажа';

    public function getTitle(): string
    {
        return $this->title;
    }

    private $libraryId = null;

    public function getLibraryId()
    {
        return $this->libraryId;
    }

    public function setLibraryId($libraryId): self
    {
        $this->libraryId = $libraryId;
        return $this;
    }
}
