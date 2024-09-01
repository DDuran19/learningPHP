<?php

use App\App;
use App\Database;
use App\FormValidator;
use App\Response;
use App\Router;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (isset($email) && FormValidator::email($email) === false) {
    $errors['email'] = 'Please enter a valid email';
}

if (isset($password) && FormValidator::string($password, 7, 255) === false) {
    $errors['password'] = 'Please enter a valid password (7-255 characters)';
}

if (count($errors) !== 0) {
    renderView("register", ['heading' => 'Register', 'errors' => $errors]);
    exit();
}


$db = App::resolve(Database::class);

$result = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email,
])->fetch();

if (!$result) {
    $errors['email'] = 'Email not found.';
    renderView("login", ['heading' => 'Register', 'errors' => $errors]);
    exit();
}

if (!password_verify($password, $result['password'])) {
    $errors['password'] = 'Incorrect password';
    renderView("login", ['heading' => 'Register', 'errors' => $errors]);
    exit();
}

login($result);
header("Location: /");
