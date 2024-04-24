<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Album :: Insert</title>
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<meta name="author" content="<?php echo $sAuthor; ?>">

<?php
$_SESSION["sessRedirectPageBN"]='contentUpdateList.php';
$_SESSION["dist"]="no";

echo $cssBootstrap;
echo $cssFontAwesome;
echo $cssEMM;
echo $cssChosen;
echo $cssjsoembed;
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script type="text/javascript" src="../common/ckeditor/ckeditor.js"></script>
<!-- <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script> -->
<link href="../common/css/jquery.tagit.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper" class="toggled">
<?php include_once("../common/sidebar.php");?>
<!-- Page Content -->
<div id="page-content-wrapper">
<div class="container-fluid">
	<?php include_once("../common/header.php");?>
	<div class="page-title"><h3 class="title">Dashboard / Album Insert</h3></div>
	<div class="row">
		<div class="col-sm-12 DPaddingLR">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Album - Insert </h3>
					<div class="text-right"><a href="albumUpdateList.php"><button type="button" class="btn btn-info">List</button></a></div>
				</div>
				<div class="panel-body">
					<form id="bn_content_form" method="post" action="action.php" enctype="multipart/form-data">
						<div id="steps-uid-0" class="wizard clearfix" role="application">
							<div class="content clearfix">
								<section id="steps-uid-0-p-0" class="body current" role="" aria-labelledby="steps-uid-0-h-0" aria-hidden="false">
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label " for="txtName">Album Name: *</label>
										<div class="col-sm-8"><input type="text" name="txtName" id="txtName" maxlength="100" class="form-control required" placeholder="Enter Album" value="" required autofocus></div>
									</div>
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label " for="txtBrief">Album Description: *</label>
										<div class="col-sm-8"><textarea type="text" name="txtBrief" id="txtBrief" class="form-control required" placeholder="Enter Description" required></textarea></div>
									</div>
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label " for="txtColumn">Column you want: </label>
										<div class="col-sm-8"><input type="number" name="txtColumn" id="txtColumn" min="1" class="form-control" placeholder="Enter Number of Column" value="2"></div>
									</div>
								</section>
							</div>
							<div class="form-group clearfix">
								<div class="col-lg-12 text-center">
									<input type="submit" name="btnSubmitIn" class="inpSubmit btn-info btn" value="Insert" id="submitit">
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
echo $jsHtml5Shiv;
echo $jsRespond;
echo $jsEMM;
echo $jsChosen;
echo $jsPrism;
echo $jsOembed;
?>
<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../common/js/tag-it.min.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	CKEDITOR.replace('txtBrief', {
		allowedContent: {
			script: true,
			iframe: true,
			blockquote: true,
			div: true,
			$1: {
				// This will set the default set of elements
				elements: CKEDITOR.dtd,
				attributes: true,
				styles: true,
				classes: true
			}
		},
	  height: 300,
	  filebrowserUploadUrl: "<?php echo $sAdmnURL?>/imgUpload.php"
	});
</script>
</body>
</html>