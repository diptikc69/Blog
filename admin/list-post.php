<?php 
$title = "Post List";
include 'include/head.php';

$sql = "SELECT * FROM posts";
$results = mysqli_query($conn, $sql);

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
                    <h2 class="page-header">Post List</h2>
                    <a href="add-post.php" class="btn btn-primary"><i class="fa fa-plus"></i> Add Post</a>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="margin-top:20px;">
                <div class="col-sm-12">
                <?php include 'include/message.php';?>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Image</td>
                                <td>Title</td>
                                <td>Slug</td>
                                <td>Created At</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if (mysqli_num_rows($results) > 0) { 
                        while($row = mysqli_fetch_array($results)){
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['id']; ?>
                            </td>
                            <td>
                                <img width="60" src="<?php echo $row['image']; ?>">
                            </td>
                            <td>
                                <?php echo $row['title']; ?>
                            </td>
                            <td>
                                <?php echo $row['slug']; ?>
                            </td>
                            <td>
                                <?php echo $row['created_at']; ?>
                            </td>
                            <td>
                            <a href="edit-post.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-success ">Edit</a>
                            <a href="delete-post.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-danger ">Delete</a>
                            </td>
                        </tr>
                    <?php 
                        }                    
                    }else{
                        echo "<tr><td>No Records found.</td></tr>";
                    }
                    mysqli_close($conn);
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include 'include/footer.php';?>

</body>

</html>
