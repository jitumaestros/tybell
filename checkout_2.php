<?php include('common/config.php');
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


$_SESSION['book_date'];

$_SESSION['book_time'];

$_SESSION['serviceid'];

$servid=$_SESSION['serviceid'];

$price5D='';

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
/*  $price +=$serbn['price'];
*/
$price5D +=$totals;


$spriclaveld=mysqli_fetch_array(mysqli_query($conn,"select * from service_price_level where salon_id='".$_GET['salon_id']."' and id='".$_GET['id']."' order by id asc"));

$spriclavelss=mysqli_fetch_array(mysqli_query($conn,"select * from service_price_level where salon_id='".$_GET['salon_id']."' and id='".$_GET['id']."' order by id asc"));

$spriclavels=mysqli_num_rows(mysqli_query($conn,"select * from service_price_level where salon_id='".$_GET['salon_id']."' and id='".$_GET['id']."' order by id asc"));

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

        }

        $users=mysqli_fetch_array(mysqli_query($conn,"select * from users where id='".$_SESSION['user_id']."'"));
        ?>
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

          <!-- <script src="js/jquery.mobile-1.4.5.min.js"></script> -->

          <script src="https://unpkg.com/@ionic/core@latest/dist/ionic.js"></script>

          <link rel="stylesheet" type="text/css" href="css/style.css">

          <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
          <!-- <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css"> -->

          <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>

          <link rel="stylesheet" href="css/bootstrap-datetimepicker.css" />

          <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />

          <link rel="stylesheet" href="css/bootstrap-datetimepicker-standalone.css" />

          <script type="text/javascript" src="js/jquery-ui.min.js"></script>

          <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
          <link rel="stylesheet" type="text/css" href="css/responsive.css">

          <body>

           <header>

            <nav class="header_checkout">

             <div class="container">

               <div class="top_nav_bar">

                <div class="col-sm-4">
                </div>

                <div class="col-sm-4">

                 <div class="logo_div text-center">

                  <p class="logo_1">Tybell</p>

                </div>

              </div>

              <div class="col-sm-4">

                <div class="text-right contact_number">

                 <p>Having trouble? Give us a call:</p>

                 <h2>0333 225 980</h2>

               </div>
             </div>
           </div>
         </div>
       </nav>

     </header>

     <?php if($_SESSION['user_id']!=''){}else{?>

     <div class="ckeckout_login_wrapper">

      <div class="container">

        <a href="login.php?salon_id=<?php echo $_GET['salon_id'];?>"><button type="button" value="Registro" name="" class="login_btn">Registro</button></a>


      </div>

    </div>

    <div id="datart"></div>

    <?php }?>

    <div class="checkout_wrapper ds_checkout_main_block">
      <div class="container">
        <div class="checkout_from">
          <form method="get" action="paypal.php" enctype="multipart/form-data" id="paypal">
            <input type="hidden" name="salon_id" value="<?php echo $_GET['salon_id'];?>">
            <input type="hidden" name="price" value="<?php echo $price5D+$totalss;?>">
            <input type="hidden" name="service_price_level" value="<?php echo $_GET['id'];?>">

            <div class="col-sm-8">

              <div class="star_form_block"> 
                <div class="out_blog">
                  <i class="fa fa-user"></i>   Tus Datos 
                </div>
                
                <div class="form-group">
                  <label> Nombre completo </label> 
                  <input type="text" class="form-control" placeholder="Full Name" name="name" required="required" value="<?php echo $users['first_name'].' '.$users['last_name'];?>">
                </div> 

                <div class="form-group">
                  <label>  Email</label> 
                  <input type="email" class="form-control" placeholder="Email" name="email" required="required" value="<?php echo $users['email'];?>">
                </div>

                <div class="form-group">
                  <label>  Número de teléfono </label> 
                  <input type="text" class="form-control" placeholder="Phone number" name="phone_number" required="required" value="<?php echo $users['phone'];?>">
                </div> 

                <div class="form-group">
                  <label>¿Es esto para ti?</label>
                  <div class="col-sm-12 padder">
                    <div class="col-sm-6 padder">
                      <label class="cus_check"> Si
                        <input type="radio" name='test' value="b">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="col-sm-6 padder">
                      <label class="cus_check"> No
                        <input type="radio"  name='test' value="a">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div id='show-me' style='display:none'>  
                    <div class="form-group input-box">
                      <label>¿Quién es el afortunado?</label>
                      <input type="text" class="form-control" placeholder="Nombre del cliente" name="guest_name" >
                    </div> 
                  </div>
                </div>

                <div class="form-group"> 
                  <label>¿Has visitado este salón en los últimos 12 meses?</label>
                  <div class="col-sm-12 padder">
                    <div class="col-sm-6 padder">
                      <label class="cus_check"> Si
                        <input type="radio" name='visit_room' value="1">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="col-sm-6 padder">
                      <label class="cus_check"> No
                        <input type="radio" name='visit_room' value="0">
                        <span class="checkmark"></span>
                      </label>
                    </div> 
                  </div>
                </div>

                <div class="form-group"> 
                  <label> <i class="fa fa-credit-card-alt"></i> Pago</label> 
                  <div class="col-sm-12 padder">
                    <div class="col-sm-6 padder">
                      <label class="cus_check"> Paga con PayPal
                        <input type="radio" name="payment_status" onclick="showform('Paga con PayPal');" value="Paga con PayPal" checked="checked">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="col-sm-6 padder">
                      <label class="cus_check"> PAGO EN EFECTIVO
                        <input type="radio" name='payment_status' onclick="showform('PAGO EN EFECTIVO');" value="PAGO EN EFECTIVO">
                        <span class="checkmark"></span>
                      </label>
                    </div> 
                  </div> 
                </div>

                <div class="form-group"> 
                  <label>  <i class="fa fa-percent"></i>  Códigos promocionales / Tarjetas Regalo </label>
                  <div class="input-group">                              
                    <input id="msg" type="Number" class="form-control" name="promocode" placeholder="Añade el código promocional">
                    <span class="input-group-addon">AÑADIR CÓDIGO</span>
                  </div>
                </div>

                <div class="form-group"> 
                  <h6 class="title_section"> NEWSLETTER DE TREATWELL</h6>
                  <label class="custome_ch">
                    Marca esta casilla si no quieres recibir emails de Tybell con ofertas y novedades de belleza.
                    <input type="checkbox"   value="PAGO EN EFECTIVO">
                    <span class="checkmark"></span>
                  </label>
                </div>

                <div class="form-group"> 
                  <h6 class="title_section"> COMUNICACIÓN DEL SALÓN </h6>
                  <label class="custome_ch">
                    Marca esta casilla para permitir que el salón en el que estás reservando pueda mandarte correos electrónicos y SMS sobre sus servicios
                    <input type="checkbox"  value="PAGO EN EFECTIVO">
                    <span class="checkmark"></span>
                  </label>
                </div>

                <div class="form-group"> 
                  <p>
                    Puedes cambiar tus preferencias en cualquier momento. Lee nuestra política de privacidad para más información.
                  </p>
                </div>

                <div class="form-group"> 
                  <h2 class="text-right">
                    Total de la reserva <span> $<?php echo $price5D+$totalss;?></span>
                  </h2>
                </div>

                <div class="form-group"> 
                  <p>
                    By continuing you agree to our
                    <a href="javascript:;" data-toggle="modal" data-target="#myModal" style=" color: #001E62;"> Términos de reserva</a>
                  </p>
                </div>

                <div class="form-group"> 
                  <div class="btn_block">
                    <button class="login_btn_ckeck checkout_btn" type="submit" name="submit">COMPRAR AHORA</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          

          <form method="get" action="cash_payment.php" enctype="multipart/form-data" id="cash" style="display: none;">


            <input type="hidden" name="salon_id" value="<?php echo $_GET['salon_id'];?>">
            <div class="col-sm-8">

              <div class="star_form_block"> 
                <div class="out_blog">
                  <i class="fa fa-user"></i>   Tus Datos 
                </div>
                
                <div class="form-group">
                  <label> Nombre completo </label> 
                  <input type="text" class="form-control" placeholder="Full Name" name="name" required="required" value="<?php echo $users['first_name'].' '.$users['last_name'];?>">
                </div> 

                <div class="form-group">
                  <label>  Email</label> 
                  <input type="email" class="form-control" placeholder="Email" name="email" required="required" value="<?php echo $users['email'];?>">
                </div>

                <div class="form-group">
                  <label>  Número de teléfono </label> 
                  <input type="text" class="form-control" placeholder="Phone number" name="phone_number" required="required" value="<?php echo $users['phone'];?>">
                </div> 

                <div class="form-group">
                  <label>¿Es esto para ti?</label>
                  <div class="col-sm-12 padder">
                    <div class="col-sm-6 padder">
                      <label class="cus_check"> Si
                        <input type="radio" name='test' value="b">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="col-sm-6 padder">
                      <label class="cus_check"> No
                        <input type="radio"  name='test' value="a">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div id='show-me' style='display:none'>  
                    <div class="form-group input-box">
                      <label>¿Quién es el afortunado?</label>
                      <input type="text" class="form-control" placeholder="Nombre del cliente" name="guest_name" >
                    </div> 
                  </div>
                </div>

                <div class="form-group"> 
                  <label>¿Has visitado este salón en los últimos 12 meses?</label>
                  <div class="col-sm-12 padder">
                    <div class="col-sm-6 padder">
                      <label class="cus_check"> Si
                        <input type="radio" name='visit_room' value="1">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="col-sm-6 padder">
                      <label class="cus_check"> No
                        <input type="radio" name='visit_room' value="0">
                        <span class="checkmark"></span>
                      </label>
                    </div> 
                  </div>
                </div>

                <div class="form-group"> 
                  <label> <i class="fa fa-credit-card-alt"></i> Pago</label> 
                  <div class="col-sm-12 padder">
                    <div class="col-sm-6 padder">
                      <label class="cus_check"> Paga con PayPal
                        <input type="radio" name="payment_status" onclick="showform('Paga con PayPal');" value="Paga con PayPal" checked="checked">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="col-sm-6 padder">
                      <label class="cus_check"> PAGO EN EFECTIVO
                        <input type="radio" name='payment_status' onclick="showform('PAGO EN EFECTIVO');" value="PAGO EN EFECTIVO">
                        <span class="checkmark"></span>
                      </label>
                    </div> 
                  </div> 
                </div>

                <div class="form-group"> 
                  <label>  <i class="fa fa-percent"></i>  Códigos promocionales / Tarjetas Regalo </label>
                  <div class="input-group">                              
                    <input id="msg" type="Number" class="form-control" name="promocode" placeholder="Añade el código promocional">
                    <span class="input-group-addon">AÑADIR CÓDIGO</span>
                  </div>
                </div>

                <div class="form-group"> 
                  <h6 class="title_section"> NEWSLETTER DE TREATWELL</h6>
                  <label class="custome_ch">
                    Marca esta casilla si no quieres recibir emails de Tybell con ofertas y novedades de belleza.
                    <input type="checkbox"   value="PAGO EN EFECTIVO">
                    <span class="checkmark"></span>
                  </label>
                </div>

                <div class="form-group"> 
                  <h6 class="title_section"> COMUNICACIÓN DEL SALÓN </h6>
                  <label class="custome_ch">
                    Marca esta casilla para permitir que el salón en el que estás reservando pueda mandarte correos electrónicos y SMS sobre sus servicios
                    <input type="checkbox"  value="PAGO EN EFECTIVO">
                    <span class="checkmark"></span>
                  </label>
                </div>

                <div class="form-group"> 
                  <p>
                    Puedes cambiar tus preferencias en cualquier momento. Lee nuestra política de privacidad para más información.
                  </p>
                </div>

                <input type="hidden" name="price" value="<?php echo $price5D+$totalss;?>">
                <input type="hidden" name="book_date" value="<?php echo $_SESSION['book_date'];?>">
                <input type="hidden" name="book_time" value="<?php echo $_SESSION['book_time'];?>">
                <input type="hidden" name="serviceid" value="<?php echo $_SESSION['serviceid'];?>">
                <input type="hidden" name="staffid" value="<?php echo $_SESSION['staffid'];?>">

                <input type="hidden" name="service_price_level" value="<?php echo $_GET['id'];?>">


                <div class="form-group"> 
                  <h2 class="text-right">
                    Total de la reserva <span> $<?php echo $price5D+$totalss;?></span>
                  </h2>
                </div>

                <div class="form-group"> 
                  <p>
                    By continuing you agree to our
                    <a href="javascript:;" data-toggle="modal" data-target="#myModal" style=" color: #001E62;"> Términos de reserva</a>
                  </p>
                </div>

                <div class="form-group"> 
                  <div class="btn_block">
                    <button class="login_btn_ckeck checkout_btn" type="submit" name="submit">COMPRAR AHORA</button>
                  </div>
                </div>
              </div>
            </div>
          </form>

          <?php 
          $_SESSION['book_date'];
          $_SESSION['book_time'];
          $_SESSION['serviceid'];
          $_SESSION['staffid'];
          $strtm=strtotime($_SESSION['book_date']);
          $saln=mysqli_fetch_array(mysqli_query($conn,"select * from users where id='".$_GET['salon_id']."'"));
          ?>
          <div class="col-sm-4"> 
            <div class="star_right_block">
              <div class="time_block">
                <span class="left_block"> <?php echo $_SESSION['book_time'];?> </span> 
                <span class="right_block">                          
                  <span class="month"><?php echo date('D M d', $strtm);?></span>
                  <span class="date">  </span>
                </span>
              </div> 

              <div class="venue_name">  
                <?php echo $saln['business_name'];?>
              </div>

              <div class="services">
                <?php
                $servid=$_SESSION['serviceid'];
                $price5='';
                $servci1=explode(',', $servid);
                foreach ($servci1 as $key => $valuse) {

                  $serbncounts=mysqli_num_rows(mysqli_query($conn,"select * from service where id='".$valuse."'"));

                  if($serbncounts >0){

                    $serbn=mysqli_fetch_array(mysqli_query($conn,"select * from service where id='".$valuse."'"));
                     /* $offercount=mysqli_num_rows(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and status='0'"));
                      $offer=mysqli_fetch_array(mysqli_query($conn,"select * from promotion where service_id='".$serbn['id']."' and status='0'"));
                      $totalprice=$serbn['price']*$offer['offer']/100;
                      $totals=$serbn['price']-$totalprice;
                      $price +=$totals; */



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
              $offer=mysqli_fetch_array(mysqli_query($conn,"select * from Off_peak_time where salon_id='".$salon_id['salon_id']."' and discount_id='".$offerx['discount_id']."' and day='$days' and FIND_IN_SET('$daycount', dayweekcount)"));

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

$spriclaveld=mysqli_fetch_array(mysqli_query($conn,"select * from service_price_level where salon_id='".$_GET['salon_id']."' and id='".$_GET['id']."' order by id asc"));

$spriclavelss=mysqli_fetch_array(mysqli_query($conn,"select * from service_price_level where salon_id='".$_GET['salon_id']."' and id='".$_GET['id']."' order by id asc"));

$spriclavels=mysqli_num_rows(mysqli_query($conn,"select * from service_price_level where salon_id='".$_GET['salon_id']."' and id='".$_GET['id']."' order by id asc"));

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
          <div class="service" data-id="">
            <h3 class="service-name"><?php echo $serbn['name'];?></h3>
            <dl class="service-skus">
              <dt class="name"><?php echo $spriclavel['duration'];?></dt>
              <dt class="duration">  </dt>
              <dd class="price">&nbsp;$<?php echo $totals;?></dd>
            </dl>
          </div>
          <?php } }
          if($_GET['id']!=''){
            ?>  

            <div class="service" data-id="">
              <h3 class="service-name"><?php echo $spriclaveld['name_price_vevel'];?></h3>
              <dl class="service-skus">
                <dt class="name"><?php echo $spriclaveld['duration'];?></dt>
                <dt class="duration">  </dt>
                <dd class="price">&nbsp;$<?php echo $totalss;?></dd>
              </dl>
            </div>
            <?php }?>

          </div>

          <div class="total name-value">
            <span class="name">Total pedido</span>
            <span class="value">$<?php echo $price5+$totalss;?></span>
          </div>

          <div class="cancellation toggler-below">
            <div class="description-section">
              <div class="title-section">Política de Cancelación</div>
              <div class="fulfillment cancellation-wrapper pre-pay" >
                <span class="cancellation-summary">
                  Política de cancelación
                </span>
                <br>
                <span class="toggler anchor secondary" style="color: red" id="sss1"><a href="javascript:;" onclick="showpolicy('1');"  style="color: red">Ver más</a></span>
                <ul class="bullets" id="sss" style="display: none;">
                 <li>Si cancelas tu reserva con un mínimo de 24h de antelación a tu cita, recibirás la devolución total del importe a través del mismo método de pago.</li>
               </ul>
             </div> 
           </div>
         </div>
       </div>

     </div>

   </div>

 </div>

