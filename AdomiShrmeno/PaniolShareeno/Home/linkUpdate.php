<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Links :: Update</title>
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<meta name="author" content="<?php echo $sAuthor; ?>">

<?php

echo $cssBootstrap;
echo $cssFontAwesome;
echo $cssEMM;
echo $cssChosen;
echo $cssjsoembed;
?>
<link href="../common/css/jquery.tagit.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper" class="toggled">
<?php include_once("../common/sidebar.php");?>
<!-- Page Content -->
<div id="page-content-wrapper">
<div class="container-fluid">
	<?php include_once("../common/header.php");?>
	<div class="page-title"><h3 class="title">Dashboard / Links Update</h3></div>
	<div class="row">
		<div class="col-sm-12 DPaddingLR">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Links - Update </h3>
					<div class="text-right"><a href="linkUpdateList.php"><button type="button" class="btn btn-info">List</button></a></div>
				</div>
				<div class="panel-body">
					<?php 
						if(isset($_GET['updateid'])){
							$updateID = $_GET['updateid'];
							$sql = 'SELECT LinkName,LinkURL FROM com_links WHERE LinkID='.$updateID;
							$resultSlider = mysqli_query($connEMM,$sql);
							$rsSlider = mysqli_fetch_assoc($resultSlider);
						}
					?>
					<form id="bn_content_form" method="post" action="action.php?updateidlink=<?php echo $updateID?>" enctype="multipart/form-data">
						<div id="steps-uid-0" class="wizard clearfix" role="application">
							<div class="content clearfix">
								<section id="steps-uid-0-p-0" class="body current" role="" aria-labelledby="steps-uid-0-h-0" aria-hidden="false">
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label " for="txtLink">Link Name: *</label>
										<div class="col-sm-8"><input type="text" name="txtLink" id="txtLink" maxlength="100" class="form-control required" placeholder="Enter Album" value="<?php echo $rsSlider['LinkName']?>" required autofocus></div>
									</div>
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label " for="txtLinkURL">Link URL: *</label>
										<div class="col-sm-8"><input type="text" name="txtLinkURL" id="txtLinkURL" class="form-control required" placeholder="Enter URL" value="<?php echo $rsSlider['LinkURL']?>" required></div>
									</div>
								</section>
							</div>
							<div class="form-group clearfix">
								<div class="col-lg-12 text-center">
									<input type="submit" name="btnSubmitLink" class="inpSubmit btn-info btn" value="Update" id="submitit">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include_once("../common/footer.php");?>
</div>
</div>
<!-- /#page-content-wrapper -->
</div>
<?php
echo $jsjQuery;
echo $jsjBootstrap;
echo $jsEMM;
?>
</script>
</body>
</html>