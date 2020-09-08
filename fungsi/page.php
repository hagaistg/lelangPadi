<?php

function open_header(){
echo('
<!--header-->
<div class="header">
    <div class="container">
    <!---->
            <div class="logo">
            <a href="index.php"><img src="images/header.png" alt="" ></a>
            </div>
            <div class="header-right">
                <ul class="account">
                ');
                if(isset($_SESSION['is_logged_in'])){
                    echo ('<li><b><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.$_SESSION['user'].'</a></b></li> |<li><a href="my_Lelang.php"><span class="glyphicon glyphicon-shopping-cart "></span>&nbsp;MY LELANG</a> </li> |
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; LOGOUT </a></li>|<a href="cart.php" class="cart btn"><span class="glyphicon glyphicon-shopping-cart" ></span>&nbsp;CART</a>
                    ');
                }else{
                    echo('<li><a href="login.php" ><span class="glyphicon glyphicon-log-in"></span>&nbsp;LOGIN </a></li>|
                    <li><a href="register.php"><span class="glyphicon glyphicon-user"></span>&nbsp; REGISTER </a></li>');
                }
                echo ('
                </ul>
        <div class="header-bottom">
            <div class="top-nav">
                <span class="menu"> </span>
                <ul>
                    <li><a href="index.php">BERANDA</a> </li>
                    <li><a href="allLelang.php" > DAFTAR LELANG</a></li>
                    <li><a href="cara_lelang.php" >  CARA LELANG  </a></li>
                    <li><a href="jenis_padi.php"> JENIS PADI </a></li>
                </ul>
                <!--script-->
            <script>
                $("span.menu").click(function(){
                    $(".top-nav ul").slideToggle(500, function(){
                    });
                });
        </script>				
    </div>
    <div class="clearfix"> </div>
    </div>
    </div>
    <div class="clearfix"> </div>
</div>
</div>
<!---->');
}
function open_page() { 
    echo '<!DOCTYPE html>
    <html>
    <head>
    <title>Tobasa Lelang Padi</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/plugins.css" />
        <link rel="stylesheet" href="assets/css/roboto-webfont.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />
        <link rel="stylesheet" href="daterangepicker.css" />
        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        
        <script src="assets/js/previmg.js"></script>
        
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Mooroodool Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--fonts-->
    <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Vollkorn:400,700" rel="stylesheet" type="text/css">
    <!--//fonts-->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
                    <script type="text/javascript">
                        jQuery(document).ready(function($) {
                            $(".scroll").click(function(event){		
                                event.preventDefault();
                                $("html,body").animate({scrollTop:$(this.hash).offset().top},1000);
                            });
                        });
                        </script>
                        <!---->
                        <link rel="stylesheet" href="css/etalage.css">
    
            <script src="js/jquery.etalage.min.js"></script>
    <script>
                jQuery(document).ready(function($){
    
                    $("#etalage").etalage({
                        thumb_image_width: 300,
                        thumb_image_height: 400,
                        source_image_width: 800,
                        source_image_height: 1000,
                        show_hint: true,
                        
                    });
    
                });
            </script>
    
    </head>
    <body>';
}
function carousel(){
    echo('	<div class="container">
	<!--banner-->
	<a href="add_lelang.php" class="ban"><div class="banner ">	
		  <div class="wmuSlider example1">
			   <div class="wmuSliderWrapper">
			 <article style="position: absolute; width: 100%; opacity: 0;"> 
				   	<div class="banner-wrap">	
						<div class="short" >
							<img class="img-responsive" src="images/coba.png" alt="" >
						 </div>
						   <div class="month">
							<h4>Mari bergabung !</h4>
							<div class="month-grid">
								<p>Daftarkan Lelangan anda disini</p>
								<div class="banner-btns">
									<span class="detail" href="add_lelang.php">Daftar Lelang</span>
								</div>
							</div>
						   </div>
				   		 <div class="clearfix"></div>
				   	 </div>
            </article>
            </a>
            <a href="allLelang.php" class="ban">
			<article style="position: absolute; width: 100%; opacity: 0;"> 
				   	<div class="banner-wrap">	
						<div class="short" >
							<img class="img-responsive" src="images/palu.png" alt="" >
						 </div>
						   <div class="month">
							<h4>Ayo Menangkan Lelang !</h4>
							<div class="month-grid">
								<p>Jangan sampai ketinggalan lelang ! <br> Segera bergabung !</p>
								<div class="banner-btns">
									<span class="buy"  href="allLelang.php">Daftar Lelang</span>
								</div>
							</div>
						   </div>
				   		 <div class="clearfix"> </div>
				   	 </div>
			</article>
			</div>
		</div>
		<!---->
		  <script src="js/jquery.wmuSlider.js"></script> 
			  <script>
       			$(".example1").wmuSlider({
					 pagination : false,
				});         
   		     </script> 	
		
		</div>   </a>
	</div></a>
        </div>
        </div>
      </div>');
}
function footer(){
    echo('<div class="footer">
    <div class="container">
         <p class="footer-grid">Diploma III Teknik Informatika || PSW II 2018</p>
        
    </div> 	
     <script type="text/javascript">
            $(document).ready(function() {
                $().UItoTop({ easingType: "easeOutQuart" });
            });
        </script>
    <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

</div>');
}
function close_page() {
    echo('</body></html>'); 
}