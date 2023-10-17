<?php

namespace App\Blocks\Pages;

use App\Blocks\ListBlock;
use App\Models\SqlQueries\AbstractTableQueries;
use App\Models\SqlQueries\TableBookcaseQueries;
use App\Models\SqlQueries\TableBookCopyQueries;
use App\Models\SqlQueries\TableBookQueries;
use App\Models\SqlQueries\TableUserQueries;

class BaseLayoutPage extends BaseLayout
{
    protected ?string $layout =  'main-page.phtml';
    protected ?string $title =  'Главная страница';
    protected ?string $styles =  '/views/css/pages-styles/main-page-styles.css';
    protected $methods = [
        'all copies of the book' => [
            'class' => TableBookCopyQueries::class,
            'method' => 'getBooksCopy',
            'entity' => 'book',
            'linkCard' => 'book',
            'getFieldEntity' => 'getId',
        ],
        'all books related to the category' => [
            'class' => TableBookQueries::class,
            'method' => 'getCategoryBooks',
            'entity' => 'category',
            'linkCard' => 'book',
            'getFieldEntity' => 'getId',
        ],
        'all the books from the bookcase' => [
            'class' => TableBookCopyQueries::class,
            'method' => 'getBookBookcase',
            'entity' => 'bookcase',
            'linkCard' => 'book-copy',
            'getFieldEntity' => 'getId',
        ],
        'all books published in the country' => [
            'class' => TableBookQueries::class,
            'method' => 'getCountryBooks',
            'entity' => 'country',
            'linkCard' => 'book',
            'getFieldEntity' => 'getId',
        ],
        'bookcases located in the library' => [
            'class' => TableBookcaseQueries::class,
            'method' => 'getLibraryBookcase',
            'entity' => 'library',
            'linkCard' => 'bookcase',
            'getFieldEntity' => 'getId',
        ],
        'all the publisher books' => [
            'class' => TableBookQueries::class,
            'method' => 'getPublisherBooks',
            'entity' => 'publisher',
            'linkCard' => 'book',
            'getFieldEntity' => 'getId',
        ],
    ];

    public function render()
    {
        require APP_ROOT . '/views/html/pages/' . $this->layout;
    }

    public function renderSeparator()
    {
        include 'views/html/information-separator.phtml';
    }

    public function addNameEntityInTitle($name): self
    {
        $this->title .= ' ' . $name;
        return $this;
    }

    public static function renderListEntity($entity)
    {
        $entityLink = str_replace('_', '-', $entity);

        (new ListBlock())
            ->setData(AbstractTableQueries::getTableAllRecords($entity))
            ->setPageLink('/' . $entityLink)
            ->render();
    }

    public function renderSelectedDataList($receivedData)
    {
        $class = $this->methods[$receivedData]['class'];
        $method = $this->methods[$receivedData]['method'];
        $entity = $this->methods[$receivedData]['entity'];
        $getFieldEntity = $this->methods[$receivedData]['getFieldEntity'];
        $entityLink = $this->methods[$receivedData]['linkCard'];
        (new ListBlock())
            ->setData($class::{$method}($this->{$entity}->{$getFieldEntity}()))
            ->setPageLink('/' . $entityLink)
            ->render();
    }
}
