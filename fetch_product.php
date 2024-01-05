<?php
include("connection/database.php");
include("head_foot.php");
$obj = new Database();
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    // $deletequery = "DELETE FROM product WHERE id = '$id'";
    // $deletequeryconnect = mysqli_query($conn, $deletequery);
    $obj->delete('product' , 'id ='. $id);
    if ($obj) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>
                Swal.fire({
                  title: "Success!",
                  text: "Record deleted successfully",
                  icon: "success",
                  confirmButtonText: "OK"
                }).then(function(result) {
                  if (result.isConfirmed) {
                    window.location.href = "fetch.php"; // Redirect to the fetch.php page
                  }
                });
              </script>';
    } else {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>
                Swal.fire({
                  title: "Error!",
                  text: "Record not deleted",
                  icon: "error",
                  confirmButtonText: "OK"
                });
              </script>';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
          <!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body>
<a href="index.php"><button class="btn btn-primary mt-3"><i class="fa fa-angle-left" style="font-size:24px"></i> Back
    </button></a>
    <br><br><br>
    <h2>Fetch products</h2>
<table class="table">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>price</th>
        <th>quantity</th>
        <th>Image</th>
        <th>Category</th>
        <th>action</th>
        <th>action</th>
    </tr>
    <?php
    $obj->select('product as p,category as c','*',null,'p.category_id = c.category_id',null,null);
$result = $obj->getResult();
// }
// $query = "SELECT product.*, category.category_name 
//           FROM product 
//           INNER JOIN category ON product.category_id = category.category_id";
// $connectquery = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($obj));
}
foreach ($result as $r){
// while ($r = mysqli_fetch_array($result)) {
    ?>
    <tr>
        <td><?php echo $r["id"] ?></td>
        <td><?php echo $r["name"] ?></td>
        <td><?php echo $r["price"] ?></td>
        <td><?php echo $r["quantity"] ?></td>
        <td><img src="<?php echo $r["image"] ?>" alt="Product Image" width="100"></td>
        <td><?php echo $r["category_name"] ?></td>
        <td><button class="btn btn-danger" onclick="deleteRecord(<?php echo $r["id"] ?>)">Delete</button></td>
        <td><a href="product_update.php?id=<?php echo $r["id"] ?>"
               class="btn btn-success">Update</a></td>
    </tr>
    <?php
// }
}
?>

</table>

<script>
    // JavaScript function to confirm and delete a record
    function deleteRecord(id) {
        Swal.fire({
            title: 'Confirm Deletion',
            text: 'Are you sure you want to delete this record?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then(function(result) {
            if (result.isConfirmed) {
                // Redirect to delete.php with the ID for deletion
                window.location.href = 'product_delete.php?id=' + id;
            }
        });
    }
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin
