<?php
include("connection.php");
include("head_foot.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch the existing product data based on the ID
    $selectProductQuery = "SELECT * FROM product WHERE id = '$id'";
    $selectProductConnect = mysqli_query($conn, $selectProductQuery);
    $productData = mysqli_fetch_array($selectProductConnect);

    if (!$productData) {
        // Handle product not found error
        echo "Product not found.";
        exit;
    }

    // Fetch the current subcategory images for the product
    $selectSubcategoryImagesQuery = "SELECT * FROM subcategory_images WHERE product_id = '$id'";
    $selectSubcategoryImagesConnect = mysqli_query($conn, $selectSubcategoryImagesQuery);
}

if (isset($_POST["updateproduct"])) {
    $product_id = $_POST["product_id"];
    $productname = $_POST["product_name"];
    $productquantity = $_POST["quantity"];
    $productprice = $_POST["product_price"];
    $productdescription = $_POST["description"];

    // Handle the product image update if a new image is provided
    if (!empty($_FILES["productimageinput"]["name"])) {
        $filename = $_FILES["productimageinput"]["name"];
        $tmpname = $_FILES["productimageinput"]["tmp_name"];
        $location = "image/";
        $saveimg = $location . $filename;

        if (move_uploaded_file($tmpname, $saveimg)) {
            // Update the product image path in the database
            $updateImageQuery = "UPDATE product SET name = '$productname', price = '$productprice', quantity = '$productquantity', description = '$productdescription', image = '$saveimg' WHERE id = '$product_id'";
            $updateImageConnect = mysqli_query($conn, $updateImageQuery);

            if ($updateImageConnect) {
                echo "Product details and image have been updated.";
            } else {
                echo "Error updating product details and image: " . mysqli_error($conn);
            }
        } else {
            echo "Error moving the uploaded product image file";
        }
    } else {
        // Update product details without changing the image
        $updateDetailsQuery = "UPDATE product SET name = '$productname', price = '$productprice', quantity = '$productquantity', description = '$productdescription' WHERE id = '$product_id'";
        $updateDetailsConnect = mysqli_query($conn, $updateDetailsQuery);

        if ($updateDetailsConnect) {
            echo "Product details have been updated.";
        } else {
            echo "Error updating product details: " . mysqli_error($conn);
        }
    }

    // Handle gallery image updates
    if (!empty($_FILES["imageinput"]["name"][0])) {
        $location = "subcategoryimage/";
        foreach ($_FILES["imageinput"]["name"] as $key => $subcategoryImageName) {
            $tmpname = $_FILES["imageinput"]["tmp_name"][$key];
            $saveimg = $location . $subcategoryImageName;

            if (move_uploaded_file($tmpname, $saveimg)) {
                // Insert the gallery image into the database
                $insertSubcategoryImageQuery = "INSERT INTO subcategory_images (product_id, subcategory_images) VALUES ('$product_id', '$saveimg')";
                $insertSubcategoryImageConnect = mysqli_query($conn, $insertSubcategoryImageQuery);

                if ($insertSubcategoryImageConnect) {
                    echo "Subcategory image has been updated.";
                } else {
                    echo "Error updating subcategory image: " . mysqli_error($conn);
                }
            } else {
                echo "Error moving the uploaded subcategory image file: $subcategoryImageName";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UPDATE PRODUCT</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <form method="POST" enctype="multipart/form-data" style="padding-top:6rem;">
        <h2>Update form</h2>
        <input type="hidden" name="product_id" value="<?php echo $productData["id"]; ?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" name="product_name" placeholder="Enter product name" value="<?php echo $productData["name"]; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="product_price">Product Price</label>
                <input type="text" class="form-control" name="product_price" placeholder="Enter product price" value="<?php echo $productData["price"]; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="quantity">Product Quantity</label>
            <input type="number" class="form-control" name="quantity" placeholder="Enter product quantity" value="<?php echo $productData["quantity"]; ?>">
        </div>
        <div class="form-group">
            <label for="description">Product Description</label>
            <textarea class="form-control" name="description" rows="3"><?php echo $productData["description"]; ?></textarea>
        </div>



        
        <!-- Display the current subcategory images -->
    <div class="form-group">
    <label for="current_subcategory_images">Current Subcategory Images</label>
    <?php
    while ($subcategoryImageData = mysqli_fetch_array($selectSubcategoryImagesConnect)) {
       
        echo '<button type="submit" name="delete" value="' . $subcategoryImageData["id"] . '" class="delbutton"><i class="fa fa-trash"></i></button>';
        echo '<img src="' . $subcategoryImageData["subcategory_images"] . '" width="100">';
        echo '<input type="hidden" value="'.$subcategoryImageData["id"].'"> ';
    }
    ?>
</div>
        <!-- Gallery image fields for new images -->
        <div class="form-group">
            <label for="imageinput">New Subcategory Images (Optional)</label>
            <input type="file" name="imageinput[]" class="form-control" multiple>
        </div>

        <div class="form-group">
            <label for="current_image">Current Image</label>
            <img src="<?php echo $productData["image"]; ?>" width="100">
        </div>
        
        <div class="form-group">
            <label for="productimageinput">New Image (Optional)</label>
            <input type="file" name="productimageinput" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary" name="updateproduct">Update Product</button>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


<?php
// delete subcategory image
    if(isset($_POST['delete'])){
    $idToDelete = $_POST['delete'];
    $query = "DELETE FROM subcategory_images WHERE id = $idToDelete";
    $result = mysqli_query($conn,$query);
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo 'Image deleted successfully.';
    } else {
        echo 'Error deleting image: ' . mysqli_error($conn);
    }
}

?>

<!-- delete subcategory image without page relaod -->
    <script type="text/javascript" >
        $(function() {

            $(".delbutton").click(function() {
                var del_id = $(this).attr("id");
                var info = 'id=' + del_id;
                if (confirm("Sure you want to delete this post?")) {
                    $.ajax({
                        type : "POST",
                        url : "product_delete.php", //URL to the delete php script
                        data : info,
                        success : function() {
                        }
                    });
                    $(this).parents(".record").animate("fast").animate({
                        opacity : "hide"
                    }, "slow");
                }
                return false;
            });
        });
 </script>
 <!-- delete subcategory image without page relaod  end-->

    
