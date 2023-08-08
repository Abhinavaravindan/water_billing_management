
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
            <H1><center>CONSUMER DETAILS</center></H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>cid</th>
                        <th>cname</th>
                        <th>cno</th>
                        <th>areaid</th>
                        <th>did</th>
                        <th>conndate</th>
                        <!--<th>billdate</th>-->
                       <!-- <th>lastpaydate</th>
                        <th>lastunit</th>-->
                        <th>cimage</th>
                        
                        
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editconsumer.php','params'=>array('id'=>'cid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deleteconsumer.php','params'=>array('id'=>'cid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('cid'),
'actions_td'=>false,
         'images'=>array(
                        'field'=>'cimage',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
        
        
    );

   
   $join=array(
        
    );  $fields=array('cid','cname','cno','areaid','did','conndate','cimage');

    $users=$dao->selectAsTable($fields,'consumer as dt','dt.status=1',$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
