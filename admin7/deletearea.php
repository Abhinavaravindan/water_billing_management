

<?php	
include("dbcon.php");
$cart_id = $_GET['id'];
echo $cart_id;
$sql = "update area set status=2 where areaid=".$cart_id;

$conn->query($sql);

 header('location:viewarea.php');



?>

