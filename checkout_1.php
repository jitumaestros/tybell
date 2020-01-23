<?php include('header.php');
$_SESSION['serviceid']=$_GET['serviceid'];
if($_GET['dates']!=''){
  $dates=strtotime($_GET['dates']);
  $datess=date('m/d/Y',$dates);

}
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


              $slnm=mysqli_fetch_array(mysqli_query($conn,"select * from users where id='".$_GET['id']."' "));

              $_GET['serviceid'];

              $servid=$_GET['serviceid'];
              $price5='';
              $servci1=explode(',', $servid);

              foreach ($servci1 as $key => $valuse) {

               $serbn=mysqli_fetch_array(mysqli_query($conn,"select * from service where id='".$valuse."'"));

               $serbncounts=mysqli_num_rows(mysqli_query($conn,"select * from service where id='".$valuse."'"));

               $spriclavel=mysqli_fetch_array(mysqli_query($conn,"select * from service_price_level where service_id='".$serbn['id']."' order by id asc"));
               $spriclavelf=mysqli_num_rows(mysqli_query($conn,"select * from service_price_level where service_id='".$serbn['id']."' order by id asc"));
               $offercount=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and status='0' and discount_status='1'"));
               $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and status='0' and discount_status='1'"));
               $offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

               $todays=date('Y-m-d');

               $servicdis=mysqli_fetch_array(mysqli_query($conn,"select * from service where id='".$serbn['id']."' and offer_status='1'"));

               $servicdiscount=mysqli_num_rows(mysqli_query($conn,"select * from service where id='".$serbn['id']."' and offer_status='1'"));

               $offercount1co=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."'  and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));

               $offercount1=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));


               if($servicdiscount >0){

                $dis=$spriclavel['sale_price']*$servicdis['offer']/100;
                $totals=$spriclavel['sale_price']-$dis;
            //$price +=$totals;

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

              $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and status='0' and discount_status='1'"));
              $offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$sln['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

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
                         // $price +=$totals;

            }elseif($offercount1co >0){

              $totalprice=$spriclavel['sale_price']*$offercount1['offer']/100;
              $totals=$spriclavel['sale_price']-$totalprice;
//$price +=$totals;
            }else{

              $totals=$spriclavel['sale_price'];
            //$price +=$totals;
            }
/*  $price +=$serbn['price'];
*/

$price5 +=$totals;

}
$spriclaveld=mysqli_fetch_array(mysqli_query($conn,"select * from service_price_level where salon_id='".$_GET['salon_id']."' and id='".$_GET['service_lavel']."' order by id asc"));

?>
<input type="hidden" name="" id="open_timeg"  value=""> 

<link rel="stylesheet" href="datepicker/pikaday.css">

<!DOCTYPE html>

<html lang="en">

<head>

  <title>Tybell</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link href="https://unpkg.com/@ionic/core@latest/css/ionic.bundle.css" rel="stylesheet">

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <script src="js/jquery.min.js"></script>

  <script src="js/bootstrap.min.js"></script>

  <script src="js/jquery-1.11.3.min.js"></script>

  <script src="https://unpkg.com/@ionic/core@latest/dist/ionic.js"></script>

  <link rel="stylesheet" type="text/css" href="css/style.css">

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>

  <link rel="stylesheet" href="css/bootstrap-datetimepicker.css" />

  <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />

  <link rel="stylesheet" href="css/bootstrap-datetimepicker-standalone.css" />

  <script type="text/javascript" src="js/jquery-ui.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">

  <body>
   <header>

    <nav class="header_checkout">
     <form method="post" id="loginform1" enctype="multipart/form-data">

       <div class="container">

         <div class="top_nav_bar">

          <div class="col-sm-4">

          </div>

          <div class="col-sm-4">

           <div class="logo_div text-center">

           </div>

         </div>

         <div class="col-sm-4">

          <div>

          </div>

        </div>

      </div>

    </div>

  </nav>

</header>

<div class="checkout_wrapper">

  <div class="container">

   <div class="checkout-blog">

    <div class="col-sm-4">

     <div class="ckecout_1_left_count">

<!--                  <form method="post" id="loginform1" enctype="multipart/form-data">
-->                <p class="checkout_title">Seleccionar Staff</p>

<div class="form-group">
 <select  class="form-control" name="staffid" onclick="selecteall(this.value);" autocomplete="off" id="staff">

  <option value="">Cualquier personal</option>

  <?php $servid=$_GET['serviceid'];
  $price='';
  $servci1=explode(',', $servid);
  $ids=$servci1['0'];
