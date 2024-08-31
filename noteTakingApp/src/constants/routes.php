<?php

use App\Controllers;
use App\Router;
use Middlewares\Authenticate;

$router = new Router();

$router->get("/", Controllers::HOME)
    ->get("/home", Controllers::HOME)
    ->get("/about", Controllers::ABOUT)
    ->get("/contact", Controllers::CONTACT)
    ->get("/notes", Controllers::NOTES)
    ->get("/notes/create", Controllers::NOTES_CREATE)->then(Authenticate::run)
    ->post("/notes/create", Controllers::NOTES_CREATE)->then(Authenticate::run)
    ->post("/notes", Controllers::NOTES)->then(Authenticate::run)
    ->delete("/notes", Controllers::NOTES)->then(Authenticate::run)
    ->get("/register", Controllers::REGISTER)
    ->get("/login", Controllers::LOGIN)
    ->post("/register", Controllers::REGISTER)
    ->post("/login", Controllers::LOGIN)
    ->get("/notes/:id", Controllers::NOTES, true)
    ->post("/notes/:id", Controllers::NOTES, true)->then(Authenticate::run);

return $router;
