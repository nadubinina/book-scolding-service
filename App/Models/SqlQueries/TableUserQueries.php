<?php

namespace App\Models\SqlQueries;

use App\Database;
use App\Models\Entities\DatabaseInformationHandler\EntitiesHandler;
use App\Models\Services\SecurityService;
use App\Models\Session;

class TableUserQueries extends AbstractTableQueries
{
    public const TABLE_NAME = 'user';

    public static function getUserByLogin($login): array
    {
        $connection = Database::getConnection();

        $query = $connection->prepare('select * from user where login = ?');
        $query->execute([$login]);
        $queryData = $query->fetch();

        return $queryData;
    }

    public static function signUp($submittedFormData): ?int
    {
        $connection = Database::getConnection();
        $fields = $submittedFormData;

        $query = 'INSERT INTO user (login, password)  
            VALUES (:login, :password)';
        $query = $connection->prepare($query);
        $query->execute([$fields[':login'], $fields[':password']]);

        return $connection->lastInsertId();
    }

    public static function isSetLogin($login): bool
    {
        $connection = Database::getConnection();

        $query = $connection->prepare('select * from user where login = ?');
        $query->execute([$login]);
        $queryData = $query->fetch();

        if (isset($queryData)) {
            return true;
        }
        return false;
    }

    public static function updateUserInfo($submittedFormData): ?int
    {
        $connection = Database::getConnection();

        $fields = $submittedFormData;
        $fields[':id'] = Session::getClientId() ?? null;

        $update = 'update user 
            set `login` = :login, 
                `password` = :password
            where `id` = :id';
        $query = $connection->prepare($update);

        $query->execute([$fields[':login'], $fields[':password'], $fields[':id']]);

        return $fields[':id'];
    }

    public static function getListMyBooks($userId): array
    {
        $connection = Database::getConnection();
        $query = $connection->prepare('select * from book_copy where user_id = ?');
        $query->execute([$userId]);
        $bookCopies = EntitiesHandler::handleBookCopies($query->fetchAll(), null);

        if ($bookCopies) {
            $query = $connection->prepare('select distinct book_id from book_copy where user_id = ?');
            $query->execute([$userId]);
            $bookId = array_column($query->fetchAll(), 'book_id');

            $inList = implode(',', array_map('intval', $bookId));

            $query = $connection->query("select * from book where id IN ($inList)");
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
}
