
<?php require('../config/autoload.php'); 

	include("headerlogin.php");
?>

<?php
$dao=new DataAccess();

$name=$_SESSION['cid'] ;
//$name=6;

$q1="select * from invoice where status=1 and consid=".$name ;

$info1=$dao->query($q1);
$amt=$info1[0]["fine"];

  $_SESSION['cid']=$name;
  $_SESSION['amount']=$amt;
?>


    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-10">
                <table  border="1" class="table" style="margin-top:80px;">
                    <tr>
                        <th>Bill Id</th>
						<th>Consumer Id</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Unit Consumed</th>
                        <th>Current reading</th>
                        <th>Rate</th>
                        <th>Last payment date</th>
                        <th>Disconnection date</th>
                        <th>Your Bill(in reading)</th>
                        <th>Total Bill(incuding fine)</th>
                       
                        <th>pay</th>
						
						
                      
                    </tr>
<?php
    
    $actions=array(
    
    'delete'=>array('label'=>'Pay','link'=>'payments.php','params'=>array('id'=>'billid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('billid'),
		'actions_td'=>false,
        
        
    );


    $condition="b.consid=".$name." and status=1";
   $join=array(
        
	 //'con as c'=>array('c.cid=b.cid','join'),
    ); 

//$fields=array('bid','b.cid','c.cname','cunit','bamnt');
$fields=array('billid','b.consid','fromdate','todate','currd','cunit','rate','lpay','disdate','bamnt','fine');
    $users=$dao->selectAsTable($fields,'invoice as b', $condition,$join,$actions,$config);
  
  
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
