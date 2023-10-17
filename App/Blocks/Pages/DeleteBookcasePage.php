<?php

namespace App\Blocks\Pages;

class DeleteBookcasePage extends BaseLayoutForm
{
    protected ?string $layout = 'delete-bookcase-page.phtml';
    protected ?string $title = 'Удаление книжного шкафа';
    private $bookcaseId = null;

    public function getBookcaseId(): int
    {
        return $this->bookcaseId;
    }

    public function setBookcaseId($bookcaseId): self
    {
        $this->bookcaseId = $bookcaseId;
        return  $this;
    }
}
