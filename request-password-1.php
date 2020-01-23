<?php include ('header.php');?>
<style type="text/css">
	.request-btn{
    z-index: 2;
    margin-left: -1px;
    background: #FF5C39;
    color: #fff;
    padding: 15px 20px;
    font-size: 16px;
}
</style>

	<div class="resetPassword">

		<div class="container">

			<div class="resetPassword_wrapper">

				<h1 class="reset_ttile">- &nbsp; Reset your Password &nbsp;  -</h1>

				<p>Enter your email address below and check your inbox for a link to set a new password</p>
<form method="post" id="forgtpass">
				<div class="input-group">

					<input type="email" placeholder="Enter your email address" class="form-control" name="email">

 <div class="input-group-btn">
      <button class="btn btn-default request-btn" type="submit">
       REQUEST
      </button>
    </div>
				</div>
</form>

<div id="datart"></div>


			</div>

		</div>

	</div>

<?php include ('footer.php');?>

<script type="text/javascript">
	
	$(document).ready(function (forg12) {
 $("#forgtpass").on('submit',(function(forg12) {
 	//alert();
  $("#form_abc1_img").show();
  forg12.preventDefault();
  $.ajax({
   url: "php/myforgetpass.php",
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