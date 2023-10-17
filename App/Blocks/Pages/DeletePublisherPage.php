<?php

namespace App\Blocks\Pages;

class DeletePublisherPage extends BaseLayoutForm
{
    protected ?string $layout = 'delete-publisher-page.phtml';
    protected ?string $title = 'Удаление писателя';
    private $publisherId = null;

    public function getPublisherId(): int
    {
        return $this->publisherId;
    }

    public function setPublisherId($publisherId): self
    {
        $this->publisherId = $publisherId;
        return $this;
    }
}
