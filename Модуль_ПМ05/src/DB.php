<?php

class DB
{
    private static ?mysqli $connection = null;

    public static function setConnection(mysqli $connection)
    {
        self::$connection = $connection;
    }

    public static function closeConnection()
    {
        self::$connection->close();
    }

    public static function query(string $query)
    {
        self::$connection->query($query);
    }

    public static function create(string $table, array $values)
    {
        $rawKeys = [];
        $rawValues = [];

        foreach ($values as $key => $value) {
            array_push($rawKeys, $key);
            array_push($rawValues, $value);
        }

        $keys = '(' . implode(', ', $rawKeys) . ')';
        $vals = '(' . implode(', ', $rawValues) . ')';


        $query = "INSERT INTO {$table} {$keys} VALUES {$vals}";

        self::$connection->query($query);
    }

    public static function read(string $table, array $columns)
    {
        $columnsQuery = implode(', ', $columns);
        $query = "SELECT {$columnsQuery} FROM {$table};";

        return self::$connection->query($query);
    }
}