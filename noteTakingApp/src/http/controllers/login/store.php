<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use http\forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm();
$form->validate(['email' => $email, 'password' => $password]);

if (count($form->getErrors()) === 0) {
    $auth = new Authenticator();

    $result = $auth->attempt($db, ['email' => $email, 'password' => $password], function () {
        redirect('/');
    });
    $form->error([...$auth->getErrors()]);
}

renderView("login", ['heading' => 'Login', 'errors' => $form->getErrors()], true);
