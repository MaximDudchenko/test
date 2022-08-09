<?php

namespace App\Models;

use Core\Model;
use PDO;

class Post extends Model
{
    static protected string|null $tableName = 'posts';

    public static function all()
    {
        $sql = 'SELECT p.id, p.vizitore_name, p.post, p.created_at, ROUND(AVG(rate)) as rate  FROM ' .
            static::$tableName . ' as p LEFT JOIN rates as r ON p.id = r.post_id ' .
            'GROUP BY p.id, p.vizitore_name, p.post, p.created_at ORDER BY p.created_at DESC';
        return static::connect()->query($sql)->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public static function countByRate(string $value = ''): int
    {

        $sql = 'SELECT COUNT(p.id) FROM ' . static::$tableName . ' as p LEFT JOIN' .
            ' (SELECT post_id, ROUND(AVG(rate)) as rate FROM rates GROUP BY post_id) as r ON p.id = r.post_id';
        if ($value !== '') {
            $sql .= ' WHERE r.rate IN (' . $value . ')';
        }
        return (int)static::connect()->query($sql)->fetchColumn();
    }
}