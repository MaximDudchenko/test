<?php

namespace Core;

use Core\Traits\ConnectionTrait;
use PDO;

class Model
{
    use ConnectionTrait;

    static protected string|null $tableName = null;

    public static function all()
    {
        $sql = 'SELECT * FROM ' . static::$tableName;
        return static::connect()->query($sql)->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public static function create(array $fields): int
    {
        $values = static::prepareQueryValues($fields);

        $sql = 'INSERT INTO ' . static::$tableName . ' (' . $values['keys'] . ') VALUES (' . $values['placeholders'] . ')';
        $query = static::connect()->prepare($sql);

        foreach ($fields as $key => $value) {
            $query->bindValue(":{$key}", $value);
        }

        $query->execute();

        return (int)static::connect()->lastInsertId();
    }

    protected static function prepareQueryValues(array $fields)
    {
        $placeholder = [];
        $keys = array_keys($fields);
        $placeholder = preg_filter('/^/', ':', $keys);

        return [
            'keys' => implode(', ', $keys),
            'placeholders' => implode(', ', $placeholder)
        ];
    }

    public static function find(int $id)
    {
        $sql = 'SELECT * FROM ' . static::$tableName . ' WHERE id = :id';
        $query = static::connect()->prepare($sql);
        $query->bindParam('id', $id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchObject(static::class);
    }
}