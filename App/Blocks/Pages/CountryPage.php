<?php

namespace App\Blocks\Pages;

use App\Models\Entities\DatabaseInformation\Country;
use App\Models\Entities\DatabaseInformationHandler\EntitiesHandler;

class CountryPage extends BaseLayoutPage
{
    protected ?string $layout = 'country-page.phtml';
    protected ?string $title =  'Страна';
    protected ?string $styles = '/views/css/pages-styles/country-page-styles.css';
    private $id = null;

    public function getCountryId(): int
    {
        return $this->id;
    }

    public function setCountryId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function renderListCountry()
    {
        $this->renderSelectedDataList('all books published in the country');
    }
}
