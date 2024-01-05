<?php
include("connection.php");
include("head_foot.php");

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">  
</head>
  <body>

<div class="container" style="padding-top:100px;">
    <div class="row">
        <div class="col-md-8">
            <?php
              if (isset($_GET['id'])) {
                $id = $_GET['id'];
               var_dump($id); 
            $query = "select * from customer_orders WHERE id = $id";
            $queryconnect = mysqli_query($conn,$query);
            $result = mysqli_query($conn, $query);

            if ($result) {
                // Display the order details using a loop (assuming multiple details per order)
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
            <h1></h1>
            <div class="card" style="background-color:cadetblue; border-color:darkblue;">
              <img class="card-img-top" src="holder.js/100x180/" alt="">
              <div class="card-body">
                <h4 class="card-title">user Details</h4>
                <p class="card-text">First Name:<b><?php echo $row['first_name'] ?></p></b>
                <p class="card-text">Last Name:<b><?php echo $row['last_name'] ?></p></b>
                <p class="card-text">Email:<b><?php echo $row['email'] ?></p></b>
                <p class="card-text">Shipping Address:<b><?php echo $row['address2'] ?></p></b>
                
              </div>
            </div>
        
   <?php
                }
            }
        }
   ?>
       
        <br><br><br>
        <?php
              if (isset($_GET['id'])) {
                $order_id = $_GET['id'];
        // $query = "SELECT order_details.*, product.* 
        //   FROM order_details
        //   INNER JOIN product ON order_details.product_id = product.id";
        $query = "select * from customer_orders WHERE id = $id";
        $queryconnect = mysqli_query($conn,$query);
        $result = mysqli_query($conn, $query);
                if ($result) {
                    // Display the order details using a loop (assuming multiple details per order)
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
           
            <div class="card" style="background-color:cadetblue; border-color:darkblue;">
              <img class="card-img-top" src="holder.js/100x180/" alt="">
              <div class="card-body">
              <h4 class="card-title">User details</h4>
              <p class="card-text">Country:<b><?php echo $row['country'] ?></p></b>
                <p class="card-text">State:<b><?php echo $row['state'] ?></p></b>
                <p class="card-text">Total Price:<b><?php echo $row['total_price'] ?></p></b>
                <form action="order_status.php?id=<?php echo $row['id']; ?>" method="post">
    <p class="card-text">Order Status:
        <b>
            <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
            <select name="order_status">
                <option value="inprocess" <?php echo ($row['order_status'] == 'inprocess') ? 'selected' : ''; ?>>inprocess</option>
                <option value="pending" <?php echo ($row['order_status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="processing" <?php echo ($row['order_status'] == 'processing') ? 'selected' : ''; ?>>Processing</option>
                <option value="shipped" <?php echo ($row['order_status'] == 'shipped') ? 'selected' : ''; ?>>Shipped</option>
                <option value="delivered" <?php echo ($row['order_status'] == 'delivered') ? 'selected' : ''; ?>>Delivered</option>
                <!-- Add more options as needed -->
            </select>
        </b>
    </p>
    <p class="card-text">Payment Method:<b><?php echo $row['payment'] ?></p></b>
    <p class="card-text">Order Date:<b><?php echo $row['created_at'] ?></p></b>
    <button class="btn btn-danger" class="card-text" name="update_details">Update Order Status</button>
</form>

                <?php
                }
            }
        }
        

   ?> 
            
            </div>
        </div>
   
 


            
    <br><br><br>
   
  <table class="table">
    <thead>
    <?php
  if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
    ?>
        <tr>
            <th>Order id</th>
            <th>Product Name</th>
            <th>Product quantity</th>
            <th>Product price</th>
            <th>Total price</th>
            <th>Product Image</th>
            <th>promblems in our order</th>
            


        </tr>
    </thead>
    <tbody>
        <?php
   // Query the order_details table for details related to the specific order ID
   $query = "SELECT order_details.*, product.* 
   FROM order_details
   INNER JOIN product ON order_details.product_id = product.id
   WHERE order_details.order_id = $order_id";

   $result = mysqli_query($conn, $query);
   if ($result) {
    // Display the order details using a loop (assuming multiple details per order)
    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";
        echo "<td>" . $row["order_id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["qty"] . "</td>";
        echo "<td>" . $row["product_price"] . "</td>";
        echo "<td>" . $row["total_price"] . "</td>";
        echo '<td><img src="' . $row["image"] . '" alt="Product Image" width="100"></td>';
              // echo "<td><a href='order_delete.php?customer_id=". $row['customer_id'] ."'><button class='btn btn-success'>Reasons</a></button></td>";
        echo '<td>';
        
        // Display the form for updating stock status
        echo '<form action="update_stock_status.php" method="post">';
        echo '<input type="hidden" name="order_id" value="' . $row['order_id'] . '">';
        echo '<input type="hidden" name="customer_id" value="' . $row['customer_id'] . '">';
        echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                
        echo '<select name="reason" id="stock_status"> 
                <option value="" disabled>Select stock status</option>
                <option value="in_stock">In Stock</option>
                <option value="out_of_stock">Out of Stock</option>
                <option value="limited_stock">Limited Stock</option>
                <option value="pre_order">Pre-Order</option>
                <option value="cancel_order">Cancel order</option>
            </select>';
                
        echo '<br><br>';
        echo '<button type="submit" class="btn btn-danger" name="update_status">Confirm order</button>';
        echo '</form>';
        
        // var_dump( $row['customer_id']);
        
        echo '</td>';
        // while ($row = mysqli_fetch_assoc($emailquery)) {
        //   $email = $row['email'];
        // }
        // var_dump($customer_id);
        echo '</tr>';
    }
} else {
    echo "Error fetching order details: " . mysqli_error($conn);
}
  }
  ?>

  <?php
  if (isset($_POST['reasonbtn'])) {
    $reason = $_POST['reason'];

    // Perform the UPDATE query.
    $query = "UPDATE order_details SET reason = '$reason' WHERE customer_id = $customer_id";

    if (mysqli_query($conn, $query)) {
        // Fetch the email from the database
        $selectquery= "SELECT * FROM customer_orders ";
        $result = mysqli_query($conn, $selectquery);
    }
  }
  ?>
      </tbody>   
  </table>
  </div>
</form>
        <br>

      </div>
    </div>
   </div>
    </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
