<?php
if (isset($_POST['__method']) && $_POST['__method'] === 'DELETE') {
    require(__DIR__ . '/destroy.php');
    exit();
}

use App\Database;

requireValidators("FormValidator.php");

$heading = "Create Note";

$form = $_POST;
$db = new Database();

$errors = [];

if (!FormValidator::string($form['body'])) {
    $errors["body"] = "Please enter a note below";
}
if (count($errors) === 0) {
    $insertedId = $db->insert("INSERT INTO notes (body, userId) VALUES (:body, :userId)", [
        'body' => $form['body'],
        'userId' => 1,
    ]);

    header("Location: /notes/{$insertedId}");
    exit();
}
renderView("notes/create", ['heading' => $heading, 'errors' => $errors]);
