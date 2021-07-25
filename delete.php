<?php include "conndb.php"; ?>
<?php
$rn=$_REQUEST['a'];
// sql to delete a record
$sql = "DELETE FROM `dotcode` WHERE `dotcode`.`id` = '$rn'";

if ($conn->query($sql) === TRUE) {
  header("location:index.php"); // redirects to all records page
    exit;
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
<button type="submit" formaction="index.php">go back</button>

</body>
</html>