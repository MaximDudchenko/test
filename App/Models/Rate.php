<?php

namespace App\Models;

use Core\Model;
use PDO;

class Rate extends Model
{
    static protected string|null $tableName = 'rates';

    public static function all()
    {
        $sql = 'SELECT post_id, AVG(rate) as rate FROM ' . static::$tableName . ' GROUP BY post_id ORDER BY post_id';
        return static::connect()->query($sql)->fetchAll(PDO::FETCH_CLASS, static::class);
    }
}