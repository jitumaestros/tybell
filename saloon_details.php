<?php include ('header.php');
$_SESSION['dates']=$_GET['dates'];

$slnm=mysqli_fetch_array(mysqli_query($conn,"select * from users where id='".$_GET['id']."' "));

$img=explode(',',$slnm['salon_pic']);


$dist=mysqli_fetch_array(mysqli_query($conn,"select * from district where id='".$slnm['district']."'"));

$totalcounts=mysqli_num_rows(mysqli_query($conn,"select * from feedback where salon_id='".$_GET['id']."'"));

//$totalx='';

$sfds=mysqli_query($conn,"select * from feedback where salon_id='".$_GET['id']."' order by id desc");

while($feednmd=mysqli_fetch_array($sfds)){


  $totalratings=$feednmd['rating']+$feednmd['ambience']+$feednmd['staff']+$feednmd['cleanliness'];

  $totalx = $totalratings/4;

//echo $totalss=$totalx/$totalcounts;

}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

<div class="container">

 <section class="">

  <div class="slide"><img src="image/<?php echo $img['0'];?>" style="width: 100%;
    height: 461px;">

  </div>

  <div class="img-screen-bottom t6" style="display: none;"> 

  </div>

</section>

</div>
           <form method="post" id="loginform1" enctype="multipart/form-data">

<div class="section_2">

  <div class="container">

    <div class="section_2salon_deatils">

      <div class="col-sm-8">

        <div class="left_salon_blog">

          <h1 class="salon_d_title"><?php echo $slnm['business_name'];?></h2>

            <p><?php echo $slnm['adress'];?></p>

            <p style="color: #02B0B9;"><img src="img/off.svg"> <b>  off peak</b></p>

          </div>

        </div>

        <div class="col-sm-4">

          <div class="right_salon_blog pull-right">

           <ul class="nav nav-pills my_tab_menu">

            <li ><a href="#about_block">About</a></li>

            <li><a href="#reviews_block">Reviews</a></li>

            <li class="active"><a href="#Book_now_block">Book now</a></li>

          </ul>

          <div class="rating1">

            <span style="color: #CCBB66;">5.0 </span>

            <ul>

              <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

              <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

              <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

              <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

              <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

            </ul>

          </div>

          <p class="pull-right"><?php echo $totalcounts;?> Opiniones</p>

        </div>

      </div>

    </div>

  </div>

</div>

<div class="section_3" id="Book_now_block">

  <div class="container">

    <div class="section_3_blog">

      <div class="col-sm-3">

        <div class="left_blog_S3">

          <h2 class="left_title">MATCHING YOUR SEARCH</h2>

        </div>

      </div>

      <div class="col-sm-9">

        <div class="right_blog_s3">

          <div class="accordion-container">

             <?php 
             $m='1';
             $tu='2';
             $wed='3';
             $th='4';
             $fri='5';
             $st='6';
             $t=date('d-m-Y');
             $dayy= date("D",strtotime($t));
             if($dayy=='Mon'){
              $daycount=$m;
            }elseif($dayy=='Tue'){
              $daycount=$tu;
            }elseif($dayy=='Wed'){
              $daycount=$wed;
            }elseif($dayy=='Thu'){
              $daycount=$th;
            }elseif($dayy=='Fri'){
              $daycount=$fri;
            }elseif($dayy=='Sat'){
              $daycount=$st;
            }
            $date= date('H:i'); 
              /*echo $date= '11:00'; 
              */
              $mor='12:00';
              $afet='17:00';
              if(($date >=$mor) && ($date <=$afet)){
                $days='2';
              }elseif($date <=$mor){
                $days='1';
              }else{
                $days='3';
              }
              $days;

              if($_GET['category_id']!=''){

               $srev=mysqli_query($conn,"select * from service where salon_id='".$slnm['id']."' and category_id='".$_GET['category_id']."'  ");


             }else{

               $srev=mysqli_query($conn,"select * from service where salon_id='".$slnm['id']."'");

             }
             $r=rand();
             while($sernm=mysqli_fetch_array($srev)){

               $spriclavel=mysqli_fetch_array(mysqli_query($conn,"select * from service_price_level where salon_id='".$slnm['id']."' and service_id='".$sernm['id']."' order by id asc"));
               $spriclavelf=mysqli_num_rows(mysqli_query($conn,"select * from service_price_level where salon_id='".$slnm['id']."' and service_id='".$sernm['id']."' order by id asc"));
               
               $offercount=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));

               $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));

               $offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$slnm['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));
               
               $todays=date('Y-m-d');

               $servicdis=mysqli_fetch_array(mysqli_query($conn,"select * from discounts where id='".$sernm['id']."' and salon_id='".$slnm['id']."' and offer_status='1'"));

               $servicdiscount=mysqli_num_rows(mysqli_query($conn,"select * from service where id='".$sernm['id']."' and salon_id='".$slnm['id']."' and offer_status='1'"));

               $offercount1co=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));

               $offercount1=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));

               if($servicdiscount >0){

                $dis=$spriclavel['sale_price']*$servicdis['offer']/100;
                $totals=$spriclavel['sale_price']-$dis;

              }
              elseif($offercount >0){
                $m='1';
                $tu='2';
                $wed='3';
                $th='4';
                $fri='5';
                $st='6';
                $t=date('d-m-Y');
                $dayy= date("D",strtotime($t));
                if($dayy=='Mon'){
                  $daycount=$m;
                }elseif($dayy=='Tue'){
                  $daycount=$tu;
                }elseif($dayy=='Wed'){
                  $daycount=$wed;
                }elseif($dayy=='Thu'){
                  $daycount=$th;
                }elseif($dayy=='Fri'){
                  $daycount=$fri;
                }elseif($dayy=='Sat'){
                  $daycount=$st;
                }
                $date= date('H:i'); 
              /*echo $date= '11:00'; 
              */
              $mor='12:00';
              $afet='17:00';
              if(($date >=$mor) && ($date <=$afet)){
                $days='2';
              }elseif($date <=$mor){
                $days='1';
              }else{
                $days='3';
              }
              $days;

              $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));
              $offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$slnm['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

              $prrr=explode(',', $offer['dayweekcount']);
              $ofrd=explode(',', $offer['offer']);
              $day1=$prrr['0'];
              $day2=$prrr['1'];
              $day3=$prrr['2'];
              $day4=$prrr['3'];
              $day5=$prrr['4'];
              $day6=$prrr['5'];
              $offer1=$ofrd['0'];
              $offer2=$ofrd['1'];
              $offer3=$ofrd['2'];
              $offer4=$ofrd['3'];
              $offer5=$ofrd['4'];
              $offer6=$ofrd['5'];
              if($daycount=='1'){
                $offerper=$offer1;
              }elseif($daycount=='2'){
                $offerper=$offer2;
              }elseif($daycount=='3'){
                $offerper=$offer3;
              }elseif($daycount=='4'){
                $offerper=$offer4;
              }elseif($daycount=='5'){
                $offerper=$offer5;
              }elseif($daycount=='6'){
                $offerper=$offer6;
              }
              $totalprice=$spriclavel['sale_price']*$offerper/100;
              $totals=$spriclavel['sale_price']-$totalprice;
            }elseif($offercount1co >0){

             $totalprice=$spriclavel['sale_price']*$offercount1['offer']/100;
             $totals=$spriclavel['sale_price']-$totalprice;

           }else{

            $totals=$spriclavel['sale_price'];
          }

          ?>

<!-- <input type="hidden" name="serviceid" value="<?php echo $sernm['id'];?>">
-->
<input type="hidden" name="slonid" value="<?php echo $_GET['id'];?>">

