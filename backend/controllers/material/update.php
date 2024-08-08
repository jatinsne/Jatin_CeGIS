<?php

header('Content-Type: application/json');

require(__DIR__ . "/../../database.php");

//parsing PUT Request
parse_str(file_get_contents("php://input"), $_PUT);

$id = (@$_PUT['id']);
$name = (@$_PUT['name']);
$isrequired = (isset($_PUT['isrequired']) ? "1" : "0");
$quantity_available = (@$_PUT['quantity_available']);
$quantity_working_condition = (@$_PUT['quantity_working_condition']);
$schoolid = (@$_PUT['school_id']);

if (empty($name) || empty($id) || empty($schoolid) || empty($quantity_available) || empty($quantity_working_condition)) {
    http_response_code(406);
    echo json_encode([
        "statusCode" => 1,
        "error" => "Required fields missing"
    ]);
} else {
    $quantity_reductant = intval($quantity_available) - intval($quantity_working_condition); //calculating reductant stock
    try {
        $stmt = $con->prepare("update `assets` set asset_name = :name, is_required = :required, quantity_available = :qntavail,quantity_working_condition=:qntworking,quantity_reductant=:qntredunct,school_id=:schoolid, updated_on=current_timestamp() where id = :id");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':required', $isrequired, PDO::PARAM_STR);
        $stmt->bindParam(':qntavail', $quantity_available, PDO::PARAM_STR);
        $stmt->bindParam(':qntworking', $quantity_working_condition, PDO::PARAM_STR);
        $stmt->bindParam(':qntredunct', $quantity_reductant, PDO::PARAM_STR);
        $stmt->bindParam(':schoolid', $schoolid, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        echo json_encode([
            "statusCode" => 3,
            "error" => "Asset Updated Successfully",
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
