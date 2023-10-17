<?php

namespace App\Models\SqlQueries;

use App\Database;
use App\Models\Entities\DatabaseInformationHandler\EntitiesHandler;
use App\Models\SqlQueries\AbstractTableQueries;

class TableCategoryQueries extends AbstractTableQueries
{
    public const TABLE_NAME = 'category';

    public static function getBookCategories($categoryId): array
    {
        $categories = [];
        $connection = Database::getConnection();
        $id = $categoryId;
        while ($id !== null) {
            $query = 'SELECT * from category where id=?';
            $query = $connection->prepare($query);
            $query->execute([$id]);
            $queryData = $query->fetch();
            $id = $queryData['parent_id'];
            $categories[] = EntitiesHandler::handleCategory($queryData);
        }

        return array_reverse($categories, false);
    }

    public static function getChildCategories($categoryId): array
    {
        $connection = Database::getConnection();
        $categories = [];

        $categories[] = self::getTableRecord($categoryId);
        $i = 0;
        while (isset($categories[$i])) {
            $parentId = $categories[$i]->getId();

            $query = 'SELECT * from category where parent_id=?';
            $query = $connection->prepare($query);
            $query->execute([$parentId]);
            $queryData = $query->fetchAll();
            $childCategories = EntitiesHandler::handleEntities($queryData, 'category');

            $categories = array_merge($categories, $childCategories);
            $i++;
        }

        return $categories;
    }

    public static function getFullNamesAllCategories(): array
    {
        $connection = Database::getConnection();

        $query = "SELECT * from category";
        $query = $connection->query($query);
        $queryData = $query->fetchAll();

        foreach ($queryData as $item) {
            $categories[$item['id']] = $item;
        }

        foreach ($categories as &$category) {
            if ($category['parent_id']) {
                $category['name'] = $categories[$category['parent_id']]['name'] . '/' . $category['name'];
            } else {
                $category['name'] = '/' . $category['name'];
            }
        }

        return $categories;
    }

    public static function getFullNamesCategories($id): array
    {
        $connection = Database::getConnection();

        $notCategories = self::getChildCategories($id);
        $notInList = str_repeat('?, ', count($notCategories) - 1) . '?';
        foreach ($notCategories as &$item) {
            $item = $item->getId();
        }

        $query = "SELECT * from category where id NOT IN ($notInList)";
        $query = $connection->prepare($query);
        $query->execute($notCategories);
        $queryData = $query->fetchAll();

        foreach ($queryData as $item) {
            $categories[$item['id']] = $item;
        }

        foreach ($categories as &$category) {
            if ($category['parent_id']) {
                $category['name'] = $categories[$category['parent_id']]['name'] . '/' . $category['name'];
            } else {
                $category['name'] = '/' . $category['name'];
            }
        }

        return $categories;
    }

    public static function addCategory($submittedFormData): ?int
    {
        $connection = Database::getConnection();

        $fields = $submittedFormData;

        $query = 'INSERT INTO category (name, parent_id, annotation)  
                VALUES (:name, :parent_id, :annotation)';
        $query = $connection->prepare($query);
        $query->execute($fields);

        return $connection->lastInsertId();
    }

    public static function updateCategory($submittedFormData): ?int
    {

        $connection = Database::getConnection();
        $fields = $submittedFormData;

        $update = 'update category 
            set `name` = :name, 
                `parent_id` = :parent_id, 
                `annotation` = :annotation 
            where `id` = :id';
        $query = $connection->prepare($update);

        $query->execute($fields);

        return $fields[':id'];
    }

    public static function deleteCategory($id, $parentId): bool
    {
        $tableName = static::TABLE_NAME;
        $connection = Database::getConnection();
        self::linkCategoryToParent($id, $parentId);
        TableBookQueries::moveBooksParentCategory($id, $parentId);
        self::deleteEntity($id);

        return true;
    }

    protected static function linkCategoryToParent($id, $parentId): bool
    {
        $connection = Database::getConnection();

        $fields[':id'] = $id ?? null;
        $fields[':parent_id'] = $parentId ?? null;

        $query = 'update category 
            set `parent_id` = ?
            where `parent_id` = ?';
        $query = $connection->prepare($query);

        $query->execute([$fields[':parent_id'], $fields[':id']]);
        return true;
    }
}
