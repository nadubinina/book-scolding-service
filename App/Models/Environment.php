<?php

namespace App\Models;

class Environment
{
    protected $settings = null;

    public function __construct()
    {
        $this->settings = parse_ini_file(APP_ROOT . '/.env');
    }

    public function getDbHost()
    {
        return $this->settings['HOST'] ?? '127.0.0.1';
    }

    public function getDbName()
    {
        return $this->settings['NAME'] ?? null;
    }

    public function getDbPort()
    {
        return $this->settings['PORT'] ?? '3306';
    }

    public function getDbUser()
    {
        return $this->settings['USER'] ?? null;
    }

    public function getDbPassword()
    {
        return $this->settings['PASS'] ?? null;
    }

    public function getDbCharset()
    {
        return $this->settings['CHARSET'] ?? 'utf8';
    }
}
