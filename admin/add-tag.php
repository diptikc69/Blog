<?php 
$title = "Add Tag";
include 'include/head.php';

if (isset($_POST['save'])) {
    $tagName = $_POST['tag_name'];
    $tagSlug = $_POST['tag_slug'];
    $createdAt = time();

    $sql = "INSERT INTO tags (name, slug, created_at) VALUE('$tagName', '$tagSlug', '$createdAt')";

    if (mysqli_query($conn, $sql)) {
        $success = "Tag Created Successfully !";
    } else {
        echo mysqli_error($conn);
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
                    <h2 class="page-header">Add Tags</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-sm-12">
            <?php 
                if (!empty($success)) { ?>
                    <div class="alert alert-success">
                        <?php echo $success;  ?>
                    </div>
                <?php } ?>
            </div>

            <form action="add-tag.php" method="post">
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="tag_name" placeholder="Tag Name">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label>Slug</label>
                        <input class="form-control" name="tag_slug" placeholder="Tag Slug">
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" name="save" class="btn btn-success">
                        Save
                    </button>
                    <a href="list-tag.php" class="btn btn-primary">All tags</a>
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
