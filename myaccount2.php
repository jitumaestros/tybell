<?php include ('header.php');

$users=mysqli_fetch_array(mysqli_query($conn,"select * from users where id='".$_SESSION['user_id']."'"));


?>
<style type="text/css">
	input.chosse-file {
		position: absolute;
		top: 0;
		height: 264px;
		width: 264px;
		opacity: 0;
	}
</style>

<div class="edit_profile_wrapper">

	<div class="container">
		<div class="edit_blog">

			<div class="top_edit_wrapper">

				<div class="sticky-wrapper" style="">

					<div class="anchor-links-wrapper">

						<div class="wrapper clearfix">

							<ul class="page-nav">

								<li class="on" >

				                <a href="myaccount.php">Reservas pendientes</a>

				                </li>

				                <li >

				                    <a href="completed_Reservas.php">Reservas Pasadas</a>

				                </li>

								<li>

									<a href="tickets.php">Ingreso de incidentes </a>

								</li>

								<li>

									<a href="#wallet">Monedero</a>

								</li>
							</ul>

						</div>

					</div>

				</div>


				<div class="custom_col-4">

					<div class="section-aside left account-summary" style="position: relative; top: -50px; ">
						<form novalidate="novalidate" id="editprof" enctype="multipart/form-data">

							<div class="section profile">

								<div class="profile-image">
									<?php if($users['image']!=''){ ?>
									<img src="img/<?php echo $users['image'];?>" id="blah">

									<?php }else{ ?>

									<img src="img/female-edit.png" id="blah">
									<?php }?>
									<input type="file" class="chosse-file" name="image" id="imgInp">

									<div class="edit-link centered-block">Change picture <span class="icon"></span></div>

								</div>

								<div class="profile-details">

									<span class="name "><?php echo $users['first_name'];?> <?php echo $users['last_name'];?></span>

					            <!-- <div class="gender male hide">

					                <span class="fa fa-male"></span> Male

					            </div> -->

					            <div class="gender female ">

					            	<span class="fa fa-female"></span> <?php if($users['gender']=='1'){ echo "Mujer";}else{ echo "Hombre";}?>

					            </div>

					            <div class="gender not-set hide">

					            	Gender not set

					            </div>


					            <div class="button other-button edit-profile">

					            	<span class="text" onclick="togles('edit')">Editar mi perfil</span></div>

					            	<div class="profile-details-1" id="edit" style="display: none;">


					            		<div class="form-group">

					            			<input type="text" name="first_name" value="<?php echo $users['first_name'];?>" class="form-control" placeholder="First name" >

					            		</div>

					            		<div class="form-group">

					            			<input type="text" name="last_name" value="<?php echo $users['last_name'];?>" class="form-control" placeholder="Last name" >

					            		</div>


					            		<div class="form-group">							            

					            			<select class="form-control" name="gender" >
					            				<option value="<?php echo $users['gender'];?>"><?php if($users['gender']=='1'){ echo "Mujer";}else{ echo "Hombre";}?></option>
					            				<option value="2">Hombre</option>

					            				<option value="1">Mujer</option>

					            				<option value="3">Sin revelar</option>

					            			</select>							                

					            		</div>

					            		<div class="text-right">

					            			<button class="button main-button save" type="submit" name="submit">Guardar</button>

					            			<span class="button other-button cancel">Cancela</span>

					            		</div>

					            	</div>

					            </div>

					        </div>
					        <div id="datart"></div>
					    </form>

					    <div>

					    	<span class="title_edit">Datos de registro</span>

					    	<strong><?php echo $users['email'];?></strong>

					    	<a class="change-password-link link-with-icon" href="request-password-1.php" target="_blank">

					    		Restablecer la contraseña

					    	</a>

					    	

					    </div>

					    

					</div>

				</div>

				<?php

				$bokkd=mysqli_query($conn,"select * from bookings where id='".$_GET['bookingid']."' order by id desc");

				$bkkstatus=mysqli_fetch_array($bokkd);

				$sln=mysqli_fetch_array(mysqli_query($conn,"select * from users where id='".$bkkstatus['salon_id']."'"));
				$servci1=explode(',', $bkkstatus['service_id']);

				$sernm='';

				foreach ($servci1 as $key => $valuse) {

					$serbn=mysqli_fetch_array(mysqli_query($conn,"select * from service where id='".$valuse."'"));
					
//$price +=$serbn['price'];

					if($sernm==''){

						$sernm=$serbn['name'];

					}else{

						$sernm=$sernm.' & '.$serbn['name'];

					}
				}?>

				<div class="custom_col-8">

					<div class="right_editAccount111">

						<div class="booking_show-blog">
						<div id="printableArea">
							<div class="booking-page-blog-2">

								<div class="booking-detals-header">
									<div class="col-sm-2" id="hidden_div" >					 

									            <a href="myaccount.php">

										<div class="deatil-blog-1">
											<p><i class="fa fa-arrow-circle-o-left"></i></p>
											<p>Exit</p>

										</div></a>
									</div>


									<div class="col-sm-8">
										<div class="detals-blog-2">
											<p><b>Orden ref. <?php echo $bkkstatus['order_ref'];?></b></p>
											<p>Metido <?php echo date('D M d Y', $bkkstatus['dates']);?>, <?php echo $bkkstatus['schedule_time'];?></p>
										</div>
									</div>
									<div class="col-sm-2" id="hidden_div1">
										<div class="deatil-blog-3">
											<a href="javascript:;" onclick="printDiv('printableArea')"><p><i class="fa fa-print"></i></p></a>
											<p>Imprimir</p>

										</div>
									</div>
								</div>
								<div class="col-sm-12 padder">
									<div class="col-sm-6">
										<div class="appointment-details-blog">
											<h4><b>Detalles de la cita</b></h4>

											<div class="date-time-blog">
												<div class="tinmeing-blog">
													<div class="time-blog">
														<h1><?php echo $bkkstatus['schedule_time'];?></h1>
													</div>
													<div class="date-blog">
														<p><?php echo date('D M d', $bkkstatus['dates']);?></p>
														
													</div>
												</div>
												
												<p><b><?php echo $sernm;?></b> &nbsp;</p>

