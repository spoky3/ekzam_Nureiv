<?php

require_once(__DIR__ . '/Auth.php');
require_once(__DIR__ . '/DB.php');
require_once(__DIR__ . '/Table.php');
require_once(__DIR__ . '/DBHelper.php');

$conn = new mysqli(
    'localhost',
    'root',
    '',
    'ekz_pm05',
    '3306'
);

DB::setConnection($conn);

function endScript() {
    DB::closeConnection();
}