<?php

namespace App\Blocks\Pages;

use App\Models\Entities\DatabaseInformation\Category;
use App\Models\Entities\DatabaseInformationHandler\EntitiesHandler;

class CategoryPage extends BaseLayoutPage
{
    protected ?string $layout = 'category-page.phtml';
    protected ?string $title =  'Категория';
    protected ?string $styles = '/views/css/pages-styles/category-page-styles.css';
    private $id = null;

    public function getCategoryId(): int
    {
        return $this->id;
    }

    public function setCategoryId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function renderListCategoryBooks()
    {
        $this->renderSelectedDataList('all books related to the category');
    }
}
