<?php

namespace App\Models\SqlQueries;

use App\Database;
use App\Models\Entities\DatabaseInformationHandler\EntitiesHandler;

class TableBookCopyQueries extends AbstractTableQueries
{
    public const TABLE_NAME = 'book_copy';

    public static function getBooksCopy($id): array
    {
        $connection = Database::getConnection();
        $query = 'SELECT * from book_copy where book_id=?';
        $query = $connection->prepare($query);
        $query->execute([$id]);

        return EntitiesHandler::handleBookCopies($query->fetchAll(), TableBookQueries::getTableRecord($id));
    }

    public static function getBookBookcase($bookcaseId): array
    {
        $connection = Database::getConnection();
        $query = $connection->prepare('select * from book_copy where bookcase_id = ?');
        $query->execute([$bookcaseId]);
        $bookCopies = EntitiesHandler::handleBookCopies($query->fetchAll(), null);

        if ($bookCopies) {
            $query = $connection->prepare('select distinct book_id from book_copy where bookcase_id = ?');
            $query->execute([$bookcaseId]);
            $bookId = $query->fetchAll();

            foreach ($bookId as &$item) {
                $item = $item['book_id'];
            }

            $inList = str_repeat('?, ', count($bookId) - 1) . '?';
            $query = $connection->prepare("select * from book where id IN ($inList)");
            $query->execute($bookId);
            $queryData = EntitiesHandler::handleEntities($query->fetchAll(), 'book');

            foreach ($queryData as $book) {
                $books[$book->getId()] = $book;
            }

            foreach ($bookCopies as $bookCopy) {
                $bookId = $bookCopy->getBookId();
                $bookCopy->setBook($books[$bookId]);
            }
        }

        return $bookCopies;
    }

    public static function addBookCopy($submittedFormData): ?int
    {
        $connection = Database::getConnection();
        $fields = $submittedFormData;

        $query = 'INSERT INTO book_copy (book_id, copy_number, bookcase_id)  
                VALUES (:book_id, :copy_number, :bookcase_id)';
        $query = $connection->prepare($query);
        $query->execute($fields);

        return $fields['book_id'];
    }

    public static function updateBookCopy($submittedFormData): ?int
    {

        $connection = Database::getConnection();
        $fields = $submittedFormData;

        $update = 'update book_copy 
            set `book_id` = :book_id, 
                `copy_number` = :copy_number, 
                `bookcase_id` = :bookcase_id 
            where `id` = :id';
        $query = $connection->prepare($update);

        $query->execute($fields);

        return $fields[':id'];
    }

    public static function getTableRecord($id, $tableName = self::TABLE_NAME)
    {
        $connection = Database::getConnection();
        $query = "SELECT * from book_copy where id=?";
        $query = $connection->prepare($query);
        $query->execute([$id]);
        $queryData = $query->fetch();

        $entity = EntitiesHandler::handleBookCopy($queryData);

        return $entity;
    }
}
