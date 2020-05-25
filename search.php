<?php include "includes/header.php" ?>

<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            if (isset($_POST['submit'])) {
                $search = $_POST['search'];

                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                $search_result = mysqli_query($connection, $query);

                if (!$search_result) {
                    die("faild" . mysqli_error($connection));
                }

                $search_count = mysqli_num_rows($search_result);

                if ($search_count == 0) {
                    echo "<h1>No Result</h1>";
                } else {
                    while ($row_post = mysqli_fetch_assoc($search_result)) {
                        $post_title = $row_post['post_title'];
                        $post_author = $row_post['post_author'];
                        $post_date = $row_post['post_date'];
                        $post_content = $row_post['post_content'];
                        $post_image = $row_post['post_image'];

            ?>

                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>

                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                        <hr>
                        <img class="img-responsive" src="img/<?php echo $post_image; ?>" alt="This is an image of a tea">
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

            <?php }
                }
            }
            ?>



        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php" ?>

    </div>
    <!-- /.row -->

    <hr>


    <?php include "includes/footer.php" ?>