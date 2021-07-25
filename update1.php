
<?php

include "conndb.php"; // Using database connection file here

$id = $_GET['a']; // get id through query string

$qry = mysqli_query($conn,"select * from dotcode where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $da = $_POST['date'];
    $in = $_POST['invest'];
    $qa = $_POST['quantity'];
    $se = $_POST['sell'];
    $pr=$se-$in;
	
    $edit = mysqli_query($conn,"update dotcode set date='$da', invest='$in' ,quantity='$qa' ,sell='$se',profit='$pr' where id='$id'");
	
    if($edit)
    {

        header("location:index.php"); // redirects to all records page
    exit;// redirects to all records page
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<style>
    h3{
        text-align:center;
        color:rgb(217, 0, 115);
    }
    table{
        background-color:lightgreen;
        border-radius: 25px;
        height:50%;
        width:20%;
    }
    .btn{
        color:white;
        background-color:green;
        border-radius: 25px;
        text-align:center;
    }
    body{
        background-image: linear-gradient(to right, rgba(255,0,0,1),rgba(255,0,0,0), rgba(255,0,0,1));
    }
    th, td {
  text-align: left;
  padding: 8px;
}
    </style>
<body>
    <center>
<form method="POST">
<table style=" border: 7px solid #7FFF00">
<tr><td><h3>Update Data</h3></tr></td>
<tr><td><input type="date" name="date" value="<?php echo $data['date'] ?>" placeholder="Enter date" Required></td></tr>
<tr><td><input type="number" name="invest" value="<?php echo $data['invest'] ?>" placeholder="Enter invest" Required></td></tr>
<tr><td><input type="number" name="quantity" value="<?php echo $data['quantity'] ?>" placeholder="Enter quantity" Required></td></tr>
<tr><td><input type="number" name="sell" value="<?php echo $data['sell'] ?>" placeholder="Enter sell" Required></td></tr>
<tr><td><input type="submit" name="update" value="Update" class='btn'></td></tr>
</table>
</form>
<input type="button" onclick="location.href='index.php';" value="Go Back" />
</center>
</body>
</html>