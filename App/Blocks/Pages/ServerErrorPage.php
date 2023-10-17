<?php

namespace App\Blocks\Pages;

class ServerErrorPage extends BaseLayoutPage
{
    protected ?string $layout = 'server-error-page.phtml';
    protected ?string $title =  '500';
    protected ?string $styles = '/views/css/pages-styles/error-page-styles.css';
}
