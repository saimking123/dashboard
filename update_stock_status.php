<?php
include("connection.php");
include("function.php");

if (isset($_POST['update_status'])) {
    // Retrieve values from the form
    $order_id = $_POST['order_id'];
    $customer_id = $_POST['customer_id'];
    $reason = $_POST['reason'];

    // Query the order_details table for details related to the specific customer ID
    $query = "SELECT customer_orders.email, product.id, product.image 
              FROM order_details 
              LEFT JOIN customer_orders ON order_details.order_id = customer_orders.id 
              LEFT JOIN product ON order_details.product_id = product.id 
              WHERE order_details.customer_id = $customer_id";

    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result !== false && $result instanceof mysqli_result) {
        // Fetch the email and other details for each product in the order
        $emailBody = "<h2>Updated product status</h2>";
        $emailBody .= "<table border='1'>";
        $emailBody .= "<tr><th>Customer ID</th><th>Order ID</th><th>Reason</th><th>Image URL</th></tr>";
    
        while ($row = mysqli_fetch_assoc($result)) {
            $email = $row['email'];
            $imageURL = $row['image'];
    
            // Perform the UPDATE query for each product
            $updateOrderQuery = "UPDATE order_details SET reason = ? WHERE customer_id = ? AND order_id = ?";
            $stmt = $conn->prepare($updateOrderQuery);
            if (!$stmt) {
                die("Prepare failed: " . $conn->error);
            }
            $stmt->bind_param("ssi", $reason, $customer_id, $order_id);
    
            if ($stmt->execute()) {
                $status = $reason;
                $subject =  "Updated to the status";
    
                // Add row to the table
                $emailBody .= "<tr>";
                $emailBody .= "<td>" . $customer_id . "</td>";
                $emailBody .= "<td>" . $order_id . "</td>";
                $emailBody .= "<td>" . $status . "</td>";
                $emailBody .= "<td><img src='$imageURL' alt='Product Image' style='width: 100px; height: 100px;'></td>";
                $emailBody .= "</tr>";
    
                echo "Stock status and reason updated successfully for product with customer ID: $customer_id";
            } else {
                echo "Error updating stock status and reason: " . $stmt->error;
            }
    
            // Close the statement
            $stmt->close();
        }
    
        // Close the result set
        mysqli_free_result($result);
    
        $emailBody .= "</table>";
    
        // Send the email with the table
        $subject = "Updated Stock Status and Reason";
        stmp_mailer($email, $subject, $emailBody);
    } else {
        echo "Error fetching order details: " . mysqli_error($conn);
    }
    
    

    // Close the connection
    $conn->close();
}
?>
