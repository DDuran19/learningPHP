<?php

use App\App;
use App\Database;

$db = App::resolve(Database::class);
$heading = "My Notes";
$notes = $db->query("SELECT * FROM notes")->get();

renderView("notes", ['heading' => $heading, 'notes' => $notes]);
