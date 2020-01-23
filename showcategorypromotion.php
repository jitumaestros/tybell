<?php include('common/config.php'); 
extract($_POST);       
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$details->city;
$city = $details->city;

    #Find latitude and longitude

$url = "http://maps.googleapis.com/maps/api/geocode/json?address=$city";
$json_data = file_get_contents($url);
$result = json_decode($json_data, TRUE);
$latitude = $result['results'][0]['geometry']['location']['lat'];
$longitude = $result['results'][0]['geometry']['location']['lng']; 
$new_arr[]= unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));

$latitude =  $new_arr[0]['geoplugin_latitude'];  $longitude = $new_arr[0]['geoplugin_longitude'];



function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
    return ($miles * 0.8684);
  } else {
    return $miles;
  }
}



$return_arr = array();  

$sqliii=mysqli_query($conn,"select * from users where role='2' ");

while($slnA=mysqli_fetch_array($sqliii)){

  array_push($return_arr, $slnA);
}

foreach ($return_arr as $key => $value) {

  $value['latitude'].'<br>';
  if($value['latitude']!=''){
    $return_arr[$key]['dis'] = distance($latitude, $longitude, $value['latitude'], $value['longitude'], "K");
  }else{
    $return_arr[$key]['dis'] = 100000;
  }
}


foreach ($return_arr as $key => $slnw) {

  $ratingds = mysqli_fetch_array(mysqli_query($conn,"SELECT  AVG(rating) as rating FROM `feedback` WHERE `salon_id`='".$slnw['id']."' ")); 
  $reviews= (float)$ratingds['rating'].'';

  $volume[$key]  = $reviews;

}

array_multisort($volume, SORT_DESC,  $return_arr);

foreach ($return_arr as $key => $value) {

}


foreach($return_arr as $key => $sln) {
  $dist= distance($latitude, $longitude, $sln['latitude'], $sln['longitude'], "K");


  $rating = mysqli_fetch_array(mysqli_query($conn,"SELECT  AVG(rating) as rating FROM `feedback` WHERE `salon_id`='".$sln['id']."' "));

  $reviews= (float)$rating['rating'].''; 

  $countsr = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `feedback` WHERE `salon_id`='".$sln['id']."'  "));

  ?>
  <div class="salon_wrapper">

    <div class="padding">

      <div class="col-sm-5">

        <div class="left_slider_div">

          <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->

            <ol class="carousel-indicators">

              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

              <li data-target="#myCarousel" data-slide-to="1"></li>

              <li data-target="#myCarousel" data-slide-to="2"></li>

            </ol>



            <div class="carousel-inner">

              <div class="item active">

                <img src="image/<?php echo $sln['salon_pic'];?>" alt="Los Angeles" style="width:100%;">

              </div>


            </div>

            <!-- Left and right controls -->

            <a class="left carousel-control" href="#myCarousel" data-slide="prev">

              <i class="fa fa-angle-left"></i>

              <span class="sr-only">Previous</span>

            </a>

            <a class="right carousel-control" href="#myCarousel" data-slide="next">

              <i class="fa fa-angle-right"></i>

              <span class="sr-only">Next</span>

            </a>

          </div>        



        </div>

      </div>

      <div class="col-sm-7">

        <div class="right_side_salon">

          <div class="saloon_deatail">

            <h3><?php echo $sln['business_name'];?></h3>

            <div class="rating"> <?php if($countsr==0){}else{
              echo round($reviews,'1');echo "&nbsp;";

              $userdd=explode('.',$reviews);



              $seekerdid=$userdd[0];

              $schedid=$userdd[1];

              for($i=0;$i<$seekerdid; $i++){


                echo '<i class="fa fa-star" style="color:gold;font-size:16px"></i>';

              }    
              if($schedid!=''){
                echo '<i class="fa fa-star-half-o" aria-hidden="true"  style="color:gold;font-size:16px"></i>&nbsp;';
              }
            }?>

            <?php echo "&nbsp;"; echo $countsr;?> opiniones

          </span>

        </div>

        <p><b><?php echo $sln['adress'];?></b></p>
        <P><b><?php echo round($sln['dis']);?> KM</b></P>
        <p style="color: #171E62;"><a href="https://www.google.com/maps/place/<?php echo $sln['adress'];?>"><img src="img/map.svg"><b> Mostrar en el mapa</b></a></p>

        <p style="color: #02B0B9;"><img src="img/off.svg"> <b> Horas especiales</b></p>



      </div>

    </div>

  </div>

</div>

<div class="sallon_detail_blog2">

  <div class="blog2_salon">
    <?php $srev=mysqli_query($conn,"select * from service where salon_id='".$sln['id']."' and  category_id='$id'");
    $r=rand();
    while($sernm=mysqli_fetch_array($srev)){
     
      $offercount=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$sln['id']."' and status='0'"));

      $offer=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$sernm['id']."' and salon_id='".$sln['id']."' and status='0'"));

      $totalprice=$sernm['price']*$offer['offer']/100;

      $totals=$sernm['price']-$totalprice;

      ?>
      <div class="BrowseResultService--container--ec64db BrowseResultService--alternateRowStyle--52772e ">

        <div class="BrowseResultService--infoContainer--1981fe">

          <div class="BrowseResultService--name--bd91c5"><?php echo $sernm['name'];?></div>

          <div class="BrowseResultService--duration--42af9e"><?php echo $sernm['time'];?>

          </div>

        </div>

        <div class="BrowseResultService--priceContainer--3179f3">

          <div class="BrowseResultService--priceLabel--d05016 cmlccc-block">

            <span class="BrowseResultService--priceAffix--fe6300 cmlccc">desde<!-- -->&nbsp; $<?php echo $totals;?></span>

            <span class="BrowseResultService--price--e36420 cmlccc1">  
             <?php if($offercount>0) { ?>

             Ahorro de hasta un <?php echo $offer['offer'];?>% <?php }?></span>


           </div>


         </div>

       </div>
       <?php }?>


       <div class="my_first_accordion">

        <div class="heading " id="heading1" onclick="togless('accordio1<?php echo $r;?>')">

          <h4 style="color: #FF5C39;">Vista previa de los detalles del salón <span class="pull-right font-size" style="color: #FF5C39;"><i class="fa fa-angle-down"></i></span></h4>

        </div>

        <div class="heading " id="heading2" onclick="togless('accordio1<?php echo $r;?>')" style="display: none;">

          <h4 style="color: #FF5C39;">Cerrar <span class="pull-right font-size" style="color: #FF5C39;"><i class="fa fa-angle-up"></i></span></h4>

        </div>

        <div class="accordtion_data" id="accordio1<?php echo $r;?>" style="display: none;">                     

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



            <p><?php echo $sln['salon_desc'];?></p>



            <a href="saloon_details.php?id=<?php echo $sln['id'];?>"><input type="button" class="go_btn" value="Ir al centro" name=""></a>

            

          </div>

        </div>

      </div>

    </div>

  </div>



</div>
<?php } ?>