<?php include ('header.php');

 $_SESSION['adstart_time'];

 $_SESSION['adstop_time'];

?>
<link rel="stylesheet" href="../datepicker/pikaday.css">
<div class="select_ad_main">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 padder">
        <div class="select_ad_block">
          <div class="seletx_adsvedoi">
            <h2> Select ad video </h2> 
            <p>Already have an account? <a href="setting.php"> Setup Account </a> </p>
          </div>
          <div class="col-sm-12 padder">
            <div class="col-sm-8 padder-left">
              <div class="select_ad_controls">
                <div class="heade">
                  <h3>Video Ad </h3>
                </div>
                <div class="select_ad_body">
                  <div class="col-sm-5 padder-left">
                    <div class="left">
                      <div class="Select_let">
                        <h2>Select video from</h2>
                        <div class="col-sm-12 padder">
                          <div class="col-sm-6 padder-left">
                            <a  href="javascript:;" class="letzplay_btn" data-toggle="modal" data-target="#myModal"> Letzplay  </a>
                          </div>
                      <form method="post" id="form_abc11dfgdg"  enctype="multipart/form-data">
                          <div class="col-sm-6 padder-left">
                            <div class="btn_file_block">
                              <input type="file" name="image" class="file-Sletoion"  onchange="uoloaddd();getvideo(this.value);" id="fli" >
                              <label class="gallery_btn"> Gallery  </label>
                            </div>
                          </div>
                          </form>
                        </div>

            <form method="post" id="contactuss" enctype="multipart/form-data">
            <?php if($_GET['video']!=''){?>
           <input type="hidden" name="video" value="<?php echo $_GET['video'];?>" id="videos">
            <?php }else{?>
              
            <input type="hidden" name="video" value=""  id="videos">
            <?php }?>
            <input type="hidden" name="start_time" value="<?php echo $_SESSION['adstart_time'];?>" id="starttime" >
            <input type="hidden" name="end_time" value="<?php echo $_SESSION['adstop_time'];?>" id="endtime" >

                      <div class="Select_let" id="showvid">
                        <h2>Select up Ad </h2>
                        <a  href="select_ad_letzplay.php?video=<?php echo $_SESSION['images'];?>" class="letzplay_btn"> Edit video  </a> 
                      </div>

                      <div class="input-group">
                        <span class="input-group-addon pre">
                          <label>Start date</label>
                        </span>
                        <input type="text" name="start_date" id="datepickerd" autocomplete="off" onchange="startdates(this.value);"  >
                        <span class="input-group-addon post">
                          <button class="dates"> <i class="fa fa-calendar"></i></button>
                        </span>
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon pre">
                          <label>End date</label>
                        </span>
                        <input type="text" name="end_date" id="datepickers" autocomplete="off" onchange="enddates(this.value);"  >
                        <span class="input-group-addon post">
                          <button class="dates"> <i class="fa fa-calendar"></i></button>
                        </span>
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="col-sm-7 padder-left">
                    <div class="right">
                      <div class="ad_privew_block">
                        <label> Ad Preview</label>
                        <div id="form_abc11_data"></div>
                        <?php if($_GET['video']!=''){?>

<video width="320" height="240" controls controlslist="nodownload">
  <source src="https://letzplayworld.com/Ads/adsvideo/<?php echo $_GET['video'];?>" type="video/mp4">
  <source src="https://letzplayworld.com/Ads/adsvideo/<?php echo $_GET['video'];?>" type="video/ogg">
    <source src="https://letzplayworld.com/Ads/adsvideo/<?php echo $_GET['video'];?>" type="video/webm">
  </video>

                          <?PHP }?>


                      </div>
                      <div class="btn_block">
                        <a href="javascript:;"><button class="btn_coninue"> Continue</button></a>
                      </div>  
                    </div>
                  </div>                    
                </div> 
                          <input type="hidden" name="location" id="location" value="">
                          <input type="hidden" name="budget" id="budget1" value="">
                            <input type="hidden" name="price" id="prices" value="">
                            <input type="hidden" name="budget_id" id="idss" value="">


                <div class="locatio_block">
                  <div class="dropdown">
                    <button class="btn_ac dropdown-toggle" data-toggle="dropdown">
                      Locations
                      <span id="idssdd">Select country of your target audience </span>
                      
                      <i class="fa fa-angle-right"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li>Whole world</li>
                        <?php $country=mysqli_query($conn,"select * from country ");
                           while($coutnm=mysqli_fetch_array($country)){?>
                        <li><a href="javascript:;" onclick="seletccout('<?php echo $coutnm['id'];?>','<?php echo $coutnm['country'];?>');"><?php echo $coutnm['country'];?></a></li>
                        <?php }?>
                       
                    </ul>  
                  </div> 
                </div>
                <div class="locatio_block">
                  <div class="dropdown">
                    <button class="btn_ac dropdown-toggle" data-toggle="dropdown">
                      Budget
                      <span id="budget">How much are you willing to spend</span>
                      <i class="fa fa-angle-right"></i>
                    </button> 
                    <ul class="dropdown-menu">
                    <?php $sqliiib=mysqli_query($conn,"select * from budget");
                    while($budget=mysqli_fetch_array($sqliiib)){

                     $prices='00';?>
                        <li><a href="javascript:;" onclick="selectbudget('<?php echo $budget['title'];?>','<?php echo str_replace('.00','',$budget['price']).$prices;?>','<?php echo $budget['id'];?>','<?php echo $budget['price'];?>','<?php echo $budget['views'];?>');"> <?php echo $budget['title'];?> </a></li>
                        <?php }?>
                       
                      </ul>   
                  </div> 
                </div>  
              </div>
            </div> 


            <div class="col-sm-4 padder">
              <div class="select_ad_right">
                <div class="select_ad_right_inner">
                  <p class="how_much"> How do you want your ad to show up?</p>
                  <div class="radio_block">
                    <label class="custome_radio">
                      insant show before other Letzplay videos 
                        <input type="radio" checked="checked" value="1" name="show_ads" id="show_ads">
                      <span class="checkmark"></span>
                    </label>
                    
                  </div>

                  <div class="radio_block">
                    <label class="custome_radio">
                      play ad at intervals on letzplay videos
                        <input type="radio" checked="checked" value="2" name="show_ads" id="show_ads">
                      <span class="checkmark"></span>
                    </label>
                    
                  </div>

                  <div class="sumrry_block">
                    <p> After interviews click your ad where do you want to send them?   </p>
                    <input type="text" name="text" class="form-control text-bl" id="text">

                  </div>


                  <div class="sumrry_block_inner">
                    <h4> Summary </h4>
                    <p> Location : <span id="idssdd1"></span>  </p>
                    <p> Amount    </p>
                    <p> $<span id="prices1d"></span>    </p>
                    <p> Number of view   </p>
                    <p> <span id="views"></span>   </p>
                    <div class="stra_time">
                      <p> Start date
                        <span id="startdates"> 00:00:00</span>
                      </p>
                      <p> End date
                        <span id="enddates"> 00:00:00</span>
                      </p>
                    </div>
                  </div>
                </div>  
                <div class="btn_block">
                   <a href="javascript:;" onclick="payWithPaystack(id);"><button class="btn_start"> Proceed</button></a>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


  <?php $paystack=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `signup` where id='".$_SESSION['user_id']."'")); ?>
  <input type="hidden" name="email" id="email" value="<?php  echo $paystack['email'];?>">
  <input type="hidden" name="mobile" id="mobile" value="<?php  echo $paystack['phone_number'];?>">


