<?php

namespace App\Models;

use Core\Model;
use PDO;

class Post extends Model
{
    static protected string|null $tableName = 'posts';

    public static function all()
    {
        $sql = 'SELECT * FROM ' . static::$tableName . ' ORDER BY created_at DESC';
        return static::connect()->query($sql)->fetchAll(PDO::FETCH_CLASS, static::class);
    }
}