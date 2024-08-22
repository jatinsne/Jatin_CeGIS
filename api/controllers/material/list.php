<?php
header('Content-Type: application/json');

require(__DIR__ . "/../../database.php");

try {
    $stmt = $con->prepare("SELECT * FROM `assetview`");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode([
        "statusCode" => 3,
        "data" => $rows
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    $error = "Error: " . $e->getMessage();
    echo json_encode([
        "statusCode" => 2,
        "error" => $error
    ]);
}
