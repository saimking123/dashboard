<?php
include("connection.php");
include("head_foot.php");

if (isset($_GET["id"])) {
    $category_id = $_GET["id"];

    // Fetch the existing category data based on the ID
    $selectquery = "SELECT * FROM category WHERE category_id = '$category_id'";
    $selectqueryconnect = mysqli_query($conn, $selectquery);
    $CategoryData = mysqli_fetch_array($selectqueryconnect);

    if (!$CategoryData) {
        // Handle category not found error
        echo "Category not found.";
        exit;
    }
}

if (isset($_POST["updateproduct"])) {
    $category_id = $_POST["category_id"];
    $category_name = $_POST["category_name"];

    // Update the category name in the database
    $updatequery = "UPDATE category SET category_name = '$category_name' WHERE category_id = '$category_id'";
    $updatequeryconnect = mysqli_query($conn, $updatequery);

    if ($updatequeryconnect) {
        header('location: category_fetch.php');
    } else {
        echo "Data not updated";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>UPDATE CATEGORY</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <br><br><br>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="category_id" value="<?php echo isset($CategoryData) ? $CategoryData["category_id"] : ''; ?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" name="category_name" placeholder="Enter category name" value="<?php echo isset($CategoryData) ? $CategoryData["category_name"] : ''; ?>">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="updateproduct">Update Category</button>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
