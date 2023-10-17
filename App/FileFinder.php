<?php

namespace App;

class FileFinder
{
    public static function findControllers(): array
    {
        $filesAll = scandir('App/Controllers');
        $filesController = array_filter($filesAll, function ($fileName) {
            return stripos($fileName, '.php') !== false;
        });

        return   str_replace('.php', '', $filesController);
    }
}
