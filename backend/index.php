<?php
header("Content-Type:application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET,PUT,POST,DELETE");

session_start();

require_once __DIR__ . '/router.php';

//Core-Auth APIs
get('/', 'controllers/index.php');
post('/login', 'controllers/login.php');

//State APIs
get('/state', 'controllers/states/list.php');
post('/state', 'controllers/states/create.php');
put('/state', 'controllers/states/update.php');
delete('/state', 'controllers/states/delete.php');

//District APIs
get('/district', 'controllers/district/list.php');
post('/district', 'controllers/district/create.php');
put('/district', 'controllers/district/update.php');
delete('/district', 'controllers/district/delete.php');

//Tehsil APIs
get('/tehsil', 'controllers/tehsil/list.php');
post('/tehsil', 'controllers/tehsil/create.php');
put('/tehsil', 'controllers/tehsil/update.php');
delete('/tehsil', 'controllers/tehsil/delete.php');

//Block APIs
get('/block', 'controllers/block/list.php');
post('/block', 'controllers/block/create.php');
put('/block', 'controllers/block/update.php');
delete('/block', 'controllers/block/delete.php');

//School APIs
get('/school', 'controllers/school/list.php');
post('/school', 'controllers/school/create.php');
put('/school', 'controllers/school/update.php');
delete('/school', 'controllers/school/delete.php');

//Material APIs
get('/material', 'controllers/material/list.php');
post('/material', 'controllers/material/create.php');
put('/material', 'controllers/material/update.php');
delete('/material', 'controllers/material/delete.php');
