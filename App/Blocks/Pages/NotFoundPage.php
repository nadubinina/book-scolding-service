<?php

namespace App\Blocks\Pages;

class NotFoundPage extends BaseLayoutPage
{
    protected ?string $layout = 'not-found-page.phtml';

    protected ?string $title =  '404';
    protected ?string $styles = '/views/css/pages-styles/error-page-styles.css';
}
