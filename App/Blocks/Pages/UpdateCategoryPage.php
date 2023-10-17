<?php

namespace App\Blocks\Pages;

use App\Blocks\DataListBlock;
use App\Models\Entities\DatabaseInformation\Category;
use App\Models\SqlQueries\TableCategoryQueries;

class UpdateCategoryPage extends BaseLayoutForm
{
    protected ?string $layout = 'update-category-page.phtml';
    protected ?string $title = 'Изменение категории';
    private $categoryId = null;

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function setCategoryId($categoryId): self
    {
        $this->categoryId = $categoryId;
        return $this;
    }
}
