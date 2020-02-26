<?php include('view/header.php'); ?>
<main>
    
    <!-- Displays a list of the categories -->
    <h1>To Do List</h1>

    <aside>
        <h2>Categories</h2>
        <nav>
        <ul>
        <?php foreach ($categories as $category) : ?>
            <li>
            <a href="?categoryID=<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </a>
            </li>
        <?php endforeach; ?>
        </ul>
        </nav>
    </aside>

    <section>
        <!-- Displays a table of the items -->
        <h2><?php echo $catName; ?></h2>
        <table>
            <tr>
                <th>Item ID </th>
                <th>Name </th>
                <th>Description</th>
                <th>Category</th>
                <th>Category ID </th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($items as $item) : ?>
            <tr>
                <td><?php echo $item['ItemNum']; ?></td>
                <td><?php echo $item['Title']; ?></td>
                <td><?php echo $item['Description']; ?></td>
                <td><?php if ($catName == NULL || $catName == FALSE) {
                    echo get_category_name($item['categoryID']);
                } else {
                    echo $catName; 
                } ?></td>
                <td><?php echo $item['categoryID']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action" value="delete_item">
                    <input type="hidden" name="ItemNum" value="<?php echo $item['ItemNum']; ?>">
                    <input type="hidden" name="categoryID" value="<?php echo $item['categoryID']; ?>">
                    <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p class="last_paragraph">
                <a href="?action=show_add_form">Add Item</a>
                
        </p>
        <p class="last_paragraph">
                <a href="?action=list_items">View list</a>
        </p>
        <p class="last_paragraph">
                <a href="?action=list_categories">Add/Delete category</a>
        </p>
    </section>
</main>
<?php include('view/footer.php');