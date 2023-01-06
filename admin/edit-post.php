<?php 
$title = "Edit Post";
include 'include/head.php';
$editId = $_GET['id'];
//echo $editId;
$sql = "SELECT * FROM posts WHERE id = $editId";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
    $title = $row['title'];
    $slug = $row['slug'];
    $content = $row['content'];
    $catId = $row['category_id'];
    $status = $row['status'];
}
// Get the Category from database
$catSql = "SELECT * FROM categories";
$catResults = mysqli_query($conn, $catSql);

// Get the Tag from database
$tagSql = "SELECT * FROM tags";
$tagResults = mysqli_query($conn, $tagSql);

if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $content = $_POST['content'];
    $catId = $_POST['category_id'];
    $status = $_POST['status'];
    $createdAt = time();
    $updatedAt = time();

    $sql = "INSERT INTO posts (title, slug, content, status, category_id, created_at, updated_at) VALUE('$title', '$slug', '$content', '$status', '$catId', '$createdAt', '$updatedAt')";

    if (mysqli_query($conn, $sql)) {
        $success = "Post Created Successfully !";
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
            <?php include 'include/sidebar.php';?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Edit Post</h2>
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
            <form action="add-post.php" method="post">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Title</label>
                        <input value="<?php echo $title; ?>"  class="form-control" name="title" placeholder="Post Title">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Slug</label>
                        <input value="<?php echo $slug; ?>"  class="form-control" name="slug" placeholder="Post Slug">
                    </div>
                </div>
                <div class="col-sm-12">
                <div class="form-group">
                    <label>Status</label>
                    <label class="radio-inline">
                        <input type="radio" name="status" id="publish" value="1" checked="">Publish
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="status" id="draft" value="0">Draft
                    </label>
                </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control" id="" cols="30" rows="10">
                        <?php echo $content; ?>
                        </textarea>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id"  class="form-control">
                            <option>Select Category</option>
                            <?php 
                    if (mysqli_num_rows($catResults) > 0) { 
                        while($row = mysqli_fetch_array($catResults)){
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php }} ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Post Image</label>
                        <input type="file" class="form-control">
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" name="save" class="btn btn-success">
                        Save
                    </button>
                    <a href="list-post.php" class="btn btn-primary">All Post</a>
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
