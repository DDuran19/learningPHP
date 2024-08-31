<?php

use App\App;
use App\Database;
use App\FormValidator;
use App\Response;

$db = App::resolve(Database::class);

$heading = "Create Note";

$form = $_POST;

$errors = [];;

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    renderView("notes/create", ['heading' => $heading, 'errors' => $errors]);
    exit();
}
if (!FormValidator::string($form['body'])) {

    $errors["body"] = "Please enter a note below";
}

if (count($errors) !== 0) renderView("notes/create", ['heading' => $heading, 'errors' => $errors]);

$result = $db->query("INSERT INTO notes (body, userId) VALUES (:body, :userId)", [
    'body' => $form['body'],
    'userId' => $_SESSION['user'],
]);

header("Location: /notes/");
