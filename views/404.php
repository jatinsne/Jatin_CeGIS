<?php

header('Content-Type: application/json');
http_response_code(404);

echo json_encode([
    "statusCode" => 2,
    "error" => "Not Found"
]);
