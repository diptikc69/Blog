<?php 
$title = "Edit Tags";
include 'include/head.php';
$editId = $_GET['id'];
//echo $editId;
$sql = "SELECT * FROM tags WHERE id = $editId";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    $slug = $row['slug'];
}
if (isset($_POST['update'])) { 
    $catName = $_POST['cat_name'];
    $catSlug = $_POST['cat_slug'];
$sql = "UPDATE tags SET name ='". $catName."', slug = '".$catSlug. "' WHERE id = '". $editId."'";
    
    if (mysqli_query($conn, $sql)) {
        $success = "Tags  Updates Created Successfully !";
    } else {
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>
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
                    <h2 class="page-header">Add tag</h2>
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

            <form action="edit-tag.php?id=<?php echo $editId;?>" method="post">
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input value="<?php echo $name; ?>" class="form-control" name="cat_name" placeholder="Tag Name">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label>Slug</label>
                        <input  value="<?php echo $slug; ?>" class="form-control" name="cat_slug" placeholder="Tag Slug">
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" name="update" class="btn btn-success">
                        Update
                    </button>
                    <a href="list-tag.php" class="btn btn-primary">All Tag</a>
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
