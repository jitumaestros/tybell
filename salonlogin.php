<?php include ('header.php');?>

<style type="text/css">
	header{
		display: none;
	}
</style>

<div class="salonlogin-blog" style="background: url('img/sc.png');background-size: cover;
    background-position: center;">
    <img src="img/logosalon.png">
	<div class="salon-blog-2">
							<form method="post" id="loginfrm" enctype="multipart/form-data">

		<div class="login-form">


			<div class="form-group">
				<input type="text" class="form-control" placeholder="Correo electroico" name="email">
			</div>
			<div class="form-group">
				<input type="password"  class="form-control"  placeholder="Contrasena" name="password" style="border-top: 0px;">
			</div>
			<div class="forget-div">
				<div class="checkbox-blog">
					<input type="checkbox"  name="">
					<span>Mantenme conectado</span>		
				</div>
				<p><a href="request-password-1.php">Restablece tu contrasena</a></p>
			</div>
			<button class="login-btn" name="submit" type="submit">INICIAR SESION</button>
			
			
		</div>
		</form>
		<div class="regis terblog">
			<p><a href="register.php">?no tiene todavia una cuenta profesional?</a></p>
			<a href="register.php"><button class="register-nt" >REGISTRARSE</button></a>
		</div>
		
		<div id="datart"></div>
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