<div id="formdata"></div>

<style type="text/css">

.ad_header {
    display: none;
}

</style>

<?php include ('footer.php');?> 


<script src="../datepicker/pikaday.js"></script>
    <script>

    new Pikaday(
    {
        field: document.getElementById('datepickerd'),
        trigger: document.getElementById('datepicker-button'),
        minDate: new Date(2000, 0, 1),
        ariaLabel: 'Custom label',
        maxDate: new Date(2020, 12, 31),
        yearRange: [2010,2020]
        
    });



    new Pikaday(
    {
        field: document.getElementById('datepickers'),
        trigger: document.getElementById('datepicker-button'),
        minDate: new Date(2000, 0, 1),
        ariaLabel: 'Custom label',
        maxDate: new Date(2020, 12, 31),
        yearRange: [2010,2020]
        
    });


function seletccout(id,name){

    $("#location").val(id);
                  $("#idssdd").html(name);
                  $("#idssdd1").html(name);



}

function selectbudget(id,price,ids,price1,views){

    $("#budget1").val(id);
                  $("#budget").html(id);
                      $("#prices").val(price);
                      $("#idss").val(ids);
                      $("#prices1d").html(price1);
                                $("#views").html(views);


}


function startdates(id){


$("#startdates").html(id);
                      
}


