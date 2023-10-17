<?php

namespace App\Blocks\Pages;

class DeleteCategoryPage extends BaseLayoutForm
{
    protected ?string $layout = 'delete-category-page.phtml';
    protected ?string $title = 'Удаление категории';
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
