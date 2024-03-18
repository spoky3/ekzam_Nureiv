<?php

require_once(__DIR__ . '/DB.php');

class Table
{
    public static function render(string $table): string
    {
        $rows = DB::read($table, ['*']);
        $columns = array_keys($rows->fetch_array(MYSQLI_ASSOC));

        $table = "<table>";

        $table .= "<tr>";
        foreach ($columns as $column) {
            $table.= "<th>" . $column . "</th>";
        }
        $table .= "</tr>";

        foreach ($rows as $row)
        {
            $table .= "<tr>";

            foreach ($columns as $column) {
                $table .= "<td>{$row[$column]}</td>";
            }

            $table .= "</tr>";
        }

        $table .= "</table>";

        return $table;
    }
}