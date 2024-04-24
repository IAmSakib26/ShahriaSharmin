<footer>
<div class="row">
<div class="col-sm-12 DPadding0">
	<div class="DFooterBottom">
		<p><?php echo $sAdmnTitle; ?></p>
		<p>Copyright &copy; <?php echo date("Y"); ?>. All right &reg; by <?php echo $sAuthor; ?>.</p>
	</div>
</div>
</div>
</footer>
<?php
if(isset($connEMM)){
	mysqli_close($connEMM);
}else{
	if(isset($_SESSION["sessUserName"])){session_start();session_destroy();}
	$_SESSION["sessUserName"]=NULL;
	session_unset();
} ?>