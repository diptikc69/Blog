<?php

include_once 'include/connection.php';
session_start();
$id = $_GET["id"];
//echo $id;
$sql = "DELETE FROM users WHERE id = $id";
$profileSql = "DELETE FROM user_profile WHERE user_id = $id";
if (mysqli_query($conn, $sql)) {
    mysqli_query($conn, $profileSql);
    $_SESSION['success'] = "User Deleted Successfully.";
    header('location: list-user.php');
}
mysqli_close($conn);

?>