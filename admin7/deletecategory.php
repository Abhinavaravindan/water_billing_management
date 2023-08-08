

<?php	
include("dbcon.php");
$cart_id = $_GET['id'];
echo $cart_id;
$sql = "update rate set status=2 where rateid=".$cart_id;

$conn->query($sql);

 header('location:viewcategory.php');



?>

