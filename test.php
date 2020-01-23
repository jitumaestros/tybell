 <form method="post" id="loginform"  enctype="multipart/form-data">
                    <span id="msgup"></span>
<input type="file" name="image"  required="required" onchange="uploadFile()"  id="fli" >
    <video controls width="500px" id="vid" style="display:none"></video>  
    <button name="submit" type="submit">send</button>
    </form>

<progress id="progressBar" value="0" max="150" style="    width: 300px;

    color: green;

    height: 30px;display:none"></progress>

  <h3 id="status"></h3>

  <p id="loaded_n_total"></p> 
  <div id="datart"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script type="text/javascript">



$(document).ready(function (loginabc41) {
 $("#loginform").on('submit',(function(loginabc41) {
  $("#form_abc1_img").show();
  loginabc41.preventDefault();
  $.ajax({
   url: "php/add_video.php",
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






 function _(el) {

  return document.getElementById(el);

}



function uploadFile() {

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


function progressHandler(event) {


  _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;

  var percent = (event.loaded / event.total) * 100;

  _("progressBar").value = Math.round(percent);

  _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";

  

        $("#progressBar").show();



}



function completeHandler(event) {

  _("status").innerHTML = event.target.responseText;

  _("progressBar").value = 0; //wil clear progress bar after successful upload

}



function errorHandler(event) {

  _("status").innerHTML = "Upload Failed";

}



function abortHandler(event) {

  _("status").innerHTML = "Upload Aborted";

}

var objectUrl;    
    
$(document).ready(function(){ 

$("#fli").change(function(e){

var file = e.currentTarget.files[0];    
objectUrl = URL.createObjectURL(file);    
$("#vid").prop("src", objectUrl);  

setTimeout(function(){ 

      var seconds = $("#vid")[0].duration;    
//alert(seconds);
if(seconds > 90) { 
 
    //echo "Video duration should be less than 1:30 min";
//alert('Video duration should be less than 1:30 min'); 
$("#msgup").html('<div class="alert alert-danger" id="success-alert" <button type="button" class="close" data-dismiss="alert" style="margin-left: 5px">  x  </button><strong >Video ads must not be longer than 1:30 seconds</strong></div>');

}
else{

    //alert('dtrytutyiuyi'); 
    //$("#msgup").html('<div class="alert alert-Success" id="success-alert" <strong >Uploading....</strong></div>');

    uoloaddd();

    $('#subbb').prop("disabled", false);

}

}, 5000);


   
   
});    
    
   

    
});    
    
</script>