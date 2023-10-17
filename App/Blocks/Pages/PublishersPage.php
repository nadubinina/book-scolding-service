<?php

namespace App\Blocks\Pages;

use App\Models\Entities\DatabaseInformationHandler\EntitiesHandler;

class PublishersPage extends BaseLayoutPage
{
    protected ?string $layout = 'publishers-page.phtml';
    protected ?string $title =  'Авторы';
    protected ?string $styles = '/views/css/pages-styles/publishers-page-styles.css';
}
