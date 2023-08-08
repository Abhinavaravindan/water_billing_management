
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <H1><center>AMOUNT DETAILS</center></H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>rateid</th>
                        <th>amount</th>
                        <th>fromunit</th>
                        <th>tounit</th>
                        
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editcategory.php','params'=>array('id'=>'rateid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deletecategory.php','params'=>array('id'=>'rateid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('rateid')
        
        
    );

   
   $join=array(
        
    );  $fields=array('rateid','amount','fromunit','tounit');

    $users=$dao->selectAsTable($fields,'rate as dt','dt.status=1',$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
