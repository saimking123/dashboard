<?php
$conn = mysqli_connect('localhost','root','','website_data');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// if ($db->connect_error) {
//     die("Connection failed: " . $db->connect_error);
// }
?>