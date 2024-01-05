
<?php
include("connection.php");
include("function.php");

// Assuming you have a database connection ($conn) established before this point



// if (isset($_GET["customer_id"])) {
//     $customer_id = $_GET["customer_id"];

    if (isset($_POST['updatebtn'])) {
        $reason = $_POST['reason'];

        // Use prepared statement to prevent SQL injection
        $update_query = "UPDATE order_details SET reason = ? WHERE customer_id = ?";
        $stmt = mysqli_prepare($conn, $update_query);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "si", $reason, $customer_id);

        // Execute the update statement
        if (mysqli_stmt_execute($stmt)) {
            // Successfully updated, now fetch the email from the database

            // Fetch the email from the database (Assuming 'email' is the column name)
            $email_query = "SELECT email FROM customer_orders WHERE id = ?";
            $email_stmt = mysqli_prepare($conn, $email_query);
            mysqli_stmt_bind_param($email_stmt, "i", $customer_id);
            mysqli_stmt_execute($email_stmt);
            mysqli_stmt_bind_result($email_stmt, $email);
            mysqli_stmt_fetch($email_stmt);
            mysqli_stmt_close($email_stmt);

            // Check if email is fetched successfully
            if ($email !== null) {
                // Mail subject and message
                // $subject = 'Order Update';
                // $message = 'Your order has been updated. Reason: ' . $reason;

                // // Additional headers
                // $headers = 'From: sai' . "\r\n" .
                //     'Reply-To: your_email@example.com' . "\r\n" .
                //     'X-Mailer: PHP/' . phpversion();

                // Send email
                $status = $reason;
                $subject =  "Updated to the status";
                            
                            // Use the defined function to send the email
                            stmp_mailer($email, $subject, $status);
                             header("location:function.php");

                echo "<script>alert('Successfully Updated and Email Sent')</script>";
            } else {
                echo 'Email not found for customer_id: ' . $customer_id;
            }
        } else {
            echo 'Update failed: ' . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }

?>

