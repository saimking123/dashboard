<?php
include("connection.php");

if (isset($_POST["insertproduct"])) {
    $productname = $_POST["product_name"];
    $productquantity = $_POST["quantity"];
    $productprice = $_POST["product_price"];
    $productdescription = $_POST["description"];
    $fullyproductdescription = $_POST["fullydescription"];
    $categoryId = $_POST["category"];

    // Insert the main product image into the "product" table
    $filename = $_FILES["productimageinput"]["name"];
    $tmpname = $_FILES["productimageinput"]["tmp_name"];
    $location = "image/";
    $saveimg = $location . $filename;
    if (move_uploaded_file($tmpname, $saveimg)) {
        $insertquery = "INSERT INTO product (name, price, quantity, description, fully_detail, image, category_id) VALUES ('$productname', '$productquantity', '$productprice', '$productdescription', '$fullyproductdescription', '$saveimg', '$categoryId')";
        var_dump($insertquery);

        $insertqueryconnect = mysqli_query($conn, $insertquery);
        
        if ($insertqueryconnect) {
            $productId = mysqli_insert_id($conn); // Get the product ID

            // Insert the subimages into the "subcategory_images" table with the product_id
            $location = "subcategoryimage/";

            foreach ($_FILES["imageinput"]["name"] as $key => $subImageName) {
                $tmpname = $_FILES["imageinput"]["tmp_name"][$key];
                $saveimg = $location . $subImageName;

                if (move_uploaded_file($tmpname, $saveimg)) {
                    $insertSubImageQuery = "INSERT INTO subcategory_images (product_id, subcategory_images) VALUES ('$productId', '$saveimg')";
                    $insertSubImageConnect = mysqli_query($conn, $insertSubImageQuery);

                    if ($insertSubImageConnect) {
                        echo "Subimage has been inserted for file: $subImageName<br>";
                    } else {
                        echo "Data not inserted for subimage: $subImageName<br>";
                    }
                } else {
                    echo "Error moving the uploaded subimage file: $subImageName<br>";
                }
            }

            echo "Record has been inserted with product ID: $productId";
        } else {
            echo "Data not inserted from product. Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error moving the uploaded product image file";
    }
}
?>
