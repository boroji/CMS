<?php

if (isset($_GET['p_id'])) {
    $post_edit_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = $post_edit_id ";
$post_result_id = mysqli_query($connection, $query);
while ($fetch_post = mysqli_fetch_assoc($post_result_id)) {
    $post_id = $fetch_post['post_id'];
    $post_author = $fetch_post['post_author'];
    $post_title = $fetch_post['post_title'];
    $post_category = $fetch_post['post_category_id'];
    $post_status = $fetch_post['post_status'];
    $post_image = $fetch_post['post_image'];
    $post_tags = $fetch_post['post_tags'];
    $post_content = $fetch_post['post_content'];
    $post_comment = $fetch_post['post_comment_counts'];
    $post_date = $fetch_post['post_date'];
}


?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Title</label>
        <input value="<?php echo $post_id; ?>" type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="categories">Categories</label>
        <select name="post_category" id="post_category">

            <?php

            $query = "SELECT * FROM categories ";
            $select_categories = mysqli_query($connection, $query);


            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];


                if ($cat_id == $post_category_id) {


                    echo "<option selected value='{$cat_id}'>{$cat_title}</option>";
                } else {

                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
            }

            ?>


        </select>

    </div>

    <div class="form-group">
        <label for="author">Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="post_status">Status</label>
        <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
    </div>

    <div class="form-group">
        <img width="350" src="../img/<?php echo $post_image; ?>">
    </div>

    <div class="form-group">
        <label for="post_tags">Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control " name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?>
        
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-success" type="submit" name="create_post" value="Edit">
    </div>


</form>