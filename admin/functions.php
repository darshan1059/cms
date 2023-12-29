<?php

function confirmQuery($result)
{
    global $connection;
    if (!$result) {
        dir("Query Failed..!" . mysqli_error($connection));
    }
}


function insert_category()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo "This field cannot be empty";
        } else {
            $query = "Insert into categories(cat_title) ";
            $query .= "Value('{$cat_title}') ";
            $create_category_query = mysqli_query($connection, $query);
            if (!$create_category_query) {
                die("Query Failed..!" . mysqli_error($connection));
            }
        }
    }
}


function findAllCategories()
{
    global $connection;
    $query = "select * from categories";
    $select_categories = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}


function deleteCategory()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];
        $query = "Delete from categories where cat_id = {$the_cat_id} ";
        $delete_category_query = mysqli_query($connection, $query);
        header("Location: categories.php"); // For refreshing the page
        if (!$delete_category_query) {
            die("Query Failed..!" . mysqli_error($connection));
        }
    }
}
