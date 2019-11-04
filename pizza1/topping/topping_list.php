<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Topping List</h1>

	<h2>Toppings</h2>
        <table>
            <tr>
                <th>Topping Name</th>
                <th>Has Meat?</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($toppings as $topping) : ?>
            <tr>
                <td><?php echo $topping['topping']; ?></td>
                <td><?php echo $topping['is_meat']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action" value="delete_topping">
                    <input type="hidden" name="topping_id" value="<?php echo $topping['id'];?>">
                    <input type="hidden" name="topping_name" value="<?php echo $topping["topping"];?>">
                    <input type="submit" value="Delete"></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p class="last_paragraph">
            <a href="?action=show_add_form">Add Topping</a>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; 
