
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
            <H1><center>AREA DETAILS</center></H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>areaid</th>
                        <th>areaname</th>
                        <th>
                        
                        
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editarea.php','params'=>array('id'=>'areaid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deletearea.php','params'=>array('id'=>'areaid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('areaid')
        
        
    );

   
   $join=array(
        
    );  $fields=array('areaid','areaname');

    $users=$dao->selectAsTable($fields,'area as dt','dt.status=1',$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
