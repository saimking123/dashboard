<?php
include("connection.php");
?>

<html>
  <head>
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
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>


