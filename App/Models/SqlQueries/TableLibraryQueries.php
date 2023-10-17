<?php

namespace App\Models\SqlQueries;

use App\Database;
use App\Models\Entities\DatabaseInformationHandler\EntitiesHandler;
use App\Models\SqlQueries\AbstractTableQueries;
use App\Models\SqlQueries\TableCategoryQueries;

class TableLibraryQueries extends AbstractTableQueries
{
    public const TABLE_NAME = 'library';

    public static function setNumberOfBooks($libraryId): int
    {
        $connection = Database::getConnection();
        $query = 'select count(book_copy.id ) as all_books_in_library  from  publisher 
            inner join book on publisher.id = book.publisher_id 
            inner join book_copy on book.id = book_copy.book_id 
            inner join bookcase on book_copy.bookcase_id = bookcase.id 
            right join library on library.id = bookcase.library_id 
            where library.id = ?';
        $query = $connection->prepare($query);
        $query->execute([$libraryId]);
        $numberOfBook = $query->fetch();
        return $numberOfBook['all_books_in_library'];
    }

    public static function addLibrary($submittedFormData): ?int
    {
        $connection = Database::getConnection();

        $fields = $submittedFormData;

        $query = 'INSERT INTO library (name, address, founding_date)  
                VALUES (:name, :address, :founding_date)';
        $query = $connection->prepare($query);
        $query->execute($fields);

        return $connection->lastInsertId();
    }

    public static function updateLibrary($submittedFormData): ?int
    {

        $connection = Database::getConnection();
        $fields = $submittedFormData;

        $update = 'update library 
            set `name` = :name, 
                `address` = :address, 
                `founding_date` = :founding_date 
            where `id` = :id';
        $query = $connection->prepare($update);

        $query->execute($fields);

        return $fields[':id'];
    }

    public static function getLibrary(): array
    {
        $connection = Database::getConnection();
        $query = 'select id, name from library';
        $query = $connection->query($query);
        $locations = [];
        $queryData = $query->fetchAll();

        foreach ($queryData as $location) {
            $locations[] = [
                'id'   => $location['id'],
                'name' => $location['name'],
            ];
        }

        return $locations;
    }
}
