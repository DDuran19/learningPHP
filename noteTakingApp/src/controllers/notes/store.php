<?php
if (isset($_POST['__method']) && $_POST['__method'] === 'DELETE') {
    require(__DIR__ . '/destroy.php');
    exit();
}
if (isset($_POST['__method']) && $_POST['__method'] === 'PATCH') {
    require(__DIR__ . '/edit.php');
    exit();
}

use App\App;
use App\Database;
use App\FormValidator;

$db = App::resolve(Database::class);
requireValidators("FormValidator.php");

$heading = "Create Note";

$form = $_POST;

$errors = [];

if (!FormValidator::string($form['body'])) {
    $errors["body"] = "Please enter a note below";
}


if (count($errors) !== 0) renderView("notes/create", ['heading' => $heading, 'errors' => $errors]);

$insertedId = $db->insert("INSERT INTO notes (body, userId) VALUES (:body, :userId)", [
    'body' => $form['body'],
    'userId' => 1,
]);

header("Location: /notes/{$insertedId}");
exit();
