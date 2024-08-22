<?php

header('Content-Type: application/json');

require(__DIR__ . "/../../database.php");

$name = (@$_POST['name']);

if (empty($name)) {
    http_response_code(406);
    echo json_encode([
        "statusCode" => 1,
        "error" => "Required fields missing"
    ]);
} else {
    try {
        $stmt = $con->prepare("SELECT * FROM `states` where states_name = :name");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($rows) <= 0) {
            try {
                $stmt = $con->prepare("insert into `states`(states_name) values(:states)");
                $stmt->bindParam(':states', $name, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode([
                    "statusCode" => 2,
                    "error" => "Error While Creating New State"
                ]);
                die();
            }
            echo json_encode([
                "statusCode" => 3,
                "error" => "State Created Successfully",
            ]);
        } else {
            http_response_code(400);
            echo json_encode([
                "statusCode" => 2,
                "error" => "State Already Exists"
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
