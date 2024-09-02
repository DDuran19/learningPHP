<?php

declare(strict_types=1);

session_start();

require("../pathAliases.php");

requireClasses();
require SOURCE . "/utils/index.php";
require VIEWS . "bootstrap/view.php";
requireControllers("router.php");
unset($_SESSION['__flash']);
