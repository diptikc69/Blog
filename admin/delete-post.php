<?php

include_once 'include/connection.php';
session_start();
$id = $_GET["id"];
//echo $id;
$sql = "DELETE FROM posts WHERE id = $id";
if(mysqli_query($conn, $sql)){
    $_SESSION['success'] = "Post Deleted.";
    header('location: list-post.php');
}
mysqli_close($conn);

?>