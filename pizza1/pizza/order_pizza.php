<?php include '../view/header.php'; ?>
<main>
    <h1> Build Your Pizza! </h1>
    <form  action="index.php" method="get">
        <input type="hidden" name="action" value="create_order"/>
        <h2> Pizza Sizes:</h2>
        <p>
        <?php foreach ($sizes as $size) : ?>
            <input type="radio" name="pizza_size" 
                value="<?php echo $size['size']; ?>">
                <?php echo $size['size']; ?>
            </input>              
        <?php endforeach; ?>
        </p>
        <h2> Toppings:</h2>
        <fieldset style="float: left;">
            <legend>Meat</legend>
                <?php foreach ($toppings as $topping) : ?>
                    <?php if($topping['is_meat'] == 1) { ?>
                        <input type="checkbox" name="pizza_topping[]" 
                            value="<?php echo $topping['topping']; ?>" >
                            <?php echo $topping['topping']; ?>
                            </input>
                    <?php } ?>
                <?php endforeach;?> 
        </fieldset>
        <fieldset style="float: left;">
            <legend>Meatless</legend>
                <?php foreach ($toppings as $topping) : ?>
                    <?php if($topping['is_meat'] == 0) { ?>
                        <input type="checkbox" name="pizza_topping[]" 
                            value="<?php echo $topping['topping']; ?>" >
                            <?php echo $topping['topping']; ?>
                            </input>
                    <?php } ?>
                <?php endforeach;?> 
        </fieldset>
        <br>
        <p>Username: 
            <select name="order_user">
                    <?php for ($cursor = 0; $cursor < count($users) ; $cursor++): ?>
                        <option <?php if ($cursor == 0) { echo 'selected = "selected"';}?> 
                             value="<?php echo $users[$cursor]['id']; ?>" > <?php echo $users[$cursor]['username']; ?> </option>
                    <?php endfor; ?> 

            </select>
        </p>
        <p><input type="submit" value="Order Pizza" /></p>
    </form>
</main>
<?php include '../view/footer.php'; 