<?php

namespace App\Models\Services;

use App\Models\Session;
use App\Models\SqlQueries\AbstractTableQueries;
use App\Models\SqlQueries\TableUserQueries;

class SecurityService
{
    private static $fieldsTables = [
        'user_update' => ['login', 'password', 'repeat_password', 'old_password'],
        'user_sign_up' => ['login', 'password', 'repeat_password'],
        'book' => ['name', 'country_id', 'publisher_id', 'created_at', 'price', 'category_id', 'annotation'],
        'bookcase' => ['name', 'number_rows', 'library_id'],
        'book_copy' => ['book_id', 'copy_number', 'bookcase_id'],
        'category' => ['name', 'parent_id','annotation'],
        'country' => ['name'],
        'library' => ['name', 'address', 'founding_date'],
        'publisher' => ['name', 'surname', 'date_of_birth', 'date_of_death', 'annotation'],
    ];

    public static function checkPasswordConsistency($submittedFormData): bool
    {
        if ($submittedFormData['repeat_password'] != $submittedFormData['password']) {
            Session::setError('Пароли не совпадают');
            return true;
        }

        return false;
    }

    public static function checkUpdatePasswords(&$submittedFormData): bool
    {
        $clientId = Session::getClientId();
        $oldDataUser = TableUserQueries::getTableRecord($clientId);
        if (isset($submittedFormData['old_password'])) {
            if ($submittedFormData['old_password'] !== '') {
                if (!password_verify(strval($submittedFormData['old_password']), $oldDataUser->getPassword())) {
                    Session::setError('Вы ввели неверный текущий пароль');
                    return true;
                }
                if ($submittedFormData['password'] != $submittedFormData['repeat_password']) {
                    Session::setError('Пароли не совпадают');
                    return true;
                }
                if ($submittedFormData['password'] == '') {
                    Session::setError('Вы не ввели новый пароль');
                    return true;
                }
                if (password_verify($submittedFormData['password'], $oldDataUser->getPassword())) {
                    Session::setError('Новый и старый пароли совпадают');
                    return true;
                }
            } else {
                $submittedFormData['password'] = (TableUserQueries::getTableRecord($clientId))->getPassword();
            }
        }

        return false;
    }

    public static function hashPassword($password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function prepareDataForQuery($submittedFormData, $tableName): array
    {
        $fields = AbstractTableQueries::getFields();
        $fields = $fields[$tableName];
        $prepareFormData = [];
        foreach ($fields as $field) {
            $prepareFieldName = ':' . $field;
            $prepareFormData[$prepareFieldName] = $submittedFormData[$field] ?? null;
            $prepareFormData[$prepareFieldName] = htmlspecialchars($prepareFormData[$prepareFieldName]);
        }

        if (isset($submittedFormData['id'])) {
            $prepareFormData[':id'] = $submittedFormData['id'];
        }
        if (isset($prepareFormData[':password'])) {
            $prepareFormData[':password'] = SecurityService::hashPassword($prepareFormData[':password']);
        }

        return $prepareFormData;
    }
}
