<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php

            $query = "SELECT * FROM comments";
            $comment_result = mysqli_query($connection, $query);
            while ($fetch_comment = mysqli_fetch_assoc($comment_result)) {
                $comment_id = $fetch_comment['comment_id'];
                $comment_post_id = $fetch_comment['comment_post_id'];
                $comment_author = $fetch_comment['comment_author'];
                $comment_email = $fetch_comment['comment_email'];
                $comment_content = $fetch_comment['comment_content'];
                $comment_status = $fetch_comment['comment_status'];
                $comment_date = $fetch_comment['comment_date'];

                $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                $post_id_comment_result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($post_id_comment_result)) {
                    $post_title = $row['post_title'];
                    $post_id = $row['post_id'];
                

                echo "
                    <tr>
                        <td>{$comment_id}</td>
                        <td>{$comment_author}</td>
                        <td>{$comment_content}</td>
                        <td>{$comment_email}</td>
                        <td>{$comment_status}</td>
                        <td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>
                        <td>{$comment_date}</td>
                        <td><a href='comments.php?approve=$comment_id'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></a></td>
                        <td><a href='comments.php?unapprove=$comment_id'><span class='glyphicon glyphicon-thumbs-down' aria-hidden='true'></span></a></td>
                        <td><a href='comments.php?delete=$comment_id'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>
                    </tr>
                    ";
            }
            }
            ?>
        </tr>

    </tbody>
</table>

<?php

if (isset($_GET['approve'])) {
    $approve_comment_id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $approve_comment_id ";
    $approve_query = mysqli_query($connection, $query);
    header("Location: comments.php");
}

if (isset($_GET['unapprove'])) {
    $unapprove_comment_id = $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $unapprove_comment_id ";
    $unapprove_query = mysqli_query($connection, $query);
    header("Location: comments.php");
}

if (isset($_GET['delete'])) {
    $delete_comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$delete_comment_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: comments.php");
}


?>