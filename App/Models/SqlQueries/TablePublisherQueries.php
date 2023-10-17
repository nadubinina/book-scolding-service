<?php

namespace App\Models\SqlQueries;

use App\Database;
use App\Models\SqlQueries\AbstractTableQueries;

class TablePublisherQueries extends AbstractTableQueries
{
    public const TABLE_NAME = 'publisher';

    public static function getNamePublishers(): array
    {
        $connection = Database::getConnection();

        $query = 'select id, name, surname from publisher';
        $query = $connection->query($query);

        $publisherList = $query->fetchAll();
        foreach ($publisherList as &$publisher) {
            $publisher['name'] .= ' ' . $publisher['surname'];
        }

        return $publisherList;
    }

    public static function addPublisher($submittedFormData): ?int
    {
        $connection = Database::getConnection();

        $fields = $submittedFormData;

        $query = 'INSERT INTO publisher (name, surname, date_of_birth, date_of_death, annotation)  
                VALUES (:name, :surname, :date_of_birth, :date_of_death, :annotation)';
        $query = $connection->prepare($query);
        $query->execute($fields);

        return $connection->lastInsertId();
    }

    public static function updatePublisher($submittedFormData): ?int
    {

        $connection = Database::getConnection();
        $fields = $submittedFormData;

        $update = 'update publisher 
            set `name` = :name, 
                `surname` = :surname, 
                `date_of_birth` = :date_of_birth, 
                `date_of_death` = :date_of_death,
                `annotation` = :annotation 
            where `id` = :id';
        $query = $connection->prepare($update);

        $query->execute($fields);

        return $fields[':id'];
    }
}
