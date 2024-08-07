<?php

header('Content-Type: application/json');

require(__DIR__ . "/../../database.php");

//parsing PUT Request
parse_str(file_get_contents("php://input"), $_PUT);

$id = (@$_PUT['id']);
$name = (@$_PUT['name']);
$stateid = (@$_PUT['stateid']);

if (empty($name) || empty($id) || empty($stateid)) {
    http_response_code(406);
    echo json_encode([
        "statusCode" => 1,
        "error" => "Required fields missing"
    ]);
} else {
    try {
        $stmt = $con->prepare("update `district` set district_name = :name,states_id = :stateid where id = :id");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':stateid', $stateid, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        echo json_encode([
            "statusCode" => 3,
            "error" => "District Updated Successfully",
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
