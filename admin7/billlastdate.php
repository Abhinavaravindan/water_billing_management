<?php 

 require('../config/autoload.php'); 
include("header.php");
$dao=new DataAccess();

$info=$dao->getData('*','consumer','cid='.$_SESSION['consid']);
$unit=$_SESSION['tounit']-$info[0]['lastunit'];

$rates="SELECT amount FROM rate WHERE $unit BETWEEN fromunit AND tounit ";



$info1=$dao->query($rates);
$rate1=$info1[0]["amount"];
$bamnt=$rate1*$unit;

$cdate=date('Y-m-d',time());
$date1=date('Y-m-d', strtotime($cdate. ' + 10 days')); 
$date2=date('Y-m-d', strtotime($cdate. ' + 20 days')); 
$fine1=$bamnt+$bamnt*5/100;
$msg="";
$elements=array(
              "consid"=>$_SESSION['consid'],
	      "fromdate"=>$info[0]['lastpaydate'],
	     "todate"=>$_SESSION['todate'],
	      "prevrd"=>$info[0]['lastunit'],
		  "currd"=>$_SESSION['tounit'],
	      "cunit"=>$unit,
	       "rate"=>$rate1,
	      "bamnt"=>$bamnt,
	       "lpay"=>$date1,
	    "disdate"=>$date2,
	       "fine"=>$fine1,);

$form=new FormAssist($elements,$_POST);

$labels=array();

$rules=array(
	
	);
	
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

$data111=array(

			
			'lastunit'=>$_POST['currd'],
			
			'lastpaydate'=>$_SESSION['todate'],
			
    );
	 if($dao->update($data111,'consumer','consid='.$_POST['consid']))
    {
        
    }



	$data=array(

			
			'consid'=>$_POST['consid'],
			
			'fromdate'=>$_POST['fromdate'],
			'todate'=>$_POST['todate'],
			'prevrd'=>$_POST['prevrd'],
			'currd'=>$_POST['currd'],
			
			'cunit'=>$_POST['cunit'],
			'rate'=>$_POST['rate'],
			
			'bamnt'=>$_POST['bamnt'],
	
			'lpay'=>$_POST['lpay'],
			'disdate'=>$_POST['disdate'],
	        'fine'=>$_POST['fine'],
			'status'=>1,

'rstatus'=>1,
'billdate'=>$cdate,
	
    );
	
	
	
	
	
  
    if($dao->insert($data,"invoice"))
    {
        echo "<script> alert('New record created successfully');</script> ";
		echo"<script >location.href = 'billpreparation.php'</script>";

    }
    else
        {$msg="Registration failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>




<?php
    



}


?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">
 
<div class="row">
                    <div class="col-md-6">
Consumer ID :

<?= $form->textBox('consid',array('class'=>'form-control')); ?>
<span style="color:red;">

</div>
</div>


<div class="row">
                    <div class="col-md-6">
From Date :

<?= $form->textBox('fromdate',array('class'=>'form-control')) ?>
<span style="color:red;">

</div>
</div>

	 
	 
<div class="row">
                    <div class="col-md-6">
To Date:

<?= $form->textBox('todate',array('class'=>'form-control')); ?>
<span style="color:red;">

</div>
</div>


	<div class="row">
                    <div class="col-md-6">
Previous Reading:

<?= $form->textBox('prevrd',array('class'=>'form-control')); ?>
<span style="color:red;">

</div>
</div>
		
		<div class="row">
                    <div class="col-md-6">
Current Reading:

<?= $form->textBox('currd',array('class'=>'form-control')); ?>
<span style="color:red;">

</div>
</div>
			
			<div class="row">
                    <div class="col-md-6">
Consumed Unit:

<?= $form->textBox('cunit',array('class'=>'form-control')); ?>
<span style="color:red;">

</div>
</div>
				
				
				<div class="row">
                    <div class="col-md-6">
Rate:

<?= $form->textBox('rate',array('class'=>'form-control')); ?>
<span style="color:red;">

</div>
</div>
					
					
					<div class="row">
                    <div class="col-md-6">
Bill Amount:

<?= $form->textBox('bamnt',array('class'=>'form-control')); ?>
<span style="color:red;">

</div>
</div>
						
						
						<div class="row">
                    <div class="col-md-6">
Last Payment:

<?= $form->textBox('lpay',array('class'=>'form-control')); ?>
<span style="color:red;">

</div>
</div>
			
	
	 <div class="row">
                    <div class="col-md-6">

						
						<div class="row">
                    <div class="col-md-6">
Disconnection Date:

<?= $form->textBox('disdate',array('class'=>'form-control')) ?>
<span style="color:red;">

</div>
</div>
							
							<div class="row">
                    <div class="col-md-6">
Amount With Fine:

<?= $form->textBox('fine',array('class'=>'form-control')); ?>
<span style="color:red;">
</div>
</div>
								
								<div class="row">
                    <div class="col-md-6">

<button type="submit" name="btn_insert"  >Done</button>
</form>


</body>

</html>


