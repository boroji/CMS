<?php include "includes/header.php" ?>

<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            if (isset($_GET['p_id'])) {
                $the_post_id = $_GET['p_id'];
            }

            $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
            $result_post = mysqli_query($connection, $query);

            while ($row_post = mysqli_fetch_assoc($result_post)) {
                $post_id = $row_post['post_id'];
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
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

            <?php } ?>

            <!-- Blog Comments -->

            <?php

            if (isset($_POST['create_comment'])) {
                $the_post_id = $_GET['p_id'];

                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];

                $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                $query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now()) ";

                $create_comment_query = mysqli_query($connection, $query);

                checkQuery($create_comment_query);

                $query = "UPDATE posts SET post_comment_counts = post_comment_counts + 1 WHERE post_id = $the_post_id ";
                $update_comment_count = mysqli_query($connection, $query);
                checkQuery($update_comment_count);
            }


            ?>

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label for="comment_author">Name</label>
                        <input class="form-control" type="text" name="comment_author">
                    </div>
                    <div class="form-group">
                        <label for="comment_email">Email</label>
                        <input class="form-control" type="email" name="comment_email">
                    </div>
                    <div class="form-group">
                        <label for="comment_content">Comment</label>
                        <textarea class="form-control" rows="3" name="comment_content"></textarea>
                    </div>
                    <button name="create_comment" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <?php


            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
            $query .= "AND comment_status = 'approved' ";
            $query .= "ORDER BY comment_id DESC ";
            $select_comment_query = mysqli_query($connection, $query);
            checkQuery($select_comment_query);

            while ($row = mysqli_fetch_assoc($select_comment_query)) {
                $comment_author = $row['comment_author'];
                $comment_date = $row['comment_date'];
                $comment_content = $row['comment_content'];
            ?>

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>

            <?php }  ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php" ?>

    </div>
    <!-- /.row -->

    <hr>


    <?php include "includes/footer.php" ?>