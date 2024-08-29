<?php

// return [
//     "/" => "/routes/home/index.php",
//     "/home" => "/routes/home/index.php",
//     "/about" => "/routes/about/index.php",
//     "/contact" => "/routes/contact/index.php",
//     "/notes" => "/routes/notes/index.php",
//     "/notes/create" => "/routes/notes/create/index.php",
//     "/note" => "/routes/note/index.php",
// ];


$router->get("/", "home");
$router->get("/home", "home");
$router->get("/about", "about");
$router->get("/contact", "contact");
$router->get("/notes", "notes");
$router->get("/notes/create", "notes/create");
$router->get("/note", "note");
