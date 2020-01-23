<div id="myModalfdd" class="modal fade" role="dialog">
  <div class="modal-dialog" style="    margin-top: 97px;
  margin-right: 254px;">

  <!-- Modal content-->
  <div class="modal-content" style="    width: 65%;    height: 190px;">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">servicio completo</h4>
    </div>
    <div class="modal-body">
      <p>¿Estás seguro de que deseas completar el servicio?
      </p>
    </div>


    <div>

      <a href="javascript:;" onclick="comleteservice('<?php echo $_POST['id'];?>');"><button type="button" class="btn btn-default" style="  margin-left: 40px;
        font-size: 18px;
        color: white;">Sí</button>

        <button type="button" class="btn btn-default" data-dismiss="modal" style=" margin-left: 120px;
        font-size: 18px;
        color: white;">Cancelar</button>
      </div>
      <div id="selectjobsdsgg"></div>

<!--       <div class="modal-footer">
-->        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
<!--       </div>
-->    </div>

</div>
</div>
<script>
  function comleteservice(id)
  {
    $.ajax({
     type: "POST",
     url: "php/comleteservice.php",
     data: "id="+id,
     success: function(html)
     {     
      $("#selectjobsdsgg").html(html);

    }


  });

  }


</script>