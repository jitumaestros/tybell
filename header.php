<?php include ('common/config.php');
 $current=strtotime('2019-06-28');
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$details->city;
$city = $details->city;

    #Find latitude and longitude

$url = "http://maps.googleapis.com/maps/api/geocode/json?address=$city";
$json_data = file_get_contents($url);
$result = json_decode($json_data, TRUE);
$latitude = $result['results'][0]['geometry']['location']['lat'];
$longitude = $result['results'][0]['geometry']['location']['lng']; 
$new_arr[]= unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));

$latitude =  $new_arr[0]['geoplugin_latitude'];  $longitude = $new_arr[0]['geoplugin_longitude'];

$users=mysqli_fetch_array(mysqli_query($conn,"select * from users where id='".$_SESSION['user_id']."'"));
?>
<!DOCTYPE html>

<html lang="en">

<head>

  <title>Tybell</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="css/bootstrap.min.css">


<link href="https://unpkg.com/@ionic/core@latest/css/ionic.bundle.css" rel="stylesheet">

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

   
  <script src="js/jquery.min.js"></script>

  <script src="js/bootstrap.min.js"></script>

<script src="js/jquery-1.11.3.min.js"></script>

<!-- <script src="js/jquery.mobile-1.4.5.min.js"></script> -->

  <script src="https://unpkg.com/@ionic/core@latest/dist/ionic.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.css">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/responsive.css">

<!-- 

    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css"> -->


</head>

	<header>

		<nav class="navbar navbar-inverse">

		  <div class="container-fluid">

		  	<div class="top_nav_bar">

		  		<div class="col-sm-4">

					<div class="contact_wrapper text-left">

						<p class="contactno"> <span ><i class="fa fa-phone"></i></span> 222039856</p>

					</div>

				</div>

				<div class="col-sm-4">

					<div class="logo_div text-center">

						<a href="index.php"><p class="logo_1"><img src="img/logo.png" class="logo_img"></p></a> 

					</div>

				</div>

				<div class="col-sm-4">

					 <ul class="list_right text-right">


            <?php 

            if($_SESSION['user_id']=='') { ?>

					    <li><a href="business-info/index.php">REGISTRA TU NEGOCIO</a></li>

					    <li><a href="login.php" style="color: #E23669;font-weight: 700;">INICIA SESIÓN</a></li>

					<?php } else {
					if($users['role']=='2'){?>
				 <li><a href="myaccount.php" style="color: #E23669;font-weight: 700;">MI PERFIL</a></li>

				 <li><a href="vendoradmin/PRO/index.php" style="color: #E23669;font-weight: 700;">Ir a Tybell Partners</a></li>
				 <li><a href="logout.php" style="color: #E23669;font-weight: 700;">CERRAR SESIÓN</a></li>


					 <?php }else{?>
					  <li><a href="myaccount.php" style="color: #E23669;font-weight: 700;">MI PERFIL</a></li>
				 <li><a href="logout.php" style="color: #E23669;font-weight: 700;">CERRAR SESIÓN</a></li>


					 <?php } }?>


					  </ul>

				</div>

		  	</div>

		  </div>

		
			 <div class="container">

			  <div class="overflow-h">

			
				    <div class="navbar-header">

				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">

				        <span class="icon-bar"></span>

				        <span class="icon-bar"></span>

				        <span class="icon-bar"></span>                        

				      </button>

				    </div>

				    <div class="collapse navbar-collapse" id="myNavbar">

				      <ul class="nav navbar-nav header_menu">

				        <li><a href="aboutus.php">Nosotros</a></li> 
				        <li  class="dropdown"><a href="treatment-files/index.php" >Blog</a>
						
				        </li>  
				        <li><a href="get-in-touch.php">Contáctenos</a></li> 
				 <li><a href="promotion.php" >Promociones</a></li> 

				      </ul>  

				    </div>

				  </div>		

				</div>



				<div class="drop_down" id="db1" style="display: none;">

			        			<div class="container">

			        				<div class="col-sm-4">

			        					<div class="content_blog_db_1">

			        						<ul class="list_menu_bd">

			        							<li><a href="">Haircuts and Hairdressing</a></li>

			        							<li><a href="">Blow Dry</a></li>

			        							<li><a href="">Ladies' Hair Colouring & Highlights</a></li>

			        							<li><a href="">Ladies' Brazilian Blow Dry</a></li>

			        							<li><a href="">Balayage & Ombre</a></li>

			        							<li><a href="">Men's Haircut</a></li>

			        							<li><a href=""><b>See all hair treatments</b></a></li>

			        						</ul>

			        					</div>

			        				</div>

			        				<div class="col-sm-4">

			        					<a href="">

			        						<div class="blog_2db">

				        						<div class="img_blog1">

				        							<div class="img_main_db">

				        								<img src="img/db1.jpg">

				        							</div>

				        						</div>

				        						<div class="content_blog_bd">

				        							<p>Last minute? Cuts near you</p>

				        						</div>

				        					</div>

			        					</a>	        					

			        				</div>

			        				<div class="col-sm-4">

			        					<a href="">

			        						<div class="blog_2db">

				        						<div class="img_blog1">

				        							<div class="img_main_db">

				        								<img src="img/db1.jpg">

				        							</div>

				        						</div>

				        						<div class="content_blog_bd">

				        							<p>Last minute? Cuts near you</p>

				        						</div>

				        					</div>

			        					</a>

			        				</div>

			        			</div>

			        		</div>
			</nav>

	</header>

	<script type="">

	function toggless1(id){

		$('.addclass').toggleClass('active_db');

		$('#'+id).toggle();

	}

</script>

<body>
<!-- <script type="text/javascript">

  function getLocation() {

    if (navigator.geolocation) {

      navigator.geolocation.getCurrentPosition(showPosition);

    } else {

      x.innerHTML = "Geolocation is not supported by this browser.";

    }

  }



  function showPosition(position) {

    var clatt = position.coords.latitude;

    var clongi = position.coords.longitude; 


    window.location="promotion.php?lat="+clatt+"&long="+clongi;

  }
</script> -->