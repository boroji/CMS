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
                        <?php insertCategory(); ?>
                        
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="categoryTitle">Add Category</label>
                                <input type="text" class="form-control" name="categoryTitle" id="categoryTitle">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="mySubmit" value="Add">
                            </div>
                        </form>
                        <?php 
                        
                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];

                            include "includes/update.php";
                        }
                        
                        ?>
                    </div>

                    <div class="col-xs-6">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Categories</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php addCategory(); ?>
                                <?php deleteCategory(); ?>
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