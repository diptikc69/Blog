<?php 
$title = "Add Profile";
include 'include/head.php';


$userId = $_SESSION['userId'];


if(isset($userId)){
    $sql = "SELECT * FROM users WHERE id = '$userId' LIMIT 1" ;
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
        $fullName = $row['full_name'];
        $email = $row['email'];
    // echo $fname;
    }
   $profileSql = "SELECT * FROM user_profile WHERE user_id = '$userId' LIMIT 1";
   $profileResult = mysqli_query($conn,$profileSql);
   while($profileRow = mysqli_fetch_array($profileResult)) {
    $Country = $profileRow['country'];
    $City = $profileRow['city'];
    $State = $profileRow['state'];
    $zipCode = $profileRow['zip_code'];
    $facebookLink = $profileRow['facebook_profile'];
    $twitterLink = $profileRow['twitter_profile'];
    $phone = $profileRow['phone'];
    $gender = $profileRow['gender'];
   }
}


if (isset($_POST['save'])) {

    $Country = $_POST['country'];
    $City = $_POST['city'];
    $State = $_POST['state'];
    $zipCode = $_POST['zip_code'];
    $facebookLink = $_POST['facebook_profile'];
    $twitterLink = $_POST['twitter_profile'];
    $phone = $_POST['phone'];
    $fullName = $_POST['full_name'];
    $gender = $_POST['gender'];
    
$sql = "UPDATE user_profile SET country ='". $Country."', city = '".$City. "', state = '".$State. "', zip_code = '".$zipCode. "', facebook_profile = '".$facebookLink. "', twitter_profile = '".$twitterLink. "', phone = '".$phone. "',  gender = '".$gender. "'WHERE user_id = '". $userId."'";


$userSql = "UPDATE users SET full_name ='$fullName' WHERE id = '$userId'";

     if (mysqli_query($conn, $sql) && mysqli_query($conn, $userSql)) {
        $_SESSION['success'] = "Profile Updated Successfully !";
        header('location: profile.php');
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
                    <h2 class="page-header"><b>Profile</b></h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-12">
                  <?php include 'include/message.php';?>
                </div>
            </div>
            
            <form action="profile.php" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <b> Address </b>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group">
                                <label> Country </label>
                                <input value=" <?php echo $Country; ?>" 
                                class="form-control" name="country" placeholder="Country">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group">
                                <label> City </label>
                                <input value="<?php echo $City; ?>" 
                                class="form-control" name="city" placeholder="City">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group">
                                <label>State</label>
                                <input value="<?php echo $State; ?>" 
                                class="form-control" name="state" placeholder=" State">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group">
                                <label>Zip Code</label>
                                <input value="<?php echo $zipCode; ?>" 
                                class="form-control" name="zip_code" placeholder="Zip Code">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Social Media
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group">
                                <label>Facebook Profile</label>
                                <input value="<?php echo $facebookLink; ?>"
                                class="form-control" name="facebook_profile" placeholder="Facebook Profile">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>Twitter Profile</label>
                                <input value="<?php echo $twitterLink; ?>"
                                class="form-control" name="twitter_profile" placeholder="Twitter Profile">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Details
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input value ="<?php echo $fullName; ?>"
                                 class="form-control" name="full_name" placeholder="fname">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input value="<?php echo $phone; ?>" 
                                class="form-control" name="phone" placeholder="phone">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input value="<?php echo $email; ?>" 
                                class="form-control" name="email" placeholder="email">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                                </select>

                            </div>
                        </div>
                    </div>
        
                
                    <div class="panel panel-default">
                      <div class="col-sm-12">
                            <button type="submit" name="save" 
                             class="btn   btn-success">
                             Save Change 
                            </button>
                      </div>
                    </div>
                </div>
            
                
            </form>
        </div>
            <!-- /.row -->
    </div>
        <!-- /#page-wrapper -->

    

    <?php include 'include/footer.php';?>

</body>

</html>
