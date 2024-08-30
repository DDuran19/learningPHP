<?php

use App\App;
use App\Database;

$db = App::resolve(Database::class);
requireValidators("FormValidator.php");

$heading = "Create Note";

$form = $_POST;

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!FormValidator::string($form['body'])) {

        $errors["body"] = "Please enter a note below";
    } else {
        $result = $db->query("INSERT INTO notes (body, userId) VALUES (:body, :userId)", [
            'body' => $form['body'],
            'userId' => 1,
        ]);

        header("Location: /notes/");
        exit();
    }
}

renderView("notes/create", ['heading' => $heading, 'errors' => $errors]);
