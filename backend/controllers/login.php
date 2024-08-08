<?php

require(__DIR__ . "/../database.php");

$usernm = (@$_POST['username']);
$passwd = (@$_POST['password']);

if (empty($usernm) && empty($passwd)) {
    http_response_code(406);
    echo json_encode([
        "statusCode" => 1,
        "error" => "Required fields missing"
    ]);
} else {
    try {
        $passwd = md5($passwd); //to resolve conflict variable usage in PDO:STR param
        $stmt = $con->prepare("SELECT * FROM `users` where username = :user and password = :passwd");
        $stmt->bindParam(':user', $usernm, PDO::PARAM_STR);
        $stmt->bindParam(':passwd', ($passwd), PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($rows) <= 0) {
            http_response_code(401);
            echo json_encode([
                "statusCode" => 2,
                "error" => "Username or Password incorrect"
            ]);
        } else {
            //updating last login flag
            try {
                $stmt = $con->prepare("update `users` set last_login = current_timestamp() where username = :user");
                $stmt->bindParam(':user', $usernm, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode([
                    "statusCode" => 2,
                    "error" => "Error While login"
                ]);
                die();
            }
            echo json_encode([
                "statusCode" => 3,
                "error" => "Login Success",
            ]);
            $_SESSION['userData'] = [$rows[0]['id'], $rows[0]['username'], $rows[0]['full_name']];
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
