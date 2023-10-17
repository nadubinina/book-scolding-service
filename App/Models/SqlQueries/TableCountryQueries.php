<?php

namespace App\Models\SqlQueries;

use App\Database;
use App\Models\SqlQueries\AbstractTableQueries;

class TableCountryQueries extends AbstractTableQueries
{
    public const TABLE_NAME = 'country';

    public static function getCountries(): array
    {
        $connection = Database::getConnection();
        $query = 'select * from country';
        $query = $connection->query($query);

        $countryList = $query->fetchAll();

        return $countryList;
    }
}
