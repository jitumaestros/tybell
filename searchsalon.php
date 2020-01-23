  <?php include('common/config.php');
  extract($_POST);

  $users=mysqli_fetch_array(mysqli_query($conn,"select * from users where id='".$_SESSION['user_id']."'"));

  $n='1';

  $userss =mysqli_query($conn,"select * from users where business_name like '%".$val."%' and role='2'");

  if(mysqli_num_rows($userss)==0){

   echo ' <h5><i class="fa  fa-frown-o"></i> &nbsp; No matching results.</h5>';

 }

 while($row = mysqli_fetch_array($userss)){	
  ?>
  <li>
    <a href="#" onclick="selectusers('<?php echo $row['id'];?>');"> 
    <label class="spa_radio">
      <?php echo $row['business_name'];?>
      <!-- <input type="radio" checked="checked" name="radio">
      <span class="checkmark"></span> -->
    </label>
  </li> 

  <?php  } ?>

  <script type="text/javascript">
    function selectusers(val){
      
      $("#form_abc1f_img").show();
      jQuery.ajax({
       url: "selectsalon.php",
       type: "POST",
       data : "val="+val,
       success: function(data){
         //alert(data);

         $("#saeress1s").hide();

         $("#countt").html(data);
         document.getElementById("searcountid").value = "";
       },
       error: function(){}          
     }); 
    }
  </script>



  <style type="text/css">
    
    ul#saeress1 {
      padding: 0;
      margin: 0;
      list-style: none;
    }
    ul#saeress1 a {
      color: black;
      font-size: 14px;
      display: block;
      text-transform: capitalize;
      line-height: 30px;
    }

  </style>





