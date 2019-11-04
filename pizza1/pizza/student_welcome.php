<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Welcome Student!</h1>
        <h2>Available Sizes</h2>
        <p>
            <?php foreach ($sizes as $size) : ?>
            <?php echo $size['size']; ?>
            <?php endforeach; ?>
        </p>
        <h2>Available Toppings</h2>
        <p>
            <?php foreach ($toppings as $topping) : ?>
            <?php echo $topping['topping']; ?>
            <?php endforeach; ?>
        </p>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="show_user_status">
            <p>Username:
                <select name="order_user">
                    <?php for ($cursor = 0; $cursor < count($users) ; $cursor++): ?>
                    <option <?php if ($cursor == 0) { echo 'selected = "selected"';}?>
                        value="<?php echo $users[$cursor]['id']; ?>"> <?php echo $users[$cursor]['username']; ?>
                    </option>
                    <?php endfor; ?>
                </select>
                <input type="submit" value="Select Your Username" />
            </p>
        </form>
        <div id="status" <?php echo $show_status; ?>>
            <form action="index.php" method="post">
                <h2>Order status for User:</h2>
                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>Username</th>
                        <th>Size</th>
                        <th>Toppings</th>
                        <th>Day</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php if($user_orders) { ?>
                    <?php foreach ($user_orders as $order) : ?>
                    <tr>
                        <td><?php echo $order['id']; ?> </td>
                        <td><?php echo $order['username']; ?> </td>
                        <td><?php echo $order['size']; ?></td>
                        <td>
                            <?php foreach ($order_toppings[$order['id']] as $topping): ?>
                                <?php echo $topping['topping']; ?>
                                <?php echo(" "); ?>
                            <?php endforeach;?>
                        </td>
                        <td><?php echo $order['day']; ?></td>
                        <td><?php echo $order['status']; ?> </td>
                        <?php if($order['status'] == 'Baked') { ?>
                        <td><input type="hidden" name="action" value="update_order_status">
                        <input type="hidden" name="order_user" value="<?php echo $order['user_id']; ?>">
                            <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                            <input type="submit" value="Acknowledge" /></td>

                        <?php }else { ?>
                        <td>&nbsp</td>
                        <?php } ?>
                    </tr>
                    <?php endforeach; ?>
                    <?php } ?>
                </table>
            </form>
        </div>

        <p>
            <a href="index.php?action=order_pizza"><strong>Order Pizza</strong></a>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; 