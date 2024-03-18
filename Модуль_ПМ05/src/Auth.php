<?php

require_once(__DIR__ . '/DB.php');
require_once(__DIR__ . '/DBHelper.php');

class Auth
{
    public static function init()
    {
        try {
            DB::query('CREATE TABLE user (id int primary key AUTO_INCREMENT, login varchar(255) unique, password varchar(255))');
        } catch (Throwable $e) {
            return;
        }
    }

    public static function login(string $login, string $password): bool
    {
        $users = DB::read('user', ['login', 'password']);

        foreach ($users as $user) {
            if ($user['login'] == $login
                && $user['password'] == $password) {
                return true;
            }
        }

        return false;
    }

    public static function register(string $login, string $password): void
    {
        DB::create('user', [
            'login' => DBHelper::string($login),
            'password' => DBHelper::string($password)
        ]);
    }
}