</div>

</div>

</body>

</html>

<script type="text/javascript">
  function showpolicy(id){
    $('#sss').show();
    $('#sss1').hide();

  }

  $(function() {


    $('#datepicker').datepicker({


      onSelect: function(dateText) {

       $('#datepicker2').datepicker("setDate", $(this).datepicker("getDate"));


     }


   });



  });


  $(function() {

    $("#datepicker2").datepicker();

  });



</script>



<script type="text/javascript">

  

  $(document).ready(function (login12) {

   $("#loginfrm").on('submit',(function(login12) {

  //alert();

  $("#form_abc1_img").show();

  login12.preventDefault();

  $.ajax({

   url: "php/login.php",

   type: "POST",

   data:  new FormData(this),

   contentType: false,

   cache: false,

   processData:false,

   success: function(data){

     $("#form_abc1_img").hide();

   // alert(data);

   $("#datart").show().html(data);

 },

 error: function(){}          

});



}));

 });

  function showform(ids){
    if(ids=='Paga con PayPal'){
      $("#paypal").show();
      $("#cash").hide();
    }else{

     $("#paypal").hide();
     $("#cash").show();
   }

 }



 function addinput(id){

  $.ajax({

   type: "POST",

   url: "addinput.php",

   data: "id="+id, 

   success: function(html)

   {     

    $("#added").html(html);

    

  }

  

});
}



