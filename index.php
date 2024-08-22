<?php

session_start();

require_once __DIR__ . '/router.php';

get("/", "views/login.php");
get("/login", "views/login.php");
get("/logout", "views/logout.php");
get("/dashboard", "views/dashboard.php");
get("/states", "views/states.php");
get("/district", "views/district.php");
get("/tehsil", "views/tehsil.php");
get("/block", "views/block.php");
get("/school", "views/school.php");
get("/asset", "views/asset.php");
any('/404', 'views/404.php');
