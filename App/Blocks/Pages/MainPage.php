<?php

namespace App\Blocks\Pages;

class MainPage extends BaseLayoutPage
{
    protected ?string $layout = 'main-page.phtml';

    protected ?string $title =  'Главная';
    protected ?string $styles = '/views/css/pages-styles/main-page-styles.css';
}
