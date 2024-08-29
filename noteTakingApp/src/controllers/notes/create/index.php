<?php

use App\Database;

requireValidators("FormValidator.php");

$heading = "Create Note";

$form = $_POST;
$db = new Database();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    var_dump($form);
    if (FormValidator::string($form['body'])) {
        $errors["body"] = "Please enter a note below";
    }


    $db->query("INSERT INTO notes (body, userId) VALUES (:body, :userId)", [
        'body' => $form['body'],
        'userId' => 1,
    ]);
}

require(__DIR__ . "/view.php");
