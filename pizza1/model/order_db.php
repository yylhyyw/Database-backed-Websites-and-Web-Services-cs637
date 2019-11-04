<?php
function create_order($db, $user_id, $size, $day, $status, $topping) {
	global $db;
    $query = 'INSERT INTO pizza_orders(user_id, size, day, status) '
            . 'VALUES (:user_id,:size,:day,:status)';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':size', $size);
    $statement->bindValue(':day', $day);
    $statement->bindValue(':status', $status);
    $statement->execute();
    foreach ($topping as $t) {
        create_order_topping($db, $t);
    }
    $statement->closeCursor();
}

function create_order_topping($db, $topping) {
    
        $query = 'INSERT INTO order_topping(order_id, topping) '
                . 'VALUES (last_insert_id(),:topping)';
        $statement = $db->prepare($query);
        $statement->bindValue(':topping', $topping);
        $statement->execute();
        $statement->closeCursor();
}

function get_orders_of_user($db, $user_id) {
    $query = 'SELECT pizza_orders.id, pizza_orders.user_id, pizza_orders.size, pizza_orders.status, shop_users.username, pizza_orders.day FROM pizza_orders INNER JOIN shop_users ON shop_users.id = pizza_orders.user_id 
                where pizza_orders.user_id=:id ';
    $statement = $db->prepare($query);
    $statement->bindValue(':id',$user_id);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor(); 
    return $orders;
}
function make_order_finished($db, $order_id) {
    $query = 'UPDATE pizza_orders SET status=\'Finished\' WHERE id = :order_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':order_id',$order_id);
    $statement->execute();
    $statement->closeCursor();        
}

function get_baked_orders($db) {
    $query = 'SELECT pizza_orders.id, shop_users.username FROM pizza_orders INNER JOIN shop_users ON shop_users.id = pizza_orders.user_id 
    where pizza_orders.status=\'Baked\'';
    $statement = $db->prepare($query);
    $statement->execute(); 
    $orders = $statement->fetchAll();
    $statement->closeCursor();    
    return $orders;  
}
function get_preparing_orders($db) {
    $query = 'SELECT pizza_orders.id, shop_users.username FROM pizza_orders INNER JOIN shop_users ON shop_users.id = pizza_orders.user_id 
    where pizza_orders.status=\'Preparing\'';
    $statement = $db->prepare($query);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;  
}
function get_oldest_preparing_id($db) {
    $query = 'SELECT min(id) AS id FROM pizza_orders where status=\'Preparing\'';
    $statement = $db->prepare($query);
    $statement->execute();
    $id = $statement->fetch();
    $statement->closeCursor();
    return $id['id'];
}
function make_baked($db, $id) {
    $query = 'UPDATE pizza_orders SET status= \'Baked\' WHERE status=\'Preparing\' and id=:id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id',$id);
    $statement->execute();
    $statement->closeCursor();     
}
function get_toppings_by_Order($db, $order_id) {
    $query = "SELECT * FROM order_topping WHERE order_id = :order_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":order_id", $order_id);
    $statement->execute();
    $toppings = $statement->fetchAll();
    $statement->closeCursor();
    return $toppings;
}