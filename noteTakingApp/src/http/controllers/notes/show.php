<?php

use Core\App;
use Core\Database;
use Core\Response;
use Core\Router;

$db = App::resolve(Database::class);
$heading = "My Notes";
$id = explode("/", $_SERVER['REQUEST_URI'])[2];;
if (isset($_GET['mode']) && $_GET['mode'] === 'edit') {

    require(__DIR__ . '/edit.php');
    authorize($note['userId'] === $_SESSION['user'], Response::FORBIDDEN);
    exit();
}

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $id,
])->findOrFail();
renderView("note", ['heading' => $heading, 'note' => $note]);
