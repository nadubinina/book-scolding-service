<?php

namespace App\Blocks\Pages;

use App\Models\Entities\DatabaseInformation\User;
use App\Models\Session;
use App\Models\SqlQueries\TableUserQueries;

class PersonalAccountPage extends BaseLayoutForm
{
    protected ?string $layout = 'personal-account-page.phtml';
    protected ?string $title =  'Личный кабинет';
    protected ?string $styles = '/views/css/pages-styles/bookcase-page-styles.css';

    public function getUserInformation(): User
    {
        return TableUserQueries::getTableRecord(Session::getClientId());
    }
}
