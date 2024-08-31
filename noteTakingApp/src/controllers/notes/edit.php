<?php

use App\App;
use App\Database;
use App\FormValidator;
use App\Response;
use App\Router;

$db = App::resolve(Database::class);
$heading = "My Notes";
$id = explode("/", $_SERVER['REQUEST_URI'])[2];
$form = $_POST;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $note = $note = $db->query("SELECT * FROM notes WHERE id = :id", [
        'id' => $id,
    ])->findOrFail();

    $currentUserId = 3;
    if (! isset($note)) {
        Router::abort(Response::FORBIDDEN);
    }
    authorize($note['userId'] === $currentUserId, Response::FORBIDDEN);
    renderView("note", ['heading' => $heading, 'note' => $note, 'errors' => $errors]);
    exit();
}


if (!FormValidator::string($form['body'])) {
    $errors["body"] = "Please enter a note below";
}

if (count($errors) !== 0) renderView("notes/{$id}", ['heading' => $heading, 'errors' => $errors]);

$db->query("UPDATE notes SET body = :body WHERE id = :id", [
    'id' => $id,
    'body' => $form['body'],
]);
$note = $note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $id,
])->findOrFail();
renderView("note", ['heading' => $heading, 'note' => $note, 'errors' => $errors]);
