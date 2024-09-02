<?php

$heading = "Login";
renderView("login", ['heading' => $heading, 'errors' => $_SESSION['__flash']['errors'] ?? []]);
