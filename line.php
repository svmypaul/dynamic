<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>plus2net.com : Line chart using data from MySQL table</title>
</head>
<body >
<?Php
require "config.php";// Database connection

if($stmt = $connection->query("SELECT date,profit FROM dotcode")){

  echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array = Array(); // create PHP array
  //echo "<table>
//<tr> <th>Month</th><th>Sale</th><th>Profit</th><th>Exp Fxd</th><th>Exp Vrv</th></tr>";
while ($row = $stmt->fetch_row()) {
   //echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
   $php_data_array[] = $row; // Adding to array
   }
//echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 
//echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array)."
</script>";
?>


<div id="curve_chart"></div>
<br><br>
<a href=https://www.plus2net.com/php_tutorial/chart-line-database.php></a>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      google.charts.setOnLoadCallback(drawChart);
	  
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'date');
        data.addColumn('number', 'profit');
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
       var options = {
          title: 'line diagram for Profit',
        curveType: 'function',
		width: 800,
        height: 500,
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
       }
	///////////////////////////////
</script>
<input type="button" onclick="location.href='barview.php';" value="Go Back" />
<input type="button" onclick="location.href='index.php';" value="Home" />
</body></html>