function enddates(id){


$("#enddates").html(id);
                      
}


    </script>

    <script src="https://js.paystack.co/v1/inline.js"></script>
<script>
  function payWithPaystack(id){
      //  alert(id);
       
         var ids=(id);
         var price= $('#prices').val();

 var pays=(price);
 //alert(pays);


        var mobileno= $('#mobile').val();

        var email= $('#email').val();


        var video= $('#videos').val();
        var start_time= $('#starttime').val();
        var end_time= $('#endtime').val();
        var start_date= $('#datepickerd').val();
        var end_date= $('#datepickers').val();
        var locations= $('#location').val();
        var budget= $('#budget1').val();
        var budget_id= $('#idss').val();
        var show_ads= $('#show_ads').val();
        var texts= $('#text').val();
      
 
      var txnid;
      var status;


      var handler = PaystackPop.setup({

        key: 'pk_test_efd77103d67007cbc651b354c68ef150346c1f99',


/*        key: 'pk_live_65fc347e9d5ea113f50542603ff71a73d317f3ed',
*/          //pk_test_f5b32c868af17a634e716b66fc0966749872b9e3//test
          //pk_live_e6618d4f85e66f3f70a63228f85b97655429e2f5//live
          email: email, 
          amount: pays,
          currency: "USD",
          ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
          metadata: {
           custom_fields: [
           {
            display_name: "Mobile Number",
            variable_name: "mobile_number",
            value: mobileno,
          }
          ]
        },
        callback: function(response){
          /*  alert('success. transaction ref is ' + response.reference);*/
          txnid = response.trans;
          status = response.status;
            //alert(status);

            $.ajax({
             url: "php/add_advertising.php",
             type: "POST",

             data :  {txnid:txnid,price:pays,status:status,video:video,start_time:start_time,end_time:end_time,start_date:start_date,end_date:end_date,locations:locations,budget:budget,budget_id:budget_id,show_ads:show_ads,texts:texts},

             success: function(data){
              //alert(data);

             $("#formdata").html(data);   

           },
           error: function(){}          
         }); 

                //console.log(response);
              },
              onClose: function(){
                alert('window closed');
              }
            });
      handler.openIframe();


    /*

        $(document).ready(function (abcabn) {
     $("#formid").on('submit',(function(abcabn) {
    alert('sasasas');
      $(".loadings").show();
      abcabn.preventDefault();
      $.ajax({
       url: "php/paystack.php",
       type: "POST",
       data:  new FormData(this),
       contentType: false,
             cache: false,
       processData:false,
       success: function(data){
           $(".loadings").hide();
       $("#formdata").show().html(data);
       alert(data);
          },
         error: function(){}          
        });

     }));
   });*/
 }
 </script>


<script type="text/javascript">
$(document).ready(function (contctus) {
  $("#addadvert").on('submit',(function(contctus) {
  $("#form_abc1_img").show();
  contctus.preventDefault();
  $.ajax({
    url: "php/add_advertising.php",
    type: "POST",
    data:  new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
    success: function(data){
      $("#form_abc1_img").hide();
      $("#datart").show().html(data);
    },
    error: function(){}          
  });

 }));
});
</script>

<style type="text/css">
  
.btn_file_block {
    display: block;
    max-width: 75px;
    position: relative;
    overflow: hidden;
    height: 35px;
}
.btn_file_block .file-Sletoion {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
}
.select_ad_main .select_ad_block .select_ad_controls .select_ad_body .left .Select_let .gallery_btn {
    background: #31FF00;
    color: black;
    text-transform: capitalize;
    font-weight: 500;
    padding: 6px 8px;
    font-size: 15px;
    border-radius: 4px;
    margin-right: 3px;
    text-decoration: none !important;
}

