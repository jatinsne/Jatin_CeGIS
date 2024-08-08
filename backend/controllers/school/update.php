<?php

header('Content-Type: application/json');

require(__DIR__ . "/../../database.php");

//parsing PUT Request
parse_str(file_get_contents("php://input"), $_PUT);

$id = (@$_PUT['id']);
$name = (@$_PUT['name']);
$type = (@$_PUT['type']);
$blockid = (@$_PUT['blockid']);
$status = (@$_PUT['status']);

if (empty($name) || empty($id) || empty($blockid) || empty($type)) {
    http_response_code(406);
    echo json_encode([
        "statusCode" => 1,
        "error" => "Required fields missing"
    ]);
} else {
    try {
        $stmt = $con->prepare("update `schools` set name = :name, type = :type, block_id = :blockid, status = :status,updated_on=current_timestamp() where id = :id");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);
        $stmt->bindParam(':blockid', $blockid, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        echo json_encode([
            "statusCode" => 3,
            "error" => "School Updated Successfully",
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
