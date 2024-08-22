<?php
header("Content-Type:application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET,PUT,POST,DELETE");

session_start();

require_once __DIR__ . '/router.php';

//Core-Auth APIs
get('/api', 'controllers/index.php');
post('/api/login', 'controllers/login.php');
get('/api/stats', 'controllers/stats.php');
get('/api/schoolType', 'controllers/charts/schoolType.php');

//State APIs
get('/api/state', 'controllers/states/list.php');
post('/api/state', 'controllers/states/create.php');
put('/api/state', 'controllers/states/update.php');
delete('/api/state', 'controllers/states/delete.php');

//District APIs
get('/api/district', 'controllers/district/list.php');
post('/api/district', 'controllers/district/create.php');
put('/api/district', 'controllers/district/update.php');
delete('/api/district', 'controllers/district/delete.php');

//Tehsil APIs
get('/api/tehsil', 'controllers/tehsil/list.php');
post('/api/tehsil', 'controllers/tehsil/create.php');
put('/api/tehsil', 'controllers/tehsil/update.php');
delete('/api/tehsil', 'controllers/tehsil/delete.php');

//Block APIs
get('/api/block', 'controllers/block/list.php');
post('/api/block', 'controllers/block/create.php');
put('/api/block', 'controllers/block/update.php');
delete('/api/block', 'controllers/block/delete.php');

//School APIs
get('/api/school', 'controllers/school/list.php');
post('/api/school', 'controllers/school/create.php');
put('/api/school', 'controllers/school/update.php');
delete('/api/school', 'controllers/school/delete.php');

//Material APIs
get('/api/material', 'controllers/material/list.php');
post('/api/material', 'controllers/material/create.php');
put('/api/material', 'controllers/material/update.php');
delete('/api/material', 'controllers/material/delete.php');


any('/api/404', 'controllers/404.php');
