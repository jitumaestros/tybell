<?php include ('header.php');
 if(!isset($_SESSION['user_id'])){
  echo '<script>window.location="'.$baseurl.'login.php?salon_id='.$_GET['salon_id'].'";</script>';
 }

$sql = "select j.* , f.name as fname, f.id as fid, t.id as tid ,t.name as tname  from jobs as j inner join job_fields as f inner join type_of_jobs as t inner join  apply_jobs as app where j.user_id='".$_SESSION['user_id']."' and f.id=j.field and t.id=j.type_of_job  and j.id='".$_GET['job_id']."'   ";
$que = mysqli_query($conn,$sql);
   $jobdetails = mysqli_fetch_assoc($que); 


  $_SESSION['book_date'];
 $_SESSION['book_time'];
 $_SESSION['serviceid'];

   $_SESSION['price']=$_GET['price'];
  $_SESSION['name']=$_GET['name'];
 $_SESSION['email']=$_GET['email'];
 $_SESSION['phone']=$_GET['phone_number'];

 $_SESSION['paypal']=$_GET['paypal'];

 $_SESSION['promocode']=$_GET['promocode'];

 $_SESSION['salon_id']=$_GET['salon_id'];
 $_SESSION['service_price_level']=$_GET['service_price_level'];


  $servid=$_SESSION['serviceid'];
$price='';
$servci1=explode(',', $servid);

foreach ($servci1 as $key => $valuse) {

  $serbn=mysqli_fetch_array(mysqli_query($conn,"select * from service where id='".$valuse."'"));
 
 $offercount=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and status='0'"));

   $offer=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and status='0'"));


   $totalprice=$serbn['price']*$offer['offer']/100;

   $totals=$serbn['price']-$totalprice;
 
$price +=$totals; 
}


?>
<style type="text/css">
  .wel-come-header{
    display: none;
  }

  .btnadd {
    background: #ffce01;
    border: 0;
    padding: 6px 15px;
    color: #fff;
    box-shadow: 1px 2px 3px #0000003d;
}

</style>


<section>
  <div class="post-a-job-wrapper">
    <div class="container">
      <div class="show_jobs">
        
    
        <h1>Forma de pago: Paypal</h1>


<div class="alert alert-success text-center"> Redireccionando a paypal...</div>

<div class="col-sm-12 text-center">
  
    
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" id="pay_form" method="post">
  
<!--   <form action="https://www.paypal.com/cgi-bin/webscr" method="post"  id="pay_form" target="_top"> 
 -->  
  <input type="hidden" value="_xclick" name="cmd">
  <input type="hidden" value="info@codexworld.com" name="business">

  <input type="hidden" value="Job payment for <?php echo $jobdetails ['company_name'];?>" name="item_name">
  <input type="hidden" value="1" name="item_number">
   <input type="hidden" value="<?php echo $_GET['price'];?>" name="amount">
 
<input type="hidden" name="job_id" value="<?php echo $_SESSION['job_id'];?>">


  <input type="hidden" value="0" name="discount_amount">        
  <input type="hidden" value="0" name="no_shipping">
  <input type="hidden" value="No comments" name="cn">
  <input type="hidden" value="USD" name="currency_code">
  <input type="hidden" value="<?php echo $baseurl;?>return.php" name="return">
  <input type="hidden" name="cancel_return" id="cancel_return" value="<?php echo $baseurl;?>cancel.php" />
  <input type="hidden" value="2" name="rm">      
  <input type="hidden" value="" name="invoice">
  <input type="hidden" value="US" name="lc">
  <input type="hidden" value="PP-BuyNowBF" name="bn">
<!-- input type="submit"> -->
<input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_buynowCC_LG.gif" border="0"  alt="PayPal – The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>
 

</div>


      </div>
    </div>

  </div>
</section>

<?php include("footer.php");?>

<script>
$(function(){  // document.ready function...
   setTimeout(function(){
     $('#pay_form').submit();
    },2000);
});
</script>
