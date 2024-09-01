<?php

use App\Controllers;
use App\Router;
use Middlewares\Authenticate;
use Middlewares\Role;

$router = new Router();

$router->get("/", Controllers::HOME)
    ->get("/home", Controllers::HOME)
    ->get("/about", Controllers::ABOUT)
    ->get("/contact", Controllers::CONTACT)
    ->get("/notes", Controllers::NOTES)
    ->get("/notes/create", Controllers::NOTES_CREATE)->then(Authenticate::handle)
    ->post("/notes/create", Controllers::NOTES_CREATE)->then(Authenticate::handle)
    ->post("/notes", Controllers::NOTES)->then(Authenticate::handle)
    ->delete("/notes", Controllers::NOTES)->then(Authenticate::handle)
    ->get("/register", Controllers::REGISTER)->then(Role::handle, ['role' => 'guest', 'path' => '/'])
    ->get("/login", Controllers::LOGIN)
    ->post("/register", Controllers::REGISTER)
    ->post("/login", Controllers::LOGIN)
    ->get("/notes/:id", Controllers::NOTES, true)
    ->post("/notes/:id", Controllers::NOTES, true)->then(Authenticate::handle);

return $router;
