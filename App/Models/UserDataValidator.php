<?php

namespace App\Models;

use App\Models\Services\SecurityService;
use App\Models\SqlQueries\TableUserQueries;

class UserDataValidator
{
    public static function checkDataSignUp($submittedFormData): bool
    {
        if (self::checkIsLogin($submittedFormData)) {
            return true;
        } else {
            return SecurityService::checkPasswordConsistency($submittedFormData);
        }
    }

    public static function checkDataUpdate($submittedFormData): bool
    {
        $oldDataUser = TableUserQueries::getTableRecord(Session::getClientId());
        $isNewLogin = false;
        if (($oldDataUser->getLogin() !== $submittedFormData['login'])) {
            $isNewLogin = true;
            if (UserDataValidator::checkIsLogin($submittedFormData)) {
                return true;
            };
        }

        if (!($isNewLogin) && ($submittedFormData['old_password'] == '')) {
            Session::setError('Вы не внесли изменения');
            return true;
        }

        return SecurityService::checkUpdatePasswords($submittedFormData);
    }

    public static function checkIsLogin($submittedFormData): bool
    {
        if (TableUserQueries::isSetLogin($submittedFormData['login'])) {
            Session::setError('Пользоваеть с таким Логином уже зарегестрирован');
            return true;
        }
        return false;
    }
}