/*foreach ($servci1 as $key => $valuse) {

*/
  $serbn=mysqli_fetch_array(mysqli_query($conn,"select * from service where id='".$ids."'"));

  $servci1sas=explode(',', $serbn['stylist']);

  foreach ($servci1sas as $key => $value) {
   
    $stafa=mysqli_query($conn,"select * from staff where id='".$value."'");
    while($staf=mysqli_fetch_array($stafa)) {
     

     ?>
     <option value="<?php echo $staf['id'];?>" <?php if($_GET['staffid']==$staf['id']){ echo "selected";}?>><?php echo $staf['name'];?></option>

     <?php } }?>

   </select>
 </div>

 <p class="checkout_title">Selecciona una hora para tu visita</p>

 <div class="date_picker_warppaer">

   <div class="form-group">
     <input type="text" class="form-control" id="datepickerfff" name="bookdate" onclick="selecteall(this.value);" value="<?php echo $datess;?>" autocomplete="off">

   </div>

   <div class="time_book">
    <?php $salonn=mysqli_fetch_array(mysqli_query($conn,"select * from users where id='".$_GET['salon_id']."'"));

    $selectedTime = "9:15:00";
    $endTime = strtotime("+15 minutes", strtotime($selectedTime));
    date('h:i:s', $endTime);

    ?>
    <div class="time_blog">

      <?php 

      $m='Monday';
      $tu='Tuesday';
      $wed='Wednesday';
      $th='Thursday';
      $fri='Friday';
      $st='Saturday';
      $sun='Sunday';

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

      elseif($dayy=='Sun'){
        $daycount=$sun;
      }

      $salons=mysqli_fetch_array(mysqli_query($conn,"select * from salon_opening_hr where salon_id='".$_GET['salon_id']."' and day='$daycount'"));

      $start_time=$salons['start_time'];
      $end_time=$salons['end_time'];
      $dd=explode(' ',$start_time);

      $dd1=$dd[0];
      $time1a = strtotime($start_time);

      $time2a =strtotime($end_time);

      $diffdhgg = $time2a-$time1a;
      date("h:i a",$diffdhgg);
      $days = $diffdhgg / 86400;
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

       $hr=$h;
     }

     else{

       $hr=$h;

     }

     $hour =$da *24+$ha;

     $day =$d;

     $month =$d/30;
     $years =$d/365;

     $week =$d/7;
     $weeks =round($week, 0);

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
    $monthd =round($month, 0);

    $year1 =round($years, 0);


    if($h > '0'){
      $duratingD=$hr;

    }

    $ff= $hr+'1';
//echo $duratingD;

    for ($i=0; $i <=$ff ; $i++) { 
     
//display the converted time
      $dtimes= date('h:i a',strtotime('+ '.$i.' hour',strtotime($dd1)));

      ?>

      <input type="radio" name="open_time" id="open_timegs" value="<?php echo $dtimes;?>" <?php if($dtimes==$_GET['open_time']){echo "checked";}?> onclick="selecteall('<?php echo $dtimes;?>');" ><span><?php echo $dtimes;?></span>

      <span class="pull-right"><b>£ <?php echo $price5+$spriclaveld['sale_price'];?></b></span>
      <br>

      <?php }?>
    </div>

  </div>
  
</div>
<!--              </form>
-->
</div>

</div>

