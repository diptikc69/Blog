<?php 
$title = "View User";
include 'include/head.php';
$editId = $_GET['id'];
//echo $editId;
$sql = "SELECT * FROM users WHERE id = $editId";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
    $fullName = $row['full_name'];
    $email = $row['email'];
}
if (isset($_POST['update'])) { 
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    
$sql = "UPDATE users SET full_name ='". $fullName."', email = '".$email. "' WHERE id = '". $editId."'";
    
    if (mysqli_query($conn, $sql)) {
        $success = "User  Updates Created Successfully !";
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
                    <h2 class="page-header">View </h2>
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

            <form action="view-user.php?id=<?php echo $editId;?>" method="post">
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input value="<?php echo $fullName; ?>"
                         class="form-control" name="full_name" placeholder="Full Name">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input  value="<?php echo $email; ?>" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" name="update" class="btn btn-success">
                        Update
                    </button>
                    <a href="list-user.php" class="btn btn-primary">All Users</a>
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
