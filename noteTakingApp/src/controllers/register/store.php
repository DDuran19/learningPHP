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
$result = 0;
try {
    $result = $db->insert("INSERT INTO users (email, password) VALUES (:email, :password)", [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ], false);
} catch (\Exception $e) {
    if (preg_match("/Duplicate entry '(.+)' for key 'users.email'/", $e->getMessage(), $matches)) {
        $errors = [
            'email' => 'Email already exists',
        ];
        renderView("register", ['heading' => 'Register', 'errors' => $errors]);
        exit();
    }

    Router::abort(Response::SOMETHING_WENT_WRONG);
}

$_SESSION['user'] = $result;
header("Location: /");
exit();
