<?php include ('header.php');
$users=mysqli_fetch_array(mysqli_query($conn,"select * from users where id='".$_GET['id']."'"));
?>

	<div class="resetPassword">
<form method="post" id="forgtpass" enctype="multipart/form-data">
		<div class="container">

			<div class="resetPassword_wrapper">

				<h1 class="reset_ttile">- &nbsp; Please enter a new password &nbsp;  -</h1>

				<p>Change password for <strong><?php echo $users['email'];?></strong></p>

			<input type="hidden" name="user_id" value="<?php echo $_GET['id'];?>">

					<div class="form-group">

						<input type="password" class="form-control" placeholder="New password" name="pass"  >

					</div>

					<div class="form-group">

						<input type="password" class="form-control" placeholder="Confirm password" name="new_pass">

					</div>

				<button class="back_btn">Change password</button>

				

			</div><div id="datart"></div>

		</div>		

		</form>

	</div>

<?php include ('footer.php');?>
<script type="text/javascript">
	
	$(document).ready(function (forg12) {
 $("#forgtpass").on('submit',(function(forg12) {
 	//alert();
  $("#form_abc1_img").show();
  forg12.preventDefault();
  $.ajax({
   url: "php/update_password.php",
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