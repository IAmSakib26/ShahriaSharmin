<?php ob_start();session_cache_expire(60);session_start();require_once("common/mysqli_conneCT.php");require_once("common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

<title><?php echo $sAdmnTitle; ?> :: Home</title>

<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<meta name="author" content="<?php echo $sAuthor; ?>">

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php
echo $cssBootstrap;
echo $cssFontAwesome;
echo $cssEMM;

    $tday= date('Y-m-d');
?>
<script type="text/javascript">
$(function(){
	$("#datepicker").datepicker({changeMonth:true,changeYear:true});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	/*$.get('ajaxDash.php?part=data', function(data){
		$("#dash1").html(data);
	});
	$.get('ajaxDash.php?part=chart', function(data){
		$("#dash2").html(data);
	});
	*/
	$("#datepicker").change(function(){
		console.log($(this).val());
		$.get('ajaxDash.php?part=data&date=' + $(this).val(), function(data){
			$("#dash1").html(data);
		});
		$.get('ajaxDash.php?part=chart&date=' + $(this).val(), function(data){
			$("#dash2").html(data);
		});
	});
});
</script>
</head>
<body>

<div id="wrapper" class="toggled">

<?php include_once("common/sidebar.php");?>

<!-- Page Content -->
<div id="page-content-wrapper">
<div class="container-fluid">
	<?php include_once("common/header.php");?>

	<div class="page-title"><h1 class="" style="text-align:center">Welcome to Dashboard!</h1></div>
	<div class="row DMarginTop20">
		<div class="col-sm-4 col-sm-offset-4">
			<img src="<?php echo $sSiteURL; ?>media/common/logo.png" class="img-fluid img100" title="Home" alt="Home">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<p class="Height"></p>
		</div>
	</div>
<!-- 	<div class="row">
		<div class="col-sm-7">
			<div class="row">
				<div class="col-sm-6">
					<div class="dash-box dash-box-color-1">
						<div class="dash-box-icon"><i class="fa fa-bars fa-lg"></i></div>
						<div class="dash-box-body">
							<span class="dash-box-count col-sm-6"><?php echo "Under Development";?> <span>Bn</span></span>
							<span class="dash-box-count col-sm-6"><?php echo "Under Development";?> <span>En</span></span>
							<span class="dash-box-title">News Category</span>
						</div>

					</div>
				</div>
				<div class="col-sm-6">
					<div class="dash-box dash-box-color-2">
						<div class="dash-box-icon"><i class="fa fa-newspaper-o fa-lg"></i></div>
						<div class="dash-box-body">
							<span class="dash-box-count  col-sm-6 DPadding0"><?php echo "Under Development";?>K <span>Bn</span></span>
							<span class="dash-box-count  col-sm-6 DPadding0"><?php echo "Under Development";?>K <span>En</span></span>
							<span class="dash-box-title">News</span>
						</div>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="dash-box dash-box-color-3">
						<div class="dash-box-icon"><i class="fa fa-newspaper-o fa-lg"></i></div>
						<div class="dash-box-body">
							<span class="dash-box-count  col-sm-6"><?php echo "Under Development";?> <span>Bn</span></span>
							<span class="dash-box-count  col-sm-6"><?php echo "Under Development";?> <span>En</span></span>
							<span class="dash-box-title">Breaking News</span>
						</div>

					</div>
				</div>
				<div class="col-sm-6">
					<div class="dash-box dash-box-color-4">
						<div class="dash-box-icon"><i class="fa fa-camera fa-lg"></i></div>
						<div class="dash-box-body">
							<span class="dash-box-count"><?php echo "Under Development";?></span>
							<span class="dash-box-title">Photo Album</span>
						</div>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="dash-box dash-box-color-5">
						<div class="dash-box-icon"><i class="fa fa-video-camera fa-lg"></i></div>
						<div class="dash-box-body">
							<span class="dash-box-count"><?php echo "Under Development";?></span>
							<span class="dash-box-title">Video List</span>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="dash-box dash-box-color-6">
						<div class="dash-box-icon"><i class="fa fa-thumbs-o-up fa-lg"></i></div>
						<div class="dash-box-body">
							<span class="dash-box-count "><?php echo "Under Development";?></span>
							<span class="dash-box-title">Opinion Poll</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-5">
			<div class="row">
				<div class="col-sm-6 DMarginTop20">
					<label>Choose Date</label>
					<div class="form-group">
						<div class='input-group date' id='datetimepicker1'>
							<input type="text" id="datepicker" class="form-control">
							<span class="input-group-addon submit_arch"><i class="fa fa-search"></i></span>
						</div>
					</div>
				</div>
				<div class="col-sm-6"></div>
			</div>
			<div id="dash1">

			</div>
		</div>
	</div> -->
	<?php include_once("common/footer.php");?>

</div>

</div>

<?php
//echo $jsjQuery;
echo $jsjBootstrap;
echo $jsHtml5Shiv;
echo $jsRespond;
echo $jsCanvas;
echo $jsEMM;

?>
</body>
</html>