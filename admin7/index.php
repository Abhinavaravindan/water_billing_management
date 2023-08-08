<?php 

 require('../config/autoload.php'); 
include('loginhead.php');

$file=new FileUpload();
$elements=array(
        "uname"=>"", "upassword"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('uname'=>"Username",'upassword'=>"Password");

$rules=array(
    "uname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
   "upassword"=>array("required"=>true,"minlength"=>3,"maxlength"=>30),
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($_POST['uname']=='admin' and $_POST['upassword']=='abhinav')
{ 
echo "<script> alert('successfully logged in');</script> ";
header('location:header.php');
    }
    else
        {$msg="Username or Password Incorrect"; ?>

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
 <H1><U>LOGIN FORM </U></H1>
<div class="row">
                    <div class="col-md-6">
User Name:

<?= $form->textBox('uname',array('class'=>'form-control')); ?>
<?= $validator->error('uname'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Password:

<?= $form->passwordBox('upassword',array('class'=>'form-control')); ?>
<?= $validator->error('upassword'); ?>

</div>
</div>


<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>


