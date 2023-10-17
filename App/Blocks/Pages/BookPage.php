<?php

namespace App\Blocks\Pages;

use App\Blocks\AbstractBlock;
use App\Blocks\LinkBlock;
use App\Blocks\ListBlock;
use App\Models\Entities\DatabaseInformation\Book;
use App\Models\Entities\DatabaseInformation\Country;
use App\Models\Entities\DatabaseInformation\Publisher;
use App\Models\Entities\DatabaseInformationHandler\EntitiesHandler;
use App\Models\SqlQueries\TableBookCopyQueries;
use App\Models\SqlQueries\TableCategoryQueries;
use App\Models\SqlQueries\TableCountryQueries;
use App\Models\SqlQueries\TablePublisherQueries;

class BookPage extends BaseLayoutPage
{
    protected ?string $layout = 'book-page.phtml';
    protected ?string $title =  'Книга';
    protected ?string $styles = '/views/css/pages-styles/book-page-styles.css';
    protected ?Book $book = null;
    private $id = null;

    public function getBookId(): int
    {
        return $this->id;
    }

    public function setBookId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getCategoryListBlock(): AbstractBlock
    {
        $block = new AbstractBlock();
        $dataBlock = TableCategoryQueries::getBookCategories($this->book->getCategoryId());
        $block->setData($dataBlock);
        $block->setBlockLink('book-categories-list.phtml');

        $block->setPageLink('/category')
            ->render();
        return $block;
    }

    public function renderLinkCountry()
    {
        (new LinkBlock())
            ->setData(TableCountryQueries::getTableRecord($this->book->getCountryId()))
            ->setPageLink('/country?id=' . $this->book->getCountryId())
            ->render();
    }

    public function renderLinkPublisher()
    {
        (new LinkBlock())
            ->setData(TablePublisherQueries::getTableRecord($this->book->getPublisherId()))
            ->setPageLink('/publisher?id=' . $this->book->getPublisherId())
            ->render();
    }

    public function renderListBookCopy()
    {
        $this->renderSelectedDataList('all copies of the book');
    }
}
