<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Edit User</th>
            <th>Delete User</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php

            $query = "SELECT * FROM users ";
            $user_result = mysqli_query($connection, $query);
            while ($fetch_user = mysqli_fetch_assoc($user_result)) {
                $user_id = $fetch_user['user_id'];
                $user_name = $fetch_user['username'];
                $user_password = $fetch_user['user_password'];
                $user_email = $fetch_user['user_email'];
                $user_fullname = $fetch_user['user_name'];
        
                echo "
                    <tr>
                        <td>{$user_id}</td>
                        <td>{$user_name}</td>
                        <td>{$user_fullname}</td>
                        <td>{$user_email}</td>
                        <td><a href='users.php?source=edit_users&edit=$user_id'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>
                        <td><a href='users.php?delete=$user_id'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>
                    </tr>
                    ";
            
            }
            ?>
        </tr>

    </tbody>
</table>

<?php

if (isset($_GET['delete'])) {
    $delete_user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$delete_user_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: users.php");
}




?>