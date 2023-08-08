<!doctype html>
<html class="no-js" lang="zxx">


<body>
  <?php
  require('../config/autoload.php'); 
  if(isset($_SESSION['email']))
   {
	  include("headerlogin.php");
  }
  else
 
	{
		
		include("headerlogout.php");
	}
	?>
     <div class="service_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-90">
                        <span class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s"></span>
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">What we offer for you</h3>
                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">We provide online instant cash loans with quick approval that suit your term</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_service wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".5s">
                        <div class="service_icon_wrap text-center">
                            <div class="service_icon ">
                                <img src="img/svg_icon/p1.jpg" alt="">
                            </div>
                        </div>
                        <div class="info text-center">
                            <span><a href="viewallbill.php">Quick Pay</span>
                           
                        </div>
                        <div class="service_content">
                           
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_service wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="service_icon_wrap text-center">
                            <div class="service_icon ">
                                <img src="img/svg_icon/p2.jpg" alt="">
                            </div>
                        </div>
                        <div class="info text-center">
                            <span><a href="registration1.php">New Connection</span>
                            
                        </div>
                        <div class="service_content">
                           
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_service wow fadeInRight" data-wow-duration="1.2s" data-wow-delay=".5s">
                        <div class="service_icon_wrap text-center">
                            <div class="service_icon ">
                                <img src="img/svg_icon/q1.jpg" alt="">
                            </div>
                        </div>
                        <div class="info text-center">
                            <span><a href="viewallbillview.php">View Bill Details</span>
                            
                        </div>
                         <div class="service_content">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
 <?php
	
		include("footer.php");
	
	?>
	
  