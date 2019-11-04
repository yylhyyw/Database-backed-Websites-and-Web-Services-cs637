<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Current Orders Report</h1>
        <h2>Orders Baked but not delivered</h2>
        <?php if (count($baked_orders) > 0): ?>
            <?php foreach ($baked_orders as $baked_order) : ?>
                <?php echo " ID:" . $baked_order['id']; ?>
                <?php echo "User" . $baked_order['username']; ?><br>  
            <?php endforeach; ?>
        <?php else: ?>
            <p>No Baked orders</p>
        <?php endif; ?>
        <h2>Orders Preparing (in the oven)</h2>
        <?php if (count($preparing_orders) > 0): ?>
            <?php foreach ($preparing_orders as $preparing_order) : ?>
                <?php echo "ID:" . $preparing_order['id']; ?> 
                <?php echo "User:" . $preparing_order['username']; ?>
        <br> 
        <?php endforeach; ?>
        <?php else: ?>
            <p>No orders are prepared in oven</p>
        <?php endif; ?>
        <br>
        <form action="index.php" method="post" >
            <input type="hidden" name="action" value="make_baked">
            <input type="submit" value="Mark Oldest Pizza Baked" />
            <br>
        </form>
        <br>
    </section>
</main>
<?php include '../view/footer.php'; 