<?php

namespace App\Models\Services;

use App\Models\Session;
use App\Models\SqlQueries\TableUserQueries;

class AuthService
{
    public static function signIn($submittedFormData): ?int
    {
        $userData = TableUserQueries::getUserByLogin($submittedFormData['login']);

        if (password_verify($submittedFormData['password'], $userData['password'])) {
            return $userData['id'];
        } else {
            Session::setError('неверный логин или пароль');
        }

        return null;
    }
}
