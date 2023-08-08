<?php 

 require('../config/autoload.php'); 
include("oghead.php");

$file=new FileUpload();
$elements=array(
        "iname"=>"","iprice"=>"","offerprice"=>"","cid"=>"","iimage"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('iname'=>"Item Name","iprice"=>"Item Price","offerprice"=>"Offer Price","cid"=>"Category Name","iimage"=>"Item Image" );

$rules=array(
    "iname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30),
    "iprice"=>array("required"=>true,"minlength"=>2,"maxlength"=>5,"integeronly"=>true),
    "offerprice"=>array("required"=>true,"integeronly"=>true),
 "cid"=>array("required"=>true),

"iimage"=> array('filerequired'=>true)
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	
if($fileName=$file->doUploadRandom($_FILES['iimage'],array('.jpg','.png','.jpeg'),100000,2,'../uploads'))
		{
echo"haiclear";
$data=array(

        'iname'=>$_POST['iname'],
        'iprice'=>$_POST['iprice'],
          'offerprice'=>$_POST['offerprice'],
		  'cid'=>$_POST['cid'],
        
          'iimage'=>$fileName,
'status'=>'a'
    );
  
    if($dao->insert($data,"item"))
    {
        echo "<script> alert('New record created successfully');</script> ";
header('location:studentdetails.php');
    }
    else
        {$msg="Registration failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}
else
echo $file->errors();
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
Item Name:

<?= $form->textBox('iname',array('class'=>'form-control')); ?>
<?= $validator->error('iname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Item Price:

<?= $form->textBox('iprice',array('class'=>'form-control')); ?>
<?= $validator->error('iprice'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
Offer Price:

<?= $form->textBox('offerprice',array('class'=>'form-control')); ?>
<?= $validator->error('offerprice'); ?>
</div>
</div>


<div class="row">
                    <div class="col-md-6">
Category name:

<?php
                    $options = $dao->createOptions('cname','cid',"category");
                    echo $form->dropDownList('cid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('cid'); ?>

</div>
</div>



<div class="row">
                    <div class="col-md-6">
IMAGE:

<?= $form->fileField('iimage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('iimage'); ?></span>

</div>
</div>






<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>


