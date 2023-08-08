<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();

$elements=array(
        "rateid"=>"","amount"=>"","fromunit"=>"", "tounit"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('amount'=>"Category name");
$labels=array('fromunit'=>"from unit");
$labels=array('tounit'=>"to unit");


$rules=array(
    "amount"=>array("required"=>true,"minlength"=>1,"maxlength"=>20,"integeronly"=>true),
    "fromunit"=>array("required"=>true,"minlength"=>1,"maxlength"=>10,"integeronly"=>true),
    "tounit"=>array("required"=>true,"minlength"=>1,"maxlength"=>10,"integeronly"=>true),

);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

       'amount'=>$_POST ['amount'],
       'fromunit'=>$_POST ['fromunit'],
       'tounit'=>$_POST ['tounit'],
        
         
    );
  
    if($dao->insert($data,"rate"))
    {
        echo "<script> alert('New record created successfully');</script> ";
        echo"<script> location.replace('category.php');</script>";
//header('location:category.php');


    }
    else
        {$msg="Registration failed";} ?>

<!--<span style="color:red;"><?php echo $msg; ?></span>-->

<?php
    


}

}
?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">
 
 
<div class="row">
 <div class="col-md-6">
AMOUNT:

<?= $form->textBox('amount',array('class'=>'form-control')); ?>
<?= $validator->error('amount'); ?>

</div>
</div>
<div class="row">
 <div class="col-md-6">

FROM UNIT:
<?= $form->textBox('fromunit',array('class'=>'form-control')); ?>
<?= $validator->error('fromunit'); ?>

</div>
</div>
<div class="row">
 <div class="col-md-6">
     
TO UNIT:
<?= $form->textBox('tounit',array('class'=>'form-control')); ?>
<?= $validator->error('tounit'); ?>

</div>
</div>



<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>


