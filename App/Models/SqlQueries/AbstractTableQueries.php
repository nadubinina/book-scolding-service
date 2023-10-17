<?php

namespace App\Models\SqlQueries;

use App\Database;
use App\Exceptions\NotFoundException;
use App\Models\Entities\DatabaseInformationHandler\EntitiesHandler;

class AbstractTableQueries
{
    public const TABLE_NAME = null;
    public static function getTableRecord(?int $id, string $tableName = null)
    {
        $tableName = isset($tableName) ? $tableName : static::TABLE_NAME;

        $connection = Database::getConnection();
        $query = "SELECT * from $tableName where id=?";
        $query = $connection->prepare($query);
        $query->execute([$id]);

        $className = self::handlerClassName($tableName);
        $methodHeanler =  'handle' . ucfirst($className);
        $dataQuery = $query->fetch();
        if (!$dataQuery) {
            http_response_code(404);
            throw new NotFoundException();
        }

        $entity = EntitiesHandler::{$methodHeanler}($dataQuery);

        return $entity;
    }

    public static function getTableAllRecords(string $tableName = null)
    {
        $tableName = isset($tableName) ? $tableName : static::TABLE_NAME;
        $connection = Database::getConnection();
        $query = "SELECT * from $tableName";
        $query = $connection->query($query);
        $queryData = $query->fetchAll();

        $entity = EntitiesHandler::handleEntities($queryData, $tableName);

        return $entity;
    }

    public static function deleteEntity(int $id): bool
    {
        $tableName = static::TABLE_NAME;
        $connection = Database::getConnection();
        $fields[':id'] = $id ?? null;

        $query = "delete from $tableName where `id` = :id";
        $query = $connection->prepare($query);

        $query->execute($fields);

        return true;
    }

    public static function getFields(): array
    {
        return [
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
    }

    protected static function handlerClassName(string $className): string
    {
        $classParts = explode('-', $className);
        $classParts = array_map('ucfirst', $classParts);

        return implode('', $classParts);
    }
}