<br>
<div id="hidden_div3">
<?php if($bkkstatus['booking_status']=='2'){ ?>

<a href="javascript:;"><button style="color: white;height: 39px;width: 46%;font-size: 15px; border-radius: 3px;">Servicios cancelados</button></a>

<?php }elseif($bkkstatus['booking_status']=='1'){ ?>


<?php }elseif($bkkstatus['booking_status']=='4'){ 

$feedbk=mysqli_num_rows(mysqli_query($conn,"select * from feedback where salon_id='".$bkkstatus['salon_id']."' and user_id='".$_SESSION['user_id']."' and booking_id='".$_GET['bookingid']."'"));
if($feedbk=='0'){
	?>

<a href="feedback.php?bookingid=<?php echo $_GET['bookingid'];?>"><button style="color: white;height: 39px;width: 46%;font-size: 15px; border-radius: 3px;">Calificar</button></a>

<?php } }else{?>
<a href="javascript:;" onclick="cancellconfirm('<?php echo $bkkstatus['id'];?>');"><button style="color: white;height: 39px;width: 46%;font-size: 15px; border-radius: 3px;">Cancelar servicios</button></a>

<?php }?>
</div>
</div>

</div>
</div>
<div class="col-sm-6">


</div>  

</div>
<div class="col-sm-12 padder">
	<div class="col-sm-6">
		<div class="appointment-details-blog" id="hidden_div2">
			<h4><b><?php echo $sln['business_name'];?></b></h4>
			<div id="map" style="width: 100%; height: 400px;"></div>
		</div>
	</div>        
	<div class="col-sm-6"> </div>   
</div>
<div class="col-sm-12 padder">
	<div class="payment-blog-1">
		<h4><b>Detalles del pago</b></h4>
		<div class="payment-book-1">
			<p style="color: #5C5C5B; width: 20%;"><b>Total del pedido</b></p>
			<p style="width: 80%;"><b>£<?php echo $bkkstatus['total_amount'];?></</b></p>
		</div>
		<div class="payment-book-1">
			<p style="color: #5C5C5B; width: 20%;"><b>Pagado en la caja</b></p>
			<p style="width: 80%;"><b>£0</b> &nbsp; <span style="color: #5C5C5B">Se le cobrará por el lugar después de su cita</span>   </p>
		</div>
		<div class="payment-book-1">
			<p style="color: #5C5C5B; width: 20%;"><b>Pagar en el lugar</b></p>
			<p style="width: 80%;"><b>£<?php echo $bkkstatus['total_amount'];?></</b></p>
		</div>
	</div>
