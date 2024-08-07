<?php

header('Content-Type: application/json');

require(__DIR__ . "/../../database.php");

$name = (@$_POST['name']);
$stateid = (@$_POST['stateid']);

if (empty($name) || empty($stateid)) {
    http_response_code(406);
    echo json_encode([
        "statusCode" => 1,
        "error" => "Required fields missing"
    ]);
} else {
    try {
        $stmt = $con->prepare("SELECT * FROM `district` where district_name = :name and states_id= :stateid");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':stateid', $stateid, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($rows) <= 0) {
            try {
                $stmt = $con->prepare("insert into `district`(district_name,states_id) values(:name,:stateid)");
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':stateid', $stateid, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode([
                    "statusCode" => 2,
                    "error" => "Error While Creating New District"
                ]);
                die();
            }
            echo json_encode([
                "statusCode" => 3,
                "error" => "District Created Successfully",
            ]);
        } else {
            http_response_code(400);
            echo json_encode([
                "statusCode" => 2,
                "error" => "District Already Exists"
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
