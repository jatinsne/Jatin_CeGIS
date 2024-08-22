<?php

header('Content-Type: application/json');

require(__DIR__ . "/../../database.php");

$name = (@$_POST['name']);
$tehsilid = (@$_POST['tehsilid']);

if (empty($name) || empty($tehsilid)) {
    http_response_code(406);
    echo json_encode([
        "statusCode" => 1,
        "error" => "Required fields missing"
    ]);
} else {
    try {
        $stmt = $con->prepare("SELECT * FROM `block` where block_name = :name and tehsil_id= :tehsilid");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':tehsilid', $tehsilid, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($rows) <= 0) {
            try {
                $stmt = $con->prepare("insert into `block`(block_name,tehsil_id) values(:name,:tehsilid)");
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':tehsilid', $tehsilid, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode([
                    "statusCode" => 2,
                    "error" => "Error While Creating New Block"
                ]);
                die();
            }
            echo json_encode([
                "statusCode" => 3,
                "error" => "Block Created Successfully",
            ]);
        } else {
            http_response_code(400);
            echo json_encode([
                "statusCode" => 2,
                "error" => "Block Already Exists"
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
