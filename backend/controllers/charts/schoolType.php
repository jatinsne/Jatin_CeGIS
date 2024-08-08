<?php

require(__DIR__ . "/../../database.php");

try {
    $stmt = $con->prepare("SELECT count(id) as count FROM `schools` group by type");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $countType = [];
    foreach ($rows as $value) {
        array_push($countType, $value['count']);
    }
    echo json_encode([
        "statusCode" => 3,
        "data" => $countType
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    $error = "Error: " . $e->getMessage();
    echo json_encode([
        "statusCode" => 2,
        "error" => $error
    ]);
}
