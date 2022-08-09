<?php

namespace Core\Traits;

use PDO;

trait ConnectionTrait
{
    protected static PDO|null $connect = null;

    public static function connect()
    {
        if (is_null(self::$connect)) {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE;
            $options = [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            self::$connect = new PDO(
                $dsn,
                DB_NAME,
                DB_PASSWORD,
                $options
            );
        }
        return self::$connect;
    }
}