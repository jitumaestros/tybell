<?php include ('header.php');?>

<?php 

if (isset($_POST['submit'])) {

  extract($_POST);

  $select = mysqli_query($conn,"SELECT * FROM users where email='$email'");
 $checkuser= mysqli_num_rows($select);

if ($checkuser >0) {
	 $msg= '<div class="col-sm-12"><div class="alert alert-danger ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Email  Already Registered
  </div></div>';
}
else{



 $check= mysqli_query($conn,"INSERT INTO users (first_name, last_name, email, password, gender, postcode)VALUES ('$fname', '$lname', '$email', '$password', '$gender', '$post')");
 $insert_id= mysqli_insert_id($conn);

 if ($check) {
   $msg= '<div class="col-sm-12"><div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <span>Registration sucessful</span>
</div></div>';
$msg.=  '<script>function auto_refresh(){
       window.location="myaccount.php";
    }
    var refreshId = setInterval(auto_refresh, 3000);
</script>';

 }
else{
	$msg='error';
}

 }
}

?>

	<div class="login_wrapper">

		<div class="container">

			<div class="login_main">

				<div class="login_title">

					<p>Crear un perfil Treatwell</p>

				</div>

				<div class="form_blog">

					<p>Cuéntanos un poco sobre ti y crearemos tu perfil para que puedas colgar tus opiniones, puedas hacer consultas a la comunidad de Treatwell, y reservar incluso más rápido la próxima vez.
</p>

					<form method="post" id="signupform" enctype="multipart/form-data">

						<div class="input_box">

							<label>Email:</label>

							<input type="email"  placeholder=""   name="email" required>

						</div>

						<div class="input_box">

							<label>Contraseña :</label>

							<input type="Password"  placeholder=""   name="password" required>

						</div>

						<div class="input_box">

							<label>Nombre </label>

							<input type="text"  placeholder=""   name="fname" required>

						</div>

						<div class="input_box">

							<label>Apellido</label>

							<input type="text"  placeholder=""   name="lname" required>

						</div>


                   <div class="input_box">

							<label>Número de teléfono</label>

							<input type="text"  placeholder=""   name="contact_number" required>

						</div>




						<div class="input_box">

							<label>
Código postal  </label>

							<input type="text"  placeholder=""   name="post" required>

						</div>

						<div class="radio_box">

							<label><b>Eres</b></label>

							<input type="radio" name="gender" value="1" checked><span>Mujer</span>

							<input type="radio" name="gender" value="2"><span>Hombre</span>

						</div>

						<div class="check_box">

							<input type="checkbox" name="">

							<span> 
Quiero recibir emails de Treatwell con ofertas y novedades de belleza. Puedes cambiar tus preferencias en cualquier momento. Lee nuestra política de privacidad para más información.</span></span>

						</div>

						

						<p><i>Al enviar este formulario estás de acuerdo con<span style="color: #001E62;">Términos y Condiciones
</span></i></p>

						<button class="login_btn" type="submit" name="submit">Registro</button>
						<div id="datart"></div>
					</form>


				</div>



			</div>

			

		</div>

	</div>

<?php include ('footer.php');?>


<script type="text/javascript">
	
	$(document).ready(function (signupabc41) {
 $("#signupform").on('submit',(function(signupabc41) {
  $("#form_abc1_img").show();
  signupabc41.preventDefault();
  $.ajax({
   url: "php/signup.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   success: function(data){
     $("#form_abc1_img").hide();
     //alert(data);
   $("#datart").show().html(data);
      },
     error: function(){}          
    });

 }));
});


</script>

