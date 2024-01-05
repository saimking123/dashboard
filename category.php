<?php
include("connection.php");
include("head_foot.php");



if(isset($_POST['categorybtn']))
{
    $name= $_POST["category_name"];

    $insertquery = "INSERT INTO category(name)Values('".$name."')";
    $insertqueryconnect = mysqli_query($conn,$insertquery);
    if($insertqueryconnect)
    {
        echo "Record has been inserted";
    }
    else{
        echo "data not insertd";
    }
}
?>
<br><br><br><br>

  <h2>Category insert</h2>
    <form method="POST" style="margin-bottom:8rem">

        <input type="text" placeholder="Enter yout category" name="category_name" class="form-control" >
        <br>
        <button type="submit" name="categorybtn" style="background-color:blue;color:white">Add Category</button>

    </form>
