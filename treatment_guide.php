<?php include ('header.php');?>


      <div class="app--content--84a37b">

         <div>

            <div class="TreatmentGuidePageStyles--treatmentGuide--ae8512">

               <div class="TreatmentGuidePageStyles--header--a4caaf">

                 

                  <div class="container">

                     <div class="ContentSection--newSection--a6c01d">

                        <div class="grid--row--b1c003">

                           <div class="grid--col-xs-12--728719 grid--col-sm-6--45de38">

                              <h1 class="TreatmentGuidePageStyles--title--cc9912">Treatment Guide</h1>

                              <div class="TreatmentGuidePageStyles--description--1bb69a">¿Dispuesto a profundizar en el mundo de la belleza? Perfecto, echa un ojo a nuestra guía de expertos. Aquí tienes todo lo que necesitas saber para escoger tu nuevo tratamiento. Elige convencido y atrévete a probar.</div>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

               <div class="TreatmentGuidePageStyles--heroimage--471d40" style="background-image:url('img/2back_img.svg')">

                  <div class="container">

                     <div class="conatiner">

                        <div class="grid--row--b1c003">

                           <div class="TreatmentGuidePageStyles--contentBlocks--823745">

                              <section class="style--blocks--0442a1 cloned" style="display: block;">

<?php $sqliii=mysqli_query($conn,"select * from treament_guide");
while($treat=mysqli_fetch_array($sqliii)){ ?>

                                 <div class="col-sm-4">

                                    <div class="Block--block--648e3b">

                                       <a class="" href="">

                                          <img class="Block--image--091c7e" src="image/<?php echo $treat['image'];?>">

                                          <h3 class="Block--title--46e63b"><?php echo $treat['title'];?></h3>

                                          <div class="Block--description--7e6c0d"><?php echo $treat['description'];?></div>

                                       </a>

                                    </div>

                                

                                 </div>

                                 <?php }?>

                              </section>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

               <div class="container">

                  <div class="ContentSection--newSection--a6c01d">

                     <div class="grid--row--b1c003">

                        <div class="TreatmentGuidePageStyles--contentBlocks--823745">

                           <section class="style--blocks--0442a1 cloned" style="display: block;">

                              <h2 class="style--title--322f9a">¿Dónde ir? ¿Qué tratamiento elegir?</h2>

<?php $sqliiid=mysqli_query($conn,"select * from wheretogochoose");
while($wheretreat=mysqli_fetch_array($sqliiid)){ ?>


                              <div class="col-sm-4">

                                 <div class="Block--block--648e3b">

                                    <a class="" href="">

                                       <img class="Block--image--091c7e" src="image/<?php echo $wheretreat['image'];?>">

                                       <h3 class="Block--title--46e63b"><?php echo $wheretreat['title'];?></h3>

                                       <div class="Block--description--7e6c0d"><?php echo $wheretreat['description'];?></div>

                                    </a>

                                 </div>

                             

                              </div>
                              <?php }?>



                           </section>

                        </div>

                     </div>

                  </div>

               </div>

              

            </div>

         </div>

      </div>







<?php include ('footer.php');?>