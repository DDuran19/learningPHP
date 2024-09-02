<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use http\forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
$credentials = ['email' => $email, 'password' => $password];

$form = LoginForm::validate($credentials);

$auth = new Authenticator();

$auth->attempt(
    $db,
    $credentials,
    function () {
        redirect('/');
    }
);

$form->error([...$auth->getErrors()])
    ->throw();
