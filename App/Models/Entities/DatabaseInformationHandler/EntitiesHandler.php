<?php

namespace App\Models\Entities\DatabaseInformationHandler;

use App\Models\Entities\DatabaseInformation\Book;
use App\Models\Entities\DatabaseInformation\Bookcase;
use App\Models\Entities\DatabaseInformation\BookCopy;
use App\Models\Entities\DatabaseInformation\Category;
use App\Models\Entities\DatabaseInformation\Country;
use App\Models\Entities\DatabaseInformation\Library;
use App\Models\Entities\DatabaseInformation\Publisher;
use App\Models\Entities\DatabaseInformation\User;

class EntitiesHandler
{
    public static function arrayEntityInObjectEntity($entities)
    {
        if (isset($entities['id'])) {
            $entity = $entities;
            $entities = [];
            $entities[] = $entity;
        }

        return$entities;
    }

    public static function handleBook($bookDB): Book
    {
        $bookDB = self::replaceThreateningSymbols($bookDB);
        return (new Book())
            ->setId($bookDB['id'])
            ->setName($bookDB['name'])
            ->setCountryId($bookDB['country_id'])
            ->setPublisherId($bookDB['publisher_id'])
            ->setCategoryId($bookDB['category_id'])
            ->setCreatedAt($bookDB['created_at'])
            ->setPrice($bookDB['price'])
            ->setAnnotation($bookDB['annotation']);
    }

    public static function handleEntities($dataDB, $entityClass): array
    {
        $entities = [];

        $methodHeanler = 'handle' . ucfirst($entityClass) ;

        $dataDB = self::arrayEntityInObjectEntity($dataDB);

        foreach ($dataDB as $entityDB) {
            $entities[] = self::{$methodHeanler}($entityDB);
        }

        return $entities;
    }

    public static function handleBookCopy($bookCopyDB): BookCopy
    {
        $bookCopyDB = self::replaceThreateningSymbols($bookCopyDB);
        return (new BookCopy())
            ->setId($bookCopyDB['id'])
            ->setBookId($bookCopyDB['book_id'])
            ->setBookcaseId($bookCopyDB['bookcase_id'])
            ->setCopyNumber($bookCopyDB['copy_number']);
    }

    public static function handleBookCopies($bookCopiesDB, ?Book $originBook): array
    {
        $bookCopies = [];

        $bookCopiesDB = self::arrayEntityInObjectEntity($bookCopiesDB);

        foreach ($bookCopiesDB as $bookCopyDB) {
            $bookCopies[] = self::handleBookCopy($bookCopyDB)->setBook($originBook);
        }

        return $bookCopies;
    }

    public static function handleCategory($categoryDB): Category
    {
        $categoryDB = self::replaceThreateningSymbols($categoryDB);
        return (new Category())
            ->setId($categoryDB['id'])
            ->setName($categoryDB['name'])
            ->setIdParrent($categoryDB['parent_id']);
    }

    public static function handlePublisher($publisherDB): Publisher
    {
        $publisherDB = self::replaceThreateningSymbols($publisherDB);
        return (new Publisher())
            ->setId($publisherDB['id'])
            ->setName($publisherDB['name'])
            ->setSurname($publisherDB['surname'])
            ->setDateOfBirth($publisherDB['date_of_birth'])
            ->setDateOfDeath($publisherDB['date_of_death'])
            ->setAnnotation($publisherDB['annotation']);
    }

    public static function handleCountry($countryDB): Country
    {
        $countryDB = self::replaceThreateningSymbols($countryDB);
        return (new Country())
            ->setId($countryDB['id'])
            ->setName($countryDB['name']);
    }

    public static function handleLibrary($libraryDB): Library
    {
        $libraryDB = self::replaceThreateningSymbols($libraryDB);
        return (new Library())
            ->setId($libraryDB['id'])
            ->setName($libraryDB['name'])
            ->setFoundingDate($libraryDB['founding_date'])
            ->setAddress($libraryDB['address']);
    }

    public static function handleBookcase($bookcaseDB): Bookcase
    {
        $bookcaseDB = self::replaceThreateningSymbols($bookcaseDB);
        return (new Bookcase())
            ->setId($bookcaseDB['id'])
            ->setName($bookcaseDB['name'])
            ->setLibraryId($bookcaseDB['library_id'])
            ->setNumberRows($bookcaseDB['number_rows']);
    }

    public static function handleUser($userDB): User
    {
        $userDB = self::replaceThreateningSymbols($userDB);

        return (new User())
            ->setId($userDB['id'])
            ->setLogin($userDB['login'])
            ->setPassword($userDB['password']);
    }

    protected static function replaceThreateningSymbols($submittedDbData)
    {
        foreach ($submittedDbData as &$submittedDbField) {
            $submittedDbField = htmlspecialchars($submittedDbField);
        }

        return $submittedDbData;
    }
}
