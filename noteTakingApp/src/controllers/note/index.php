<?php

use App\Database;

$heading = "My Notes";

$db = new Database();
$id = $_GET['id'];
$currentUserId = 1;

if (isset($id)) {
    $note = $db->query("SELECT * FROM notes WHERE id = :id", [
        'id' => $id,
    ])->findOrFail();

    authorize($note['userId'] === $currentUserId);
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $db->query("DELETE FROM notes WHERE id = :id", [
            'id' => $id,
        ]);
        header("Location: /notes");
        exit();
    }


    require(__DIR__ . "/view.php");
} else {
    echo "Note not found";
}
