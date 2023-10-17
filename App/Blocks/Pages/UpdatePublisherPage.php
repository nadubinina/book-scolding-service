<?php

namespace App\Blocks\Pages;

use App\Models\SqlQueries\TablePublisherQueries;

class UpdatePublisherPage extends BaseLayoutForm
{
    protected ?string $layout = 'update-publisher-page.phtml';
    protected ?string $title = 'Изменение писателя';
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
