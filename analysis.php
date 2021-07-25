<?php
include "conndb.php";
$query="SELECT AVG(invest) AS avg FROM dotcode";
$df=mysqli_query($conn, $query);
$avg=mysqli_fetch_assoc($df);
?>
<?php
$query1="SELECT AVG(sell) AS avg FROM dotcode";
$df1=mysqli_query($conn, $query1);
$avg1=mysqli_fetch_assoc($df1);
?>
<?php
$query2="SELECT AVG(profit) AS avg FROM dotcode";
$df2=mysqli_query($conn, $query2);
$avg2=mysqli_fetch_assoc($df2);
?>
<?php
$query3="SELECT MAX(invest) AS maximum_invest FROM dotcode";
$df3=mysqli_query($conn, $query3);
$avg3=mysqli_fetch_assoc($df3);
?>
<?php
$query4="SELECT MAX(sell) AS maximum_invest FROM dotcode";
$df4=mysqli_query($conn, $query4);
$avg4=mysqli_fetch_assoc($df4);
?>
<?php
$query5="SELECT MAX(Profit) AS maximum_invest FROM dotcode";
$df5=mysqli_query($conn, $query5);
$avg5=mysqli_fetch_assoc($df5);
?>
<?php
$query6="SELECT MIN(invest) AS minimum_invest FROM dotcode";
$df6=mysqli_query($conn, $query6);
$avg6=mysqli_fetch_assoc($df6);
?>
<?php
$query7="SELECT MIN(sell) AS minimum_invest FROM dotcode";
$df7=mysqli_query($conn, $query7);
$avg7=mysqli_fetch_assoc($df7);
?>
<?php
$query8="SELECT MIN(Profit) AS minimum_invest FROM dotcode";
$df8=mysqli_query($conn, $query8);
$avg8=mysqli_fetch_assoc($df8);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>analysis</title>
</head>
<style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  background-color:#202020;
    color: white;
    border-radius: 10px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  border-radius: 10px;
}

tr:nth-child(even) {
  background-color: 	#505050;
}
body{
    background-color: #99ccff;
}
h1 {
  font-size: 72px;
  background: -webkit-linear-gradient(#eee, #333);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
</style>
<body>
    <center>
    <h1>Analysis of your busieness</h1>
    <table>
  <tr>
    <th>Tool</th>
    <th>Invest</th>
    <th>Sell</th>
    <th>Profit</th>
  </tr>
  <tr>
    <td>Average</td>
    <td><?php echo $avg['avg']; ?></td>
    <td><?php echo $avg1['avg']; ?></td>
    <td><?php echo $avg2['avg']; ?></td>
  </tr>
  <tr>
    <td>Maximum</td>
    <td><?php echo $avg3['maximum_invest']; ?></td>
    <td><?php echo $avg4['maximum_invest']; ?></td>
    <td><?php echo $avg5['maximum_invest']; ?></td>
  </tr>
  <tr>
    <td>Minimum</td>
    <td><?php echo $avg6['minimum_invest']; ?></td>
    <td><?php echo $avg7['minimum_invest']; ?></td>
    <td><?php echo $avg8['minimum_invest']; ?></td>
  </tr>
</table>
</center>
</body>
</html>
