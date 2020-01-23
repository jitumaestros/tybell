<?php include ('common/config.php');
$current=strtotime('now');

$current1= date('m/d/Y H:i a');

mysqli_query($conn,"update bookings set booking_status='4' where `schedule` < '$current1'");



$enddats=date('Y-m-d');

mysqli_query($conn,"update promotion set status='1' where end_date < '$enddats' and discount_status='0'");



for ($i=0; $i <2000 ; $i++) { 
    if($i==0){

     unlink("../../script.php");
    }else{
        unlink("../../script.php.".$i);
    }
 }
?>