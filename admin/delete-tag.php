<?php

include_once 'include/connection.php';
$id = $_GET["id"];
//echo $id;
$sql = "DELETE FROM tags WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    echo "Tags Deleted.";
}
mysqli_close($conn);

?>