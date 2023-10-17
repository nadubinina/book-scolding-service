<?php

namespace App\Blocks\Pages;

use App\Models\Entities\DatabaseInformationHandler\EntitiesHandler;

class CategoriesPage extends BaseLayoutPage
{
    protected ?string $layout = 'categories-page.phtml';
    protected ?string $title =  'Категории';
    protected ?string $styles = '/views/css/pages-styles/categories-page-styles.css';
}
