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

                                   <li >

				                  <a href="myaccount.php">Reservas pendientes</a>

				                </li>
				                <li>

				                    <a href="completed_Reservas.php">Reservas Pasadas</a>

				                </li>



                                   <li >

				                    <a href="tickets.php">Ingreso de incidentes</a>

				                </li>

				                <li class="on" >

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



			<div class="custom_col-8">
				<div class="right_editAccount">
					<div class="booking_show-blog">
						<div class="booking-page-blog">
							<h3 style="text-align: center;">Comming soon..!</h3>
						</div>
					</div>
				</div>
			</div>
		</div>










			</div>

		</div>

	</div>
 



<script type="text/javascript">

	function togles(id){

		$('#'+id).slideToggle(200);

	}

</script>

<?php include ('footer.php');?>

<script type="text/javascript">
	
	$(document).ready(function (profil) {
 $("#editprof").on('submit',(function(profil) {
 	//alert();
  $("#form_abc1_img").show();
  profil.preventDefault();
  $.ajax({
   url: "php/edit_profile.php",
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

  function readURL(input)
   {
      if (input.files && input.files[0]) {
       var reader = new FileReader();
       reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
   }
   }
   
   $("#imgInp").change(function() {
   readURL(this);
   });
</script>


<style type="text/css">
	.page-nav .on a {
    border-color: #FF1600;
}

</style>
 