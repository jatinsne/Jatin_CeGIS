<?php

header('Content-Type: application/json');

require(__DIR__ . "/../../database.php");

//parsing DELETE Request
parse_str(file_get_contents("php://input"), $_DELETE);

$id = (@$_DELETE['id']);

if (empty($id)) {
    http_response_code(406);
    echo json_encode([
        "statusCode" => 1,
        "error" => "Required fields missing"
    ]);
} else {
    try {
        $stmt = $con->prepare("DELETE FROM `assets` where id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        echo json_encode([
            "statusCode" => 3,
            "error" => "Asset Deleted Successfully",
        ]);
    } catch (PDOException $e) {
        http_response_code(500);
        $error = "Error: " . $e->getMessage();
        echo json_encode([
            "statusCode" => 2,
            "error" => $error
        ]);
    }
}
