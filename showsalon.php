<?php include('header.php');
/*$exper=mysqli_query($conn,"select * from users where role='2' and district='".$_GET['adress']."'");
*/

?>


<div class="filter_salon_warrper">
   <div class="">
      <div class="filter_blog">
         <div class="col-sm-6 padder">
            <div class="show_salon_div" id="showexpertss"><br>
      <?php 

     $val=$_GET['adress'];
        $latitude = $_GET['lat'];
        $longitude = $_GET['long'];

        $return_arr = array();

                 $sqliii=mysqli_query($conn,"select * from users where role='2' and district='".$_GET['adress']."' ");


        while($slnA=mysqli_fetch_array($sqliii)){


          array_push($return_arr, $slnA);
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


          $rating = mysqli_fetch_array(mysqli_query($conn,"SELECT  AVG(rating) as rating FROM `feedback` WHERE `salon_id`='".$sln['id']."' "));

          $reviews= (float)$rating['rating'].''; 

          $countsr = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `feedback` WHERE `salon_id`='".$sln['id']."'  "));

    $img=explode(',',$sln['salon_pic']);

 ?>
            <div class="salon_wrapper salon_wrapper_2" style="    height: 322px;">
                 
                  <div class="">
                     <div class="">
                        <div class="left_slider_div">
                           <div id="myCarousel" class="carousel slide" data-ride="carousel">
                              <!-- Indicators -->
                              <ol class="carousel-indicators">
                                 <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                 <li data-target="#myCarousel" data-slide-to="1"></li>
                                 <li data-target="#myCarousel" data-slide-to="2"></li>
                              </ol>
                              <!-- Wrapper for slides -->
                            <a href="saloon_details.php?id=<?php echo $sln['id'];?>&category=<?php echo $_GET['category'];?>&service=<?php echo $_GET['service'];?>" target="_blank">
                              <div class="carousel-inner">
                                 <div class="item active">
                                    <img src="image/<?php echo $img['0'];?>" alt="Los Angeles" style="width:100%;height: 175px;">
                                 </div>
                              </div>

                              </a>
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
                     <div class="col-sm-12">
                        <div class="right_side_salon">
                  
                           <div class="saloon_deatail">
                           <a href="saloon_details.php?id=<?php echo $sln['id'];?>&category=<?php echo $_GET['category'];?>&service=<?php echo $_GET['service'];?>" target="_blank">
                              <h3><?php echo $sln['business_name'];?></h3>
                              <div class="rating">
                               <?php if($countsr==0){}else{
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
                              </div>

                              <p><b><?php echo $sln['adress'];?></b></p>
                             </a>
                           </div>
                         
                        </div>
                     </div>
                  </div>


               </div>

                 <?php }?>
            </div> 
         </div>

         <div class="col-sm-6 padder">


<div id="map" style="    width: 100%;
    height: 82vh;"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4mlo-kY0vyBDIdeXffR2igqE5igx3piE&callback=initMap"
    async defer></script>
         </div>

      </div>
   </div>
</div>



<!-- 


<div id="map" style="    width: 100%;
    height: 400px;"></div> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4mlo-kY0vyBDIdeXffR2igqE5igx3piE&callback=initMap"
    async defer></script> -->

 <script>
      $(document).ready(function(){

getLocation();

})


function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        //navigator.geolocation.getCurrentPosition(initMap);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

                
function showPosition(position) {


    var clatt = position.coords.latitude;
    var clongi = position.coords.longitude; 


  var iconBase = 'image/location.png';

        var icn = {

          scaledSize: new google.maps.Size(25, 35),
        }

        var icn =[
         <?php 
$expersds=mysqli_query($conn,"select * from users where role='2' and district='".$_GET['adress']."'");

 while($rowda = mysqli_fetch_array($expersds)){

 	if($rowda['latitude']!=""){ ?>
 		
   ['<?php echo $baseurl;?>img/orange.png'],
   
<?php } }?>


   ];

   var labels =[
           <?php 
$xxx=mysqli_query($conn,"select * from users where role='2' and district='".$_GET['adress']."'");

 while($rowdaa = mysqli_fetch_array($xxx)){

 	if($rowdaa['latitude']!=""){ ?>

   ['<?php echo $rowdaa['business_name'];?>'],
  <?php } }?>
   
   ];
  

    var locations = [
   <?php 
$exper=mysqli_query($conn,"select * from users where role='2' and district='".$_GET['adress']."'");


   while($row = mysqli_fetch_array($exper)){
     ?>
  
   ['<?php echo $row['business_name'];?>',<?php echo $row['latitude'];?>, <?php echo $row['longitude'];?>, 1],
 
    <?php } ?> 
 
];

 




//content window
 var content =new Array();
  //var  contentString;  

content=[

 <?php 
$expers=mysqli_query($conn,"select * from users where role='2' and district='".$_GET['adress']."'");

 while($rowd = mysqli_fetch_array($expers)){
 	$rating = mysqli_fetch_array(mysqli_query($conn,"SELECT  AVG(rating) as rating FROM `feedback` WHERE `salon_id`='".$rowd['id']."' "));

					$reviews= (float)$rating['rating'].''; 

					$countsr = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `feedback` WHERE `salon_id`='".$rowd['id']."'  "));




 	if($rowd['latitude']!=""){

?>
'<div style="width:100%"><a href="saloon_details.php?id=<?php echo $rowd['id'];?>&category=<?php echo $_GET['category'];?>&service=<?php echo $_GET['service'];?>" target="_blank"><img src="image/<?php echo $rowd['salon_pic'];?>" style="width: auto;max-width: 90px;"><h1 style="font-size: 12px;    margin: 13px 0 0;font-weight: bold;"><?php echo $rowd['business_name'];?></h1><h1 style="font-size: 12px;    margin: 13px 0 0;font-weight: bold;"><?php if($countsr==0){}else{echo round($reviews,'1');echo "&nbsp;";
$userdd=explode('.',$reviews);$seekerdid=$userdd[0];$schedid=$userdd[1];for($i=0;$i<$seekerdid; $i++){echo '<i class="fa fa-star" style="color:gold;font-size:16px"></i>';}   if($schedid!=''){echo '<i class="fa fa-star-half-o" aria-hidden="true"  style="color:gold;font-size:16px"></i>&nbsp;';}}?></h1><h5 style="font-size: 10px;    margin: 13px 0 0;font-weight: bold;"><i class="fa fa-map-marker" aria-hidden="true" style="font-size:14px"></i>&nbsp;<?php echo $rowd['adress'];?></h5></a></div>',

<?php } }?>


];
   //contentString = 'hospital';

//content.push(contentString);

  

console.log(content);




    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(clatt, clongi),
       
      //mapTypeId: google.maps.MapTypeId.ROADMAP
    });
     //map.mapTypes.set('styled_map', styledMapType);
        //map.setMapTypeId('styled_map');
 
    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
     
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
         label: labels[i][0],
         icon:icn[i][0],
        map: map
      });



google.maps.event.addListener(infowindow, 'domready', function() {

 //jQuery('.gm-style').removeClass('gm-style');
   var iwOuter = $('.gm-style-iw');

   
   var iwBackground = iwOuter.prev();

 
   iwBackground.children(':nth-child(2)').css({'display' : 'none'});

   iwBackground.children(':nth-child(4)').css({'display' : 'none'});

});



      google.maps.event.addListener(marker, 'mouseover', (function(marker, i) { 
        return function() {
          infowindow.setContent(content[i]);
   setTimeout(function(){  infowindow.open(map, marker); }, 0);
         

        }
      })(marker, i));
    }

 var locations1 = [
  

 ['My Location', clatt, clongi, 1],
];


}
    </script>