<div class="set">

  <a href="javascript:;">

    <?php echo $sernm['name'];?>

    <div class="inline-block cmlccc-block">
     <p class="accordio_price">

      <?php if(($offercount>0) or ($servicdiscount >0 ) or ($offercount1co >0 )) { ?>

      from $<?php echo $totals;?>  

      <?php }else{?>

<!--            from $<?php echo $sernm['sale_price'];?><br> 
-->
from $ <?php echo $spriclavel['sale_price'];?><?php if($spriclavel['price'] >$spriclavel['sale_price']){?> <span>$<DEL><?php echo $spriclavel['price'];?></DEL></span><?php }?>

<?php }?>
<a href="javascript:;" onclick="selecteall('<?php echo $sernm['id'];?>');">
</p>
<div class="" data-toggle="buttons">

  <?php if($spriclavelf >1){?>                
  

  <a href="javascript:;" class="click11<?php echo $sernm['id'];?>" onclick="togllesbar('panels<?php  echo $sernm['id'];?>')">
    <i class="fa fa-angle-down"></i>
  </a>
  <?php }else{?>

  <label class="btn btn-success select Select_btn">
    <input type="checkbox" name="serviceid[]" value="<?php echo $sernm['id'];?>" id="option1" autocomplete="off" >Select
  </label>
  <?php }?>
</div>                       
<div class="BrowseResultService--price--e36420 cmlccc1">  
  <?php if(($offercount>0) or ($servicdiscount >0 ) or ($offercount1co >0 )) { ?>

  Ahorro de hasta un <?php if($servicdiscount >0){
   echo $servicdis['offer'];}elseif($offercount >0){ echo $offerper;} else {echo $offercount1['offer'];}?>% <?php }?>
   
 </div>
 
 
</div>  

<p><?php echo $spriclavel['duration'];?>- <?php echo $spriclavel['duration'];?>
 <span style="color: #001151;" data-toggle="modal" data-target="#myModal<?php echo $sernm['id'];?>">Show Details</span></p>

</a>

<div class="panel<?php echo $sernm['id'];?>" id="panels<?php  echo $sernm['id'];?>" style="display: none;">
  <?php
  $spricde=mysqli_query($conn,"select * from service_price_level where salon_id='".$slnm['id']."' and service_id='".$sernm['id']."' order by id asc");
  while($serpricl=mysqli_fetch_array($spricde)){


            $offercounts=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1' and FIND_IN_SET('$days', day)"));

                $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));


                $offerf=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$slnm['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

                $todays=date('Y-m-d');

                $servicdis=mysqli_fetch_array(mysqli_query($conn,"select * from service where id='".$sernm['id']."' and salon_id='".$slnm['id']."' and offer_status='1'"));

                $servicdiscount=mysqli_num_rows(mysqli_query($conn,"select * from service where id='".$sernm['id']."' and salon_id='".$slnm['id']."' and offer_status='1'"));

                $offercount1co=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));



                $offercount1=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));

                $offercount=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));


                if($servicdiscount >0){

                  $dis=$serpricl['sale_price']*$servicdis['offer']/100;
                  $totals=$serpricl['sale_price']-$dis;

                }
                elseif($offercount >0){
                  $m='1';
                  $tu='2';
                  $wed='3';
                  $th='4';
                  $fri='5';
                  $st='6';
                  $t=date('d-m-Y');
                  $dayy= date("D",strtotime($t));
                  if($dayy=='Mon'){
                    $daycount=$m;
                  }elseif($dayy=='Tue'){
                    $daycount=$tu;
                  }elseif($dayy=='Wed'){
                    $daycount=$wed;
                  }elseif($dayy=='Thu'){
                    $daycount=$th;
                  }elseif($dayy=='Fri'){
                    $daycount=$fri;
                  }elseif($dayy=='Sat'){
                    $daycount=$st;
                  }
                  $date= date('H:i'); 
              /*echo $date= '11:00'; 
              */
              $mor='12:00';
              $afet='17:00';
              if(($date >=$mor) && ($date <=$afet)){
                $days='2';
              }elseif($date <=$mor){
                $days='1';
              }else{
                $days='3';
              }
              $days;

              $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));
              $offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$slnm['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

              $prrr=explode(',', $offer['dayweekcount']);
              $ofrd=explode(',', $offer['offer']);
              $day1=$prrr['0'];
              $day2=$prrr['1'];
              $day3=$prrr['2'];
              $day4=$prrr['3'];
              $day5=$prrr['4'];
              $day6=$prrr['5'];
              $offer1=$ofrd['0'];
              $offer2=$ofrd['1'];
              $offer3=$ofrd['2'];
              $offer4=$ofrd['3'];
              $offer5=$ofrd['4'];
              $offer6=$ofrd['5'];
              if($daycount=='1'){
                $offerper=$offer1;
              }elseif($daycount=='2'){
                $offerper=$offer2;
              }elseif($daycount=='3'){
                $offerper=$offer3;
              }elseif($daycount=='4'){
                $offerper=$offer4;
              }elseif($daycount=='5'){
                $offerper=$offer5;
              }elseif($daycount=='6'){
                $offerper=$offer6;
              }
              $totalprice=$serpricl['sale_price']*$offerper/100;
              $totals=$serpricl['sale_price']-$totalprice;
            }elseif($offercount1co >0){

             $totalprice=$serpricl['sale_price']*$offercount1['offer']/100;
             $totals=$serpricl['sale_price']-$totalprice;

           }else{
            $totals=$serpricl['sale_price'];
          }      
              /*$totalpricss=$serpricl['price']*$offerper/100;
                $totalsaa=$serpricl['price']-$totalpricss;*/
                ?>
                <div class="set_main_block">
                  <div class="left_section">
                    <p class="my_timess">
                      <span class="closk">
                        <?php echo $serpricl['name_price_vevel'];?></span>
                        <span class="show_detaisl" data-toggle="modal" data-target="#myModalrating"> <?php echo $serpricl['duration'];?></span>
                      </p>
                    </div>

                    <div class="right_section"> 
                      <div class="right_bl-left">
                        <p class="accordio_price">

                    <?php if(($offercount >0) or ($servicdiscount >0) or ($offercount1co >0)){?>
                          from $<?php echo $totals;?>
                          <span style="color: #00B0B9;">Ahorro de hasta un <?php if($servicdiscount >0){
                           echo $servicdis['offer'];}elseif($offercount >0){ echo $offerper;} else {echo $offercount1['offer'];}?>%</span>
                           <?php }else{?>
                           from $<?php echo $serpricl['sale_price'];?><br>
                           from $<del><?php echo $serpricl['price'];?></del>

                           <?php }?>
                         </p>
                       </div>
                       <div class="right_bl-right">
                        <a href="javascript:;" onclick="selecteall('<?php echo $serpricl['id'];?>');">
                          <div class="" data-toggle="buttons">
                            <label class="btn btn-success select Select_btn">
                              <input type="radio" name="serviceidserpricl" value="<?php echo $serpricl['id'];?>" id="option1v" autocomplete="off" class="idsssv<?php echo $serpricl['id'];?>">Select
                            </label>
                          </div>  
                        </a> 
                      </div>
                    </div>
                  </div> 
                  <?php }?>
                </div>

                <div class="content">

                  <div class="accordio_conent_blog1">

                    <div class="left_ac_con">

                     <p>Short-Medium Length Hair</p>

                     <span>2 hrs</span>

                   </div>

                   <div class="right_blog_con">

                    <p class="accordio_price">

                      from $45

                      <span style="color: #00B0B9;">save up to 50%</span>

                    </span>



                  </p>

<!--                          <button class="Select_btn">Select</button>
-->
</div>



</div>

<div class="accordio_conent_blog1">

  <div class="left_ac_con">

   <p>Short-Medium Length Hair</p>

   <span>2 hrs</span>

 </div>

 <div class="right_blog_con">

  <p class="accordio_price">

    from £45

    <span style="color: #00B0B9;">save up to 50%</span>

  </span>

</p>


</div>

</div>

</div>

</div>

