<?php

namespace App\Models\SqlQueries;

use App\Database;
use App\Models\Entities\DatabaseInformation\Bookcase;
use App\Models\Entities\DatabaseInformationHandler\EntitiesHandler;
use App\Models\SqlQueries\AbstractTableQueries;
use App\Models\SqlQueries\TableCategoryQueries;

class TableBookcaseQueries extends AbstractTableQueries
{
    public const TABLE_NAME = 'bookcase';

    public static function getBookcase($id): Bookcase
    {
        $connection = Database::getConnection();

        $query = $connection->prepare('select * from bookcase where id = ?');
        $query->execute([$id]);
        return EntitiesHandler::handleBookcase($query->fetch());
    }

    public static function getLibraryBookcase($libraryId): array
    {
        $connection = Database::getConnection();

        $query = $connection->prepare('select * from bookcase where library_id = ? ');
        $query->execute([$libraryId]);
        $bookcases = EntitiesHandler::handleEntities($query->fetchAll(), 'bookcase');

        return $bookcases;
    }

    public static function getLocation(): array
    {
        $connection = Database::getConnection();
        $query = 'select library.address, bookcase.name, bookcase.id from library 
                    inner join bookcase where library.id = bookcase.library_id';
        $query = $connection->query($query);
        $locations = [];
        $queryData = $query->fetchAll();

        foreach ($queryData as $location) {
            $locations[] = [
                'id'   => $location['id'],
                'name' => $location['address'] . ' ' . $location['name'],
            ];
        }

        return $locations;
    }

    public static function addBookcase($submittedFormData): ?int
    {
        $connection = Database::getConnection();

        $fields = $submittedFormData;

        $query = 'INSERT INTO bookcase (name, number_rows, library_id)
                VALUES (:name, :number_rows, :library_id)';
        $query = $connection->prepare($query);
        $query->execute($fields);

        return $connection->lastInsertId();
    }

    public static function updateBookcase($submittedFormData): ?int
    {

        $connection = Database::getConnection();
        $fields = $submittedFormData;
        $fields[':id'] = $submittedFormData['id'] ?? null;

        $update = 'update bookcase 
            set `name` = :name, 
                `number_rows` = :number_rows, 
                `library_id` = :library_id 
            where `id` = :id';
        $query = $connection->prepare($update);
        $query->execute($fields);

        return $connection->lastInsertId();
    }
}
