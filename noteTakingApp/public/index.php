<?php

declare(strict_types=1);

use Core\Session;

session_start();

require("../pathAliases.php");

require SOURCE . "/utils/index.php";
require VIEWS . "bootstrap/view.php";
requireControllers("router.php");
Session::unFlash();
