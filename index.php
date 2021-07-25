<?php 
include "conndb.php";
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dotcode</title>
</head>
<style>
  .bg{
    width: 100%;
    position: absolute;
    z-index: -1;
    filter: blur(8px);
}
    from{
        display: block;
        margin-top: 0em;
    }
    #btna{
        text-align: center;
        color: black;
        border: 2px solid #4CAF50;
    }
    table {
        width: 100%;
        background-color: cadetblue;
        }
    th {
        height: 30px;
    }
    .lock{
      background-color:green;
      color:white;
      border-radius: 12px;
      border: 2px solid white;
      width: 10%;
      height: 30px;
    }
</style>
<body>
    <img class="bg" src="https://image.freepik.com/free-vector/people-analyzing-growth-charts_23-2148866843.jpg" alt="">
    <center>
    <form>
		<table style="width:20px; border: 1px solid black">
			<thead>
      <tr>
					<th>id</th>
					<td><input type="text" name="id" id="id" value="<?php echo uniqid();?>" randomly></td>
				</tr>
				<tr>
					<th>Date</th>
					<td><input type="date" name="date" id="date"></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Invest</th>
					<td><input type="number" name="invest" id="invest"></td>
				</tr>
				<tr>
					<th>Quantity</th>
					<td><input type="number" name="quantity" id="quantity"></td>
				</tr>
				<tr>
					<th>Sell</th>
					<td><input type="number" name="sell" id="sell"></td>
				</tr>
				<tr id="btna">
                    <td> 
                <input type="submit" value="Submit" name="submit" class="btn">
</td>
<td> 
                <button type="submit" formaction="barview.php">View chart</button>
</td><td> 
                <button type="submit" formaction="analysis.php">Analysis</button>
</td></tr>
			</tbody>
		</table>
    <input type="button" onclick="location.href='intro.html';" value="Go Back" /><br>
    <a href="https://localhost/dotcode1/search.php">
  <img alt="Search" height="50px" src="search.png" width="50px" style="float:left;margin-right:0.5em"/></a>
    <p align="right"><input type="button" class='lock' onclick="location.href='https://localhost/dotcode1/index.php';" value="lock" /></p>
</form>
		<table border="5" id="show">
			<thead>
				<tr>
					<th>Date</th>
					<th>Invest</th>
					<th>Quantity</th>
					<th>Sell</th>
          <th>profit</th>
          <th colspan="2" align="center">Operation</th>
				<?php
        include "conndb.php";
        
        // Taking all 5 values from the form data(input)
        $Id = $_REQUEST['id'];
        $date = $_REQUEST['date'];
        $invest = $_REQUEST['invest'];
        $quantity = $_REQUEST['quantity'];
        $sell = $_REQUEST['sell'];
        $profit=$sell-$invest;
        
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO dotcode VALUES ('$Id','$date',
        '$invest','$quantity','$sell','$profit')";
        if(mysqli_query($conn, $sql)){
          echo "<h3>data stored in a database successfully."
            . " "
            . " ";
    
          //echo nl2br("\n$date\n $invest\n "
          //  . "$quantity\n $sell");
        } else{
         // echo "ERROR: Hush! Sorry $sql. "
         //   . mysqli_error($conn);
        }    
        $query="select * from dotcode";
        $data=mysqli_query($conn, $query);
        $result=mysqli_fetch_assoc($data);
        while($result=mysqli_fetch_assoc($data)){
          ?>
        <tr>
        <td><?php echo $result['date']; ?></td>
        <td><?php echo $result['invest']; ?></td>
        <td><?php echo $result['quantity']; ?></td>
        <td><?php echo $result['sell']; ?></td>
        <td><?php echo $result['sell']-$result['invest']; ?></td>
        <td><a href="update1.php?a=<?php echo $result['id']; ?>&b=<?php echo $result['date']; ?>&c=<?php echo $result['invest']; ?>&d=<?php echo $result['quantity']; ?>&e=<?php echo $result['sell']; ?>">Edit</a></td>
        <td><a href="delete.php?a=<?php echo $result['id']; ?>">Remove</a></td>
        </tr>
        <?php
        }
        ?>
        
				</tr>
			</thead>
		</table>
	</center>
</body>
</html>