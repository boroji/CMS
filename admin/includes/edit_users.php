<?php


if (isset($_GET['edit'])) {
    $edit_user_id = $_GET['edit'];

    $query = "SELECT * FROM users WHERE user_id = $edit_user_id";
    $user_result = mysqli_query($connection, $query);
    while ($fetch_user = mysqli_fetch_assoc($user_result)) {
        $user_id = $fetch_user['user_id'];
        $user_name = $fetch_user['username'];
        $user_password = $fetch_user['user_password'];
        $user_email = $fetch_user['user_email'];
        $user_fullname = $fetch_user['user_name'];
    }
}

if (isset($_POST['user_update'])) {
    $user_name = $_POST['username'];
    $user_fullname = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $query = "UPDATE users SET ";
    $query .= "username = '{$user_name}', ";
    $query .= "user_name = '{$user_fullname}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_email = '{$user_email}' ";
    $query .= "WHERE user_id = $edit_user_id ";

    $edit_query = mysqli_query($connection, $query);
    header("Location: users.php");
}

?>


<form action="" method="post">

    <div class="form-group">
        <label for="username">Username</label>
        <input value="<?php echo $user_name; ?>" type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="user_name">Fullname</label>
        <input value="<?php echo $user_fullname; ?>" type="text" class="form-control" name="user_name">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input value="<?php echo $user_email; ?>" type="text" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input value="<?php echo $user_password; ?>" type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input class="btn btn-success" type="submit" name="user_update" value="Update User">
    </div>


</form>