<?php
include("connection.php");


include("connection/database.php");
$obj = new Database();
if(isset($_GET)){
$id = $_GET['id'];

$obj->delete('subcategory_images' , 'product_id ='. $id);
// Delete subcategory images related to the product
// $deleteSubcategoryImagesQuery = "DELETE FROM subcategory_images WHERE product_id = '$product_id'";
// $deleteSubcategoryImagesConnect = mysqli_query($conn, $deleteSubcategoryImagesQuery);

if ($obj) {
    // Subcategory images have been deleted; now, you can safely delete the product
   
    // $deleteProductQuery = "DELETE FROM product WHERE id = '$product_id'";
    // $deleteProductConnect = mysqli_query($conn, $deleteProductQuery);
    $obj->delete('product' , 'id ='. $id);
    if ($$obj) {
        header("Location: fetch_product.php");
    } else {
        echo "<script>alert('Failed to delete product')</script>";
    }
} else {
    echo "<script>alert('Failed to delete subcategory images')</script>";
}
}
?>




?>
