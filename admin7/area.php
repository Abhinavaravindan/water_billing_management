<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "areaname"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('areaname'=>"area name");


$rules=array(
    "areaname"=>array("required"=>true,"unique"=>array("field"=>"areaname","table"=>"area")),
    
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

       'areaname'=>$_POST ['areaname'],
       
         
    );
  
    if($dao->insert($data,"area"))
    {
        echo "<script> alert('New record created successfully');</script> ";
        echo"<script> location.replace('area.php');</script>";
//header('location:area.php');


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
AREA NAME:

<?= $form->textBox('areaname',array('class'=>'form-control')); ?>
<?= $validator->error('areaname'); ?>

</div>
</div>
<div class="row">
 <div class="col-md-6">


    


<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>


