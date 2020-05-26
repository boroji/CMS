<?php include "includes/header.php" ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/nav.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome
                        <small>Author</small>
                    </h1>

                    <div class="col-xs-6">

                        <?php

                        if (isset($_POST['mySubmit'])) {
                            $user_add = $_POST['categoryTitle'];

                            if ($user_add == "" || empty($user_add)) {
                                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                        Cannot add empty category
                                        </div>";
                            } else {
                                $query = "INSERT INTO categories(cat_title) VALUE('$user_add') ";
                                $add_result = mysqli_query($connection, $query);

                                if(!$add_result) {
                                    die(mysqli_error($connection));
                                }
                            }
                        }

                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="categoryTitle">Add Category</label>
                                <input type="text" class="form-control" name="categoryTitle" id="categoryTitle">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="mySubmit" value="Add">
                            </div>
                        </form>
                    </div>

                    <div class="col-xs-6">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Categories</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $query = "SELECT * FROM categories";
                                $category_result_admin = mysqli_query($connection, $query);

                                while ($admin_links = mysqli_fetch_assoc($category_result_admin)) {
                                    $category_title = $admin_links['cat_title'];
                                    $category_id = $admin_links['cat_id'];
                                    echo "  <tr>
                                                <td>{$category_id}</td>
                                                <td>{$category_title}</td>
                                            </tr>";
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/footer.php" ?>