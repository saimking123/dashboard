<?php
include("connection.php");
include("head_foot.php");
// if($_SESSION["namevar"]=="")
// {
//   header("Location:home.php");
// }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
   
      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total product</div>
              <div class="number">
                <?php
                $dash_category_query = "SELECT * from product";
                $dash_category_run = mysqli_query($conn,$dash_category_query);
                if($category_total = mysqli_num_rows($dash_category_run))
                {
                  echo '<h4 class="mb-0">'.$category_total.'</h4>';
                }
                else{
                  echo '<h4 class="mb-0">NO DATA FOUND</h4>';
                }

                ?>
              </div>
            </div>
            <i class="bx bx-cart-alt cart"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total orders</div>
              <div class="number">
              <?php
                $dash_category_query = "SELECT * from order_details";
                $dash_category_run = mysqli_query($conn,$dash_category_query);
                if($category_total = mysqli_num_rows($dash_category_run))
                {
                  echo '<h4 class="mb-0">'.$category_total.'</h4>';
                }
                else{
                  echo '<h4 class="mb-0">NO DATA FOUND</h4>';
                }

                ?>
              </div>
              <div class="indicator">
                <!-- <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Up from yesterday</span> -->
              </div>
            </div>
            <i class="bx bxs-cart-add cart two"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Profit</div>
              <div class="number">$12,876</div>
              <div class="indicator">
                <!-- <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Up from yesterday</span> -->
              </div>
            </div>
            <i class="bx bx-cart cart three"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Return</div>
              <div class="number">11,086</div>
              <div class="indicator">
                <!-- <i class="bx bx-down-arrow-alt down"></i>
                <span class="text">Down From Today</span> -->
              </div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
          </div>
        </div>


        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['name', 'price', 'quantity', ],
        //   ['2014', 1000, 400, 200],
        //   ['2015', 1170, 460, 250],
        //   ['2016', 660, 1120, 300],
        //   ['2017', 1030, 540, 350]

        <?php
        $query = "SELECT * FROM product";
        $queryconnect= mysqli_query($conn,$query);
        while($data = mysqli_fetch_array($queryconnect)){
            $name = $data['name'];
            $price = $data['price'];
            $quantity = $data['quantity'];
        ?>
        ['<?php echo $name; ?>','<?php echo $price; ?>','<?php echo $quantity; ?>'],
        <?php
        }
        ?>
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
        
    </section>

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
  </body>
</html>
