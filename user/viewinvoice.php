
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                    <th>billid</th>
                        <th>cid</th>
                        <th>fromdate</th>
                        <th>todate</th>
                        <th>prevrd</th>
                        <th>currd</th>
                        <th>cunit</th>
                        <th>rate</th>
                        <th>bamnt</th>
                        <th>lpay</th>
                        <th>disdate</th>
                        <th>fine</th>
                        <th>status</th>
                        <th>rstatus</th>
                        <th>billdate</th>
                        
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'billp.php','params'=>array('id'=>'billid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'editconsumer.php','params'=>array('id'=>'billid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('billid'),

        
        
        
    );

    $condition="status=1";
   $join=array(
        
    );  $fields=array('billid','consid','fromdate','todate','prevrd','currd','cunit','rate','bamnt','lpay','disdate','fine','status','rstatus','billdate');

    $users=$dao->selectAsTable($fields,'invoice as b',$condition,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
