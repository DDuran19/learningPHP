<?php

use Core\Session;

$heading = "Register";
renderView("register", ['heading' => "Register", 'errors' => Session::getFlash('errors')]);
