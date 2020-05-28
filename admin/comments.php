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
                    <table class="table table-hover">
                        <thead>
                            
                        </thead>
                        <tbody>

                            <?php

                            if (isset($_GET['source'])) {
                                $source = $_GET['source'];
                            } else {
                                $source = "";
                            }

                            switch ($source) {
                                case 'add_post':
                                    include "./includes/add_post.php";
                                    break;

                                case 'edit_post':
                                    include "./includes/edit_post.php";
                                    break;

                                default:
                                    include "./includes/view_all_comments.php";
                                    break;
                            }

                            ?>

                            <?php


                            if (isset($_GET['delete'])) {
                                $delete_post = $_GET['delete'];
                                $query = "DELETE FROM posts WHERE post_id = {$delete_post}";
                                $post_result = mysqli_query($connection, $query);
                            }


                            ?>


                        </tbody>
                    </table>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/footer.php" ?>