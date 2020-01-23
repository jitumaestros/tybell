<?php include('header.php');
extract($_REQUEST);
$_SESSION['book_date'];
$_SESSION['book_time'];
$_SESSION['serviceid'];
$_SESSION['service_price_level'];
$strtotime=strtotime('now');

$strtotime1=strtotime($_SESSION['book_date']);

$servid=$_SESSION['serviceid'];
$price='';

$price1='';
$servci1=explode(',', $servid);

foreach ($servci1 as $key => $valuse) {

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


	if($price1=='')
	{

		$price1=$totals;


	}else{

		$price1=$price1.','.$totals;


	}
}



$order_ref1=rand(10000000,999999999);

$schedules=$_SESSION['book_date'].' '.$_SESSION['book_time'];
$month=date('m');

$mysqld = mysqli_query($conn,"insert into bookings set user_id='".$_SESSION['user_id']."',full_name='".$_SESSION['name']."',email='".$_SESSION['email']."',phone='".$_SESSION['phone']."',payment_by='Paypal',promo_code='".$_SESSION['promocode']."',schedule_time='".$_SESSION['book_time']."',service_id='".$_SESSION['serviceid']."',service_price='$price1',total_amount='".$_SESSION['price']."',schedule_date='".$_SESSION['book_date']."',salon_id='".$_SESSION['salon_id']."',dates='$strtotime1',strtotime='$strtotime',status='1',order_ref='$order_ref1',staffid='".$_SESSION['staffid']."',guest_name='$guest_name',schedule='$schedules',month='$month',service_price_level='".$_SESSION['service_price_level']."'");

$bookid=mysqli_insert_id($conn);


$mysqld = mysqli_query($conn,"insert into payment set user_id='".$_SESSION['user_id']."',booking_id='".$bookid."',amount='".$price1."',total_amount='".$_SESSION['price']."',payment_status='".$_GET['st']."',txnid='".$_GET['tx']."',strtotime='".$strtotime."',salon_id='".$_SESSION['salon_id']."',service_id='".$_SESSION['serviceid']."'");


$servci1d=explode(',', $servid);

foreach ($servci1d as $key => $valusae) { 

	mysqli_query($conn,"insert into requested_service set service_id='$valusae',booking_id='$bookid',user_id='".$_SESSION['user_id']."',salon_id='".$_SESSION['salon_id']."' ");
}


echo '<div class="alert alert-success text-center">Pago exitoso, redireccionando la espalda...</div>';
echo '<script>  window.setTimeout(function () { window.location="myaccount.php"; }, 4000);</script>';


include('footer.php');?>
