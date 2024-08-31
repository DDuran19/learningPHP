<?php

$heading = "Home";

$_SESSION['currentUser'] = 1;
renderView("home", ['heading' => $heading]);
