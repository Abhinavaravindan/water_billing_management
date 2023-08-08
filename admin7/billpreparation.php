<?php 

 require('../config/autoload.php'); 
include("header.php");



$elements=array("consid"=>"",
                "consname"=>"",
				"tounit"=>"",
				"todate"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('consid'=>"Consumer ID",'tounit'=>"Last Unit",'todate'=>"To Date");

$rules=array(
"consid"=>array("required"=>true),
	
	"tounit"=>array("required"=>true),
	"todate"=>array("required"=>true,"unique"=>array("field"=>"todate","table"=>"invoice")),


);
    
$validator = new FormValidator($rules,$labels);



 

if(isset($_POST["btn_insert"]))
{


	$_SESSION['consid']=$_POST['consid'];
	$_SESSION['tounit']=$_POST['tounit'];
	$_SESSION['todate']=$_POST['todate'];
	
	
	echo"<script >location.href = 'billlastdate.php'</script>";

 }

		




?>
<html>
<head>

</head>
<body>

 <form action="" method="POST" >
<H1><center><U>BILL PREPARATION </U></H1>
	 
	 
Consumer id:
<div class="row">
                    <div class="col-md-6">
<?php
                    $options = $dao->createOptions('cid','cid',"consumer");
                    echo $form->dropDownList('consid',array('class'=>'form-control'),$options); ?>
<span style="color:red;"><?= $validator->error('consid'); ?>

</div>
</div>
	<div class="row">
                    <div class="col-md-6">
current Unit:

<?= $form->textBox('tounit',array('class'=>'form-control')); ?>
<?= $validator->error('tounit'); ?>

</div>
</div> 
	 
	 
	 
	 
<div class="row">
                    <div class="col-md-6">
Last reading Date:

<?= $form->inputBox('todate',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('todate'); ?></span>

</div>
</div>




<div class="row">
 <div class="col-md-6">

<button type="submit" name="btn_insert"  >Next</button>
</div>
</div>




</form>


</body>

</html>


