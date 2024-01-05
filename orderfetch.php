<?php
include("connection.php");
include("head_foot.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Title</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- DataTables CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">  
</head>
<body>
<br><br><br>
<br><br><br>

<table class="table table-striped" id="orderTable">
    <h2>Total Orders</h2>
    <thead>
        <tr>
            <th>order_id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>Email</th>
            <th>Shipping Address</th>
            <th>Total price</th>
            <th>country</th>
            <!-- <th>state</th> -->
            <!-- <th>zip code</th> -->
            <th>Order status</th>
            <th>Payment</th>
            <th>created</th>

            <th>Action</th>
          
        </tr>
    </thead>
    <tbody>
        <?php
        //   $query = "SELECT customer_orders.*, order_details.* 
        //   FROM customer_orders
        //   INNER JOIN order_details ON customer_orders.id = order_details.order_id";
        $query = "Select * from customer_orders";
          $connectquery = mysqli_query($conn, $query);
          if (!$connectquery) {
          die("Query failed: " . mysqli_error($conn));
          }
        while ($row = mysqli_fetch_array($connectquery)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["first_name"] . "</td>";
            echo "<td>" . $row["last_name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["address2"] . "</td>";
            echo "<td>" . $row["total_price"] . "</td>";
            echo "<td>" . $row["country"] . "</td>";
            echo "<td>" . $row["order_status"] . "</td>";
            echo "<td>" . $row["payment"] . "</td>";
            echo "<td>" . $row["created_at"] . "</td>";
            echo "<td><a href='fetch_order_detail.php?id=" . $row['id'] . "'><button class='btn btn-danger'>View Details</button></a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<!-- DataTables JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->

<script>
    $(document).ready(function() {
        $('#orderTable').DataTable();
    });
</script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap and other scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
