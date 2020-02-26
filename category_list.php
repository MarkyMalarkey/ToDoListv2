<?php include('view/header.php'); ?>
<main>
    
    <!--Iterates through each category to make a list-->
    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($categories as $category) : ?>
        <tr>    
            <td><?php echo $category['categoryName']; ?></td>
            <td><form action="." method="post">
                    <input type="hidden" name="action" value="delete_category">
                    <input type="hidden" name="categoryID" value="<?php echo $category['categoryID']; ?>">
                    <input type="submit" value="Delete">
                    </form>
                </td>
        </tr>
        <?php endforeach; ?>
    
    </table>
    
    <!--Lets the user add a category to the database-->
    <h2>Add Category</h2>
    <form action="index.php" method="POST">
        <input type="hidden" name="action" value="add_category">
            <label>Category Name:</label>
            <input type="text" name="name"><br>
            <label>&nbsp;</label>
            <input type="submit" value="Add Category" />
        </form>
        <p><a href="index.php">View to do list</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>