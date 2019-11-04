<?php
function get_day($db) {
    $query = 'SELECT * FROM pizza_sys_tab';    
    $statement = $db->prepare($query);
    $statement->execute();    
    $currentday = $statement->fetch();
    $statement->closeCursor();    
    $current_day = $currentday['current_day'];
    return $current_day;
}
function get_orders_of_day($db, $day) {
    $query = 'SELECT pizza_orders.id, shop_users.username, pizza_orders.status FROM pizza_orders INNER JOIN shop_users ON shop_users.id = pizza_orders.user_id where day=:day';
    $statement = $db->prepare($query);
    $statement->bindValue(':day',$day);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();   
    return $orders;
}
function finish_orders_for_day($db, $current_day) {
    $query = 'UPDATE pizza_orders SET status= \'Finished\' WHERE day=:current_day';
    $statement = $db->prepare($query);
    $statement->bindValue(':current_day',$current_day);
    $statement->execute();
    $statement->closeCursor(); 
}
function increment_day($db){
    $query = 'UPDATE pizza_sys_tab SET current_day=current_day + 1';    
    $statement = $db->prepare($query);
    $statement->execute();    
    $statement->closeCursor();    
}