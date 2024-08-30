<?php

use App\Database;

$heading = "My Notes";
$db = new Database();
$id = explode("/", $_SERVER['REQUEST_URI'])[2];

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $id,
])->findOrFail();
renderView("note", ['heading' => $heading, 'note' => $note]);
