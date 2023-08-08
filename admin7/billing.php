<?php 

 require('../config/autoload.php'); 
include("header.php");


$elements=array(
        "cno"=>"","todate"=>"","tounit"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('cno'=>"consumer number","todate"=>"To date","to unit");

$rules=array(
    "cno"=>array("required"=>true,"cno"=>true,"unique"=>array("field"=>"cno","table"=>"consumer","minlength"=>1,"maxlength"=>30,"integeronly"=>true),
    
"tounit"=>array("required"=>true,"minlength"=>1,"maxlength"=>2,"integeronly"=>true),
"todate"=>array("required"=>true),

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
if($validator->validate($_POST))
{
$data=array(

        'cno'=>$_POST['cno'],
        'tounit'=>$_POST['tounit'],
          'todate'=>$_POST['todate'],
		  
          //'simage'=>$_POST['simage'],
    );
  
    if($dao->insert($data,"student"))
    {
        echo "<script> alert('New record created successfully');</script> ";
header('location:studentdetails.php');
    }
   


}


}


?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" >
 
<div class="row">
                    <div class="col-md-6">
Consumer NO:

<?= $form->textBox('cno',array('class'=>'form-control')); ?>
<?= $validator->error('cno'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">

TO date:

<?= $form->inputBox('todate',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('todate'); ?></span>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Tounit:

<?= $form->textBox('tounit',array('class'=>'form-control')); ?>
<?= $validator->error('tounit'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">







<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>


