<?php include ('header.php');?>

<?php 

if (isset($_POST['submit'])) {

extract($_POST);

//print_r($_POST);

$login=mysqli_query($conn,"SELECT * FROM users where email='$email' AND password='$password'" );
$login_count=mysqli_num_rows($login);
$login_fect=mysqli_fetch_array($login);

if ($login_count === 0) {
	$msg= '<div class="col-sm-12"><div class="alert alert-danger"  style="">
<button type="button" class="close" data-dismiss="alert" style="margin-left: 5px">  x  </button>
<strong > Please Enter Correct  Email or Password  </strong></div></div>';
	# code...
}
else{

	$_SESSION['user_id']=$login_fect['id'];
	$msg= '<div class="col-sm-12"><div class="alert alert-success"  style="">
<button type="button" class="close" data-dismiss="alert" style="margin-left: 5px">  x  </button>
<strong > Successfully Login. Please Wait... </strong></div></div>';
$msg.='<script>function auto_refresh(){ window.location="myaccount.php"; } var refreshId = setInterval(auto_refresh, 2000);
</script>';
}

}
?>



	<div class="login_wrapper">

		<div class="container">

			<div class="login_main">

				<div class="login_title">

					<p>Identifícate con un perfil creado</p>

				</div>

				<div class="form_blog">

					<p>Los tratamientos beauty que quieres te están esperando- sólo tienes que entrar en tu perfil.

</p>

					<form method="post" id="loginfrm" enctype="multipart/form-data">
<input type="hidden" name="salon_id" value="<?php echo $_GET['salon_id'];?>">
						<div class="input_box">

							<label>Dirección Email:</label>

							<input type="email"  placeholder=""   name="email">

						</div>

						<div class="input_box">

							<label>Contraseña:</label>

							<input type="Password"  placeholder=""   name="password">

						</div>

						<div class="check_box">

							<input type="checkbox" name="">

							<span>Recordarme</span>

						</div>


					<!-- 	<input type="submit" value="Login" name="" class="login_btn"> -->
						<button type="submit" name="submit" class="login_btn">Identifícate</button>
						<div id="datart"></div>
					</form>
						<p><a href="request-password-1.php">¿Has olvidado tu contraseña?</a></p>

				</div>



			</div>

			<div class="login_main">

				<div class="login_title">

					<p>Crea un perfil</p>

				</div>

				<div class="form_blog">

					<p>Si aún no has creado tu cuenta de Treatwell, solo te llevará un minuto. registro ? Te prometemos que no tardarás nada.</p>

					
<a href="register.php"><input type="button" value="Registro" name="" class="login_btn"></a>


					

				</div>



			</div>

		</div>

	</div>

<?php include ('footer.php');?>

<script type="text/javascript">
	
	$(document).ready(function (login12) {
 $("#loginfrm").on('submit',(function(login12) {
 	//alert();
  $("#form_abc1_img").show();
  login12.preventDefault();
  $.ajax({
   url: "php/login.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   success: function(data){
     $("#form_abc1_img").hide();
   // alert(data);
   $("#datart").show().html(data);
      },
     error: function(){}          
    });

 }));
});


</script>



