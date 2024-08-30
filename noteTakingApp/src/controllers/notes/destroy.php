<?php

use App\Database;

$heading = "My Notes";
$db = new Database();
$id = explode("/", $_SERVER['REQUEST_URI'])[2];

$note = $db->delete("DELETE FROM notes WHERE id = :id", [
    'id' => $id,
]);

header("Location: /notes");
exit();
