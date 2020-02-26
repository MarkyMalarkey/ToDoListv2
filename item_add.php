<?php include 'view/header.php'; ?>
<main>
    <!--Lets the user add an item to the list-->
    <h1>Add Item</h1>
    <form action="index.php" method="POST" id="add_item_form">
        <input type="hidden" name="action" value="add_item">

        <label>Category:</label>
        <select name="categoryID">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Name</label>
        <input type="text" name="name" />
        <br>

        <label>Description</label>
        <input type="text" name="desc" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Item" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_items">View Item List</a>
    </p>
</main>
<?php include('view/footer.php');