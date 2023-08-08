

<?php	
include("dbcon.php");
$cart_id = $_GET['id'];
echo $cart_id;
$sql = "update consumer set status=2 where cid=".$cart_id;

$conn->query($sql);

 header('location:viewconsumer.php');



?>