<div id="myModal<?php echo $sernm['id'];?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Service details</h4>
      </div>
      <div class="modal-body">
       <h3><?php echo $sernm['name'];?><h3>
        <p><?php echo $sernm['description'];?></p>
        <br>
        <h3>SERVICE REVIEWS</h3>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?php }?>

<div id="totalksprices"></div>


</div>

</div>           

</div>

</div>

</div>

</div>

</div>

</div>



<div class="section_4">
  <div class="container"> 
    <div class="section_4_tab">
      <h6 class="title_p1"> Not what you were looking for?</h6>
      <h5 class="title_p">BROWSE SERVICES</h5>
      <ul class="nav nav-pills tab_list">
        <li class="active">
          <a data-toggle="pill" href="#home">
            <img src="img/all1.svg" class="show1">
            <img src="img/all2.svg" class="show2">
            <span>All</span> 
          </a>
        </li>
        
        <?php
        $sqlii=mysqli_query($conn,"select * from category where id!='2' and id!='3' LIMIT 0,4");
        while($catnm=mysqli_fetch_array($sqlii)){
          ?>

          <li>
            <a data-toggle="pill" href="#menu<?php echo $catnm['id'];?>">
              <img src="img/<?php echo $catnm['icon'];?>"  class="show1">
              <img src="img/<?php echo $catnm['icon2'];?>" class="show2">
              <span><?php echo $catnm['name'];?></span>
            </a>
          </li>
          <?php }?>
        </ul>

        <div class="tab-content">
          
          <div id="home" class="tab-pane fade in active">
            <div class="tab_blog_saloon_1">
              <div class="col-sm-4">
                <div class="blog_1_salon_tab">
                  <ul class="nav nav-pills mytabs">
                    <?php
                    $sqliial=mysqli_query($conn,"select * from subcategory  ");
                    $dal = 1;
                    while($subcatal=mysqli_fetch_array($sqliial)){
                      $sercountsal=mysqli_num_rows(mysqli_query($conn,"select * from service where subcategory_id='".$subcatal['id']."' and salon_id='".$_GET['id']."'"));
                        if($sercountsal >0){
                      ?> 
                      <li class="<?php //if($dal==1){ echo 'active';} ?>">
                        <a data-toggle="pill" href="#mytabs<?php echo $subcatal['id'];?>">
                          <?php echo $subcatal['name'];?>(<?php echo $sercountsal;?>)</a>
                        </li>
                        <?php }?>
                        <?php $dal=0;}?>
                      </ul>
                    </div>
                  </div>
                  
                  <div class="col-sm-8">
                    <div class="tab-content">
                      <?php
                      $sqliialsse=mysqli_query($conn,"select * from subcategory "); 
                      $dl = 1;
                      while($subcatnalser=mysqli_fetch_array($sqliialsse)){
                        ?>

                        <div id="mytabs<?php echo $subcatnalser['id'];?>" class="blog_2_salon_tab tab-pane fade in <?php if($dl==1){ echo 'active';} ?> ">

                          <div class="accordion-container">
                            <?php 
                            $m='1';
                            $tu='2';
                            $wed='3';
                            $th='4';
                            $fri='5';
                            $st='6';
                            $t=date('d-m-Y');
                            $dayy= date("D",strtotime($t));
                            if($dayy=='Mon'){
                              $daycount=$m;
                            }elseif($dayy=='Tue'){
                              $daycount=$tu;
                            }elseif($dayy=='Wed'){
                              $daycount=$wed;
                            }elseif($dayy=='Thu'){
                              $daycount=$th;
                            }elseif($dayy=='Fri'){
                              $daycount=$fri;
                            }elseif($dayy=='Sat'){
                              $daycount=$st;
                            }
                            $date= date('H:i'); 
              /*echo $date= '11:00'; 
              */
              $mor='12:00';
              $afet='17:00';
              if(($date >=$mor) && ($date <=$afet)){
                $days='2';
              }elseif($date <=$mor){
                $days='1';
              }else{
                $days='3';
              }
              $days;
              $sersbal=mysqli_query($conn,"select * from service where subcategory_id='".$subcatnalser['id']."' and salon_id='".$_GET['id']."'"); 
              while($servnmals=mysqli_fetch_array($sersbal)){

               $spriclavel=mysqli_fetch_array(mysqli_query($conn,"select * from service_price_level where salon_id='".$slnm['id']."' and service_id='".$servnmals['id']."' order by id asc"));
               $spriclavelf=mysqli_num_rows(mysqli_query($conn,"select * from service_price_level where salon_id='".$slnm['id']."' and service_id='".$servnmals['id']."' order by id asc"));
               $offercount=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$servnmals['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));
               $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$servnmals['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));
               $offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$slnm['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));
               
               $todays=date('Y-m-d');

               $servicdis=mysqli_fetch_array(mysqli_query($conn,"select * from service where id='".$servnmals['id']."' and salon_id='".$slnm['id']."' and offer_status='1'"));

               $servicdiscount=mysqli_num_rows(mysqli_query($conn,"select * from service where id='".$servnmals['id']."' and salon_id='".$slnm['id']."' and offer_status='1'"));

               $offercount1co=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$servnmals['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));



               $offercount1=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$servnmals['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));



               if($servicdiscount >0){

                $dis=$spriclavel['sale_price']*$servicdis['offer']/100;
                $totals=$spriclavel['sale_price']-$dis;

              }
              elseif($offercount >0){
                $m='1';
                $tu='2';
                $wed='3';
                $th='4';
                $fri='5';
                $st='6';
                $t=date('d-m-Y');
                $dayy= date("D",strtotime($t));
                if($dayy=='Mon'){
                  $daycount=$m;
                }elseif($dayy=='Tue'){
                  $daycount=$tu;
                }elseif($dayy=='Wed'){
                  $daycount=$wed;
                }elseif($dayy=='Thu'){
                  $daycount=$th;
                }elseif($dayy=='Fri'){
                  $daycount=$fri;
                }elseif($dayy=='Sat'){
                  $daycount=$st;
                }
                $date= date('H:i'); 
              /*echo $date= '11:00'; 
              */
              $mor='12:00';
              $afet='17:00';
              if(($date >=$mor) && ($date <=$afet)){
                $days='2';
              }elseif($date <=$mor){
                $days='1';
              }else{
                $days='3';
              }
              $days;

              $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$servnmals['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));
              $offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$slnm['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

              $prrr=explode(',', $offer['dayweekcount']);
              $ofrd=explode(',', $offer['offer']);
              $day1=$prrr['0'];
              $day2=$prrr['1'];
              $day3=$prrr['2'];
              $day4=$prrr['3'];
              $day5=$prrr['4'];
              $day6=$prrr['5'];
              $offer1=$ofrd['0'];
              $offer2=$ofrd['1'];
              $offer3=$ofrd['2'];
              $offer4=$ofrd['3'];
              $offer5=$ofrd['4'];
              $offer6=$ofrd['5'];
              if($daycount=='1'){
                $offerper=$offer1;
              }elseif($daycount=='2'){
                $offerper=$offer2;
              }elseif($daycount=='3'){
                $offerper=$offer3;
              }elseif($daycount=='4'){
                $offerper=$offer4;
              }elseif($daycount=='5'){
                $offerper=$offer5;
              }elseif($daycount=='6'){
                $offerper=$offer6;
              }
              $totalprice=$spriclavel['sale_price']*$offerper/100;
              $totals=$spriclavel['sale_price']-$totalprice;
            }elseif($offercount1co >0){

             $totalprice=$spriclavel['sale_price']*$offercount1['offer']/100;
             $totals=$spriclavel['sale_price']-$totalprice;

           }else{

            $totals=$spriclavel['sale_price'];
          }
          ?>
          <div class="set ">
            <div class="mynewcallss">
             
              <div class="data-tybell">
                <?php echo $servnmals['name'];?>
                <p>
                  <?php echo $servnmal['duration'];?>-
                  <?php echo $servnmal['duration'];?>
                  <span style="color: #001151;">Show Details</span>
                </p>
                
              </div>
              
              <?php if($spriclavelf >1){?>


              <a href="javascript:;" id="right-kci" class="click11<?php echo $servnmals['id'];?>" onclick="togllesbar1('panelsa<?php  echo $servnmals['id'];?>')">
                <i class="fa fa-angle-down"></i>
              </a>

              <?php }else{?>
              &nbsp;
<!--                           <button class="Select_btn" style="float: right; width: 12%;">Select</button>
-->  

<!--                         <input type="checkbox" name="serviceid[]" value="<?php echo $servnmal['id'];?>" id="option1s" autocomplete="off" class="idss<?php echo $servnmal['id'];?>">Select
-->
 <a href="javascript:;" onclick="selecteall('<?php echo $servnmals['id'];?>');" class="divblog-12">
                    <div class="" data-toggle="buttons">
                      <label class="btn btn-success select Select_btn">
<!-- 
<a href="javascript:;" onclick="selecteall('<?php echo $servnmals['id'];?>');" class="divblog-12">
  <label class="btn btn-success select Select_btn selebtnt-1 "> -->
    <input type="checkbox" name="serviceid[]" value="<?php echo $servnmals['id'];?>" id="option1f" class="idss<?php echo $servnmals['id'];?>"  autocomplete="off" >Select
  </label>
  </div>

  <?php }?>
  <div class="data-tybell">
    <p class="accordio_price">
      <?php if(($offercount >0) or ($servicdiscount >0) or ($offercount1co >0)){?>
      from $<?php echo $totals;?>

      <span style="color: #00B0B9;"> Ahorro de hasta un <?php if($servicdiscount >0){
       echo $servicdis['offer'];}elseif($offercount >0){ echo $offerper;} else {echo $offercount1['offer'];}?>%</span>
       <?php }else{?>
       from $<?php echo $servnmal['sale_price']?>
       <?php }?>
     </p>
     
   </div>
 </div>
</a>



<div class="panel<?php echo $servnmals['id'];?>" id="panelsa<?php  echo $servnmals['id'];?>" style="display: none;">
  <?php
  $spricde=mysqli_query($conn,"select * from service_price_level where salon_id='".$slnm['id']."' and service_id='".$servnmals['id']."' order by id asc");
  while($serpricl=mysqli_fetch_array($spricde)){
                /*$totalpricss=$serpricl['price']*$offerper/100;
                $totalsaa=$serpricl['price']-$totalpricss;*/

                $offercounts=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$servnmals['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1' and FIND_IN_SET('$days', day)"));

                $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$servnmals['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));


                $offerf=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$slnm['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

                $todays=date('Y-m-d');

                $servicdis=mysqli_fetch_array(mysqli_query($conn,"select * from service where id='".$servnmals['id']."' and salon_id='".$slnm['id']."' and offer_status='1'"));

                $servicdiscount=mysqli_num_rows(mysqli_query($conn,"select * from service where id='".$servnmals['id']."' and salon_id='".$slnm['id']."' and offer_status='1'"));

                $offercount1co=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$servnmals['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));



                $offercount1=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$servnmals['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));

                $offercount=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$servnmals['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));


                if($servicdiscount >0){

                  $dis=$serpricl['sale_price']*$servicdis['offer']/100;
                  $totals=$serpricl['sale_price']-$dis;

                }
                elseif($offercount >0){
                  $m='1';
                  $tu='2';
                  $wed='3';
                  $th='4';
                  $fri='5';
                  $st='6';
                  $t=date('d-m-Y');
                  $dayy= date("D",strtotime($t));
                  if($dayy=='Mon'){
                    $daycount=$m;
                  }elseif($dayy=='Tue'){
                    $daycount=$tu;
                  }elseif($dayy=='Wed'){
                    $daycount=$wed;
                  }elseif($dayy=='Thu'){
                    $daycount=$th;
                  }elseif($dayy=='Fri'){
                    $daycount=$fri;
                  }elseif($dayy=='Sat'){
                    $daycount=$st;
                  }
                  $date= date('H:i'); 
              /*echo $date= '11:00'; 
              */
              $mor='12:00';
              $afet='17:00';
              if(($date >=$mor) && ($date <=$afet)){
                $days='2';
              }elseif($date <=$mor){
                $days='1';
              }else{
                $days='3';
              }
              $days;

              $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$servnmals['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));
              $offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$slnm['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

              $prrr=explode(',', $offer['dayweekcount']);
              $ofrd=explode(',', $offer['offer']);
              $day1=$prrr['0'];
              $day2=$prrr['1'];
              $day3=$prrr['2'];
              $day4=$prrr['3'];
              $day5=$prrr['4'];
              $day6=$prrr['5'];
              $offer1=$ofrd['0'];
              $offer2=$ofrd['1'];
              $offer3=$ofrd['2'];
              $offer4=$ofrd['3'];
              $offer5=$ofrd['4'];
              $offer6=$ofrd['5'];
              if($daycount=='1'){
                $offerper=$offer1;
              }elseif($daycount=='2'){
                $offerper=$offer2;
              }elseif($daycount=='3'){
                $offerper=$offer3;
              }elseif($daycount=='4'){
                $offerper=$offer4;
              }elseif($daycount=='5'){
                $offerper=$offer5;
              }elseif($daycount=='6'){
                $offerper=$offer6;
              }
              $totalprice=$serpricl['sale_price']*$offerper/100;
              $totals=$serpricl['sale_price']-$totalprice;
            }elseif($offercount1co >0){

             $totalprice=$serpricl['sale_price']*$offercount1['offer']/100;
             $totals=$serpricl['sale_price']-$totalprice;

           }else{
            $totals=$serpricl['sale_price'];
          }


          ?>
          <div class="set_main_block">
            <div class="left_section">
              <p class="my_timess">
                <span class="closk">
                  <?php echo $serpricl['name_price_vevel'];?></span>
                  <span class="show_detaisl" data-toggle="modal" data-target="#myModalrating"> <?php echo $serpricl['duration'];?></span>
                </p>
              </div>

              <div class="right_section"> 
                <div class="right_bl-left">
                  <p class="accordio_price">
                    <?php if(($offercount >0) or ($servicdiscount >0) or ($offercount1co >0)){?>
                    from $<?php echo $totals;?>
                    <span style="color: #00B0B9;"> Ahorro de hasta un <?php if($servicdiscount >0){
                     echo $servicdis['offer'];}elseif($offercount >0){ echo $offerper;} else {echo $offercount1['offer'];}?>%</span>
                     <?php }else{?>
                     from $<?php echo $serpricl['sale_price'];?><br>
                     from $<del><?php echo $serpricl['price'];?></del>

                     <?php }?>
                   </p>
                 </div>
                 <div class="right_bl-right">
                  <a href="javascript:;" onclick="selecteall('<?php echo $serpricl['id'];?>');">
                    <div class="" data-toggle="buttons">
                      <label class="btn btn-success select Select_btn">
                        <input type="radio" name="serviceidserpricl" value="<?php echo $serpricl['id'];?>" id="option1v" autocomplete="off" class="idsssv<?php echo $serpricl['id'];?>">Select
                      </label>
                    </div>  
                  </a> 
                </div>
              </div>
            </div> 
            <?php }?>
          </div>
        </div>
        <?php }?>
      </div>
    </div>
    <?php $dl=0;}?>
  </div>
</div>
</div>
</div>
</form>
<!-- /all end-->
<!-- hair -->

<?php  $sqliis=mysqli_query($conn,"select * from category");
while($catnma=mysqli_fetch_array($sqliis)){
  ?>
  <div id="menu<?php echo $catnma['id'];?>" class="tab-pane fade">
    <div class="tab_blog_saloon_1">
      <div class="col-sm-4">
        <div class="blog_1_salon_tab">
          <ul class="nav nav-pills mytab">
            <?php  $sqliisb=mysqli_query($conn,"select * from subcategory where category_id='".$catnma['id']."'");

            $dd = 1;
            while($subcatn=mysqli_fetch_array($sqliisb)){

              $sercounts=mysqli_num_rows(mysqli_query($conn,"select * from service where category_id='".$catnma['id']."' and subcategory_id='".$subcatn['id']."' and salon_id='".$_GET['id']."'"));
                if($sercounts >0){
              ?>        
              <li  class="<?php if($dd==1){ echo 'active';} ?>"><a data-toggle="pill" href="#mytab<?php echo $subcatn['id'];?>"><?php echo $subcatn['name'];?>(<?php echo $sercounts;?>)</a></li>
              <?php }

               $dd=0;}?>

            </ul>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="tab-content">
            <!-- -->
            <?php  $sqliisbs=mysqli_query($conn,"select * from subcategory where category_id='".$catnma['id']."'"); 
            $d = 1;

            while($subcatns=mysqli_fetch_array($sqliisbs)){
             ?>  
             <div id="mytab<?php echo $subcatns['id'];?>" class="blog_2_salon_tab tab-pane fade in <?php if($d==1){ echo 'active';} ?>" >
              <div class="accordion-container">
                <?php 
                $sersbs=mysqli_query($conn,"select * from service where category_id='".$catnma['id']."' and subcategory_id='".$subcatns['id']."' and salon_id='".$_GET['id']."'"); 
                while($servnm=mysqli_fetch_array($sersbs)){

                 $spriclavelss=mysqli_fetch_array(mysqli_query($conn,"select * from service_price_level where salon_id='".$slnm['id']."' and service_id='".$servnm['id']."' order by id asc"));

                 $spriclavels=mysqli_num_rows(mysqli_query($conn,"select * from service_price_level where salon_id='".$slnm['id']."' and service_id='".$servnm['id']."' order by id asc"));

                 $offercounts=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$servnm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1' and FIND_IN_SET('$days', day)"));

                 $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$servnm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));


                 $offerf=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$slnm['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

                 $todays=date('Y-m-d');

                 $servicdis=mysqli_fetch_array(mysqli_query($conn,"select * from service where id='".$servnm['id']."' and salon_id='".$slnm['id']."' and offer_status='1'"));

                 $servicdiscount=mysqli_num_rows(mysqli_query($conn,"select * from service where id='".$servnm['id']."' and salon_id='".$slnm['id']."' and offer_status='1'"));

                 $offercount1co=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$servnm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));

                 $offercount=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$servnm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));


                 $offercount1=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$servnm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));



                 if($servicdiscount >0){

                  $dis=$spriclavelss['sale_price']*$servicdis['offer']/100;
                  $totals=$spriclavelss['sale_price']-$dis;

                }
                elseif($offercount >0){
                  $m='1';
                  $tu='2';
                  $wed='3';
                  $th='4';
                  $fri='5';
                  $st='6';
                  $t=date('d-m-Y');
                  $dayy= date("D",strtotime($t));
                  if($dayy=='Mon'){
                    $daycount=$m;
                  }elseif($dayy=='Tue'){
                    $daycount=$tu;
                  }elseif($dayy=='Wed'){
                    $daycount=$wed;
                  }elseif($dayy=='Thu'){
                    $daycount=$th;
                  }elseif($dayy=='Fri'){
                    $daycount=$fri;
                  }elseif($dayy=='Sat'){
                    $daycount=$st;
                  }
                  $date= date('H:i'); 
              /*echo $date= '11:00'; 
              */
              $mor='12:00';
              $afet='17:00';
              if(($date >=$mor) && ($date <=$afet)){
                $days='2';
              }elseif($date <=$mor){
                $days='1';
              }else{
                $days='3';
              }
              $days;

              $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$servnm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));
              $offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$slnm['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

              $prrr=explode(',', $offer['dayweekcount']);
              $ofrd=explode(',', $offer['offer']);
              $day1=$prrr['0'];
              $day2=$prrr['1'];
              $day3=$prrr['2'];
              $day4=$prrr['3'];
              $day5=$prrr['4'];
              $day6=$prrr['5'];
              $offer1=$ofrd['0'];
              $offer2=$ofrd['1'];
              $offer3=$ofrd['2'];
              $offer4=$ofrd['3'];
              $offer5=$ofrd['4'];
              $offer6=$ofrd['5'];
              if($daycount=='1'){
                $offerper=$offer1;
              }elseif($daycount=='2'){
                $offerper=$offer2;
              }elseif($daycount=='3'){
                $offerper=$offer3;
              }elseif($daycount=='4'){
                $offerper=$offer4;
              }elseif($daycount=='5'){
                $offerper=$offer5;
              }elseif($daycount=='6'){
                $offerper=$offer6;
              }
              $totalprice=$spriclavelss['sale_price']*$offerper/100;
              $totals=$spriclavelss['sale_price']-$totalprice;
            }elseif($offercount1co >0){

             $totalprice=$spriclavelss['sale_price']*$offercount1['offer']/100;
             $totals=$spriclavelss['sale_price']-$totalprice;

           }else{

            $totals=$spriclavelss['sale_price'];
          }

          ?>

          <div class="set">
            <div class="mynewcallss">
              
             <div class="data-tybell">
               
               <?php echo $servnm['name'];?>
               <p><?php echo $spriclavelss['duration'];?>- <?php echo $spriclavelss['duration'];?><span style="color: #001151;">Show Details</span></p>
             </div>

             <?php if($spriclavels >1){?>

             <a href="javascript:;"  id="right-kci" class="click11<?php echo $sernm['id'];?>" onclick="togllesbar('panels<?php  echo $sernm['id'];?>')">
              <i class="fa fa-angle-down"></i>
            </a>

            <?php }else{?>
            &nbsp;
            <a href="javascript:;" class="divblog-12">
              <label class="btn btn-success select Select_btn selebtnt-1">
                <input type="checkbox" name="serviceid[]" value="<?php echo $sernm['id'];?>" id="option1dd" autocomplete="off" >Select
              </label>
<!--    <button class="Select_btn" style="float: right; width: 12%;">Select</button>
-->
<?php }?>
<div class="data-tybell">

 <p class="accordio_price">

  <?php if(($offercounts >0) or ($servicdiscount>0) or ($offercount>0)){?>
  from £<?php echo $totals;?>
  <span style="color: #00B0B9;"> Ahorro de hasta un <?php if($servicdiscount >0){
   echo $servicdis['offer'];}elseif($offercount >0){ echo $offerper;} else {echo $offercount1['offer'];}?>%</span>

 </span>
 <?php }else{?>
 from £<?php echo $spriclavelss['sale_price']?>
 <?php }?>
</p>
</div>
</div>

</a>
<div class="panel<?php echo $sernm['id'];?>" id="panels<?php  echo $sernm['id'];?>" style="display: none;">
  <?php
  $spricde=mysqli_query($conn,"select * from service_price_level where salon_id='".$slnm['id']."' and service_id='".$servnm['id']."' order by id asc");
  while($serpricl=mysqli_fetch_array($spricde)){
                /*$totalpricss=$serpricl['price']*$offerper/100;
                $totalsaa=$serpricl['price']-$totalpricss;*/

                $offercounts=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$servnm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1' and FIND_IN_SET('$days', day)"));

                $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$servnm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));


                $offerf=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$slnm['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

                $todays=date('Y-m-d');

                $servicdis=mysqli_fetch_array(mysqli_query($conn,"select * from service where id='".$servnm['id']."' and salon_id='".$slnm['id']."' and offer_status='1'"));

                $servicdiscount=mysqli_num_rows(mysqli_query($conn,"select * from service where id='".$servnm['id']."' and salon_id='".$slnm['id']."' and offer_status='1'"));

                $offercount1co=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$servnm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));



                $offercount1=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$servnm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));

                $offercount=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$servnm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));


                if($servicdiscount >0){

                  $dis=$serpricl['sale_price']*$servicdis['offer']/100;
                  $totals=$serpricl['sale_price']-$dis;

                }
                elseif($offercount >0){
                  $m='1';
                  $tu='2';
                  $wed='3';
                  $th='4';
                  $fri='5';
                  $st='6';
                  $t=date('d-m-Y');
                  $dayy= date("D",strtotime($t));
                  if($dayy=='Mon'){
                    $daycount=$m;
                  }elseif($dayy=='Tue'){
                    $daycount=$tu;
                  }elseif($dayy=='Wed'){
                    $daycount=$wed;
                  }elseif($dayy=='Thu'){
                    $daycount=$th;
                  }elseif($dayy=='Fri'){
                    $daycount=$fri;
                  }elseif($dayy=='Sat'){
                    $daycount=$st;
                  }
                  $date= date('H:i'); 
              /*echo $date= '11:00'; 
              */
              $mor='12:00';
              $afet='17:00';
              if(($date >=$mor) && ($date <=$afet)){
                $days='2';
              }elseif($date <=$mor){
                $days='1';
              }else{
                $days='3';
              }
              $days;

              $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$servnm['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));
              $offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$slnm['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

              $prrr=explode(',', $offer['dayweekcount']);
              $ofrd=explode(',', $offer['offer']);
              $day1=$prrr['0'];
              $day2=$prrr['1'];
              $day3=$prrr['2'];
              $day4=$prrr['3'];
              $day5=$prrr['4'];
              $day6=$prrr['5'];
              $offer1=$ofrd['0'];
              $offer2=$ofrd['1'];
              $offer3=$ofrd['2'];
              $offer4=$ofrd['3'];
              $offer5=$ofrd['4'];
              $offer6=$ofrd['5'];
              if($daycount=='1'){
                $offerper=$offer1;
              }elseif($daycount=='2'){
                $offerper=$offer2;
              }elseif($daycount=='3'){
                $offerper=$offer3;
              }elseif($daycount=='4'){
                $offerper=$offer4;
              }elseif($daycount=='5'){
                $offerper=$offer5;
              }elseif($daycount=='6'){
                $offerper=$offer6;
              }
              $totalprice=$serpricl['sale_price']*$offerper/100;
              $totals=$serpricl['sale_price']-$totalprice;
            }elseif($offercount1co >0){

             $totalprice=$serpricl['sale_price']*$offercount1['offer']/100;
             $totals=$serpricl['sale_price']-$totalprice;

           }else{
            $totals=$serpricl['sale_price'];
          }


          ?>
          <div class="set_main_block">
            <div class="left_section">
              <p class="my_timess">
                <span class="closk">
                  <?php echo $serpricl['name_price_vevel'];?></span>
                  <span class="show_detaisl" data-toggle="modal" data-target="#myModalrating"> <?php echo $serpricl['duration'];?></span>
                </p>
              </div>

              <div class="right_section"> 
                <div class="right_bl-left">
                  <p class="accordio_price">
                    <?php if(($offercount >0) or ($servicdiscount >0) or ($offercount1co >0)){?>
                    from $<?php echo $totals;?>
                    <span style="color: #00B0B9;"> Ahorro de hasta un <?php if($servicdiscount >0){
                     echo $servicdis['offer'];}elseif($offercount >0){ echo $offerper;} else {echo $offercount1['offer'];}?>%</span>
                     <?php }else{?>
                     from $<?php echo $serpricl['sale_price'];?><br>
                     from $<del><?php echo $serpricl['price'];?></del>

                     <?php }?>
                   </p>
                 </div>
                 <div class="right_bl-right">
                  <a href="javascript:;" onclick="selecteall('<?php echo $serpricl['id'];?>');">
                    <div class="" data-toggle="buttons">
                      <label class="btn btn-success select Select_btn">
                        <input type="radio" name="serviceidserpricl" value="<?php echo $serpricl['id'];?>" id="option1v" autocomplete="off" class="idsssv<?php echo $serpricl['id'];?>">Select
                      </label>
                    </div>  
                  </a> 
                </div>
              </div>
            </div> 
            <?php }?>
          </div>
        </div>

        <?php }?>
      </div>
    </div>
    <?php $d=0;}?>

  </div>
</div>
</div>
</div>
<?php }?>
</div>
</div>
</div>
<?php

$sfdx=mysqli_query($conn,"select * from feedback where salon_id='".$_GET['id']."' order by id desc");
$reviews='';
$staff='';
$clean='';
$ambience='';
while($feednms=mysqli_fetch_array($sfdx)){

  $reviews += $feednms['rating'];
  $staff += $feednms['staff'];

  $clean += $feednms['cleanliness'];

  $ambience += $feednms['ambience'];


}
$coounts=mysqli_num_rows(mysqli_query($conn,"select * from feedback where salon_id='".$_GET['id']."' and rating!=''"));
$value=$reviews/$coounts;

$staffcount=mysqli_num_rows(mysqli_query($conn,"select * from feedback where salon_id='".$_GET['id']."' and staff!=''"));

$stafftota=$staff/$staffcount;


$cleancount=mysqli_num_rows(mysqli_query($conn,"select * from feedback where salon_id='".$_GET['id']."' and cleanliness!=''"));

$cleantotal=$clean/$cleancount;

$ambiencecount=mysqli_num_rows(mysqli_query($conn,"select * from feedback where salon_id='".$_GET['id']."' and ambience!=''"));

$ambiencetcount=$ambience/$ambiencecount;


?>

<div class="section_5" id="reviews_block">

  <div class="container">

    <h5 class="title_p">VENUE REVIEWS</h5>

    <div class="rating_container">

      <div class="col-sm-4">

       <div class="top_rating_div">

        <div class="rating_blog1">

          5.0

        </div>

        <div class="rating_blog2">

         <ul class="star_list">

          <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

          <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

          <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

          <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

          <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

        </ul>

        <span><?php echo $totalcounts;?> Opiniones</span>

      </div>

    </div>

  </div>


  <div class="col-sm-4 padder">

    <div class="top_rating_blog2 "> 

      <div class="rating_upblog border_bottom">

        <span>Ambiente</span>

        <ul class="star_list2">


         <li><a href="" style="color: #CCBB66;"><?php 

          $abitin=explode('.',$ambiencetcount);


          $abitin1=$abitin[0];

          $abitin2=$abitin[1];

          for($i=0;$i<$abitin1; $i++){


            echo '<i class="fa fa-star" style="color:#CCBB66;font-size:16px;padding: 7px;"></i>';

          }    
          if($abitin2!=''){
            echo '<i class="fa fa-star-half-o" aria-hidden="true"  style="color:#CCBB66;font-size:16px;padding: 7px;"></i>&nbsp;';
          } ?>

        </a></li>

      </ul>

    </div>

    <div class="rating_upblog ">

      <span>Limpieza</span>

      <ul class="star_list2">

       <li><a href="" style="color: #CCBB66;"><?php 

        $cleann=explode('.',$cleantotal);

        $cleann1=$cleann[0];

        $cleann2=$cleann[1];

        for($i=0;$i<$cleann1; $i++){


          echo '<i class="fa fa-star" style="color:#CCBB66;font-size:16px;padding: 7px;"></i>';

        }    
        if($cleann2!=''){
          echo '<i class="fa fa-star-half-o" aria-hidden="true"  style="color:#CCBB66;font-size:16px;padding: 7px;"></i>&nbsp;';
        } ?>

      </a></li>
    </ul>

  </div>

</div>

</div>

<div class="col-sm-4">

  <div class="top_rating_blog2 "> 

    <div class="rating_upblog border_bottom">

      <span>Personal</span>

      <ul class="star_list2">

        <li><a href="" style="color: #CCBB66;"><?php 

          $stff=explode('.',$stafftota);

          $stff1=$stff[0];

          $stff12=$stff[1];

          for($i=0;$i<$stff1; $i++){


            echo '<i class="fa fa-star" style="color:#CCBB66;font-size:16px;padding: 7px;"></i>';

          }    
          if($stff12!=''){
            echo '<i class="fa fa-star-half-o" aria-hidden="true"  style="color:#CCBB66;font-size:16px;padding: 7px;"></i>&nbsp;';
          } ?>

        </a></li>

      </ul>

    </div>

    <div class="rating_upblog ">

      <span>Calidad-Precio</span>

      <ul class="star_list2">

        <li><a href="" style="color: #CCBB66;">

          <?php 

          $userddc=explode('.',$value);

          $seekerdidd=$userddc[0];

          $schedid1=$userddc[1];

          for($i=0;$i<$seekerdidd; $i++){


            echo '<i class="fa fa-star" style="color:#CCBB66;font-size:16px;padding: 7px;"></i>';

          }    
          if($schedid1!=''){
            echo '<i class="fa fa-star-half-o" aria-hidden="true"  style="color:#CCBB66;font-size:16px;padding: 7px;"></i>&nbsp;';
          } ?>


        </a></li>

      </ul>

    </div>

  </div>

</div>

</div>

<div class="col-sm-12 padder">

  <div class="star_rating_blog_2">

    <div class="col-sm-4">

      <div class="filter_rating_blog">
        <form method="post" id="searchjobseeker"> 

          <div class="flilyet_rating_blog_2">

    <!--       <p>Filter by treatment</p>

          <div class="form-group">

            <select class="form-control" name="service">

              <option value="">All Treatment</option>

              <?php $sqliii=mysqli_query($conn,"select * from service where salon_id ='".$_GET['id']."'");

              while($serv=mysqli_fetch_array($sqliii)){?>

              <option value="<?php echo $serv['id'];?>"><?php echo $serv['name'];?></option>
<?php }?>
            </select>

          </div> -->

          <p>Filter by rating</p>

          <ul class="star_rating_list">

            <li>

              <a href="">

                <input type="checkbox" name="rating[]" value="5">

                <ul class="stare_list">

                  <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

                </ul>

                <div class="progress myprogress">

                  <div class="progress-bar" role="progressbar " aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">



                  </div>

                </div>

                <span>24</span>

              </a>

            </li>


            <li>

              <a href="">

                <input type="checkbox" name="rating[]" value="4">

                <ul class="stare_list">

                  <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #DCDCDF;"><i class="fa fa-star"></i></a></li>

                </ul>

                <div class="progress myprogress">

                  <div class="progress-bar" role="progressbar " aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:0%">

                  </div>

                </div>

                <span>0</span>

              </a>

            </li>


            <li>

              <a href="">

                <input type="checkbox" name="rating[]" value="3">

                <ul class="stare_list">

                  <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #DCDCDF;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #DCDCDF;"><i class="fa fa-star"></i></a></li>

                </ul>

                <div class="progress myprogress">

                  <div class="progress-bar" role="progressbar " aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:0%">



                  </div>

                </div>

                <span>0</span>

              </a>

            </li>

            <li>

              <a href="">

                <input type="checkbox" name="rating[]" value="2">

                <ul class="stare_list">

                  <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #DCDCDF;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #DCDCDF;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #DCDCDF;"><i class="fa fa-star"></i></a></li>

                </ul>

                <div class="progress myprogress">

                  <div class="progress-bar" role="progressbar " aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:0%">


                  </div>

                </div>

                <span>0</span>

              </a>

            </li>

            <li>

              <a href="">

                <input type="checkbox" name="rating[]" value="1">

                <ul class="stare_list">

                  <li><a href="" style="color: #CCBB66;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #DCDCDF;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #DCDCDF;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #DCDCDF;"><i class="fa fa-star"></i></a></li>

                  <li><a href="" style="color: #DCDCDF;"><i class="fa fa-star"></i></a></li>

                </ul>

                <div class="progress myprogress">

                  <div class="progress-bar" role="progressbar " aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                  </div>

                </div>

                <span>0</span>

              </a>

            </li>

          </ul>

        </div>

        <input type="hidden" name="slnid" value="<?php echo $_GET['id'];?>">
      </form>

    </div>

  </div>

  <div class="col-sm-8">

    <div class="review_blog" id="getfeedback">


      <?php $sfd=mysqli_query($conn,"select * from feedback where salon_id='".$_GET['id']."' order by id desc");

      while($feednm=mysqli_fetch_array($sfd)){
        $user=mysqli_fetch_array(mysqli_query($conn,"select * from users where id='".$feednm['user_id']."'"));

/*$totalrating=$feednm['rating']+$feednm['ambience']+$feednm['staff']+$feednm['cleanliness']/4;
*/
$totalrating=$feednm['rating']+$feednm['ambience']+$feednm['staff']+$feednm['cleanliness'];


$time1a = $feednm['strtotime'];


$time2a =strtotime('now');


$diffdhg = $time2a-$time1a;
date("d H:i:s",$diffdhg);
$days = $diffdhg / 86400;
$day_explode = explode(".", $days);
$d = $day_explode[0];


$hours = '.'.$day_explode[1].'';
$hour = $hours * 24;
$hourr = explode(".", $hour);
$h = $hourr[0];

$minute = '.'.$hourr[1].'';
$minutes = $minute * 60;
$minute = explode(".", $minutes);
$m = $minute[0];

$seconds = '.'.$minute[1].'';
$second = $seconds * 60;
$s = round($second);



if($h==1){

  $hr=$h.' hour';
}

else{

  $hr=$h.' hours';

}





$hour =$da *24+$ha;

$day =$d;

$month =$d/30;

$week =$d/7;
$weeks =round($week, 1);


if($weeks==1){

  $weeksdss=$weeks.' Week';
}

else{

  $weeksdss=$weeks.' Weeks';

}


if($day==1){

  $dayd=$day.' day';
}

else{

  $dayd=$day.' days';

}





$monthd =round($month, 1);

if($day >='30'){

  $duratingD=$monthd.' Months';

}

else if($day >= '7'){

  $duratingD=$weeksdss;

}


else if($day > '0'){
  $duratingD=$dayd;

}



else if($h > '0'){
  $duratingD=$hr;

}





else{

  $duratingD=$m.' Min';

}
?>

<div class="review_1 border_bottom">

 <ul class="stare_list pull-unset star_list2">

  <li class="pull-unset" style="color: #CCBB66;"><a href="" style="color: #CCBB66;">

    <?php 
    $total= $totalrating/4;

    $userdd=explode('.',$total);



    $seekerdid=$userdd[0];

    $schedid=$userdd[1];

    for($i=0;$i<$seekerdid; $i++){


      echo '<i class="fa fa-star" style="color:#CCBB66;font-size:16px;padding: 7px;"></i>';

    }    
    if($schedid!=''){
      echo '<i class="fa fa-star-half-o" aria-hidden="true"  style="color:#CCBB66;font-size:16px;padding: 7px;"></i>&nbsp;';
    }

    ?>

  </a> </li>

</ul>

<p class="review_para"><?php echo $feednm['feedback'];?></p>

<p>

  <span><?php echo $user['first_name'].' '.$user['last_name'];?></span>

  <span style="color: #B3B3B3;"> <i class="fa fa-check-circle-o"></i> <?php echo $duratingD;?> ago</span>

  <span style="color: #D9D9D9;">Report</span>                   

</p>
</div>
<?php }?>


</div>

</div>

</div>

</div>

</div>

</div>


<div class="section_6" id="about_block">

  <div class="container">

   <h5 class="title_p">ABOUT</h5>

   <div class="map_blog">

    <div class="col-sm-8 padder">

      <div class="map">

        <div id="map" style="width: 100%; height: 400px;"></div>


      </div>

    </div>

    <div class="col-sm-4">

      <div class="addre_map_blog">

        <div class="icon_div">

          <i class="fa fa-map-marker"></i>

        </div>

        <div class="address_content">

         <p><b><?php echo $slnm['business_name'];?></b><br>

          <?php echo $slnm['adress'];?><br>

          <?php echo $dist['name'];?><br>


        </p>

      </div>

    </div>


  </div>

</div>

</form>

<div class="contetn_map">

  <div class="col-sm-8 padder">

    <div class="map_content_div">

      <p>Welcome to your new one-stop hair and beauty shop. Wandworth's All About You Hair & Beauty features hair restyling, nails, waxing and skincare performed in a bright, modern environment.</p>

      <p>Take your pick from a full Wella Bar of colours (completely free from PPDs), both Olaplex and L'Oreal's Smartbond in advanced colour conditioning as well as cuts and blow drys for any style.</p>

      <p>In for a beauty treatment? Expect a choice of OPI gel and classic polishes, with pedicures performed in relaxing massage chairs, express waxing, massages and semi-permanent lashes.</p>

      <p>Don't miss their skincare menu either, which boasts an impressive selection from Janssen Cosmetics with luxury add-ons like high-frequency skin firming and ultrasonic skin scrubbing.</p>

      <p>Situated less than a 10-minute walk from Stockwell tube station, All About You is family friendly and has complete accessibility for wheelchairs and prams.</p>



    </div>

  </div>

  <div class="col-sm-4">

    <div class="accordion_content">

      <ul>

        <li>

          <span style="color: #3BA150; width: 25px;"><i class="fa fa-circle"></i></span>

          <span>Monday</span>

          <span>10:00 AM - 7:00 PM</span>

        </li>

        <li>

          <span style="color: #3BA150; width: 25px;"><i class="fa fa-circle"></i></span>

          <span>Tuesday</span>

          <span>10:00 AM - 7:00 PM</span>

        </li>

        <li>

          <span style="color: #3BA150; width: 25px;"><i class="fa fa-circle"></i></span>

          <span><b>Wednesday</b></span>

          <span><b>10:00 AM - 9:00 PM</b></span>

        </li>

        <li>

          <span style="color: #3BA150; width: 25px;"><i class="fa fa-circle"></i></span>

          <span>Thursday</span>

          <span>10:00 AM - 9:00 PM</span>

        </li>

        <li>

          <span style="color: #3BA150; width: 25px;"><i class="fa fa-circle"></i></span>

          <span>Friday</span>

          <span>10:00 AM - 9:00 PM</span>

        </li>

        <li>

          <span style="color: #3BA150; width: 25px;"><i class="fa fa-circle"></i></span>

          <span>Saturday</span>

          <span>10:00 AM - 7:00 PM</span>

        </li>

        <li>

          <span style="color: #3BA150; width: 25px;"><i class="fa fa-circle"></i></span>

          <span>Sunday</span>

          <span>10:00 AM - 7:00 PM</span>

        </li>

      </ul>


    </div>

  </div>

</div>

</div>

</div>


<script type="text/javascript">

	$(document).ready(function(){

    $('.customer-logos').slick({

      slidesToShow: 2,

      slidesToScroll: 1,

      autoplay: false,

      autoplaySpeed: 5000,

      arrows: true,

      draggable: false,

      dots: false,

      pauseOnHover: false,

      responsive: [{

        breakpoint: 768,

        settings: {

          slidesToShow: 1

        }

      }, {

        breakpoint: 520,

        settings: {

          slidesToShow: 1

        }

      }]

    });

  });




</script>



<?php include ('footer.php');?>


<script type="text/javascript">
  function selecteall(id){
 //  alert(id);
 setInterval(function(){
  $('form#loginform1').submit();

 selectedserv(id);


}, 1000);


}

function selectedserv(id) {


   /*if (!$("#option1"+id).is(':checked')) {

  $('.idss'+id).prop('checked', true); // Checks it

}else{
  $('.idss'+id).prop('checked', false); // Checks it
  

}

*/

/*if (!$("#option1s").is(':checked')) {

  $('.idsss'+id).prop('checked', false); // Checks it

  
}else{
  $('.idsss'+id).prop('checked', true); // Checks it
  

}


if (!$("#option1v").is(':checked')) {

  $('.idssv'+id).prop('checked', false); // Checks it

  
}else{
  $('.idssv'+id).prop('checked', true); // Checks it
  

}

*/

if (!$("#option1").is(':checked')) {

  $('.idss'+id).prop('checked', true); // Checks it

  
}else{
  $('.idss'+id).prop('checked', false); // Checks it
  
//alert();
}



}


$(document).ready(function (loginabc41) {

 $("#loginform1").on('submit',(function(loginabc41) {
    //alert();
    loginabc41.preventDefault();
    $.ajax({
     url: "php/selectservice.php",
     type: "POST",
     data:  new FormData(this),
     contentType: false,
     cache: false,
     processData:false,
     success: function(data){
//alert(data);
       $("#gdfgdf").show(data);

       $("#totalksprices").html(data);
  //alert(data);



},
error: function(){}          
});

  }));
});

</script>

<style type="text/css">

  body {
    scroll-behavior: smooth;
  }
  
</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4mlo-kY0vyBDIdeXffR2igqE5igx3piE">
</script>

<script type="text/javascript">
  $(document).ready(function(){
    getLocation();
  })

  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      x.innerHTML = "Geolocation is not supported by this browser.";
    }
  }

  function showPosition(position) {
    var clatt = position.coords.latitude;
    var clongi = position.coords.longitude; 



    var locations = [
    <?php 
    
    $saln=mysqli_fetch_array(mysqli_query($conn,"select * from users where id='".$_GET['id']."'"));
    if($saln['latitude']!=""){
      ?>

      ['<?php echo mysqli_real_escape_string($conn,$saln['adress']);?>', <?php echo $saln['latitude'];?>, <?php echo $saln['longitude'];?>, 1],


      <?php }?>
      ];
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(clatt, clongi),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });

      var infowindow = new google.maps.InfoWindow();

      var marker, i;

      for (i = 0; i < locations.length; i++) {  
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][1], locations[i][2]),
          map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);
          }
        })(marker, i));
      }





      var locations1 = [


      ['My Location', clatt, clongi, 1],
      ];


      var marker1;
      for (i = 0; i < locations1.length; i++) {  
        marker1 = new google.maps.Marker({
          icon: {
            path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
            strokeColor: "green",
            scale: 3
          },
          position: new google.maps.LatLng(locations1[i][1], locations1[i][2]),
          map: map
        });



        google.maps.event.addListener(marker1, 'click', (function(marker1, i) {
          return function() {
            infowindow.setContent(locations1[i][0]);
            infowindow.open(map, marker1);
          }
        })(marker1, i));
      }

    }



    $('input').bind('keyup', function() 
    { 
      $('#searchjobseeker').delay(500).submit();
    });
    $('input[type="checkbox"]').bind('change', function() 
    { 
      $('#searchjobseeker').delay(500).submit();
    });
    $('select').bind('change', function() 
    { 
      $('#searchjobseeker').delay(500).submit();
    });
    
    $("#searchjobseeker").submit(function (event) {
      event.preventDefault();
  //  alert();
  $.ajax({
    type: "post",
    url: 'php/search_feedback.php',
    data: $("#searchjobseeker").serialize(),
    success: function (response) 
    {
            //alert(response);
            $("#getfeedback").html(response);   
          }
        });
});
</script>

<script type="text/javascript">
  function togllesbar(id){
    $('#'+id).toggle();
  }


  function togllesbar1(id){
    $('#'+id).toggle();
  }

</script>


<style type="text/css">
  .cmlccc1 {
    margin-top: 4px;
    font-size: 14px;
    line-height: 17px;
    color: #00a5ad;
  }
  .cmlccc-block {
    display: block;
    /* width: 100%; */
    /* overflow: hidden; */
    /* padding: 10px 0; */
    min-width: 200px;
    text-align: right;
    margin-top: -25px;
  }

  .slick-slide img {
    width: 100%;
    height: 100%;
  }
</style>   







