<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use http\forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_SESSION['__flash']['email'] = $_POST['email'];
$password = $_SESSION['__flash']['password'] = $_POST['password'];

$form = new LoginForm();
$form->validate(['email' => $email, 'password' => $password]);

if (count($form->getErrors()) === 0) {
    $auth = new Authenticator();

    $auth->attempt($db, ['email' => $email, 'password' => $password], function () {
        redirect('/');
    });
    $form->error([...$auth->getErrors()]);
}

$_SESSION['__flash']['errors'] = $form->getErrors();
redirect('/login');
