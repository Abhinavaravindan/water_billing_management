
<script>
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
</script>

<?php  
 //session_start();
include("dbcon.php");
require('../config/autoload.php');
$dao=new DataAccess();
?>
<div class="row">
 <div class="col-md-12">
 <div class="table-responsive">
                                <table border="1"  id="printTable" style="width:100%" >
                                    <thead>
                          <center> Kerala Water Bill</center>
                           <center> Details </center>
                            <tr>
                             <th style="text-align:left">BillNo.1</th>
                               <th colspan="2" style="text-align:left"></th>
                              <th style="text-align:left" >Date:<?php echo  date("Y/m/d"); ?></th>
                            </tr>
                           <tr>
                    <th>Bill id</th>    
			              <th>Consumer Id</th>
                    <th>Units</th>
                    <th>Amount</th>
                            </tr>
                      
                                    </thead>
                                    <tbody>
                                   
 <?php
$name=$_SESSION['cid'] ;

 

$sql = "SELECT * FROM invoice WHERE (status=1 or status=3) and consid='$name'";
$result = $conn->query($sql);


	
	
	
	


if ($result->num_rows > 0) {


 // output data of each row
    while($row = $result->fetch_assoc()) {
		
		
      echo "<tr> <td> " . $row["billid"]. "</td> <td> " . $row["consid"]. "</td> <td>" . $row["cunit"]. "</td>  <td>" . $row["fine"]. "</td>  </tr>";
	  
	    
}
}


 ?>

 
       




</table>



<?php


$sql11 =" UPDATE invoice SET status=2 WHERE status=1 or status=3 and consid='$name'" ;

if ($conn->query($sql11) === TRUE) {
	echo "<script> alert('Payment Sucessfully');</script> ";
	 
	
	 }
	 ?>
     <br /><br />

<input type="button" onclick="printData();" value="PRINT"  />

<a href="headerlogin.php">HOME</a>
</div>
</div>
</div>

</form>




