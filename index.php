<?php include ('header.php');

$blg=mysqli_fetch_array(mysqli_query($conn,"select * from blog_home"));?>

<link rel="stylesheet" href="datepicker/pikaday.css">

<link rel="stylesheet" href="datepicker/site.css">

<div class="top_serch_banner" style="background: url('img/web_1.jpg');">

	<div class="container">
		<div class="home_wrapper">

			<div class="col-sm-4 padder">


					<div class="filter_home_page">

						<ul class="nav nav-pills filter_list">

							<li class="active img-block" >

								<a data-toggle="pill" href="#home">

									<img src="img/scissors.png" style="display: none;" class="img-1">

									<img src="img/scissors2.png" class="img-2">

									Servicios

								</a>

							</li>

							<li class="img-block">

								<a data-toggle="pill" href="#menu2">

									<img src="img/salon.png" class="img-1">

									<img src="img/salon2.png" class="img-2" style="display: none;">

									Salón
								</a>

							</li>

						</ul>


						<div class="tab-content tab-content1">

							<div id="home" class="tab-pane fade in active">
				            <form method="get" action="salonfilter.php">

								<div class="filter_blog">
									<div class="input-group input_filter">

										<span class="input-group-addon">  <img src="img/search1.png"></span>

										<select name="category" class="form-control" placeholder=" Buscar tipo de servicio" onchange="getsubcat(this.value);" style="text-transform: capitalize;">

											<option value="">Servicio </option>

											<?php $servd=mysqli_query($conn,"select * from category ");

											while($sernms=mysqli_fetch_array($servd)){

												?>

												<option value="<?php echo $sernms['id'];?>"><?php echo $sernms['name'];?></option>

												<?php }?>

											</select>
										</div>

										<div class="input-group input_filter">

											<span class="input-group-addon">  <img src="img/search1.png"></span>

											<select name="service" class="form-control" placeholder=" Buscar tipo de servicio" id="change" style="text-transform: capitalize;">

                          <option value="">Tipo de servicio </option>

                  

                 </select>

             </div>

             <div class="input-group input_filter">
             	<span class="input-group-addon">  <img src="img/location1.png"></span>
             	<select  type="text" name="adress" class="form-control" value="" placeholder="Introduce tu dirección" style="text-transform: capitalize;">
<!--              		<option value="">Introduce tu dirección</option>
 -->             		<?php $serv=mysqli_query($conn,"select * from district ");

             		while($sernm=mysqli_fetch_array($serv)){

             			?>

             			<option value="<?php echo $sernm['id'];?>"><?php echo $sernm['name'];?></option>

             			<?php }?> 
             		</select>
             	</div>


             	<div class="input-group input_filter">

             		<span class="input-group-addon"> <img src="img/calendar1.png"></span>


             		<input  type="text" name="dates" class="form-control" id="datepicker" placeholder="Cualquier fecha" autocomplete="off">

             	</div>

             </div>
<button class="search_btn" name="submit" type="submit">Buscar Tybell</button>             

         </form>
         </div>
                       

				

         <div id="menu2" class="tab-pane fade">
<form method="get" action="saloon_details.php">
         	<div class="filter_blog" >
         		<div class="input-group input_filter" id="countt">
         			<span class="input-group-addon">  <img src="img/search1.png"></span>
         			<input  type="text" class="form-control" name="salon"  onkeyup="search_salon(this.value);" id="searcountid" placeholder="Buscar Salón">
         		</div>
         		<ul class="sap_search_block" id="saeress1s" >
         			

         		</ul> 
         		<div class="dbml_block">
              		<button class="search_btn spa_clsearch_btn" name="submit" type="submit">Buscar Tybell</button>             
              	</div>
         	</div>
  </form>
         </div>

       


     </div>


 </div>



</div>

<div class="col-sm-8">

	<h1 class="HeroBanner--headline--860a6a"><span>Vive una experiencia  </span>

		<span style="margin-left: 63px;">de belleza única</span><span></span></h1>

		<div class="home_banner_right " style="/*background: url('img/right_banner.png');">

			<img src="" class="img-reponsive">

		</div>
	</div>

</div>

</div>

</div>

<div class="sction_2">

	<div class="container">

    <div class="home_blog_1">

			<div class="col-sm-6">

				<div class="blog_1">

					<div class="img_block_1">

						<div class="main_img_blog_2" style="background: url('img/web_2.jpg');">

						</div>

					</div>

					<div class="content_blog_home">

						<h2 class="">Tu primera reserva en la app, ¡con 5€ gratis! </h2>

						<p class="">Porque si ya nos quieres (aunque sea un poquito), cuando pruebes nuestra app seguro que lo vas a hacer incluso más. </p>

						<button class="get_itbtn">Descargar ahora </button>
					</div>

				</div>

			</div>

			<div class="col-sm-6">

				<div class="blog_1">

					<div class="img_block_1">

						<div class="main_img_blog_2" style="background: url('img/web_3.jpg');">

						</div>

					</div>

					<div class="content_blog_home">
						<h2 class="">Tu primera reserva en la app, ¡con 5€ gratis! </h2>

						<p class="">Porque si ya nos quieres (aunque sea un poquito), cuando pruebes nuestra app seguro que lo vas a hacer incluso más. </p>
						<button class="get_itbtn">Descargar ahora </button>

					</div>

				</div>

			</div>

		</div>

	</div>
</div>

<script type="">
function toggless(id){

		$('#'+id).toggle();

	}

</script> 

<?php include ('footer.php');?>
<script src="datepicker/pikaday.js"></script>

<script>
	new Pikaday(

	{
		field: document.getElementById('datepicker'),

		trigger: document.getElementById('datepicker-button'),

		minDate: new Date(),

		ariaLabel: 'Custom label',

		maxDate: new Date(2020, 12, 31),

		yearRange: [2010,2020]

	});

</script>


<script type="text/javascript">


	function getsubcat(id)

	{

//alert(id);

$.ajax({

	type: "POST",

	url: "php/subcategory.php",

	data: "cat="+id, 

	success: function(html)

	{     
		$("#change").html(html);


	}


});


}

</script>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4mlo-kY0vyBDIdeXffR2igqE5igx3piE&sensor=false&libraries=places"></script>

<script type="text/javascript">

	google.maps.event.addDomListener(window, 'load', function () {

   /* var options = {

      componentRestrictions: {country: "in"}

  };*/

  var places = new google.maps.places.Autocomplete(document.getElementById('txtPlacesss'));

  google.maps.event.addListener(places, 'place_changed', function () {

  	var place = places.getPlace();

  	var address = place.formatted_address;

  	var latitude = place.geometry.location.lat();

  	var longitude = place.geometry.location.lng();

  	var mesg = "Address: " + address;

  	mesg += "\nLatitude: " + latitude;

  	mesg += "\nLongitude: " + longitude;

  	$("#latitude").val(latitude);

  	$("#longitude").val(longitude);



  });

});


</script>

<script type="text/javascript">
	
	  function search_salon(val){
//alert(val);
$("#form_abc1f_img").show();
jQuery.ajax({
 url: "searchsalon.php",
 type: "POST",
 data : "val="+val,
 success: function(data){
     if(data ==0){
       $("#saeress1s").hide();

   }else{
     $("#saeress1s").show();

     $("#form_abc1f_img").hide();

     $("#saeress1s").html(data);
  //alert(data);

}
},
error: function(){}          
}); 
} 


</script>






<style type="text/css">
	

</style>



















