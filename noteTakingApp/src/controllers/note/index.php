<?php

use App\Database;

$heading = "My Notes";

$db = new Database();
$id = $_GET['id'];;

if (isset($id)) {
    $note = $db->query("SELECT * FROM notes WHERE id = :id", [
        'id' => $id,
    ])->findOrFail();

    // authorize($note['userId'] === $_SESSION['user']);
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $db->query("DELETE FROM notes WHERE id = :id", [
            'id' => $id,
        ]);
        header("Location: /notes");
        exit();
    }


    renderView("note", ['heading' => $heading]);
} else {
    echo "Note not found";
}