</style>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <form method="post" id="letzplayvide" enctype="multipart/form-data">

      <div class="modal-content">
        <div class="modal-header myheadermodel">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: black">Select From Upload</h4>
        </div>
        <div class="modal-body">
          <div class="multipltimage">
          <ul>
          <?php $sqlii=mysqli_query($conn,"select * from advertising where user_id='".$_SESSION['user_id']."' group by video");
          while($rows=mysqli_fetch_array($sqlii)){
          ?>
            <li>
              <a href="">
                <div class="custom-radio-wrap">
                    <div class="form-group">
                      <input id="html<?php echo $rows['id'];?>" type="radio" name="videos" value="<?php echo $rows['video'];?>">
                      <label class="custom-radio" for="html<?php echo $rows['id'];?>"></label>
                      <span class="label-text">
                        <video controls>
                           <source src = "adsvideo/<?php echo $rows['video'];?>" type = "video/mp4">
                           This browser doesn't support video tag.
                        </video>
                      </span>
                    </div>
                </div>
    
                </a>
            </li>
            <?php }?>

          </ul>
        </div>
        </div>
       <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary" >Submit</button>
      </div>
      <div id="showdatas"></div>
      </div>
      </form>
    </div>
  </div>


<style type="text/css">
  
.header
{
  background: #000000;
}
 
.custom-radio-wrap {
    padding: 20px;
    margin-bottom: 20px;
}

.custom-radio-wrap  .form-group {
  margin-bottom: 10px;
}

.custom-radio-wrap  .form-group:last-child {
  margin-bottom: 0;
}

.custom-radio-wrap .form-group label {
    -webkit-appearance: none;
    background-color: #fafafa;
    border: 1px solid #cacece;
    box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05);
    padding: 8px;
    border-radius: 50px;
    display: inline-block;
    position: relative;
    vertical-align: middle;
    cursor: pointer;
    position: absolute;
    left: 15px;
    top: 10px;
}
.custom-radio-wrap  .form-group .label-text {
  vertical-align: middle;
  cursor: pointer;
    padding-left: 10px;
    margin-left: -5px;
}

.custom-radio-wrap  .form-group input {
  display: none;
  cursor: pointer;
}

.custom-radio-wrap  .form-group input:checked + label {
  background-color: #e9ecee;
  color: #99a1a7;
  border: 1px solid #0079bf;  
}

.custom-radio-wrap  .form-group input:checked ~ .label-text {
  color: #0079bf;
  font-weight: 700;
}

.custom-radio-wrap  .form-group input:checked + label:after {
  content: '';
  width: 14px;
  height: 14px;
  border-radius: 50px;
  position: absolute;
  top: 1px;
  left: 1px;
  background: #0079bf;
  box-shadow: inset 0px 0px 10px rgba(0,0,0,0.3);
  text-shadow: none;
  font-size: 32px;
}

.multipltimage {
    overflow: auto;
    height: 400px;
}


.multipltimage ul {
    padding: 0;
    list-style: none;
    margin: 0;
}


.multipltimage ul li {
    width: 30.3%;
    float: left;
    display: inline-block;
    margin-right: 15px;
    position: relative;
}

.multipltimage ul li a {
    display: block;
    background: #efefef;
    width: 100%;
    text-align: center;
    position: relative;
    /* display: flex; */
    /* align-items: center; */
    /* justify-content: center; */
}
.multipltimage ul li a img {
    width: 100%;
    max-width: 110px;
}
.multipltimage ul li a video{
      width: 100%;
    margin-top: 20px;
}





.myheadermodel {
    background: #BDF3F7;
    color: #fff;
}


.Select_video_analysis .Select_video_analysis_block ul li {
    display: inline-block;
    padding: 10px 10px;
    overflow: hidden;
    position: relative;
    width: 33.3%;
    float: left;
}
.Select_video_analysis .Select_video_analysis_block ul li a {
    text-transform: capitalize;
    padding: 10px 6px;
    width: 155px;
    display: block;
    margin: 0 auto;
    height: 125px;
    position: relative;
}

