<?php

namespace App\Blocks\Pages;

use App\Models\Entities\DatabaseInformation\User;
use App\Models\Session;
use App\Models\SqlQueries\TableUserQueries;

class UpdateUserInfoPage extends BaseLayoutForm
{
    protected ?string $layout = 'update-user-info-page.phtml';
    protected ?string $title =  'Изменение личной информации';
    protected ?string $styles = '/views/css/pages-styles/bookcase-page-styles.css';

    public function getUserInformation(): User
    {

        return TableUserQueries::getTableRecord(Session::getClientId());
    }
}
