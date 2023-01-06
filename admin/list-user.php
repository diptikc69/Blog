<?php 
$title = "User List";
include 'include/head.php';

$sql = "SELECT * FROM users";
$results = mysqli_query($conn, $sql);

?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php include 'include/navbar.php';?>
            <?php include 'include/sidebar.php';?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header"> Users List </h2>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="margin-top:20px;">
                <div class="col-sm-12">
                <?php include 'include/message.php';?>
                    </div>
                    
                
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Full Name</td>
                                <td>Email</td>
                                <td>Role</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(mysqli_num_rows($results) > 0){
                            while ($row = mysqli_fetch_array
                            ($results)){ 
                        ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['full_name'];?>
                                </td>
                                <td><?php echo $row['email'];?>
                                </td>
                                <td>
                                <?php  
                                if($row['is_admin'] == 1){
                                echo 'Admin'; 
                                }else{
                                echo 'User' ;}
                                 ?>
                                </td>
                                <td>
                                <a href="view-user.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-success ">View</a>
                                <a href="delete-user.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-danger ">Delete</a>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- /#wrapper -->
    <?php include 'include/footer.php';?>
</body>

</html>
