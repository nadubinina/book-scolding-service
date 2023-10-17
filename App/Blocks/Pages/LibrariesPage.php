<?php

namespace App\Blocks\Pages;

use App\Models\Entities\DatabaseInformationHandler\EntitiesHandler;

class LibrariesPage extends BaseLayoutPage
{
    protected ?string $layout = 'libraries-page.phtml';
    protected ?string $title =  'Библиотеки';
    protected ?string $styles = '/views/css/pages-styles/libraries-page-styles.css';
}
