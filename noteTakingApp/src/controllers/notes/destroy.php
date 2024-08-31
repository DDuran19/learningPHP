<?php

use App\App;
use App\Database;
use App\Response;
use App\Router;

$db = App::resolve(Database::class);
$heading = "My Notes";

$id = explode("/", $_SERVER['REQUEST_URI'])[2];;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $id,
])->findOrFail();

if (! isset($note)) {
    Router::abort(Response::NOT_FOUND);
}
authorize($note['userId'] == $_SESSION['user'], Response::FORBIDDEN);

$note = $db->delete("DELETE FROM notes WHERE id = :id AND userId = :user", [
    'id' => $id,
    'user' => $_SESSION['user'],
]);

header("Location: /notes");
exit();
