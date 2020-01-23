<?php include ('header.php');

$users=mysqli_fetch_array(mysqli_query($conn,"select * from users where id='".$_SESSION['user_id']."'"));
$bookg=mysqli_fetch_array(mysqli_query($conn,"select * from bookings where id='".$_GET['bookingid']."'"));

?>


<style type="text/css">
.feedback_main
{
    display: block;
    width: 100%; 
    padding: 30px 00px;  
}

.feedback_main .img-block {
    display: block;
    width: 100%;
    position: relative;
    background-size: cover !important;
    background-position: center center !important;
    width: 100%;
}


.feedback_main .img-block h1 {
    text-transform: capitalize;
    font-size: 23px;
    color: #4D4D4D;
    line-height: 50px;
}

.feedback_main .img-block h1> span {
    color: #BF2756;
    display: block;
    font-size: 55px;
}

.feedback_main .img-block img {
    width: 100%;
    padding: 2px;
    border: 3px double #4d6363;
}



.feedback_main .feedback_form {
    display: block;
    width: 90%;
    border: 0px solid #4D4D4D;
    padding: 20px 30px;
    margin: 0 auto;
    display: block;
    border: 1px solid #dedd;
}

.feedback_main .feedback_form h2 {
    text-transform: capitalize;
    font-size: 26px;
    font-weight: 800;
    text-align: center;
    margin: 20px 0 15px;
}
.feedback_main .feedback_form h3 {
    font-size: 14px;
    margin: 0;
    font-weight: 600 !important;
    color: gray;
    font-family: unset;
    text-align: center;
    margin: 0 0 21px;
}

.feedback_main .feedback_form .star_block {
    display: block;
    width: 100%;
    margin: 25px 0;
    overflow: hidden;
}

.feedback_main .feedback_form .star_block li {
    display: block;
    width: 49%;
    float: left;
    overflow: hidden;
    padding: 6px 4px 16px;
}

.feedback_main .feedback_form .star_block label {
    text-transform: capitalize;
    font-size: 16px;
    line-height: 20px;
    font-weight: 700;
    margin: 0;
}


.feedback_main .feedback_form .star_block .rating-block {
    display: block;
    width: 100%;
    text-align: left;
    display: block;
    float: left;
    padding-right: 56px;
}


 
.feedback_main .feedback_form .star_block .rating-block .star {
    font-weight: 300;
    float: none;
    padding: 0 3px;
    font-size: 18px;
    color: #444;
    transition: all .2s;
    float: right;
}


.feedback_main .feedback_form  .submit {
    color: #FFFFFF;
    min-height: 40px;
    font-size: 16px;
    padding: 10px 34px;
    margin: 15px 0 5px;
    background: #2EDAAA !important;
    border: 1px solid #2EDAAA !important;
    margin: 0 auto;
    display: block;
    margin-top: 15px;
    margin-bottom: 15px;
}


.form-group label {
    text-transform: capitalize;
    font-size: 16px;
}

.form-group textarea {
    resize: none;
}
</style>


