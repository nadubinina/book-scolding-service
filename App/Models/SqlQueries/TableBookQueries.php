<?php

namespace App\Models\SqlQueries;

use App\Database;
use App\Models\Entities\DatabaseInformationHandler\EntitiesHandler;
use App\Models\SqlQueries\AbstractTableQueries;
use App\Models\SqlQueries\TableCategoryQueries;

class TableBookQueries extends AbstractTableQueries
{
    public const TABLE_NAME = 'book';

    public static function getCategoryBooks($categoryId): array
    {
        $connection = Database::getConnection();

        $categories = TableCategoryQueries::getChildCategories($categoryId);
        $books = [];

        foreach ($categories as $category) {
            $categorId = $category->getId();
            $query = 'SELECT * from book where category_id=?';
            $query = $connection->prepare($query);
            $query->execute([$categorId]);

            $books = array_merge($books, EntitiesHandler::handleEntities($query->fetchAll(), 'book'));
        }

        return $books;
    }

    public static function getCountryBooks($countryId): array
    {
        $connection = Database::getConnection();
        $query = 'select * from book where country_id = ?';
        $query = $connection->prepare($query);
        $query->execute([$countryId]);

        return EntitiesHandler::handleEntities($query->fetchAll(), 'book');
    }

    public static function getPublisherBooks($publisherId): array
    {
        $connection = Database::getConnection();
        $query = 'SELECT * from book where publisher_id=?';
        $query = $connection->prepare($query);
        $query->execute([$publisherId]);

        return EntitiesHandler::handleEntities($query->fetchAll(), 'book');
    }

    public static function addBook($submittedFormData)
    {
        $connection = Database::getConnection();
        $fields = $submittedFormData;

        $query = 'INSERT INTO book (name, country_id, publisher_id, category_id, price, created_at, annotation)  
                VALUES (:name, :country_id, :publisher_id, :category_id, :price, :created_at, :annotation)';
        $query = $connection->prepare($query);
        $query->execute($fields);

        return $connection->lastInsertId();
    }

    public static function updateBook($submittedFormData): ?int
    {

        $connection = Database::getConnection();
        $fields = $submittedFormData;

        $update = 'update book 
            set `name` = :name, 
                `country_id` = :country_id, 
                `publisher_id` = :publisher_id, 
                `category_id` = :category_id, 
                `price` = :price, 
                `created_at` = :created_at, 
                `annotation` = :annotation 
            where `id` = :id';
        $query = $connection->prepare($update);

        $query->execute($fields);

        return $fields[':id'];
    }

    public static function moveBooksParentCategory($idCatercory, $parentIdCategory)
    {
        $connection = Database::getConnection();

        $fieldsCat[':id'] = $idCatercory ?? null;
        $fieldsCat[':parent_id'] = $parentIdCategory ?? null;

        $query = 'update book 
            set `category_id` = ?
            where `category_id` = ?';
        $query = $connection->prepare($query);

        $query->execute([$fieldsCat[':parent_id'], $fieldsCat[':id']]);
    }
}
