<?php include "includes/header.php" ?>

<div id="wrapper">


    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>

                    <div class="col-xs-6">

                        <?php insert_category(); ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Category Title</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>

                        <?php //Update and include
                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];
                            include "includes/update_categories.php";
                        }
                        ?>

                    </div> <!--Add Category Form-->

                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php //Find all categories 
                                findAllCategories(); ?>

                                <?php //Delete category
                                deleteCategory();
                                ?>

                            </tbody>
                        </table>
                    </div>

                    <!-- <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Blank Page
                        </li>
                    </ol> -->
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "includes/footer.php" ?>