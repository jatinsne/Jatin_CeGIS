<?php

$config = require __DIR__ . "/config.php";

date_default_timezone_set($config['dateTimeZone']);

try {
    $con = new PDO(
        "mysql:host=" . $config['database']['host'] .
            ";dbname=" . $config['database']['dbname'] . ";charset=UTF8",
        $config['database']['username'],
        $config['database']['password']
    );
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode([
        "status" => 0,
        "msg" => "ERROR: Could not connect. " . $e->getMessage(),
    ]);
    die();
}
