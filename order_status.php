<?php
include("connection.php");
include("function.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];


if (isset($_POST['update_details'])) {
    // Form is submitted
    // Retrieve order ID and new order status from the form
    $id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error);
    }

    // Validate and sanitize the order_id (assuming it's an integer)
   

    if ($id === false) {
        // Invalid order_id
        die("Invalid order ID. Value received: " . $_POST['order_id']);
    }

    // Retrieve email associated with the order

    $order_details_query = "SELECT customer_orders.email, product.id, product.image 
    FROM order_details 
    LEFT JOIN customer_orders ON order_details.order_id = customer_orders.id 
    LEFT JOIN product ON order_details.product_id = product.id 
    WHERE order_details.order_id = $id";


    
        $order_details_result = mysqli_query($conn, $order_details_query);

        if ($order_details_result) {
            $rows = mysqli_fetch_all($order_details_result, MYSQLI_ASSOC);
        
            if (count($rows) > 0) {
                // Fetch order details
                $email = $rows[0]['email'];
        
                // Update the order status in the database using a direct query
                $update_query = "UPDATE customer_orders SET order_status = '$order_status' WHERE id = $id";   
        
                // Log the query for debugging purposes
                echo $update_query;
        
                $query_connect = mysqli_query($conn, $update_query);
        
                if ($query_connect) {
                    // Update successful
                    $status = $order_status;
                    $newSubject = "Updated Order Status"; // Change the subject here
                    $subject = $newSubject;
                
                    // Construct the email body with order details
                    $emailBody = "<h2>Order Status:Thanks for your order your order has been  $status!!!! </h2>";
                    $emailBody .= "<h3>Order Details:</h3>";
                
                    $emailBody .= "<table border='1'>";
                    $emailBody .= "<tr><th>Product ID</th><th>Image URL</th></tr>";
                
                    foreach ($rows as $row) {
                        $productImage = $row['image'];
                        $emailBody .= "<tr>";
                        $emailBody .= "<td>" . $row['id'] . "</td>";
                        // Add other product details as needed
                        // $emailBody .= "<td>" . $row[$order_status] . "</td>";
                        $emailBody .= "<td><img src='$productImage' alt='Product Image' style='width: 100px; height: 100px;'></td>";
                        $emailBody .= "</tr>";
                    }
                
                    $emailBody .= "</table>";
                
                    // Use the defined function to send the HTML email
                    stmp_mailer($email, $subject, $emailBody);
                    header("location:fetch_order_detail.php?id=$id");
                } else {
                    echo "Error updating order status: " . mysqli_error($conn);
                }
                            
    $conn->close();
}
        }
    }
}
?>
