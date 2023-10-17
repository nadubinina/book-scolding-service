<?php

namespace App\Blocks\Pages;

use App\Models\Entities\DatabaseInformation\Publisher;
use App\Models\Entities\DatabaseInformationHandler\EntitiesHandler;

class PublisherPage extends BaseLayoutPage
{
    protected ?string $layout = 'publisher-page.phtml';
    protected ?string $title =  'Писатель';
    protected ?string $styles = '/views/css/pages-styles/publisher-page-styles.css';
    protected $id = null;

    public function getPublisherId(): int
    {
        return $this->id;
    }

    public function setPublisherId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function renderListPublisherBooks()
    {
        $this->renderSelectedDataList('all the publisher books');
    }
}
