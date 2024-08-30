<?php

use App\Database;

$heading = "My Notes";
$db = new Database();
$notes = $db->query("SELECT * FROM notes")->get();

renderView("notes", ['heading' => $heading, 'notes' => $notes]);
