<?php 
$title = "Add Category";
include 'include/head.php';
$errors = array();

if (isset($_POST['save'])) {
    $catName = $_POST['cat_name'];
    $catSlug = $_POST['cat_slug'];
    $createdAt = time();

    if (empty($catName)){
        array_push($errors,"Category Name is Required");
    }
    if (empty($catSlug)){
        array_push($errors,"Category Slug  is Required");
    }

    $sql = "INSERT INTO categories (name, slug, created_at) VALUE('$catName', '$catSlug', '$createdAt')";

    if (count($errors) == 0){
        mysqli_query($conn, $sql); 
        $_SESSION['success'] = "Category Created Successfully !";
    }
    mysqli_close($conn);
    
}

?>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

            <?php include 'include/navbar.php';?>
            <!-- /.navbar-top-links -->

            <?php include 'include/sidebar.php';?>

            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Add Category</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-sm-12">

            <?php include 'include/message.php';?>
            </div>

            <form action="add-category.php" method="post">
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="cat_name" placeholder="Category Name">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label>Slug</label>
                        <input class="form-control" name="cat_slug" placeholder="Category Slug">
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" name="save" class="btn btn-success">
                        Save
                    </button>
                    <a href="list-category.php" class="btn btn-primary">All Category</a>
                </div>
            </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include 'include/footer.php';?>

</body>

</html>
