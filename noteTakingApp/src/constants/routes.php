<?php

use App\Controllers;
use App\Router;

$router = new Router();

$router->get("/", Controllers::HOME)
    ->get("/home", Controllers::HOME)
    ->get("/about", Controllers::ABOUT)
    ->get("/contact", Controllers::CONTACT)
    ->get("/notes", Controllers::NOTES)
    ->get("/notes/create", Controllers::NOTES_CREATE)
    ->post("/notes/create", Controllers::NOTES_CREATE)
    ->post("/notes", Controllers::NOTES)
    ->delete("/notes", Controllers::NOTES)
    ->get("/register", Controllers::REGISTER)
    ->get("/login", Controllers::LOGIN)
    ->post("/register", Controllers::REGISTER)
    ->post("/login", Controllers::LOGIN)
    ->get("/notes/:id", Controllers::NOTES, true)
    ->post("/notes/:id", Controllers::NOTES, true);

return $router;
