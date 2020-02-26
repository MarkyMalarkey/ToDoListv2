<?php
    require('model/category_db.php');
    require('model/item_db.php');
    require('model/database.php');

    //Lets the user perform an action. If the action is empty it goes to the item list
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_items';
        }
    }
    if ($action == 'list_items') { //This is the default action, it just lists the to do list items.
        $categoryID = filter_input(INPUT_GET, 'categoryID', FILTER_VALIDATE_INT);
        $catName = get_category_name($categoryID);
        $categories = get_category();
        $items = get_item_by_category($categoryID);
        include('item_list.php');    
    } else if ($action == 'delete_item') { //This controls deleting an item
        $ItemNum = filter_input(INPUT_POST, 'ItemNum', FILTER_VALIDATE_INT);
        $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);
        if ($categoryID == NULL || $categoryID == FALSE || $ItemNum == NULL || $ItemNum == FALSE) {
           $error = "Missing or incorrect item id or category id.";
           include('errors/error.php'); 
        } else {
            delete_item($ItemNum);
            header("Location: .?action=list_items");
        }
    } else if ($action == 'show_add_form') { //Controls adding an item to the list
        $categories = get_category();
        include('item_add.php');
    } else if ($action == 'add_item') {
        $name = filter_input(INPUT_POST, 'name');
        $desc = filter_input(INPUT_POST, 'desc');
        $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);
        if ($name == NULL ||$desc == NULL || $categoryID == NULL || $categoryID == FALSE ) {
            $error = "Invalid item field. Check all fields and try again.";
            include('errors/error.php');
        } else {
            add_item($name, $desc, $categoryID);
            header("Location: .?action=list_items");
        }
    } else if ($action == 'list_categories' ) { //Shows the category listing 
        $categories = get_category();
        include('category_list.php');
    } else if ($action == 'add_category') {
        $name = filter_input(INPUT_POST, 'name');
        if ($name == NULL) {
            $error = "Invalid category name detected.";
            include('errors/error.php');
        } else {
            add_category($name);
            header("Location: .?action=list_categories");
        }
    } else if ($action == 'delete_category') { //Controls deleting a category
        $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);
        if ($categoryID == NULL || $categoryID == FALSE) {
            $error = "Invalid category id detected.";
            include('errors/error.php');
        } else {
            delete_category($categoryID);
            header("Location: .?action=list_categories");
        }
    }

?>