<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$dao=new DataAccess();
$info=$dao->getData('*','area','areaid='.$_GET['id']);
$elements=array(

    "areaname"=>$info[0]['areaname']);


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('areaname'=>"area name");


$rules=array(
    "areaname"=>array("required"=>true,"minlength"=>3,"maxlength"=>20,"alphaonly"=>true),
    
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

       'areaname'=>$_POST ['areaname'],
       
         
    );
  
    $condition='areaid='.$_GET['id'];
    if($dao->update($data,'area',$condition))
    {
        $msg="Successfullly Updated";
//header('location:viewarea.php');
    }
    else
        {$msg="Failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

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