<div class="col-sm-8">

 <div class="ckechoput_2_right_count">

  <p class="checkout_title">Mi cesta</p>
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
              $servid=$_GET['serviceid'];
              $price='';
              $servci1=explode(',', $servid);

              foreach ($servci1 as $key => $valuse) {


               $serbncounts=mysqli_num_rows(mysqli_query($conn,"select * from service where id='".$valuse."'"));
               if($serbncounts >0){
                $serbn=mysqli_fetch_array(mysqli_query($conn,"select * from service where id='".$valuse."'"));


                $spriclavel=mysqli_fetch_array(mysqli_query($conn,"select * from service_price_level where service_id='".$serbn['id']."' order by id asc"));
                $spriclavelf=mysqli_num_rows(mysqli_query($conn,"select * from service_price_level where service_id='".$serbn['id']."' order by id asc"));
                $offercount=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and status='0' and discount_status='1'"));
                $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and status='0' and discount_status='1'"));
                $offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

                $todays=date('Y-m-d');

                $servicdis=mysqli_fetch_array(mysqli_query($conn,"select * from service where id='".$serbn['id']."' and offer_status='1'"));

                $servicdiscount=mysqli_num_rows(mysqli_query($conn,"select * from service where id='".$serbn['id']."' and offer_status='1'"));

                $offercount1co=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."'  and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));

                $offercount1=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));


                if($servicdiscount >0){

                  $dis=$spriclavel['sale_price']*$servicdis['offer']/100;
                  $totals=$spriclavel['sale_price']-$dis;
                  $price +=$totals;

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

              $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and status='0' and discount_status='1'"));
              $offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$sln['id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

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
              $price +=$totals;

            }elseif($offercount1co >0){

              $totalprice=$spriclavel['sale_price']*$offercount1['offer']/100;
              $totals=$spriclavel['sale_price']-$totalprice;
              $price +=$totals;
            }else{

              $totals=$spriclavel['sale_price'];
              $price +=$totals;
            }

            $spriclaveld=mysqli_fetch_array(mysqli_query($conn,"select * from service_price_level where salon_id='".$_GET['salon_id']."' and id='".$_GET['service_lavel']."' order by id asc"));

            $spriclavelss=mysqli_fetch_array(mysqli_query($conn,"select * from service_price_level where salon_id='".$_GET['salon_id']."' and service_id='".$serbn['id']."' order by id asc"));

            $spriclavels=mysqli_num_rows(mysqli_query($conn,"select * from service_price_level where salon_id='".$_GET['salon_id']."' and service_id='".$serbn['id']."' order by id asc"));

            $offercounts=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and salon_id='".$_GET['salon_id']."' and status='0' and discount_status='1' and FIND_IN_SET('$days', day)"));

            $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and salon_id='".$slnm['id']."' and status='0' and discount_status='1'"));


            $offerf=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$_GET['salon_id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

            $todays=date('Y-m-d');

            $servicdis=mysqli_fetch_array(mysqli_query($conn,"select * from service where id='".$sernm['id']."' and salon_id='".$_GET['salon_id']."' and offer_status='1'"));

            $servicdiscount=mysqli_num_rows(mysqli_query($conn,"select * from service where id='".$sernm['id']."' and salon_id='".$_GET['salon_id']."' and offer_status='1'"));

            $offercount1co=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and salon_id='".$_GET['salon_id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));

            $offercount=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and salon_id='".$_GET['salon_id']."' and status='0' and discount_status='1'"));


            $offercount1=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and salon_id='".$_GET['salon_id']."' and status='0' and discount_status='0' and start_date <='$todays' and end_date >='$todays'"));



            if($servicdiscount >0){

              $dis=$spriclaveld['sale_price']*$servicdis['offer']/100;
              $totalss=$spriclaveld['sale_price']-$dis;

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

              $offerx=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and salon_id='".$_GET['salon_id']."' and status='0' and discount_status='1'"));
              $offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$_GET['salon_id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

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
              $totalprice=$spriclaveld['sale_price']*$offerper/100;
              $totalss=$spriclaveld['sale_price']-$totalprice;
            }elseif($offercount1co >0){

             $totalprice=$spriclaveld['sale_price']*$offercount1['offer']/100;
             $totalss=$spriclaveld['sale_price']-$totalprice;

           }else{

            $totalss=$spriclaveld['sale_price'];
          }

          ?>

          <div class="booking_blog_1">

           <h6><?php echo $serbn['name'];?></h6>

           <p><!-- 45 mins --> <span class="pull-right">$<?php echo $totals;?> &nbsp;<a href="javascript:;" onclick="removedid('<?php echo $serbn['id'];?>','<?php echo $_GET['serviceid'];?>','<?php echo $_GET['salon_id'];?>','<?php echo $_GET['service_lavel'];?>');"> <i class="fa fa-times"></i></a></span></p>

         </div><?php } } 

         if($_GET['service_lavel']!=''){
          ?>
          <div class="booking_blog_1">

           <h6><?php echo $spriclaveld['name_price_vevel'];?></h6>

           <p><!-- 45 mins --> <span class="pull-right">$<?php echo $totalss;?> &nbsp; <i class="fa fa-times"></i></span></p>

         </div>
         <?php }?>
         <h5 class="text-right">Total pedido<br>$<?php echo $price+$totalss;?></h5>

         <!-- <a href="checkout_2.php?salon_id=<?php echo $_GET['salon_id'];?>&id=<?php echo $_GET['service_lavel'];?>&"><button class="checkout_btn">Continuar</button></a> -->

         <input type="hidden" name="salon_id" value="<?php echo $_GET['salon_id'];?>" >
         <input type="hidden" name="service_lavel" value="<?php echo $_GET['service_lavel'];?>" >

         <button class="checkout_btn" name="submit" type="submit">Continuar</button></a>

       </div>
     </div>
     <div id="totalksprices"></div>

   </div>

 </div>

</div>
</form>
<footer>

  <div class="checkout-footer">

   <div class="container">

    <div class="footer_content_check">

      <div class="styles--copyright--fd947e">© 2019 Maestros Infotech</div>

    </div>

  </div>

</div>

</footer>

