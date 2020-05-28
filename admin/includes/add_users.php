<?php

if (isset($_POST['user_add'])) {
    $user_name = $_POST['username'];
    $user_fullname = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $query = "INSERT INTO users(username, user_name, user_email, user_password) VALUES ('{$user_name}','{$user_fullname}','{$user_email}','{$user_password}' ) ";
    $user_result = mysqli_query($connection, $query);

    checkQuery($user_result);
}

?>

<form action="" method="post">

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="user_name">Fullname</label>
        <input type="text" class="form-control" name="user_name">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="user_add" value="Add User">
    </div>


</form>