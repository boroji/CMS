<?php include "db.php"; ?>
<?php include "functions.php"; ?>
<?php session_start(); ?>

<?php 

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $login_result = mysqli_query($connection, $query);

    checkQuery($login_result);

    while ($row = mysqli_fetch_assoc($login_result)) {
        $db_user_id = $row['user_id'];
        $db_user_name = $row['username'];
        $db_user_fullname= $row['user_name'];
        $db_user_password = $row['user_password'];
    }



    if ($username === $db_user_name && $password === $db_user_password) {
        header("Location: ../admin");
        $_SESSION['username'] = $db_user_name;
        $_SESSION['user_name'] = $db_user_fullname;
        $_SESSION['user_password'] = $db_user_password;
        
    } else if($username !== $db_user_name && $password !== $db_user_password) {
        header("Location: ../index.php");
    } else {
        header("Location: ../index.php");
    }
}


?>