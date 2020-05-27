<?php 
                            
$query = "SELECT * FROM posts";
$post_result = mysqli_query($connection, $query);
while($fetch_post = mysqli_fetch_assoc($post_result)) {
    $post_id = $fetch_post['post_id'];
    $post_author = $fetch_post['post_author'];
    $post_title = $fetch_post['post_title'];
    $post_category = $fetch_post['post_category_id'];
    $post_status = $fetch_post['post_status'];
    $post_image = $fetch_post['post_image'];
    $post_tags = $fetch_post['post_tags'];
    $post_comment = $fetch_post['post_comment_counts'];
    $post_date = $fetch_post['post_date'];

    echo "
    <tr>
        <td>{$post_id}</td>
        <td>{$post_author}</td>
        <td>{$post_title}</td>
        <td>{$post_category}</td>
        <td>{$post_status}</td>
        <td><img class='img-thumbnail' src='../img/$post_image' width='100'></td>
        <td>{$post_tags}</td>
        <td>{$post_comment}</td>
        <td>{$post_date}</td>
    </tr>
    ";
}
?>