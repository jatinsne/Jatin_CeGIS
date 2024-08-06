<?php

header('Content-Type: application/json');

require(__DIR__ . "/../../database.php");

$name = (@$_POST['name']);
$type = (@$_POST['type']);
$blockid = (@$_POST['blockid']);

if (empty($name) || empty($type) || empty($blockid) || !isset($_SESSION['userData'][0])) {
    http_response_code(406);
    echo json_encode([
        "statusCode" => 1,
        "error" => "Required fields missing"
    ]);
} else {
    $userid = $_SESSION['userData'][0];
    try {
        $stmt = $con->prepare("SELECT * FROM `schools` where name = :name and block_id = :blockid");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':blockid', $blockid, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($rows) <= 0) {
            try {
                $stmt = $con->prepare("insert into `schools`(name,type,block_id,user_id) values(:name,:type,:blockid,:userid)");
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':type', $type, PDO::PARAM_STR);
                $stmt->bindParam(':blockid', $blockid, PDO::PARAM_STR);
                $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode([
                    "statusCode" => 2,
                    "error" => "Error While Creating New School"
                ]);
                die();
            }
            echo json_encode([
                "statusCode" => 3,
                "error" => "School Created Successfully",
            ]);
        } else {
            http_response_code(400);
            echo json_encode([
                "statusCode" => 2,
                "error" => "School Already Exists"
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