function hides(id){


  $("#addeds").hide();

  
}

$("input[name='test']").click(function () {

  $('#show-me').css('display', ($(this).val() === 'a') ? 'block':'none');

});


</script>

<!-- Modal -->

<div class="modal fade" id="myModal" role="dialog">

  <div class="modal-dialog">

    

    <!-- Modal content-->

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Términos y Condiciones de Reserva</h4>

      </div>

      <div class="modal-body">

        <h5>Última Actualización Junio 2019</h5>

        <h6>Resumen</h6>



        <h6>Este es un resumen de nuestros Términos y Condiciones de Reserva. El cual no sustituye la lectura de la versión completa que se encuentra a continuación. Los términos en mayúscula utilizados en este resumen se definen en los Términos y Condiciones de Reserva.</h6>



        <p>Los Servicios que puede adquirir o reservar a través de Tybell son vendidos por nuestras Empresas Asociadas, no por nosotros. Solo somos responsables de organizar y concluir su Pedido, puesto que nuestras Empresas Asociadas nos han designado para que actuemos como su agente comercial.

          Si paga los Servicios de nuestras Empresas Asociadas a través de nuestro Sitio Web, nuestra App o nuestro Widget, en nuestra calidad de agente comercial, podremos cobrar y recibir el pago en nombre de las Empresas Asociadas. En este caso, el abono de su pago liquidará su deuda con la Empresa Asociada por los Servicios.

          El contrato de Servicios es formalizado directamente entre usted y la Empresa Asociada en cuestión. No somos responsables de los Servicios que recibe de nuestras Empresas Asociadas. Sin embargo, infórmenos si encuentra un problema o si el Servicio que recibe en un establecimiento no cumple con sus expectativas y haremos todo lo posible para ayudarle.

          Compruebe exhaustivamente todos los detalles y cualquier restricción relacionada con un Servicio antes de realizar su Pedido.

          Asegúrese de notificar a Tybell cualquier información médica, alergias/información sobre su salud para que las Empresas Asociadas cuenten con dicha información antes de su cita.

          Tybell se reserva el derecho de desactivar la cuenta Tybell de un Cliente en caso de incumplimiento de estos Términos y Condiciones de Reserva y/o cuando el Cliente actúe de forma inapropiada, abusiva o inaceptable con nuestro equipo de Atención al Cliente o los empleados de una Empresa Asociada, ya sea en comunicaciones por teléfono, correo electrónico o en persona en el establecimiento de la Empresa Asociada.</p>

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>

      </div>

      

    </div>

  </div>

  

</div>