<?php

namespace App\Blocks\Pages;

class ForbiddenPage extends BaseLayoutPage
{
    protected ?string $layout = 'forbidden-page.phtml';

    protected ?string $title =  '403';
    protected ?string $styles = '/views/css/pages-styles/error-page-styles.css';
}
