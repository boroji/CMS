<form action="" method="post">
    <div class="form-group">
        <label for="updateTitle">Update Category</label>
        <?php
        // updating the category
        if (isset($_GET['edit'])) {
            $edit_id = $_GET['edit'];
            $query = "SELECT * FROM categories WHERE cat_id = {$edit_id}";
            $category_edit = mysqli_query($connection, $query);

            while ($edit_links = mysqli_fetch_assoc($category_edit)) {
                $cat_title = $edit_links['cat_title'];
                $cat_id = $edit_links['cat_id'];

        ?>


                <input value="<?php if (isset($cat_title)) {
                                    echo $cat_title;
                                } ?>" type="text" class="form-control" name="updateTitle" id="updateTitle">

        <?php }
        } ?>
    </div>
    <div class="form-group">
        <?php
        // update category
        if (isset($_POST['update'])) {
            $new_title = $_POST['updateTitle'];
            $query = "UPDATE categories SET cat_title = '{$new_title}' WHERE cat_id = {$cat_id}";
            $category_update = mysqli_query($connection, $query);
        }
        ?>
        <input type="submit" class="btn btn-success" name="update" value="Update">
    </div>
</form>