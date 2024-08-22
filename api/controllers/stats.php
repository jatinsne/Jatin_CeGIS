<?php

require(__DIR__ . "/../database.php");

try {
    $stmt = $con->prepare("select (select count(id) from states) as statecount, (SELECT count(id) from district) as districtcount , (SELECT count(id) from tehsil) as tehsilcount , (SELECT count(id) from block) as blockcount , (SELECT count(id) from schools) as schoolcount , (SELECT count(id) from assets) as assetcount");
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
