<?php

namespace App\Models;

use Core\Model;
use PDO;

class Comment extends Model
{
    static protected string|null $tableName = 'comments';

    public static function all()
    {
        $sql = 'SELECT * FROM ' . static::$tableName . ' ORDER BY post_id, created_at DESC';
        return static::connect()->query($sql)->fetchAll(PDO::FETCH_CLASS, static::class);
    }
}