</body>
<script type="text/javascript">

  function removedid(id,serviceidF,salon_id,service_lavel){

//alert(id);
  // unset($_SESSION['serviceid']);

  var staffid = $("#staff").val();
  var dates = $("#datepickerfff").val();
  var open_timed = $("#open_timeg").val();


  $.ajax({
   type: "POST",
   url: "php/remove_serviceid.php",
   data: "id="+id+"&serviceidF="+serviceidF+"&salon_id="+salon_id+"&service_lavel="+service_lavel+"&dates="+dates+"&staffid="+staffid+"&open_time="+open_timed, 
   success: function(html)
   {  
    alert(html);   
    $("#gdfgdfd").html(html);
    
  }
  

});


}

$(function() {

  $('#datepickerg').datepicker({

    onSelect: function(dateText) {

     $('#datepicker2').datepicker("setDate", $(this).datepicker("getDate"));

   }

 });

});

$(function() {

  $("#datepicker2").datepicker();

});

</script>
</head>
</html>
<script type="text/javascript">
/*  function selecteall(id){


       $("#open_timeg").val(id);

   setInterval(function(){
    $('form#loginform1').submit();
  }, 1000);

 }
 */
 function selecteall(id){


   $("#open_timeg").val(id);

  /* setInterval(function(){
    $('form#loginform1').submit();
  }, 1000);
  */
}


/* $(document).ready(function (loginabc41) {

   $("#loginform1").on('submit',(function(loginabc41) {
    //alert();
    loginabc41.preventDefault();
    $.ajax({
     url: "php/selectbookdate.php",
     type: "POST",
     data:  new FormData(this),
     contentType: false,
     cache: false,
     processData:false,
     success: function(data){

       $("#gdfgdf").show(data);

       $("#totalksprices").html(data);
  // alert(data);
},
error: function(){}          
});

  }));
});*/

$(document).ready(function (loginabc41) {

 $("#loginform1").on('submit',(function(loginabc41) {
    //alert();
    loginabc41.preventDefault();
    $.ajax({
     url: "php/selectbookdate.php",
     type: "POST",
     data:  new FormData(this),
     contentType: false,
     cache: false,
     processData:false,
     success: function(data){

       $("#gdfgdf").show(data);

       $("#totalksprices").html(data);
  // alert(data);
},
error: function(){}          
});

  }));
});
</script>
<script src="datepicker/pikaday.js"></script>

<script>
  new Pikaday(

  {
    field: document.getElementById('datepickerfff'),

    trigger: document.getElementById('datepicker-button'),

    minDate: new Date(),

    ariaLabel: 'Custom label',

    maxDate: new Date(2020, 12, 31),

    yearRange: [2010,2020]

  });

</script>


<div id="gdfgdfd"></div>

<style type="text/css">
  
  button {
    background: #FF5C39 !important;
    border: 1px solid #FF5C39 !important;
    outline: none !important;
    box-shadow: none !important;
    color: white !important;
  }
  .is-disabled .pika-button {
    pointer-events: none;
    cursor: default;
    color: #999;
    opacity: .3;
    color: transparent !important;
  }


  .pika-title {
    position: relative;
    text-align: center;
    background: #FF5C39;
  }

  .pika-title .pika-label {
    display: inline-block;
    display: ;
    position: relative;
    z-index: 9999;
    overflow: hidden;
    margin: 0;
    padding: 5px 3px;
    font-size: 14px;
    line-height: 20px;
    font-weight: bold;
    background-color: #FF5C39;
    color: white;
  }

  .pika-next:after {
    content: "";
    position: absolute;
    left: 0;
    top: 5px;
    width: 24px;
    height: 6px;
    background: white;
  }


  .pika-prev, .pika-next {
    display: block;
    position: relative;
    outline: none;
    border: 0;
    padding: 0;
    text-indent: 20px;
    white-space: nowrap;
    overflow: hidden;
    background: transparent !important;
    color: transparent !important;
    width: 40px !important;
    height: 40px !important;
    opacity: 1 !important;
    border: 0 !important;
    top: 10px !important;
    color: transparent !important;
  }


  .pika-prev:before {
    content: "";
    border-top: 8px solid white !important;
    border-bottom: 8px solid transparent;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    position: absolute;
    left: 0;
    top: 0;
    transform: rotate(90deg);
  }


  .pika-prev:after {
    content: "";
    position: absolute;
    right: 0;
    top: 5px;
    width: 24px;
    height: 6px;
    background: white;
  }


  .pika-next:before {
    content: "";
    border-top: 8px solid transparent;
    border-bottom: 8px solid white;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    transform: rotate(90deg);
    position: absolute;
    top: 0;
    right: 0;
  }


  .pika-table th, .pika-table td {
    width: 14.285714285714286%;
    padding: 0;
    border: 2px solid white !important;
  }

  .is-selected .pika-button, .has-event .pika-button {
    color: black !important;
    font-weight: bold;
    background: #F8DA4E !important;
    box-shadow: inset 0 1px 3px #F8DA4E !important;
    border-radius: 3px;
  }

</style>










