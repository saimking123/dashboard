<?php
session_start();
if($_SESSION["namevar"]=="")
{
  header("Location:../index.php");
}
?>
    <!doctype html>
    <html lang="en">
      <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />
        <!-- Boxicons CDN Link -->
        <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
        
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <!-- font awsome link -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">  
        
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="admin-fill"></i>
        <span class="logo_name">Admin panel</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="index.php" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="fetch_product.php">
            <i class="bx bx-box"></i>
            <span class="links_name">Product</span>
          </a>
        </li>
        <li>
          <a href="product.php">
            <i class="bx bx-box"></i>
            <span class="links_name">Add Product</span>
          </a>
        </li>
        <li>
          <a href="category.php">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Category</span>
          </a>
        </li>

        <li>
          <a href="category_fetch.php">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Category fetch</span>
          </a>
        </li>


        <!-- <li>
          <a href="gallery_image.php">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Insert gallery product Images</span>
          </a>
        </li> -->

        <li>
          <a href="Comment_fetch.php">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Product Comments</span>
          </a>
        </li>

        <li>
          <a href="review_fatch.php">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="links_name">Product Reviews</span>
          </a>
        </li>
        <li>
          <a href="orderfetch.php">
            <i class="bx bx-coin-stack"></i>
            <span class="links_name">Total order</span>
          </a>
        </li>
        <li>
          <a href="orderfetch.php">
            <i class="bx bx-book-alt"></i>
            <span class="links_name">Stock</span>
          </a>
        </li>
        <br>
       
        <li class="log_out">
          <a href="user/logout.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
        </div>
       
        
      </nav>
      <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>
   <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <!-- DataTables JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
      
      </body>
    </html>
