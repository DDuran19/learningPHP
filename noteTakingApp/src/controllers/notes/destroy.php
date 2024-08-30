<?php

use App\App;
use App\Database;

$db = App::resolve(Database::class);
$heading = "My Notes";

$id = explode("/", $_SERVER['REQUEST_URI'])[2];

$note = $db->delete("DELETE FROM notes WHERE id = :id", [
    'id' => $id,
]);

header("Location: /notes");
exit();
