<?php

namespace App\Blocks\Pages;

use App\Blocks\Pages\BaseLayoutForm;

class LoginPage extends BaseLayoutForm
{
    protected ?string $layout = 'login-page.phtml';
    protected ?string $title = 'Авторизация';
}
