<?php 

 require('../config/autoload.php'); 
include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','consumer','cid='.$_GET['id']);

$file=new FileUpload();
$flag=false;
$elements=array(
    "cname"=>$info[0]['cname'],"cno"=>$info[0]['cno'],"did"=>$info[0]['did'],"areaid"=>$info[0]['areaid'],"conndate"=>$info[0]['conndate'],"billdate"=>$info[0]['billdate'],"lastpaydate"=>$info[0]['lastpaydate'],"lastunit"=>$info[0]['lastunit'],"cimage"=>"");



$form=new FormAssist($elements,$_POST);





$labels=array('cname'=>"c Name","did"=>"d id","cno"=>"c no","areaid"=>"area id","cimage"=>" Image" );

$rules=array(
    "cname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30),
    "cno"=>array("required"=>true,"minlength"=>1,"maxlength"=>5,"integeronly"=>true),
    "did"=>array("required"=>true,"minlength"=>1,"maxlength"=>5,"integeronly"=>true),
   
    "areaid"=>array("required"=>true,"minlength"=>1,"maxlength"=>5,"integeronly"=>true),
 

"cimage"=> array('filerequired'=>true)
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
    if(isset($_FILES['cimage']['name']))
    {	
if($fileName=$file->doUploadRandom($_FILES['cimage'],array('.jpg','.png','.jpeg'),100000,2,'../uploads'))
		{
            $flag=true;
          
          
        }
    
//echo"haiclear";
$data=array(

        'cname'=>$_POST['cname'],
        'cno'=>$_POST['cno'],
     'did'=>$_POST['did'],
        
        

          'areaid'=>$_POST['areaid'],
        'lastunit'=>0,
       // 'conndate'=>$conndate,
        //'lastpaydate'=>$conndate,
          'cimage'=>$fileName
    );
  
    $condition='cid='.$_GET['id'];
    if(isset($flag))
                {	$data['cimage']=$fileName;
            
                }
        
    
    if($dao->update($data,'consumer',$condition))
        {
            $msg="Successfullly Updated";
    
        }
        else
            {$msg="Failed";} ?>
    
  <!--  <span style="color:red;"><?php echo $msg; ?></span>-->
    
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
NAME:

<?= $form->textBox('cname',array('class'=>'form-control')); ?>
<?= $validator->error('cname'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">

CUNSUMER NO:
<div class="row">
                    <div class="col-md-6">

<?= $form->textBox('cno',array('class'=>'form-control')); ?>
<?= $validator->error('cno'); ?>

</div>
</div>

<div class="row">
                   
<div class="col-md-6">
DISTRICT:

<?php
                    $options = $dao->createOptions('dname','did',"district");
                    echo $form->dropDownList('did',array('class'=>'form-control'),$options); ?>
<?= $validator->error('did'); ?>

</div>
</div>
                    
 <div class="row">
          <div class="col-md-6">
AREA:

<?php
                    $options = $dao->createOptions('areaname','areaid',"area");
                    echo $form->dropDownList('areaid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('areaid'); ?>

</div>
</div>

<div class="row">
      <div class="col-md-6">
IMAGE:

<?= $form->fileField('cimage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('cimage'); ?></span>

</div>
</div>






<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>


