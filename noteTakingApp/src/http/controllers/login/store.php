<?php

use Core\App;
use Core\Database;
use http\forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm();
$form->validate(['email' => $email, 'password' => $password]);
$errors = $form->getErrors();


if (count($errors) !== 0) {
    renderView("login", ['heading' => 'Login', 'errors' => $errors]);
    exit();
}
$db = App::resolve(Database::class);

$result = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email,
])->fetch();

if (!$result) {
    $errors['email'] = 'Email not found.';
    renderView("login", ['heading' => 'Login', 'errors' => $errors]);
    exit();
}

if (!password_verify($password, $result['password'])) {
    $errors['password'] = 'Incorrect password';
    renderView("login", ['heading' => 'Login', 'errors' => $errors]);
    exit();
}

login($result);
header("Location: /");
