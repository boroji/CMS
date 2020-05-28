<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>

    </div>

    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php

                    $query = "SELECT * FROM categories";
                    $category_result = mysqli_query($connection, $query);

                    while ($links = mysqli_fetch_assoc($category_result)) {
                        $category_title = $links['cat_title'];
                        $category_id = $links['cat_id'];

                        echo "<li><a href='category.php?category=$category_id'>{$category_title}</a></li>";
                    }

                    ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Admin Login</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Enter username">
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Enter password">
            </div>
            <div class="form-group">
                <input name="login" type="submit" class="form-control btn btn-primary" value="Log In">
            </div>
        </form>

        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php"; ?>

</div>