<?php include('common/config.php');
extract($_POST);
$n='1';
$userss =mysqli_query($conn,"select * from users where id='$val'");
if(mysqli_num_rows($userss)==0){
	echo ' <h5><i class="fa  fa-frown-o"></i> &nbsp; No result Found.</h5>';

}

while($plynm = mysqli_fetch_array($userss)){

	?>
	<input  type="hidden" class="form-control" name="id" value="<?php echo $plynm['id'];?>">


         			<span class="input-group-addon">  <img src="img/search1.png"></span>
         			<input  type="text" class="form-control" name="salon"  onkeyup="search_salon(this.value);"  placeholder="Buscar Salón" value="<?php echo $plynm['business_name'];?>">
	<?php }?>