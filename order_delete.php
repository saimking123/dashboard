<?php
include("connection.php");
include("head_foot.php");

require 'function.php';
error_reporting(0);

?>
<style>
.container{
    padding-top:-80px;
}

</style>
<br><br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Reason Form </h2>
        <form  Method="POST">
  <p><label for="w3review">Add reason</label></p>
  <textarea  name="reason" rows="4" cols="50" placeholder="Enter Reasons." value="reason" required></textarea>
  <br>
    <button type="submit" name="reasonbtn" class="btn btn-success">Add Reason</button>
</form>


</div>
    </div>
</div>

<?php
if (isset($_GET["customer_id"])) {
    $customer_id = $_GET["customer_id"];
   
   
    if (isset($_POST['reasonbtn'])) {
        $reason = $_POST['reason'];

        // Perform the UPDATE query.
        $query = "UPDATE order_details SET reason = '$reason' WHERE customer_id = $customer_id";

        if(mysqli_query($conn, $query)) {
             // Fetch the email from the database
             echo "<script>alert('Successfully Updated')</script>";
            $selectquery= "SELECT * FROM customer_orders ";
            $result = mysqli_query($conn, $selectquery);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
            
                if ($row !== null) {
                    $customer_id = $_GET["customer_id"]; // Assuming customer_id is in the URL
                    $email = $row['email'];
            
                    // Perform the UPDATE query for order_details
                    $reason = $_POST['reason'];
                    $updateQuery = "UPDATE order_details SET reason = '$reason' WHERE customer_id = $customer_id";
            
                    if (mysqli_query($conn, $updateQuery)) {
                        // Send email
                        $status = $reason;
                        $subject =  "Updated to the status";
                        
                        // Use the defined function to send the email
                        stmp_mailer($email, $subject, $status);
                         header("location:../function.php?param='insert'");

                    } else {
                        echo "Error updating reason: " . mysqli_error($conn);
                    }
                } else {
                    echo "No rows found in the result set.";
                }
            } else {
                echo "Error retrieving email: " . mysqli_error($conn);
            }
            // var_dump($email);
        }
    }
}
?>