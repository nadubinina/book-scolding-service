<?php

namespace App\Blocks\Pages;

use App\Blocks\DataListBlock;
use App\Models\Session;
use App\Models\SqlQueries\AbstractTableQueries;
use App\Models\SqlQueries\TableBookcaseQueries;
use App\Models\SqlQueries\TableCategoryQueries;
use App\Models\SqlQueries\TableCountryQueries;
use App\Models\SqlQueries\TableLibraryQueries;
use App\Models\SqlQueries\TablePublisherQueries;

class BaseLayoutForm extends BaseLayout
{
    protected ?string $layout =  null;
    protected ?string $title =  null;
    protected ?string $styles =  '/views/css/pages-styles/add-form-styles.css';
    protected $methods = [
        'list of possible locations' => [
            'class' => TableBookcaseQueries::class,
            'method' => 'getLocation'
        ],
        'list of possible categories (including parents)' => [
            'class' => TableCategoryQueries::class,
            'method' => 'getFullNamesAllCategories'
        ],
        'list of possible countries' => [
            'class' => TableCountryQueries::class,
            'method' => 'getCountries'
        ],
        'list of possible publishers' => [
            'class' => TablePublisherQueries::class,
            'method' => 'getNamePublishers'
        ],
        'list of possible library' => [
            'class' => TableLibraryQueries::class,
            'method' => 'getLibrary'
        ],
    ];

    public function render()
    {
        require APP_ROOT . '/views/html/pages/' . $this->layout;
    }

    public function renderToken()
    {
        require APP_ROOT . '/views/html/token.phtml';
    }

    public function renderDataList($receivedData)
    {
        $class = $this->methods[$receivedData]['class'];
        $method =  $this->methods[$receivedData]['method'];
        print $class;
        (new DataListBlock())
            ->setData($class::{$method}())
            ->render();
    }

    public function renderListLocation()
    {
        $this->renderDataList('list of possible locations');
    }

    public function renderCategoryListWithParents()
    {
        $this->renderDataList('list of possible categories (including parents)');
    }

    public function renderListCountry()
    {
        $this->renderDataList('list of possible countries');
    }

    public function renderListPublisher()
    {
        $this->renderDataList('list of possible publishers');
    }

    public function renderListLibrary()
    {
        $this->renderDataList('list of possible library');
    }

    public function getToken()
    {
        return Session::getToken();
    }
}
