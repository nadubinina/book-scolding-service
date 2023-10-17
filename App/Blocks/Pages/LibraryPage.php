<?php

namespace App\Blocks\Pages;

use App\Models\Entities\DatabaseInformation\Library;
use App\Models\Entities\DatabaseInformationHandler\EntitiesHandler;
use App\Models\SqlQueries\TableLibraryQueries;

class LibraryPage extends BaseLayoutPage
{
    protected ?string $layout = 'library-page.phtml';
    protected ?string $title =  'Библиотека';
    protected ?string $styles = '/views/css/pages-styles/library-page-styles.css';
    private $id = null;

    public function getLibraryId(): int
    {
        return $this->id;
    }

    public function setLibraryId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public static function getNumberOfBooks($libraryData): int
    {
        return TableLibraryQueries::setNumberOfBooks($libraryData->getId());
    }

    public function renderListLibraryBookcases()
    {
        $this->renderSelectedDataList('bookcases located in the library');
    }
}
