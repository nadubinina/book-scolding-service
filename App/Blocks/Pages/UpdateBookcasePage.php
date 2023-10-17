<?php

namespace App\Blocks\Pages;

use App\Blocks\DataListBlock;
use App\Models\SqlQueries\TableBookcaseQueries;
use App\Models\SqlQueries\TableLibraryQueries;

class UpdateBookcasePage extends BaseLayoutForm
{
    protected ?string $layout = 'update-bookcase-page.phtml';
    protected ?string $title = 'Изменение книжного шкафа';
    private $bookcaseId = null;

    public function getBookcaseId(): int
    {
        return $this->bookcaseId;
    }

    public function setBookcaseId($bookcaseId): self
    {
        $this->bookcaseId = $bookcaseId;
        return $this;
    }
}
