<?php

require('../model/database.php');
require('../model/initial.php');
require('../model/day_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list';
    }
}
$current_day = get_day($db);  // TODO: get day from DB

if ($action == 'initial_db') {
    try {
        initial_db($db);
        header("Location: .");
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include ('../errors/database_error.php');
        exit();
    }
}else if($action == 'list') {
    try {
        $todays_orders = get_orders_of_day($db, $current_day);
        include('day_list.php');
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
    
} else if ($action == 'next_day') {
    try {
        finish_orders_for_day($db, $current_day);
        increment_day($db);
        header("Location: .");
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
}