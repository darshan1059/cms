<form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Edit Category</label>

        <?php
        if (isset($_GET['edit'])) {
            $the_cat_id = $_GET['edit'];
            $query = "select * from categories where cat_id = $the_cat_id ";
            $select_categories_id = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_categories_id)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

        ?>
                <input value="<?php if (isset($cat_title)) {
                                    echo $cat_title;
                                }  ?>" class="form-control" type="text" name="cat_title">
        <?php
            }
        }


        ?>

        <?php //Update category

        if (isset($_POST['update_category'])) {
            $the_cat_title = $_POST['cat_title'];
            $query = "Update categories set cat_title = '{$the_cat_title}' where cat_id = {$cat_id} ";
            $update_category_query = mysqli_query($connection, $query);
            header("Location: categories.php"); // For refreshing the page
            if (!$update_category_query) {
                die("Query Failed..!" . mysqli_error($connection));
            }
        }

        ?>


    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>
</form>