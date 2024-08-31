<?php

use App\App;
use App\Database;
use App\FormValidator;
use App\Response;

$db = App::resolve(Database::class);
requireValidators("FormValidator.php");

$heading = "Create Note";

$form = $_POST;

$errors = [];

$currentUserId = 3;
authorize($note['userId'] === $currentUserId, Response::FORBIDDEN);

if (!FormValidator::string($form['body'])) {

    $errors["body"] = "Please enter a note below";
}

if (count($errors) !== 0) renderView("notes/create", ['heading' => $heading, 'errors' => $errors]);

$result = $db->query("INSERT INTO notes (body, userId) VALUES (:body, :userId)", [
    'body' => $form['body'],
    'userId' => 1,
]);

header("Location: /notes/");
