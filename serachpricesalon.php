<?php include ('common/config.php');

extract($_POST);
$r=rand();

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

	$theta = $lon1 - $lon2;
	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	$dist = acos($dist);
	$dist = rad2deg($dist);
	$miles = $dist * 60 * 1.1515;
	$unit = strtoupper($unit);

	if ($unit == "K") {
		return ($miles * 1.609344);
	} else if ($unit == "N") {
		return ($miles * 0.8684);
	} else {
		return $miles;
	}
}


$latitude = $_REQUEST['latitude'];
$longitude = $_REQUEST['longitude'];
$return_arr = array();  


if($salon!=''){

	$sqliii=mysqli_query($conn,"select * from users where role='2' and business_name='".$salon."' ");


}
else{

	$sqliii=mysqli_query($conn,"select * from users where role='2' and district='$val' ");

}


$salaocount=mysqli_num_rows($sqliii);


if($salaocount==0){

	echo "<div style='color: #0e0e0e;width: 70%;background: #80808024;height: 77px;'><h5 class='ss'>El salón buscado aún no esta registrado, te mostramos otras opciones</h5></div>";?>
	<br>

	<?php $dliii=mysqli_query($conn,"select * from users where role='2'");


	while($slnA=mysqli_fetch_array($dliii)){


		array_push($return_arr, $slnA);
	}

	foreach ($return_arr as $key => $value) {

		$value['latitude'].'<br>';
		if($value['latitude']!=''){
			$return_arr[$key]['dis'] = distance($latitude, $longitude, $value['latitude'], $value['longitude'], "K");
		}else{
			$return_arr[$key]['dis'] = 100000;
		}
	}

	foreach ($return_arr as $key => $slnw) {
				//$volume[$key]  = $slnw['dis'];


		$ratingds = mysqli_fetch_array(mysqli_query($conn,"SELECT  AVG(rating) as rating FROM `feedback` WHERE `salon_id`='".$slnw['id']."' ")); 
		$reviews= (float)$ratingds['rating'].'';

		$volume[$key]  = $reviews;

	}

	array_multisort($volume, SORT_DESC,  $return_arr);

	foreach ($return_arr as $key => $value) {


	}


	foreach($return_arr as $key => $sln) {
		$dist= distance($latitude, $longitude, $sln['latitude'], $sln['longitude'], "K");


		$rating = mysqli_fetch_array(mysqli_query($conn,"SELECT  AVG(rating) as rating FROM `feedback` WHERE `salon_id`='".$sln['id']."' "));

		$reviews= (float)$rating['rating'].''; 

		$countsr = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `feedback` WHERE `salon_id`='".$sln['id']."'  "));


		$img=explode(',',$sln['salon_pic']);

		?>
		<div class="salon_wrapper">

			<div class="padding">

				<div class="col-sm-5">

					<div class="left_slider_div">

						<div id="myCarousel" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->

							<ol class="carousel-indicators">

								<li data-target="#myCarousel" data-slide-to="0" class="active"></li>

								<li data-target="#myCarousel" data-slide-to="1"></li>

								<li data-target="#myCarousel" data-slide-to="2"></li>

							</ol>


							<!-- Wrapper for slides -->

							<div class="carousel-inner">

								<div class="item active">

									<img src="image/<?php echo $img['0'];?>" alt="Los Angeles" style="width:100%;">

								</div>


							</div>

							<!-- Left and right controls -->

							<a class="left carousel-control" href="#myCarousel" data-slide="prev">

								<i class="fa fa-angle-left"></i>

								<span class="sr-only">Previous</span>

							</a>

							<a class="right carousel-control" href="#myCarousel" data-slide="next">

								<i class="fa fa-angle-right"></i>

								<span class="sr-only">Next</span>

							</a>

						</div>        



					</div>

				</div>

				<div class="col-sm-7">

					<div class="right_side_salon">

						<div class="saloon_deatail">

							<h3><?php echo $sln['business_name'];?></h3>

							<div class="rating"> <?php if($countsr==0){}else{
								echo round($reviews,'1');echo "&nbsp;";

								$userdd=explode('.',$reviews);



								$seekerdid=$userdd[0];

								$schedid=$userdd[1];

								for($i=0;$i<$seekerdid; $i++){


									echo '<i class="fa fa-star" style="color:gold;font-size:16px"></i>';

								}    
								if($schedid!=''){
									echo '<i class="fa fa-star-half-o" aria-hidden="true"  style="color:gold;font-size:16px"></i>&nbsp;';
								}
							}?>

							<?php echo "&nbsp;"; echo $countsr;?> opiniones

						</span>

					</div>

					<p><b><?php echo $sln['adress'];?></b></p>
					<P><b><?php echo round($sln['dis']);?> KM</b></P>
					<p style="color: #171E62;"><a href="https://www.google.com/maps/place/<?php echo $sln['adress'];?>"><img src="img/map.svg"><b> Mostrar en el mapa</b></a></p>

					<p style="color: #02B0B9;"><img src="img/off.svg"> <b> Horas especiales</b></p>



				</div>

			</div>

		</div>

	</div>

	<div class="sallon_detail_blog2">

		<div class="blog2_salon">


			<?php
			$m='1';
			$tu='2';
			$wed='3';
			$th='4';
			$fri='5';
			$st='6';
			$t=date('d-m-Y');
			$dayy= date("D",strtotime($t));
			if($dayy=='Mon'){
				$daycount=$m;
			}elseif($dayy=='Tue'){
				$daycount=$tu;
			}elseif($dayy=='Wed'){
				$daycount=$wed;
			}elseif($dayy=='Thu'){
				$daycount=$th;
			}elseif($dayy=='Fri'){
				$daycount=$fri;
			}elseif($dayy=='Sat'){
				$daycount=$st;
			}
			$date= date('H:i'); 
              /*echo $date= '11:00'; 
              */
              $mor='12:00';
              $afet='17:00';
              if(($date >=$mor) && ($date <=$afet)){
              	$days='2';
              }elseif($date <=$mor){
              	$days='1';
              }else{
              	$days='3';
              }
              $days;


              $minimumprice1=str_replace("$", "", $minimumprice);

              $maxmumprice1=str_replace("$", "", $maxmumprice);


              $srev=mysqli_query($conn,"select * from service where salon_id='".$sln['id']."' and price between $minimumprice1 AND $maxmumprice1");
              $r=rand();
              while($sernm=mysqli_fetch_array($srev)){

/*
				$offercount=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$sln['id']."' and status='0'"));

				$offer=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$sln['id']."' and status='0'"));

				$totalprice=$sernm['price']*$offer['offer']/100;

				$totals=$sernm['price']-$totalprice;*/


				$spriclavel=mysqli_fetch_array(mysqli_query($conn,"select * from service_price_level where salon_id='".$sln['id']."' and service_id='".$sernm['id']."' order by id asc"));
				$spriclavelf=mysqli_num_rows(mysqli_query($conn,"select * from service_price_level where salon_id='".$sln['id']."' and service_id='".$sernm['id']."' order by id asc"));
				$offercount=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$sln['id']."' and status='0' and discount_status='1'"));
				$offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$sln['id']."' and status='0' and discount_status='1'"));
				$offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$sln['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

				$todays=date('Y-m-d');

				$servicdis=mysqli_fetch_array(mysqli_query($conn,"select * from service where id='".$sernm['id']."' and salon_id='".$sln['id']."' and offer_status='1'"));

				$servicdiscount=mysqli_num_rows(mysqli_query($conn,"select * from service where id='".$sernm['id']."' and salon_id='".$sln['id']."' and offer_status='1'"));

				$offercount1co=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$sln['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));



				$offercount1=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$sln['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));



				if($servicdiscount >0){

					$dis=$spriclavel['sale_price']*$servicdis['offer']/100;
					$totals=$spriclavel['sale_price']-$dis;

				}
				elseif($offercount >0){
					$m='1';
					$tu='2';
					$wed='3';
					$th='4';
					$fri='5';
					$st='6';
					$t=date('d-m-Y');
					$dayy= date("D",strtotime($t));
					if($dayy=='Mon'){
						$daycount=$m;
					}elseif($dayy=='Tue'){
						$daycount=$tu;
					}elseif($dayy=='Wed'){
						$daycount=$wed;
					}elseif($dayy=='Thu'){
						$daycount=$th;
					}elseif($dayy=='Fri'){
						$daycount=$fri;
					}elseif($dayy=='Sat'){
						$daycount=$st;
					}
					$date= date('H:i'); 
              /*echo $date= '11:00'; 
              */
              $mor='12:00';
              $afet='17:00';
              if(($date >=$mor) && ($date <=$afet)){
              	$days='2';
              }elseif($date <=$mor){
              	$days='1';
              }else{
              	$days='3';
              }
              $days;

              $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$sln['id']."' and status='0' and discount_status='1'"));
              $offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$sln['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

              $prrr=explode(',', $offer['dayweekcount']);
              $ofrd=explode(',', $offer['offer']);
              $day1=$prrr['0'];
              $day2=$prrr['1'];
              $day3=$prrr['2'];
              $day4=$prrr['3'];
              $day5=$prrr['4'];
              $day6=$prrr['5'];
              $offer1=$ofrd['0'];
              $offer2=$ofrd['1'];
              $offer3=$ofrd['2'];
              $offer4=$ofrd['3'];
              $offer5=$ofrd['4'];
              $offer6=$ofrd['5'];
              if($daycount=='1'){
              	$offerper=$offer1;
              }elseif($daycount=='2'){
              	$offerper=$offer2;
              }elseif($daycount=='3'){
              	$offerper=$offer3;
              }elseif($daycount=='4'){
              	$offerper=$offer4;
              }elseif($daycount=='5'){
              	$offerper=$offer5;
              }elseif($daycount=='6'){
              	$offerper=$offer6;
              }
              $totalprice=$spriclavel['sale_price']*$offerper/100;
              $totals=$spriclavel['sale_price']-$totalprice;
          }elseif($offercount1co >0){

          	$totalprice=$spriclavel['sale_price']*$offercount1['offer']/100;
          	$totals=$spriclavel['sale_price']-$totalprice;

          }else{

          	$totals=$spriclavel['sale_price'];
          }



          ?>
          <div class="BrowseResultService--container--ec64db BrowseResultService--alternateRowStyle--52772e">

          	<div class="BrowseResultService--infoContainer--1981fe">

          		<div class="BrowseResultService--name--bd91c5"><?php echo $sernm['name'];?></div>

          		<div class="BrowseResultService--duration--42af9e"><?php echo $sernm['duration'];?>

          		</div>

          	</div>

          	<div class="BrowseResultService--priceContainer--3179f3">

          		<div class="BrowseResultService--priceLabel--d05016 cmlccc-block">

          			<span class="BrowseResultService--priceAffix--fe6300 cmlccc">desde<!-- -->&nbsp; $<?php echo $totals;?></span>
          			<br>
          			<span class="BrowseResultService--price--e36420 cmlccc1">  
          				<?php if(($offercount>0) or ($servicdiscount >0 ) or ($offercount1co >0 )) { ?>

          				Ahorro de hasta un <?php if($servicdiscount >0){
          					echo $servicdis['offer'];}elseif($offercount >0){ echo $offerper;} else {echo $offercount1['offer'];}?>% <?php }?></span>


          				</div>


          			</div>

          		</div>
          		<?php }?>


          		<div class="my_first_accordion">

          			<div class="heading " id="heading1" onclick="togless('accordio1<?php echo $r;?>')">

          				<h4 style="color: #FF5C39;">Vista previa de los detalles del salón <span class="pull-right font-size" style="color: #FF5C39;"><i class="fa fa-angle-down"></i></span></h4>

          			</div>

          			<div class="heading " id="heading2" onclick="togless('accordio1<?php echo $r;?>')" style="display: none;">

          				<h4 style="color: #FF5C39;">Cerrar <span class="pull-right font-size" style="color: #FF5C39;"><i class="fa fa-angle-up"></i></span></h4>

          			</div>

          			<div class="accordtion_data" id="accordio1<?php echo $r;?>" style="display: none;">                     

          				<div class="accordion_content">

          					<ul>

          						<?php $sqohr=mysqli_query($conn,"select * from salon_opening_hr where salon_id='".$sln['id']."'"); 
          						while($slnophr=mysqli_fetch_array($sqohr)){
          							?>
          							<li>

          								<span style="color: #3BA150; width: 25px;"><i class="fa fa-circle"></i></span>

          								<span><?php echo $slnophr['day'];?></span>

          								<span><?php echo $slnophr['start_time'];?> - <?php echo $slnophr['end_time'];?></span>

          							</li>
          							<?php }?>

          						</ul>



          						<p><?php echo $sln['salon_desc'];?></p>

          						<a href="saloon_details.php?id=<?php echo $sln['id'];?>"><input type="button" class="go_btn" value="Ir al centro" name="">

          						</div>

          					</div>

          				</div>

          			</div>

          		</div>
          	</div>
          	<?php } ?>

          	

          	<?php }else{


          		while($slnw=mysqli_fetch_array($sqliii)){

          			array_push($return_arr, $slnw);
          		}
          		foreach ($return_arr as $key => $value) {

          			$value['latitude'].'<br>';
          			if($value['latitude']!=''){
          				$return_arr[$key]['dis'] = distance($latitude, $longitude, $value['latitude'], $value['longitude'], "K");
          			}else{
          				$return_arr[$key]['dis'] = 100000;
          			}
          		}

          		foreach ($return_arr as $key => $slnw) {
 // $volume[$key]  = $slnw['dis'];
   // echo $users['dis'];

          			$ratingds = mysqli_fetch_array(mysqli_query($conn,"SELECT  AVG(rating) as rating FROM `feedback` WHERE `salon_id`='".$slnw['id']."' ")); 
          			$reviews= (float)$ratingds['rating'].'';

          			$volume[$key]  = $reviews;


          		}

          		array_multisort($volume, SORT_DESC,  $return_arr);

          		foreach ($return_arr as $key => $value) {

//echo $value['latitude'].'  lat'.$value['longitude'].' dis'.$value['dis'].'<br>';

          		}


          		foreach($return_arr as $key => $sln) {
          			$dist= distance($latitude, $longitude, $sln['latitude'], $sln['longitude'], "K");

          			$rating = mysqli_fetch_array(mysqli_query($conn,"SELECT  AVG(rating) as rating FROM `feedback` WHERE `salon_id`='".$sln['id']."' "));

          			$reviews= (float)$rating['rating'].''; 

          			$countsr = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `feedback` WHERE `salon_id`='".$sln['id']."'  "));
          			$img=explode(',',$sln['salon_pic']);

          			?>
          			<div class="salon_wrapper">

          				<div class="padding">

          					<div class="col-sm-5">

          						<div class="left_slider_div">

          							<div id="myCarousel" class="carousel slide" data-ride="carousel">

          								<ol class="carousel-indicators">

          									<li data-target="#myCarousel" data-slide-to="0" class="active"></li>

          									<li data-target="#myCarousel" data-slide-to="1"></li>

          									<li data-target="#myCarousel" data-slide-to="2"></li>

          								</ol>


          								<div class="carousel-inner">

          									<div class="item active">

          										<img src="image/<?php echo $img['0'];?>" alt="Los Angeles" style="width:100%;">

          									</div>
          									
          								</div>


          								<a class="left carousel-control" href="#myCarousel" data-slide="prev">

          									<i class="fa fa-angle-left"></i>

          									<span class="sr-only">Previous</span>

          								</a>

          								<a class="right carousel-control" href="#myCarousel" data-slide="next">

          									<i class="fa fa-angle-right"></i>

          									<span class="sr-only">Next</span>

          								</a>

          							</div>				

          							
          						</div>

          					</div>

          					<div class="col-sm-7">

          						<div class="right_side_salon">

          							<div class="saloon_deatail">

          								<h3><?php echo $sln['business_name'];?></h3>

          								<div class="rating"> <?php if($countsr==0){}else{
          									echo round($reviews,'1');echo "&nbsp;";

          									$userdd=explode('.',$reviews);

          									$seekerdid=$userdd[0];

          									$schedid=$userdd[1];

          									for($i=0;$i<$seekerdid; $i++){


          										echo '<i class="fa fa-star" style="color:gold;font-size:16px"></i>';

          									}    
          									if($schedid!=''){
          										echo '<i class="fa fa-star-half-o" aria-hidden="true"  style="color:gold;font-size:16px"></i>&nbsp;';
          									}
          								}?>

          								<?php echo "&nbsp;"; echo $countsr;?> Opiniones

          							</span>

          						</div>

          						<p><b><?php echo $sln['adress'];?></b></p>
          						<p><b><?php echo round($sln['dis']);?> KM</b></p>


          						<p style="color: #171E62;"><a href="https://www.google.com/maps/place/<?php echo $sln['adress'];?>"><img src="img/map.svg"><b> Mostrar en el mapa</b></a></p>

          						<p style="color: #02B0B9;"><img src="img/off.svg"> <b> Horas especiales</b></p>

          						
          					</div>

          				</div>

          			</div>

          		</div>

          		<div class="sallon_detail_blog2">

          			<div class="blog2_salon">

          				<?php
          				$m='1';
          				$tu='2';
          				$wed='3';
          				$th='4';
          				$fri='5';
          				$st='6';
          				$t=date('d-m-Y');
          				$dayy= date("D",strtotime($t));
          				if($dayy=='Mon'){
          					$daycount=$m;
          				}elseif($dayy=='Tue'){
          					$daycount=$tu;
          				}elseif($dayy=='Wed'){
          					$daycount=$wed;
          				}elseif($dayy=='Thu'){
          					$daycount=$th;
          				}elseif($dayy=='Fri'){
          					$daycount=$fri;
          				}elseif($dayy=='Sat'){
          					$daycount=$st;
          				}
          				$date= date('H:i'); 
              /*echo $date= '11:00'; 
              */
              $mor='12:00';
              $afet='17:00';
              if(($date >=$mor) && ($date <=$afet)){
              	$days='2';
              }elseif($date <=$mor){
              	$days='1';
              }else{
              	$days='3';
              }
              $days;

              $valls='0';

              $minimumprice1=str_replace("$", "", $minimumprice);

              $maxmumprice1=str_replace("$", "", $maxmumprice);

              if($category!=''){
              	$srev=mysqli_query($conn,"select * from service where salon_id='".$sln['id']."' and sale_price between $minimumprice1 AND $maxmumprice1 and category_id='$category' ");

              }else{

              	$srev=mysqli_query($conn,"select * from service where salon_id='".$sln['id']."' and sale_price between $minimumprice1 AND $maxmumprice1 ");


              }

              while($sernm=mysqli_fetch_array($srev)){
              	
								/*$offercount=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$sln['id']."' and status='0'"));

								$offer=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$sln['id']."' and status='0'"));

								$totalprice=$sernm['price']*$offer['offer']/100;

								$totals=$sernm['price']-$totalprice;*/

								$offer=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$sln['id']."' and status='0'"));
/*
												$totalprice=$sernm['price']*$offer['offer']/100;

												$totals=$sernm['price']-$totalprice;*/


												$spriclavel=mysqli_fetch_array(mysqli_query($conn,"select * from service_price_level where salon_id='".$sln['id']."' and service_id='".$sernm['id']."' order by id asc"));
												$spriclavelf=mysqli_num_rows(mysqli_query($conn,"select * from service_price_level where salon_id='".$sln['id']."' and service_id='".$sernm['id']."' order by id asc"));
												$offercount=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$sln['id']."' and status='0' and discount_status='1'"));
												$offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$sln['id']."' and status='0' and discount_status='1'"));
												$offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$sln['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

												$todays=date('Y-m-d');

												$servicdis=mysqli_fetch_array(mysqli_query($conn,"select * from service where id='".$sernm['id']."' and salon_id='".$sln['id']."' and offer_status='1'"));

												$servicdiscount=mysqli_num_rows(mysqli_query($conn,"select * from service where id='".$sernm['id']."' and salon_id='".$sln['id']."' and offer_status='1'"));

												$offercount1co=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$sln['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));



												$offercount1=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$sln['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));



												if($servicdiscount >0){

													$dis=$spriclavel['sale_price']*$servicdis['offer']/100;
													$totals=$spriclavel['sale_price']-$dis;

												}
												elseif($offercount >0){
													$m='1';
													$tu='2';
													$wed='3';
													$th='4';
													$fri='5';
													$st='6';
													$t=date('d-m-Y');
													$dayy= date("D",strtotime($t));
													if($dayy=='Mon'){
														$daycount=$m;
													}elseif($dayy=='Tue'){
														$daycount=$tu;
													}elseif($dayy=='Wed'){
														$daycount=$wed;
													}elseif($dayy=='Thu'){
														$daycount=$th;
													}elseif($dayy=='Fri'){
														$daycount=$fri;
													}elseif($dayy=='Sat'){
														$daycount=$st;
													}
													$date= date('H:i'); 
              /*echo $date= '11:00'; 
              */
              $mor='12:00';
              $afet='17:00';
              if(($date >=$mor) && ($date <=$afet)){
              	$days='2';
              }elseif($date <=$mor){
              	$days='1';
              }else{
              	$days='3';
              }
              $days;

              $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$sln['id']."' and status='0' and discount_status='1'"));
              $offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$sln['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

              $prrr=explode(',', $offer['dayweekcount']);
              $ofrd=explode(',', $offer['offer']);
              $day1=$prrr['0'];
              $day2=$prrr['1'];
              $day3=$prrr['2'];
              $day4=$prrr['3'];
              $day5=$prrr['4'];
              $day6=$prrr['5'];
              $offer1=$ofrd['0'];
              $offer2=$ofrd['1'];
              $offer3=$ofrd['2'];
              $offer4=$ofrd['3'];
              $offer5=$ofrd['4'];
              $offer6=$ofrd['5'];
              if($daycount=='1'){
              	$offerper=$offer1;
              }elseif($daycount=='2'){
              	$offerper=$offer2;
              }elseif($daycount=='3'){
              	$offerper=$offer3;
              }elseif($daycount=='4'){
              	$offerper=$offer4;
              }elseif($daycount=='5'){
              	$offerper=$offer5;
              }elseif($daycount=='6'){
              	$offerper=$offer6;
              }
              $totalprice=$spriclavel['sale_price']*$offerper/100;
              $totals=$spriclavel['sale_price']-$totalprice;
          }elseif($offercount1co >0){

          	$totalprice=$spriclavel['sale_price']*$offercount1['offer']/100;
          	$totals=$spriclavel['sale_price']-$totalprice;

          }else{

          	$totals=$spriclavel['sale_price'];
          }

          ?>
          <div class="BrowseResultService--container--ec64db BrowseResultService--alternateRowStyle--52772e">

          	<div class="BrowseResultService--infoContainer--1981fe">

          		<div class="BrowseResultService--name--bd91c5">
          			<?php if($_POST['category']!=''){?>
          			<a href="saloon_details.php?id=<?php echo $sln['id'];?>&category_id=<?php echo $_POST['category'];?>&subcategory_id=<?php echo $_POST['service'];?>"><?php echo $sernm['name'];?></a>
          			
          			<?php }else{ ?>
          			<a href="saloon_details.php?id=<?php echo $sln['id'];?>"><?php echo $sernm['name'];?></a>

          			<?php } ?></div>

          			<div class="BrowseResultService--duration--42af9e"><?php echo $sernm['duration'];?>

          			</div>

          		</div>

          		<div class="BrowseResultService--priceContainer--3179f3">

          			<div class="BrowseResultService--priceLabel--d05016 cmlccc-block">

          				<span class="BrowseResultService--priceAffix--fe6300 cmlccc">desde<!-- -->&nbsp; $<?php echo $totals;?></span>
          				<br>
          				<span class="BrowseResultService--price--e36420 cmlccc1">  
          					<?php if(($offercount>0) or ($servicdiscount >0 ) or ($offercount1co >0 )) { ?>

          					Ahorro de hasta un <?php if($servicdiscount >0){
          						echo $servicdis['offer'];}elseif($offercount >0){ echo $offerper;} else {echo $offercount1['offer'];}?>% <?php }?></span>


          					</div>


          				</div>

          			</div>
          			<?php }?>

          			
          			<div class="my_first_accordion">

          				<div class="heading " id="heading1" onclick="togless('accordio1<?php echo $r;?>')">

          					<h4 style="color: #FF5C39;">Vista previa de los detalles del salón <span class="pull-right font-size" style="color: #FF5C39;"><i class="fa fa-angle-down"></i></span></h4>

          				</div>

          				<div class="heading " id="heading2" onclick="togless('accordio1<?php echo $r;?>')" style="display: none;">

          					<h4 style="color: #FF5C39;">Cerrar <span class="pull-right font-size" style="color: #FF5C39;"><i class="fa fa-angle-up"></i></span></h4>

          				</div>

          				<div class="accordtion_data" id="accordio1<?php echo $r;?>" style="display: none;">	  									

          					<div class="accordion_content">

          						<ul>

          							<?php $sqohr=mysqli_query($conn,"select * from salon_opening_hr where salon_id='".$sln['id']."'"); 
          							while($slnophr=mysqli_fetch_array($sqohr)){
          								?>
          								<li>

          									<span style="color: #3BA150; width: 25px;"><i class="fa fa-circle"></i></span>

          									<span><?php echo $slnophr['day'];?></span>

          									<span><?php echo $slnophr['start_time'];?> - <?php echo $slnophr['end_time'];?></span>

          								</li>
          								<?php }?>

          							</ul>

          							<p><?php echo $sln['salon_desc'];?></p>

          							<?php if($category!=''){ ?>
          							<a href="saloon_details.php?id=<?php echo $sln['id'];?>&category_id=<?php echo $category;?>&subcategory_id=<?php echo $service;?>"><input type="button" class="go_btn" value="Ir al centro" name=""></a>

          							<?php }else{ ?>

          							<a href="saloon_details.php?id=<?php echo $sln['id'];?>"><input type="button" class="go_btn" value="Ir al centro" name=""></a>
          							<?php }?>

          						</div>

          					</div>

          				</div>

          			</div>

          		</div>

          	</div>
          	<?php } }?>