.Select_video_analysis_block ul li a input {
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
}
.Select_video_analysis .Select_video_analysis_block ul {
    padding: 0;
    list-style: none;
    overflow: hidden;
    padding: 10px 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
}

</style>

<progress id="progressBar" value="0" max="100" style="display: none;">
            </progress>
            <h3 id="status"></h3>
              <p id="loaded_n_total"></p>   
                <br>

<script type="text/javascript">
  
function uoloaddd(){
  //alert();
  $("#form_abc11dfgdg").submit();
 }


$(document).ready(function (fg345) {
 $("#form_abc11dfgdg").on('submit',(function(fg345) {
  //alert();
  uploadFile();
//$("#form_abc11_data").html('<img src="img/4.gif" style="width: 30px;hight: 30px;">');




  fg345.preventDefault();
  
  $.ajax({
         url: "php/showvideo.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   success: function(datar){

   $("#form_abc11_data").html(datar);
  // alert(datar);

      },
     error: function(){}           
    });
 }));
});



function getvideo(ids){
/*
 var vid= $('#fli').val();

    $("#videos").val(vid);*/

 // alert(ids);
adsvideo(ids);
$.ajax({
       type: "POST",
         url: "php/getvideo.php",
            data: "ids="+ids, 
          success: function(html)
            {     
              $("#showvid").html(html);
                      
             }
        

            });

}


function adsvideo(ids){
 // alert(ids);

$.ajax({
       type: "POST",
         url: "getsubmitvideo.php",
            data: "ids="+ids, 
          success: function(html)
            {     
$("#videos").val(html);                        
             }
        

            });

}





 function _(el) {

  return document.getElementById(el);

}



function uploadFile()
{
  var file = _("fli").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("image", file);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "file_upload_parser.php"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
  //use file_upload_parser.php from above url
  ajax.send(formdata);
}

function progressHandler(event)
{
  _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
  //_("progressBar").style.background = "red";
  _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
  $("#progressBar").show();
}



function completeHandler(event)
{
  _("status").innerHTML = event.target.responseText;
  //_("progressBar").value = 0; //wil clear progress bar after successful upload
}

function errorHandler(event)
{
  _("status").innerHTML = "Upload Failed";
}

function abortHandler(event)
{
  _("status").innerHTML = "Upload Aborted";
}
var objectUrl;    
$(document).ready(function()
{ 
  $("#fli").change(function(e)
  {
    var file = e.currentTarget.files[0];    
    objectUrl = URL.createObjectURL(file);    
    $("#vid").prop("src", objectUrl);  
    setTimeout(function()
    { 
        var seconds = $("#vid")[0].duration;    
        //alert(seconds);
        if(seconds > 90)
        { 
            //echo "Video duration should be less than 1:30 min";
        //alert('Video duration should be less than 1:30 min'); 
        $("#msgup").html('<div class="alert alert-danger" id="success-alert" <button type="button" class="close" data-dismiss="alert" style="margin-left: 5px">  x  </button><strong >Video ads must not be longer than 1:30 seconds</strong></div>');
      }
      else
      {
        //alert('dtrytutyiuyi'); 
        //$("#msgup").html('<div class="alert alert-Success" id="success-alert" <strong >Uploading....</strong></div>');
          uoloaddd();
          $('#subbb').prop("disabled", false);
      }
    }, 5000);
  });    
});    
    

$(document).ready(function (timesds) {
 $("#contactuss").on('submit',(function(timesds) {
  $("#form_abc1_img").show();
  timesds.preventDefault();
  $.ajax({
   url: "php/getvideotime.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   success: function(data){
     $("#form_abc1_img").hide();
   $("#datart").show().html(data);
      },
     error: function(){}          
    });

 }));
});



$(document).ready(function (addletv) {
 $("#letzplayvide").on('submit',(function(addletv) {
  $("#form_abc1_img").show();
  addletv.preventDefault();
  $.ajax({
   url: "php/letzplayvideo.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   success: function(data){
     $("#form_abc1_img").hide();
   $("#showdatas").show().html(data);
      },
     error: function(){}          
    });

 }));
});




</script>

