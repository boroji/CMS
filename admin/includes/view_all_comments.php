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

                echo "
                    <tr>
                        <td>{$comment_id}</td>
                        <td>{$comment_author}</td>
                        <td>{$comment_content}</td>
                        <td>{$comment_email}</td>
                        <td>{$comment_status}</td>
                        <td>dsasa</td>
                        <td>{$comment_date}</td>
                        <td><a href='post.php?source=edit_post&p_id=#'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></a></td>
                        <td><a href='post.php?delete=#'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>
                        <td><a href='post.php?delete=#'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>
                    </tr>
                    ";
            }
            ?>
        </tr>

    </tbody>
</table>