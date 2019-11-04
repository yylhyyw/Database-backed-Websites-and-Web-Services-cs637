<?php
require('../model/database.php');
require('../model/size_db.php');
require('../model/topping_db.php');
require('../model/user_db.php');
require('../model/day_db.php');
require('../model/order_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'student_welcome';
    }
}

if ($action == 'student_welcome') {
    try {
        $sizes = get_sizes($db);
        $toppings = get_toppings($db);
        $users = get_users($db);
        $user_orders = null;
        $show_status='style="display: none;"';
        include('student_welcome.php');
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
    }
}
else if ($action == 'order_pizza') 
{
try{
        $sizes = get_sizes($db);
        $toppings = get_toppings($db);
        $users = get_users($db);
        include('order_pizza.php');
	}
    catch (PDOException $e) 
    {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');    
    }
    
}
elseif ($action == 'create_order') 
{
   	$size = filter_input(INPUT_GET, 'pizza_size');
    $user_id = filter_input(INPUT_GET, 'order_user');
 	$status = 'Preparing';
    $topping = filter_input(INPUT_GET, 'pizza_topping', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

    try {
        $current_day = get_day($db);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }

    if ($size == NULL || $topping == NULL) 
    {
        $error = "Invalid size or topping data.";
        include('../errors/error.php');
    }
    try {
        create_order($db, $user_id, $size, $current_day, $status, $topping);
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
        
    }
    header("Location: .");
}
else if ($action == 'show_user_status') {
    $sizes = get_sizes($db);
    $toppings = get_toppings($db);
    $users = get_users($db);
    $order_toppings = array();
    $user_id = filter_input(INPUT_POST,'order_user',FILTER_VALIDATE_INT);
    $user_orders = get_orders_of_user($db, $user_id);
    foreach ($user_orders as $user_order) {
        $order_toppings[$user_order['id']] = get_toppings_by_Order($db, $user_order['id']);
    }
    $show_status = null;
    include('student_welcome.php');
}elseif ($action == 'update_order_status') {
    try {
        $order_id = filter_input(INPUT_POST,'order_id',FILTER_VALIDATE_INT);
        $user_id = filter_input(INPUT_POST,'order_user',FILTER_VALIDATE_INT);
        make_order_finished($db, $order_id);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
    $sizes = get_sizes($db);
    $toppings = get_toppings($db);
    $users = get_users($db);
    $user_orders = get_orders_of_user($db, $user_id);
    $show_status = null;
    include('student_welcome.php');
}