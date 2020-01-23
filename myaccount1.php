
<?php include ('header.php');?>



<div class="edit_profile_wrapper">

	<div class="container">

		<div class="edit_blog">

			<div class="top_edit_wrapper">

				<div class="sticky-wrapper" style="">

				    <div class="anchor-links-wrapper">



				        <div class="wrapper clearfix">

				            <ul class="page-nav">

				                <li class="on" >

				                    <a href="#bookings">Bookings</a>

				                </li>



				                <li >

				                    <a href="#wallet">Wallet</a>

				                </li>



				            </ul>

				        </div>

				    </div>

				</div>



				<div class="custom_col-4">

					<div class="section-aside left account-summary" style="position: relative; top: -50px; ">

					    <div class="section profile">

					        <div class="profile-image">

					            <img src="img/female-edit.png">

					            <div class="edit-link centered-block">Change picture <span class="icon"></span></div>

					        </div>



					        <div class="profile-details">



					            <span class="name ">sasha banks</span>



					            <div class="gender male hide">

					                <span class="fa fa-male"></span> Male

					            </div>

					            <div class="gender female ">

					                <span class="fa fa-female"></span> Female

					            </div>

					            <div class="gender not-set hide">

					                Gender not set

					            </div>



					            <div class="button other-button edit-profile">

					                <span class="text" onclick="togles('edit')">Edit my profile</span></div>

					                <div class="profile-details-1" id="edit" style="display: none;">

									    <form novalidate="novalidate">

									        <div class="form-group">

									            <input type="text" name="first-name" class="form-control" placeholder="First name" >

									        </div>

									        <div class="form-group">

									            <input type="text" name="last-name" class="form-control" placeholder="Last name" >

									        </div>



									        <div class="form-group">							            

							                    <select class="form-control" >

							                        <option selected="" value="FEMALE">Female</option>

							                        <option value="MALE">Male</option>

							                        <option value="">Undisclosed</option>

							                    </select>							                

									        </div>

									        <div class="text-right">

									        	<span class="button main-button save">Save</span>

									        	<span class="button other-button cancel">Cancel</span>

									        </div>

									        

									    </form>

									</div>

					            

					        </div>

					    </div>



					    <div>

					        <span class="title_edit">Login Info</span>

					        <strong>sashabanks0912@gmail.com</strong>

					        <a class="change-password-link link-with-icon" href="/request-password" target="_blank">

					           Reset password

					        </a>

					       

					    </div>

					   			

					</div>

				</div>



				<div class="custom_col-8">

					<div class="right_editAccount">

						<div class="booking_show-blog">
						<!-- 	<div class="booking_details_show">
								<ul>
									<li>Service Name</li>
									<li>test package</li>
									<li>Service Price</li>
									<li>20</li>
									<li>Schedule Time</li>
									<li>12:12:00</li>
									<li>Selected Employee</li>
									<li>employee name</li>
									<li>Booked On </li>
									<li>5-6-2019 08:33:50</li>
								</ul>
								<br>
								<input type="button" value="Booking Cancel" name="" class="login_btn" style="float: unset; margin-top: 10px;">
								
							</div> -->
							 <div class="booking-page-blog">
					             <p>Past Bookings</p>
					            <div class="b-p-b-1">
					               <a href="myaccount2.php">
					                <div class="booking-secion-1">
					                    <div class="booking-section-blog-1">
					                      <p><b>Mar 7</b></p>
					                      <p>13:00</p>
					                    </div>
					                    <div class="booking-section-blog-2">
					                      <p><b>Soack off, shape, Buff & Polish - On The Run-Hands </b></p>
					                      <p>Kat Maconie Beauty</p>
					                    </div>
					                </div>

					                </a>
					                <a href="myaccount2.php">
					                <div class="booking-secion-1">
					                    <div class="booking-section-blog-1">
					                      <p><b>Mar 7</b></p>
					                      <p>13:00</p>
					                    </div>
					                    <div class="booking-section-blog-2">
					                      <p><b>Soack off, shape, Buff & Polish - On The Run-Hands </b></p>
					                      <p>Kat Maconie Beauty</p>
					                    </div>
					                </div>
					                </a>
					            </div>
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