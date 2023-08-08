
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
            <H1><center>DISCONNECTION DETAILS</center></H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                    <th>billid</th>
                        <th>cid</th>
                        
                        <th>bamnt</th>
                        <th>lpay</th>
                        <th>disdate</th>
                        <th>fine</th>

                        <th>billdate</th>
                        
                     <th>Action<th>
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Disconnection','link'=>'disconnect.php','params'=>array('id'=>'billid'),'attributes'=>array('class'=>'btn btn-success')),
    
  
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('billid'),

        
        
        
    );

   $condition="status=1";
   $join=array(
        
    );  $fields=array('billid','consid','bamnt','lpay','disdate','fine','billdate');

    $users=$dao->selectAsTable($fields,'invoice as b',$condition,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
