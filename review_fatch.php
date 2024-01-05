<?php
include("connection/database.php");
include("head_foot.php");
$obj = new Database();

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
  </head>
  <body>
  <br><br><br>
  <br><br><br>

    <h2>Product Reviews</h2>
<table class="table">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>phone</th>
        <th>message</th>
        <th>rating</th>
        <th>created</th>
        <th>Product_Name</th>
    </tr>
    <!-- $obj->select('post_rating', 'post_rating.*, product.name', null, 'post_rating.product_id = product.id', null, null);
    $result = $obj->getResult(); -->

<!-- 
// $query = "SELECT product.*, category.category_name 
//           FROM product 
//           INNER JOIN category ON product.category_id = category.category_id"; -->

<?php
$obj->select('post_rating as pr,product as p','*',null,'pr.product_id = p.id',null,null);
$result = $obj->getResult();



// $query = "SELECT post_rating.*, product.name 
// FROM post_rating 
// INNER JOIN product ON post_rating.product_id = product.id";
// $connectquery = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($obj));
}

foreach ($result as $r)  {
    ?>
    <tr>
        <td><?php echo $r["id"] ?></td>
        <td><?php echo $r["review_name"] ?></td>
        <td><?php echo $r["email"] ?></td>
        <td><?php echo $r["phone"] ?></td>
        <td><?php echo $r["message"] ?></td>
        <td><?php echo $r["rating"] ?></td>
        <td><?php echo $r["created"] ?></td>
        <td><?php echo $r["name"] ?></td>
        </tr>
    <?php
}
?>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>