</div>

<div class="col-sm-12 padder">
	<div class="payment-blog-1" >
		<h4><b>Letra pequeña</b></h4>

		<div class="fine-p-nlog">
			<p style="color: #4C4C4C;"><b><?php echo $sernm;?></b></p>
			<p style="color: #4C4C4C;"><b>Bueno saber:</b> Este salón es apto para perros, pero por favor no traiga cachorros.</p>
		</div>
	</div>
</div>
<div class="col-sm-12 padder">
	<div class="payment-blog-1" >
		<h4><b>Política de cancelación</b></h4>

		<div class="fine-p-nlog">
			<p style="color: #4C4C4C;"><b>Un recordatorio</b></p>
			<p style="color: #4C4C4C;">Si necesita reprogramar o cancelar su cita, el salón que está visitando es cuando le avisa con la mayor antelación posible para que puedan volver a llenar su lugar.</p>
		</div>
	</div>
</div>


</div>
</div>

</div>

</div>



</div>

</div>

</div>

</div>

</div>


<!-- <div id="map" style="width: 100%; height: 400px;"></div>
-->        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4mlo-kY0vyBDIdeXffR2igqE5igx3piE">
</script>

<script type="text/javascript">
	$(document).ready(function(){
		getLocation();
	})

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



		var locations = [
		<?php 
		$bokkds=mysqli_query($conn,"select * from bookings where id='".$_GET['bookingid']."' order by id desc");

		$bkkstatusa=mysqli_fetch_array($bokkds);

		$saln=mysqli_fetch_array(mysqli_query($conn,"select * from users where id='".$bkkstatusa['salon_id']."'"));
		if($saln['latitude']!=""){
			?>

			['<?php echo mysqli_real_escape_string($conn,$saln['adress']);?>', <?php echo $saln['latitude'];?>, <?php echo $saln['longitude'];?>, 1],


			<?php }?>
			];
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 10,
				center: new google.maps.LatLng(clatt, clongi),
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});

			var infowindow = new google.maps.InfoWindow();

			var marker, i;

			for (i = 0; i < locations.length; i++) {  
				marker = new google.maps.Marker({
					position: new google.maps.LatLng(locations[i][1], locations[i][2]),
					map: map
				});

				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						infowindow.setContent(locations[i][0]);
						infowindow.open(map, marker);
					}
				})(marker, i));
			}





			var locations1 = [


			['My Location', clatt, clongi, 1],
			];


			var marker1;
			for (i = 0; i < locations1.length; i++) {  
				marker1 = new google.maps.Marker({
					icon: {
						path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
						strokeColor: "green",
						scale: 3
					},
					position: new google.maps.LatLng(locations1[i][1], locations1[i][2]),
					map: map
				});



				google.maps.event.addListener(marker1, 'click', (function(marker1, i) {
					return function() {
						infowindow.setContent(locations1[i][0]);
						infowindow.open(map, marker1);
					}
				})(marker1, i));
			}

		}
	</script>



	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<script type="text/javascript">

		function togles(id){

			$('#'+id).slideToggle(200);

		}


		function cancellconfirm(id)
		{


			$.ajax({
				type: "POST",
				url: "cancelledbookconrm.php",
				data: "id="+id,
				success: function(html)
				{     
					$("#selectjobsds").html(html);

					$('#myModalfd').modal('show');

				}


			});

		}


function completeservice(id)
		{


			$.ajax({
				type: "POST",
				url: "completeserviceconfirm.php",
				data: "id="+id,
				success: function(html)
				{     
					$("#selectjobsds").html(html);

					$('#myModalfdd').modal('show');

				}


			});

		}




	</script>

	<?php include ('footer.php');?> 

	<div id="selectjobsds"></div>
<script type="text/javascript">
	  function printDiv(divName) {

                    document.getElementById('hidden_div').style.display='none';
                    document.getElementById('hidden_div1').style.display='none';
                    document.getElementById('hidden_div2').style.display='none';

                    document.getElementById('hidden_div3').style.display='none';

                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
              }
</script>