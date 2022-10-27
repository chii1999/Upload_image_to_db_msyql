<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "upload_img_db";

$conn = mysqli_connect($server, $user, $password, $database);
mysqli_set_charset($conn, 'UTF8');

// if ($conn) {
//     echo "Successfully connection.";
// }else {
//     echo "warning.";
// }


?>