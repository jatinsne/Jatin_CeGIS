<?php

header('Content-Type: application/json');

require(__DIR__ . "/../../database.php");

//parsing PUT Request
parse_str(file_get_contents("php://input"), $_PUT);

$id = (@$_PUT['id']);
$name = (@$_PUT['name']);
$tehsilid = (@$_PUT['tehsilid']);

if (empty($name) || empty($id) || empty($tehsilid)) {
    http_response_code(406);
    echo json_encode([
        "statusCode" => 1,
        "error" => "Required fields missing"
    ]);
} else {
    try {
        $stmt = $con->prepare("update `block` set block_name = :name,tehsil_id = :tehsilid where id = :id");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':tehsilid', $tehsilid, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        echo json_encode([
            "statusCode" => 3,
            "error" => "Block Updated Successfully",
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
