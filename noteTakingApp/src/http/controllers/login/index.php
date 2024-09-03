<?php

use Core\Session;

renderView("login", ['heading' => "Login", 'errors' => Session::getFlash('errors') ?? []]);
