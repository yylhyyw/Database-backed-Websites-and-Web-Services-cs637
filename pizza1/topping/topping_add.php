<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Add Topping</h1>

        <form action="index.php" method="post" id="add_topping_form">
            <input type="hidden" name="action" value="add_topping">

            <label>Tooping Name:</label>
            <input type="text" name="topping_name" />
            <br>

            <label>Does this topping contain meats?</label>
            <input type="radio" name="is_meat" value="meat"> Has Meat
            <input type="radio" name="is_meat" value="meatless"> Meatless
            <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_toppings">View Topping List</a>
    </p>
    </section>
</main>

