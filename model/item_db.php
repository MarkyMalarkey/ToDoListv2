<?php
    //Get items by category ID
    function get_item_by_category($categoryID) {
        global $db;
        if ($categoryID == NULL || $categoryID == FALSE) {
            $query = 'SELECT * FROM todoitems ORDER BY ItemNum';
            $statement = $db->prepare($query);
            $statement->execute();
            $item = $statement->fetchAll();
            $statement->closeCursor();
            return $item;
        } else {
            $query = 'SELECT * FROM todoitems WHERE 
            todoitems.categoryID = :categoryID ORDER BY ItemNum';
            $statement = $db->prepare($query);
            $statement->bindValue(':categoryID', $categoryID);
            $statement->execute();
            $item = $statement->fetchAll();
            $statement->closeCursor();
            return $item;
        }
    }
    //Get items by item number
    function get_item($ItemNum) {
        global $db;
        $query = 'SELECT * FROM todoitems WHERE ItemNum = :ItemNum';
        $statement = $db->prepare($query);
        $statement->bindValue(':ItemNum', $ItemNum);
        $statement->execute();
        $item = $statement->fetch();
        $statement->closeCursor();
        return $item;
    }
    //Delete item by item num
    function delete_item($ItemNum) {
        global $db;
        $query = 'DELETE FROM todoitems WHERE ItemNum = :ItemNum';
        $statement = $db->prepare($query);
        $statement->bindValue(':ItemNum', $ItemNum);
        $statement->execute();
        $statement->closeCursor();
    }
    //Add item to list
    function add_item($name, $desc, $categoryID) {
        global $db;
        $query = 'INSERT INTO todoitems (Title, Description, categoryID) VALUES ( :name, :desc, :categoryID)';
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':desc', $desc);
        $statement->bindValue(':categoryID', $categoryID);
        $statement->execute();
        $statement->closeCursor();
    }
?>