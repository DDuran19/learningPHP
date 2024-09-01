<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use http\forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm();
$form->validate(['email' => $email, 'password' => $password]);
$errors = $form->getErrors();


if (count($errors) !== 0) {
    renderView("login", ['heading' => 'Login', 'errors' => $errors], true);
}

$auth = new Authenticator();
$db = App::resolve(Database::class);
$auth->attempt($db, ['email' => $email, 'password' => $password]);

$errors = $auth->getErrors();
if ($errors) {
    renderView("login", ['heading' => 'Login', 'errors' => $errors], true);
}

$success = $auth->login();
if (!$success) {
    renderView("login", ['heading' => 'Login', 'errors' => $auth->getErrors()], true);
}
redirect('/');
