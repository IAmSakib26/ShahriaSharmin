<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>About :: Update</title>
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
	<div class="page-title"><h3 class="title">Dashboard / Slider Insert</h3></div>
	<div class="row">
		<div class="col-sm-12 DPaddingLR">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php 
						if(isset($_GET['updateid'])){
							$updateID = $_GET['updateid'];
							$sql = 'SELECT AboutBrief,AboutAward,AboutExhibitions,AboutPress FROM com_about WHERE AboutID='.$updateID;
							$resultAbout = mysqli_query($connEMM,$sql);
							$rsAbout = mysqli_fetch_assoc($resultAbout);
						}
					?>
					<form id="bn_content_form" method="post" action="action.php?updateid=<?php echo $updateID;?>" enctype="multipart/form-data">
						<div id="steps-uid-0" class="wizard clearfix" role="application">
							<div class="content clearfix">
								<section id="steps-uid-0-p-0" class="body current" role="" aria-labelledby="steps-uid-0-h-0" aria-hidden="false">
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label" for="txtAbout">About:</label>
										<div class="col-sm-10"><textarea class="form-control" rows="5" id="txtAbout" name="txtAbout"><?php echo $rsAbout['AboutBrief']?></textarea></div>
									</div>
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label" for="txtAbout">Awards:</label>
										<div class="col-sm-10"><textarea class="form-control" rows="5" id="txtAwards" name="txtAwards"><?php echo $rsAbout['AboutAward']?></textarea></div>
									</div>
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label" for="txtAbout">Exhibitions:</label>
										<div class="col-sm-10"><textarea class="form-control" rows="5" id="txtExhibitions" name="txtExhibitions"><?php echo $rsAbout['AboutExhibitions']?></textarea></div>
									</div>
									<div class="form-group clearfix">
										<label class="col-sm-2 control-label" for="txtAbout">Selected Press:</label>
										<div class="col-sm-10"><textarea class="form-control" rows="5" id="txtPress" name="txtPress"><?php echo $rsAbout['AboutPress']?></textarea></div>
									</div>
								</section>
							</div>
							<div class="form-group clearfix">
								<div class="col-lg-12 text-center">
									<input type="submit" name="btnSubmit" class="inpSubmit btn-info btn" value="Update" id="submitit">
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

<script type="text/javascript">
$(document).ready(function(){

	
});
CKEDITOR.replace('txtAbout', {
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
CKEDITOR.replace('txtExhibitions', {
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
CKEDITOR.replace('txtPress', {
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
CKEDITOR.replace('txtAwards', {
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