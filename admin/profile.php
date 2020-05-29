<?php include "includes/header.php" ?>

<?php

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $user_result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($user_result)) {
        $user_id = $row['user_id'];
        $user_name = $row['username'];
        $user_password = $row['user_password'];
        $user_email = $row['user_email'];
        $user_fullname = $row['user_name'];
    }
}

?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/nav.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome <?php echo $_SESSION['user_name']; ?>
                    </h1>
                    <div class="col-xs-6">
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
                                <input value="<?php echo $user_password; ?>" type="text" class="form-control" name="user_password">
                            </div>

                        </form>
                    </div>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/footer.php" ?>