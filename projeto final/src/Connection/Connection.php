<?php
declare(strict_types=1);
namespace App\Connection;

abstract class Connection
{
    public static function getConnection(){
        $database = 'db_store';
        $username = 'root';
        $password = '101258';

        $connection = new \PDO('mysql:host=localhost;dbname='.$database, $username, $password);

        return $connection;

    }
}