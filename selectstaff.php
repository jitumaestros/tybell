<?php include ('common/config.php');

extract($_POST);

$sfyf=mysqli_fetch_array(mysqli_query($conn,"select * from staff where id='$id'"));

$sqliii=mysqli_query($conn,"select * from users where role='2' and adress like '%".$val."%' and id='".$sfyf['salon_id']."' ");

while($sln=mysqli_fetch_array($sqliii)){


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

								<img src="image/<?php echo $sln['salon_pic'];?>" alt="Los Angeles" style="width:100%;">

							</div>
									      <!-- <div class="item">

									        <img src="img/saloon_img.png" alt="Chicago" style="width:100%;">

									      </div>

									      <div class="item">

									        <img src="img/saloon_img.png" alt="New York" style="width:100%;">
									    </div> -->

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

									<div class="rating"><span style="color: #CCBB66;">5.0 </span>

										<ul>

											<li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

											<li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

											<li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

											<li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

											<li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

										</ul>

										<span>

											18 opiniones

										</span>

									</div>

									<p><b><?php echo $sln['adress'];?></b></p>

									<p style="color: #171E62;"><a href="https://www.google.com/maps/place/<?php echo $sln['adress'];?>"><img src="img/map.svg"><b> Mostrar en el mapa</b></a></p>

									<p style="color: #02B0B9;"><img src="img/off.svg"> <b> Horas especiales</b></p>

									

								</div>

							</div>

						</div>

					</div>

					<div class="sallon_detail_blog2">

						<div class="blog2_salon">

							<?php
							$valls='0';
							$srev=mysqli_query($conn,"select * from service where salon_id='".$sln['id']."' and price BETWEEN '$valls' AND '$id'");
							$r=rand();
							while($sernm=mysqli_fetch_array($srev)){
								?>
								<div class="BrowseResultService--container--ec64db BrowseResultService--alternateRowStyle--52772e">

									<div class="BrowseResultService--infoContainer--1981fe">

										<div class="BrowseResultService--name--bd91c5"><?php echo $sernm['name'];?></div>

										<div class="BrowseResultService--duration--42af9e"><?php echo $sernm['time'];?>

										</div>

									</div>

									<div class="BrowseResultService--priceContainer--3179f3">

										<div class="BrowseResultService--priceLabel--d05016">

											<span class="BrowseResultService--priceAffix--fe6300">desde<!-- -->&nbsp;</span>

											<span class="BrowseResultService--price--e36420">$<?php echo $sernm['price'];?></span>

										</div>

<!-- 	  									<div class="BrowseResultService--discount--6b6656">save up to 40%</div>
-->
</div>

</div>
<?php }?>

	  						<!-- 	<div class="BrowseResultService--container--ec64db BrowseResultService--alternateRowStyle--52772e" style="background: #fff;">

	  								<div class="BrowseResultService--infoContainer--1981fe">

	  									<div class="BrowseResultService--name--bd91c5">Ladies - T Section High/Lowlights with Haircut &amp; Blow Dry</div>

	  									<div class="BrowseResultService--duration--42af9e">2 hrs 15 mins - 2 hrs 30 mins

	  									</div>

	  								</div>

	  								<div class="BrowseResultService--priceContainer--3179f3">

	  									<div class="BrowseResultService--priceLabel--d05016">

	  										<span class="BrowseResultService--priceAffix--fe6300">from</span>

	  										<span class="BrowseResultService--price--e36420">£81</span>

	  									</div>

	  									<div class="BrowseResultService--discount--6b6656">save up to 40%</div>

	  								</div>

	  							</div> -->

	  						<!-- 	<div class="BrowseResultService--container--ec64db BrowseResultService--alternateRowStyle--52772e">

	  								<div class="BrowseResultService--infoContainer--1981fe">

	  									<div class="BrowseResultService--name--bd91c5">Ladies - T Section High/Lowlights with Haircut &amp; Blow Dry</div>

	  									<div class="BrowseResultService--duration--42af9e">2 hrs 15 mins - 2 hrs 30 mins

	  									</div>

	  								</div>

	  								<div class="BrowseResultService--priceContainer--3179f3">

	  									<div class="BrowseResultService--priceLabel--d05016">

	  										<span class="BrowseResultService--priceAffix--fe6300">from&nbsp;</span>

	  										<span class="BrowseResultService--price--e36420">£81</span>

	  									</div>

	  									<div class="BrowseResultService--discount--6b6656">save up to 40%</div>

	  								</div>

	  							</div> -->

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
	  						<?php }?>



