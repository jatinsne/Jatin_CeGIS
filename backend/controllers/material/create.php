<?php

header('Content-Type: application/json');

require(__DIR__ . "/../../database.php");

$name = (@$_POST['name']);
$isrequired = (isset($_POST['isrequired']) ? "1" : "0");
$quantity_available = (@$_POST['quantity_available']);
$quantity_working_condition = (@$_POST['quantity_working_condition']);
$schoolid = (@$_POST['school_id']);

if (empty($name) || empty($quantity_available) || empty($schoolid) || empty($quantity_working_condition)) {
    http_response_code(406);
    echo json_encode([
        "statusCode" => 1,
        "error" => "Required fields missing"
    ]);
} else {
    $quantity_reductant = intval($quantity_available) - intval($quantity_working_condition);
    try {
        $stmt = $con->prepare("SELECT * FROM `assets` where asset_name = :name and school_id = :schoolid");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':schoolid', $schoolid, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($rows) <= 0) {
            try {
                $stmt = $con->prepare("insert into `assets`(asset_name,is_required,quantity_available,quantity_working_condition,quantity_reductant,school_id) values(:name,:required,:qntavail,:qntworking,:qntredunct,:schoolid)");
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':required', $isrequired, PDO::PARAM_STR);
                $stmt->bindParam(':qntavail', $quantity_available, PDO::PARAM_STR);
                $stmt->bindParam(':qntworking', $quantity_working_condition, PDO::PARAM_STR);
                $stmt->bindParam(':qntredunct', $quantity_reductant, PDO::PARAM_STR);
                $stmt->bindParam(':schoolid', $schoolid, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode([
                    "statusCode" => 2,
                    "error" => "Error While Creating New Asset"
                ]);
                die();
            }
            echo json_encode([
                "statusCode" => 3,
                "error" => "Asset Created Successfully",
            ]);
        } else {
            http_response_code(400);
            echo json_encode([
                "statusCode" => 2,
                "error" => "Asset Already Exists"
            ]);
        }
    } catch (PDOException $e) {
        http_response_code(500);
        $error = "Error: " . $e->getMessage();
        echo json_encode([
            "statusCode" => 2,
            "error" => $error
        ]);
    }
}
