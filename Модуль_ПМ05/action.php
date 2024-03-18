<?php

require_once(__DIR__ . '/src/index.php');

if(Auth::login($_POST['login'], $_POST['password']))
{
	echo Table::render('users');
}
else (
	Auth::register($_POST['login'], $_POST['password']));

endScript();