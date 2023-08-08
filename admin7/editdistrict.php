<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$dao=new DataAccess();
$info=$dao->getData('*','district','did='.$_GET['id']);
$elements=array(
    "dname"=>$info[0]['dname']);

$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('dname'=>"d name");



$rules=array(
    "dname"=>array("required"=>true,"minlength"=>3,"maxlength"=>20,"alphaonly"=>true),
    
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

       'dname'=>$_POST ['dname'],

        
         
    );
    $condition='did='.$_GET['id'];
  
    if($dao->update($data,'district',$condition))
    {
        $msg="Successfullly Updated";
header('location:viewdistrict.php');
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

DISTRICT:

<?= $form->textBox('dname',array('class'=>'form-control')); ?>
<?= $validator->error('dname'); ?>

</div>
</div>



<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>


