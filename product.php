<?php
include("connection.php");
include("head_foot.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ADD PRODUCT</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <br><br><br>
    <br><br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <center><h2>Insert form</h2></center>
                
  <form method="POST"  action="insert.php" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="">product name</label>
      <input type="text" class="form-control" name="product_name" placeholder="Enter product name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">product price</label>
      <input type="text" class="form-control"  name="product_price" placeholder="Enter product price">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">product quantity</label>
    <input type="number" class="form-control" name="quantity" placeholder="Enter product quantity">
  </div>

  <div class="form-group">
    <label for="inputAddress">product description</label>
    <input type="text" class="form-control" name="description" placeholder="Enter product description">
  </div>

  <div class="form-group">
    <label for="inputAddress">fully product description</label>
    <textarea rows="4" cols="50" type="massage" class="form-control" name="fullydescription" placeholder="Enter fully product description"></textarea>
  </div>
  
        

  <?php
  
    // $query = "SELECT * FROM product INNER JOIN category ON product.category_id = category.id";
    // $connectquery = mysqli_query($conn, $query);

    // if (!$connectquery) {
    //     die("Query failed: " . mysqli_error($conn));
    //   }

    $query = "SELECT * FROM category";
    $connectquery = mysqli_query($conn, $query);

    if (!$connectquery) {
    die("Query failed: " . mysqli_error($conn));
    }
    ?>
  
  <div class="form-group">
    <label for="category">Choose a category</label>
    <select name="category" class="form-control">
      <option value="select category" disabled>select category</option>
        <?php
        while ($row = mysqli_fetch_assoc($connectquery)) {
            $categoryName = $row['category_name'];
            $categoryId = $row['category_id'];
            ?>
            <option value='<?php echo $categoryId ?>'><?php echo $categoryName ?></option>
        <?php
        }
        ?>
    </select>
</div>



  <div class="form-group">
    <label for="">image</label>
    <input type="file" name="productimageinput" class="form-control" >
  </div>

  
  <div class="form-group">
    <label for="inputAddress">gallery image</label>
  <input type="file"  name="imageinput[]"  class="form-control" multiple>
  </div>
 
  <button type="submit" class="btn btn-primary" name="insertproduct">Add product</button>
</form>

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