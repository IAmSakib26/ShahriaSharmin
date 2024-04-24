<?php ob_start();session_cache_expire(60);session_start();require_once("../../common/mysqli_conneCT_bangla.php");require_once("../../common/config.php"); ?>

<!doctype html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">



<title>Category :: Insert (Bangla)</title>



<meta name="robots" content="noindex, nofollow">

<meta name="googlebot" content="noindex, nofollow">

<meta name="author" content="<?php echo $sAuthor; ?>">



<?php

echo $cssBootstrap;

echo $cssFontAwesome;

echo $cssEMM;

?>

<script type="text/javascript" src="../../common/ckeditor/ckeditor.js"></script>

<script language="javascript">

function setfocus(){document.frmInsert.txtCategoryName.focus();}

$(document).ready(function(){

	$("#frmInsert").validate({

	rules:{

	txtCategoryName:{required:true},

	txtPriority:{required:true,number:true}}

	});

});

</script>

</head>

<body>

<div id="wrapper" class="toggled">

<?php include_once("../../common/sidebar.php");?>

<!-- Page Content -->

<div id="page-content-wrapper">

<div class="container-fluid">

<?php include_once("../../common/header.php");?>

<div class="page-title"><h3 class="title">Dashboard / Category :: Insert (Bangla)</h3></div>

<div class="row">

	<div class="col-sm-12 DPaddingLR">

		<div class="panel panel-default">

			<div class="panel-heading">

				<h3 class="panel-title">Category :: Insert (Bangla)</h3>

				<div class="text-right"><a href="categoryUpdateList.php"><button type="button" class="btn btn-info">Update</button></a></div>

				<?php if(isset($_REQUEST["msg"])){ ?>Category Name Already exist. Please type a different Category Name.<?php } ?>

			</div>

			<div class="panel-body">			

				<form id="frmInsert" name="frmInsert" method="post" action="categoryInsertAction.php" enctype="multipart/form-data">

					<div class="content clearfix">

						<section id="steps-uid-0-p-0" class="body current" role="" aria-labelledby="steps-uid-0-h-0" aria-hidden="false">

							<div class="form-group clearfix">

								<label class="col-sm-2 control-label text-center" for="userName">Category Name: </label><?php echo $sMsgRequired; ?>

								<div class="col-sm-7">

									<input type="text" id="txtCategoryName" name="txtCategoryName" maxlength="100" class="form-control" value="" required autofocus>

								</div>

							</div>

							<div class="form-group clearfix">

								<label class="col-sm-2 control-label text-center" for="userName">Slug: </label><?php echo $sMsgRequired; ?>

								<div class="col-sm-7">

									<input type="text" id="txtSlug" name="txtSlug" maxlength="100" class="form-control" value="" required>

								</div>

							</div>

							<div class="form-group clearfix">

								<label class="col-sm-2 control-label text-center" for="userName">End Note:</label>
								<div class="col-sm-10"><textarea id="txtEndNote" name="txtEndNote" rows="3" class="form-control"></textarea></div>

							</div>

							<div class="form-group clearfix">

								<label class="col-sm-2 control-label text-center" for="userName">Remarks:</label>

								<div class="col-sm-10"><textarea id="txtRemarks" name="txtRemarks" rows="3" class="form-control"></textarea></div>


							</div>

							<div class="form-group clearfix">

								<label class="col-sm-2 control-label" for="userName">Priority:<?php echo $sMsgRequired.$sMsgNumber;?></label>

								<div class="col-sm-2">

									<input type="number" id="txtPriority" name="txtPriority" class="form-control" maxlength="3" size="2" value="1">

								</div>

								<label class="col-sm-2 control-label text-right" for="userName">Show in Menu:  </label>

								<div class="col-sm-2">

									<label class="radio-inline">

										<input type="radio" name="rdoShow" value="1" checked="checked">Yes

									</label>

									<label class="radio-inline">

										<input type="radio" name="rdoShow" value="2">No

									</label>

								</div>

							</div>

							<div class="form-group clearfix">

								<label class="col-sm-2 control-label" for="userName">Image (Icon):

									<span><?php echo $sMsgImgCatIcon; ?></span></label>

								<div class="col-sm-10">

									<div class="input-group input-file" name="txtImageIcon">

										<span class="input-group-btn"><button class="btn btn-default btn-choose" type="button">Choose</button></span>

										<input type="text" class="form-control" placeholder='Choose a file...' />

										<span class="input-group-btn"><button class="btn btn-warning btn-reset" type="button">Reset</button></span>

									</div>

								</div>

							</div>

							<div class="form-group clearfix">

								<label class="col-sm-2 control-label " for="userName">Image (Menu):

									<span><?php echo $sMsgImgCatMenu; ?></span></label>

								<div class="col-sm-10">

									<div class="input-group input-file" name="txtImageMenu">

										<span class="input-group-btn"><button class="btn btn-default btn-choose" type="button">Choose</button></span>

										<input type="text" class="form-control" placeholder='Choose a file...' />

										<span class="input-group-btn"><button class="btn btn-warning btn-reset" type="button">Reset</button></span>

									</div>

								</div>

							</div>

							<div class="form-group clearfix">

								<label class="col-sm-2 control-label " for="userName">Image (Cover Home):

									<span><?php echo $sMsgImgCatCoverHome; ?></span></label>

								<div class="col-sm-10">

									<div class="input-group input-file" name="txtImageCoverHome">

										<span class="input-group-btn"><button class="btn btn-default btn-choose" type="button">Choose</button></span>

										<input type="text" class="form-control" placeholder='Choose a file...' />

										<span class="input-group-btn"><button class="btn btn-warning btn-reset" type="button">Reset</button></span>

									</div>

								</div>

							</div>

							<div class="form-group clearfix">

								<label class="col-sm-2 control-label " for="userName">Image (Cover Inner):

									<span><?php echo $sMsgImgCatCoverInner; ?></span></label>

								<div class="col-sm-10">

									<div class="input-group input-file" name="txtImageCoverInner">

										<span class="input-group-btn"><button class="btn btn-default btn-choose" type="button">Choose</button></span>

										<input type="text" class="form-control" placeholder='Choose a file...' />

										<span class="input-group-btn"><button class="btn btn-warning btn-reset" type="button">Reset</button></span>

									</div>

								</div>

							</div>

						</section>

					</div>

					<div class="actions clearfix">

						<div class="row text-center">

							<input type="submit" name="btnSubmit" value="Insert" class="btn btn-info">

						</div>

					</div>

				</form>

			</div>				

		</div>

	</div>

</div>

</div>

</div>

<?php include_once("../../common/footer.php");?>

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

?>

<script>

//CKEDITOR.replace( 'txtEndNote' );

//CKEDITOR.replace( 'txtRemarks' );

</script>

</body>

</html>