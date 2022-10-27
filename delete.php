<?php
@include("config.php");

$id  = $_GET['id'];

$delete = mysqli_query($conn, "DELETE FROM user where id ='$id'");


if ($delete) {
    header("location:index.php?success");
} else {
    echo "Unknow Data.";
}



?>