<div class="feedback_main">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
					<div class="feedback_form">

						<h2> estamos felices de que estés con Tybell?</h2>
						<h3> tu feedback es muy importante para nosotros</h3>
						<br>
						<form method="post" enctype="multipart/form-data" id="feedback">

						<input type="hidden" name="booking_id" value="<?php echo $_GET['bookingid'];?>">

						<input type="hidden" name="salon_id" value="<?php echo $bookg['salon_id'];?>">
						<ul class="star_block">
							<li>
								<div class="col-sm-4 padder">
									<label> Ambiente </label>								
								</div>
								<div class="col-sm-8">
									<div class="rating-block">
										<input class="star star1-5" id="star1-5" type="radio" name="ambience" value="5" onchange="review(this.value);"/>
										<label class="star star1-5" for="star1-5"></label>
										<input class="star star1-4" id="star1-4" type="radio" name="ambience" value="4" onchange="review(this.value,'<?php echo $_GET['job_id'];?>');"/>
										<label class="star star1-4" for="star1-4"></label>
										<input class="star star1-3" id="star1-3" type="radio" name="ambience" value="3" onchange="review(this.value,'<?php echo $_GET['job_id'];?>');"/>
										<label class="star star1-3" for="star1-3"></label>
										<input class="star star1-2" id="star1-2" type="radio" value="2" name="ambience" onchange="review(this.value,'<?php echo $_GET['job_id'];?>');"/>
										<label class="star star1-2" for="star1-2"></label>
										<input class="star star1-1" id="star1-1" type="radio" name="ambience" value="1" onchange="review(this.value,'<?php echo $_GET['job_id'];?>');" />
										<label class="star star1-1" for="star1-1"></label>  
									</div>
								</div>

							</li>

							<li> 
								<div class="col-sm-4 padder">
									<label> Personal </label>								
								</div>
								<div class="col-sm-8">						
								<div class="rating-block">
									<input class="star star1-5" id="star2-5" type="radio" name="staff" value="5" >
									<label class="star star1-5" for="star2-5"></label>
									<input class="star star1-4" id="star2-4" type="radio" name="staff" value="4" o>
									<label class="star star1-4" for="star2-4"></label>
									<input class="star star1-3" id="star1-3" type="radio" name="staff" value="3" />
									<label class="star star1-3" for="star2-3"></label>
									<input class="star star1-2" id="star1-2" type="radio" value="2" name="staff" />
									<label class="star star1-2" for="star2-2"></label>
									<input class="star star1-1" id="star1-1" type="radio" name="staff" value="1"  />
									<label class="star star1-1" for="star2-1"></label>  
								</div>
								</div>
									
							</li>

							<li>
								<div class="col-sm-4 padder">
								<label> Limpieza </label>						
								</div>
								<div class="col-sm-8">								
								<div class="rating-block">
									<input class="star star1-5" id="star3-5" type="radio" name="cleanliness" value="5" />
									<label class="star star1-5" for="star3-5"></label>
									<input class="star star1-4" id="star1-4" type="radio" name="cleanliness" value="4" />
									<label class="star star1-4" for="star3-4"></label>
									<input class="star star1-3" id="star3-3" type="radio" name="cleanliness" value="3" />
									<label class="star star1-3" for="star3-3"></label>
									<input class="star star1-2" id="star3-2" type="radio" value="2" name="cleanliness" />
									<label class="star star1-2" for="star3-2"></label>
									<input class="star star1-1" id="star3-1" type="radio" name="cleanliness" value="1"  />
									<label class="star star1-1" for="star3-1"></label>  
								</div>	
								</div>								
							</li>

							<li>  
								<div class="col-sm-4 padder">
								<label> Calidad-Precio </label>						
								</div>
								<div class="col-sm-8">							
								<div class="rating-block">
									<input class="star star1-5" id="star4-5" type="radio" name="rating" value="5" onchange="review(this.value);"/>
									<label class="star star1-5" for="star4-5"></label>
									<input class="star star1-4" id="star4-4" type="radio" name="rating" value="4" onchange="review(this.value,'<?php echo $_GET['job_id'];?>');"/>
									<label class="star star1-4" for="star4-4"></label>
									<input class="star star1-3" id="star1-3" type="radio" name="rating" value="3" onchange="review(this.value,'<?php echo $_GET['job_id'];?>');"/>
									<label class="star star1-3" for="star4-3"></label>
									<input class="star star1-2" id="star1-2" type="radio" value="2" name="rating" onchange="review(this.value,'<?php echo $_GET['job_id'];?>');"/>
									<label class="star star1-2" for="star4-2"></label>
									<input class="star star1-1" id="star4-1" type="radio" name="rating" value="1" onchange="review(this.value,'<?php echo $_GET['job_id'];?>');" />
									<label class="star star1-1" for="star4-1"></label>  
								</div>	
								</div>										
							</li>
 						</ul> 

 						<div class="form-group">
 							<label> Revisión</label>
 							<textarea placeholder="Revisión.." cols="4" rows="5" class="form-control" name="feedback"></textarea>
 						<button class="submit" type="submit" name="submit"> Enviar </button>
 						</div>
</form>
<div id="datart"></div>
					</div>
				</div>
			</div>
		</div>
	</div> 


<style type="text/css">
	.wel-come-header{
	display: none;
	}

	div.stars {
	width: 270px;
	display: inline-block;
	}

	input.star { display: none; }

	label.star {
	float: right;
	padding: 10px;
	font-size: 36px;
	color: #444;
	transition: all .2s;
	}

	input.star:checked ~ label.star:before {
	content: '\f005';
	color: #FD4;
	transition: all .25s;
	}


	input.star1-5:checked ~ label.star:before {
	color: #FE7;
	text-shadow: 0 0 20px #952;
	}



	input.star-1:checked ~ label.star:before { color: #F62; }

	label.star:hover { transform: rotate(-15deg) scale(1.3); }

	label.star:before {
	content: '\f006';
	font-family: FontAwesome;
	}

</style>


<?php include ('footer.php');?>
<script type="text/javascript">
	
	$(document).ready(function (login12) {
 $("#feedback").on('submit',(function(login12) {
 	//alert();
  $("#form_abc1_img").show();
  login12.preventDefault();
  $.ajax({
   url: "php/add_feedback.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   success: function(data){
     $("#form_abc1_img").hide();
   $("#datart").show().html(data);
      },
     error: function(){}          
    });

 }));
});


</script>
