<?php
    //Selects everything from categories
    function get_category() {
        global $db;
        $query = 'SELECT * FROM categories ORDER BY categoryID';
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement;
    }

    //Gets the name of a category
    function get_category_name($categoryID) {
        global $db;
        if ($categoryID == NULL || $categoryID == FALSE ) {
            //If the ID is null then it will do nothing. 
        } else {
            $query = 'SELECT * FROM categories WHERE categoryID = :categoryID';
            $statement = $db->prepare($query);
            $statement->bindValue(':categoryID', $categoryID);
            $statement->execute();
            $category = $statement->fetch();
            $statement->closeCursor();
            if($category == NULL || $category == FALSE) {
                return 'None';
            } else {
                $catName = $category['categoryName'];
                return $catName;
            }
        }
    }
    //Add a category to the database
    function add_category($catName) {
        global $db;
        $query = 'INSERT INTO categories (categoryName) VALUES (:catName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':catName', $catName);
        $statement->execute();
        $statement->closeCursor();
    }
    //Delete a category from the database
    function delete_category($categoryID) {
        global $db;
        $query = 'DELETE FROM categories WHERE
        categoryID = :categoryID';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $categoryID);
        $statement->execute();
        $statement->closeCursor();
    }


?>