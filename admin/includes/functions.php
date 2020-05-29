<?php

function checkQuery($result)
{
    global $connection;
    if (!$result) {
        die("FAILED" . mysqli_error($connection));
    }
}

function insertCategory()
{
    global $connection;
    if (isset($_POST['mySubmit'])) {

        $user_add = $_POST['categoryTitle'];

        if ($user_add == "" || empty($user_add)) {
            echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                Cannot add empty category
                </div>";
        } else {
            $query = "INSERT INTO categories(cat_title) VALUE('$user_add') ";
            $add_result = mysqli_query($connection, $query);

            echo "<div class='alert alert-success alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                Your category of <strong>$user_add</strong> has been successfully created
                </div>";
        }
    }
}

function addCategory()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $category_result_admin = mysqli_query($connection, $query);

    while ($admin_links = mysqli_fetch_assoc($category_result_admin)) {
        $category_title = $admin_links['cat_title'];
        $category_id = $admin_links['cat_id'];
        echo "  <tr>
                    <td>{$category_id}</td>
                    <td>{$category_title}</td>
                    <td><a href='categories.php?edit={$category_id}'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>
                    <td><a href='categories.php?delete={$category_id}'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>
                </tr>";
    }
}

function deleteCategory() {
    global $connection;
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$delete_id}";
        $category_delete = mysqli_query($connection, $query);
        header("Location: categories.php");
        echo $_SESSION['delete'];
    }
}

?>
