<?php
include("connection.php");

$deletequery="delete from category where category_id='".$_GET['category_id']."'";
$deletequeryconnect = mysqli_query($conn,$deletequery);

if($deletequeryconnect)
{
    header("Location:category_fetch.php");
}
else{
    echo"<script>alert('delete')</script>";
}
?>