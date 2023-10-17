<?php

namespace App\Blocks\Pages;

use App\Blocks\ListBlock;
use App\Models\Entities\DatabaseInformation\Bookcase;
use App\Models\Entities\DatabaseInformationHandler\EntitiesHandler;
use App\Models\SqlQueries\TableBookCopyQueries;

class BookcasePage extends BaseLayoutPage
{
    protected ?string $layout = 'bookcase-page.phtml';
    protected ?string $title =  'Книжный шкаф';
    protected ?string $styles = '/views/css/pages-styles/bookcase-page-styles.css';
    private $id = null;
    protected ?Bookcase $bookcase = null;

    public function getBookcaseId(): int
    {
        return $this->id;
    }

    public function setBookcaseId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function renderListBookcaseBooks()
    {
        $this->renderSelectedDataList('all the books from the bookcase');
    }
}
