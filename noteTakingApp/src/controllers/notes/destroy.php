<?php

use App\App;
use App\Database;
use App\Response;
use App\Router;

$db = App::resolve(Database::class);
$heading = "My Notes";

$id = explode("/", $_SERVER['REQUEST_URI'])[2];;

if (! isset($note)) {
    Router::abort(Response::FORBIDDEN);
}
authorize($note['userId'] === $_SESSION['user'], Response::FORBIDDEN);

$note = $db->delete("DELETE FROM notes WHERE id = :id", [
    'id' => $id,
]);

header("Location: /notes");
exit();
