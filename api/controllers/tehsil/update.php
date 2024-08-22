<?php

header('Content-Type: application/json');

require(__DIR__ . "/../../database.php");

//parsing PUT Request
parse_str(file_get_contents("php://input"), $_PUT);

$id = (@$_PUT['id']);
$name = (@$_PUT['name']);
$districtid = (@$_PUT['districtid']);

if (empty($name) || empty($id) || empty($districtid)) {
    http_response_code(406);
    echo json_encode([
        "statusCode" => 1,
        "error" => "Required fields missing"
    ]);
} else {
    try {
        $stmt = $con->prepare("update `tehsil` set tehsil_name = :name,district_id = :districtid where id = :id");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':districtid', $districtid, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        echo json_encode([
            "statusCode" => 3,
            "error" => "Tehsil Updated Successfully",
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
