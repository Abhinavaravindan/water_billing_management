

<?php	
include("dbcon.php");
$id = $_GET['id'];
echo $cart_id;
$sql = "update invoice set status=2 where billid=".$id;

$conn->query($sql);

 header('location:reconnection.php');



?>

