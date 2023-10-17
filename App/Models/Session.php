<?php

namespace App\Models;

class Session
{
    private const LIFE_TIME = 60 * 60 * 24 * 30;

    public static function start()
    {
        ini_set('session.cookie_lifetime', self::LIFE_TIME);

        if (!isset($_SESSION)) {
            session_save_path(APP_ROOT . '/var/sessions');
            session_start(['cookie_httponly' => 1]);
        }
    }

    public static function destroy()
    {
        session_regenerate_id();
        session_destroy();
    }

    public static function setClientId(int $id)
    {
        $_SESSION['client_id'] = $id;
        unset($_SESSION['token']);
        self::setToken();
    }

    public static function getClientId(): ?int
    {
        return $_SESSION['client_id'] ?? null;
    }

    public static function setError($error)
    {
        $_SESSION['error'] = $error;
    }

    public static function getError(): ?string
    {
        $error = $_SESSION['error'] ?? null;
        unset($_SESSION['error']);

        return $error;
    }

    public static function setToken()
    {
        if (!isset($_SESSION['token'])) {
            if ($_SESSION['client_id']) {
                $_SESSION['token'] = bin2hex(random_bytes(16));
            } else {
                $_SESSION['token'] = bin2hex(md5('auth'));
            }
        }
    }

    public static function getToken(): ?string
    {
        return $_SESSION['token'] ?? null;
    }

    public static function isLogin(): bool
    {
        return (isset($_SESSION['client_id']));
    }
}
