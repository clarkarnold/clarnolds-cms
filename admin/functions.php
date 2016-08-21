<?php

function confirm($query) {
    // function used to return error if there is a connection issue
    global $connection;
    if(!$query) {
        die("Query Failed, " . mysqli_error($connection));
    }
}




function insert_categories() {
    // insert categories into database
    global $connection;
    if(isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if($cat_title=="" || empty($cat_title)) {
            echo "<p class='bg-danger'>This field should not be blank.</p>";
        } else {
            $query = "INSERT INTO category(cat_title) ";
            $query .= "VALUE('{$cat_title}') ";

            $create_category = mysqli_query($connection, $query);

            if(!$create_category) {
                die("Error " . mysqli_error($connection));
            }
        }
    }
}

function view_categories() {
    // select all categories 
    global $connection;
    $query = "SELECT * FROM category";
    $category_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($category_query)) {
        $id = $row["cat_id"];
        $cat_title = $row["cat_title"];
        echo "
        <tr>
            <td>{$id}</td>
            <td><p>{$cat_title}</p>
                <div class='btn-toolbar'>
                <a class='btn btn-sm btn-danger pull-right' href='categories.php?delete={$id}'> Delete</a><a class=' btn btn-sm btn-warning pull-right' href='categories.php?edit={$id}'>Edit </a> 
                </div>
            </td>
        </tr>";
    }
}

function delete_category() {
    global $connection;
    if(isset($_GET['delete'])) {
        $get_cat_id = $_GET['delete'];
        $get_query = "DELETE FROM category WHERE cat_id = {$get_cat_id} ";
        $delete_query = mysqli_query($connection, $get_query);
        header("Location: categories.php");
    }
}

?>