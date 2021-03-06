<?php include "includes/header.php" ?>

<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            $query = "SELECT * FROM posts";
            $result_post = mysqli_query($connection, $query);

            while ($row_post = mysqli_fetch_assoc($result_post)) {
                $post_id = $row_post['post_id'];
                $post_title = $row_post['post_title'];
                $post_author = $row_post['post_author'];
                $post_date = $row_post['post_date'];
                $post_content = $row_post['post_content'];
                $post_image = $row_post['post_image'];

            ?>
            <!-- First Blog Post -->
            <h2>
                <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
            <hr>
            <img class="img-responsive" src="img/<?php echo $post_image; ?>" alt="This is an image of a tea">
            <hr>
            <p><?php echo $post_content; ?></p>

            <hr>

            <?php } ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php" ?>

    </div>
    <!-- /.row -->

    <hr>


    <?php include "includes/footer.php" ?>