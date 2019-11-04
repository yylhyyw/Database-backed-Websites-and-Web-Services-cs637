<?php
require('../model/database.php');
require('../model/order_db.php');
require('../model/user_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_orders';
    }
}
// TODO: actions list_orders, changed_to_baked

if ($action == 'list_orders') {
    try {
        $baked_orders = get_baked_orders($db);
        $preparing_orders = get_preparing_orders($db);
        include('order_list.php');
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include ('../errors/database_error.php');
        exit();
    }
} else if ($action == 'make_baked') {
    try {
        $id = get_oldest_preparing_id($db);
        make_baked($db, $id);
        header("Location: .");
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include ('../errors/database_error.php');
        exit();
    }
} 