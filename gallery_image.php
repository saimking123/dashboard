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
  </head>
  <body>
    <p style="padding-bottom:90px;"></p>
      <h2 >Sub category form</h2>

      <form  method="post" enctype="multipart/form-data">
        <input type="file"  name="imageinput[]"  class="form-control" multiple>
        <br>
        <?php
        $query = "SELECT * FROM product";
    $connectquery = mysqli_query($conn, $query);

    if (!$connectquery) {
    die("Query failed: " . mysqli_error($conn));
    }
    ?>
  
  <div class="form-group">
    <label for="product">Choose a product</label>
    <select name="product" class="form-control">
      <option value="select product" disabled>select product</option>
        <?php
        while ($row = mysqli_fetch_assoc($connectquery)) {
            $productName = $row['name'];
            $productId = $row['id'];
            ?>
            <option value='<?php echo $productId ?>'><?php echo $productName ?></option>
        <?php
        }
        ?>
    </select>
</div>
        <button type="submit" name="subcategorybtn" class="btn btn-primary">Submit</button>
      </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php

if(isset($_POST["subcategorybtn"])){
    $location = "subcategoryimage/";
    $productId = $_POST["product"];
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $location = "subcategoryimage/";
        $productId = $_POST["product"];
    // Iterate through uploaded files
    foreach($_FILES["imageinput"]["name"] as $key => $filename) {
        $tmpname = $_FILES["imageinput"]["tmp_name"][$key];
        $saveimg = $location . $filename;

        // Move the uploaded file to the specified directory
        if(move_uploaded_file($tmpname, $saveimg)) {
            // Insert the file name and product ID into the database
            $insertquery = "INSERT INTO subcategory_images (subcategory_images, product_id) VALUES ('$filename', $productId)";

            $insertqueryconnect = mysqli_query($conn, $insertquery);
            if($insertqueryconnect) {
                echo "Record has been inserted for file: $filename<br>";
            } else {
                echo "Data not inserted for file: $filename<br>";
            }
        } else {
            echo "Error moving the uploaded file: $filename<br>";
        }
    }
} 
}           

?>
