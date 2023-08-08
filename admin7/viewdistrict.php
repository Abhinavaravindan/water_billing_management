
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
            <H1><center>DISTRICT DETAILS</center></H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>did</th>
                        <th>dname</th>
                        
                        
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editdistrict.php','params'=>array('id'=>'did'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'editdistrict.php','params'=>array('id'=>'did'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('did')
        
        
    );

   
   $join=array(
        
    );  $fields=array('did','dname');

    $users=$dao->selectAsTable($fields,'district as dt',1,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
