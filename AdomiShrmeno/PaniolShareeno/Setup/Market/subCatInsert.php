<?php ob_start();session_cache_expire(60);session_start();require_once("../../common/mysqli_conneCT_general.php");require_once("../../common/config.php"); ?>

<!doctype html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">



<title>Sub-Category :: Insert (Market)</title>



<meta name="robots" content="noindex, nofollow">

<meta name="googlebot" content="noindex, nofollow">

<meta name="author" content="<?php echo $sAuthor; ?>">



<?php

echo $cssBootstrap;

echo $cssFontAwesome;

echo $cssEMM;

?>

<script language="javascript">

function setfocus(){document.frmInsert.txtSubCategoryName.focus();}

$(document).ready(function(){

	$("#frmInsert").validate({

	rules:{

	txtSubCategoryName:{required:true},

	txtPriority:{required:true,number:true}}

	});

});

</script>

<script type="text/javascript" src="../../common/ckeditor/ckeditor.js"></script>

</head>

<body>

<div id="wrapper" class="toggled">

<?php include_once("../../common/sidebar.php");?>

<!-- Page Content -->

<div id="page-content-wrapper">

<div class="container-fluid">

<?php include_once("../../common/header.php");?>

<div class="page-title"><h3 class="title">Dashboard / Sub-Category :: Insert (Market)</h3></div>

<div class="row">

	<div class="col-sm-12 DPaddingLR">

		<div class="panel panel-default">

			<div class="panel-heading">

				<h3 class="panel-title">Sub-Category :: Insert (Market)</h3>

				<div class="text-right"><a href="subCatUpdateList.php"><button type="button" class="btn btn-info">Update</button></a></div>

				<?php if(isset($_REQUEST["msg"])){ ?>Sub-Category Name Already exist. Please type a different Sub-Category Name.<?php } ?>

			</div>

			<div class="panel-body">

				<?php $resultCategory=mysqli_query($connEMM, "SELECT CategoryID, CategoryName FROM com_market_category WHERE Deletable=1 ORDER BY CategoryName") or die(mysqli_error($connEMM)); ?>

				<form id="frmInsert" name="frmInsert" method="post" action="subCatInsertAction.php" enctype="multipart/form-data">

					<div id="steps-uid-0" class="wizard clearfix" role="application">

						<div class="content clearfix">

							<section id="steps-uid-0-p-0" class="body current" role="" aria-labelledby="steps-uid-0-h-0" aria-hidden="false">

								<div class="form-group clearfix">

									<label class="col-sm-2 control-label text-center" for="userName">Category:</label>

									<div class="col-sm-3">

										<select name="cboCategory" class="form-control">

										<?php while($rsCategory=mysqli_fetch_assoc($resultCategory)){ ?>

											<option value="<?php echo $rsCategory["CategoryID"]; ?>"

											<?php if(isset($_SESSION["sessCategoryID"])){if($_SESSION["sessCategoryID"]==$rsCategory["CategoryID"]){echo "selected='selected'";}} ?>><?php echo $rsCategory["CategoryName"]; ?></option>

										<?php }mysqli_free_result($resultCategory); ?>

										</select>

									</div>

								</div>

								<div class="form-group clearfix">

									<label class="col-sm-2 control-label text-center" for="userName">Sub-Category Name: </label><?php echo $sMsgRequired; ?>

									<div class="col-sm-6">

										<input type="text" id="txtSubCategoryName" name="txtSubCategoryName" maxlength="100" class="form-control" value="" required autofocus>

									</div>

								</div>
                                <div class="form-group clearfix">

									<label class="col-sm-2 control-label text-center" for="userName">Sub-Category Name(Bangla): </label><?php echo $sMsgRequired; ?>

									<div class="col-sm-6">

										<input type="text" id="txtSubCategoryNameBN" name="txtSubCategoryNameBN" maxlength="100" class="form-control" value="" required autofocus>

									</div>

								</div>

								<div class="form-group clearfix">

									<label class="col-sm-2 control-label text-center" for="userName">Slug: </label><?php echo $sMsgRequired; ?>

									<div class="col-sm-6">

										<input type="text" id="txtSlug" name="txtSlug" maxlength="100" class="form-control" value="" required autofocus>

									</div>

								</div>
                                
                                <div class="form-group clearfix">

									<label class="col-sm-2 control-label text-center" for="userName">Company Name: </label>

									<div class="col-sm-6">

										<input type="text" id="txtCompanyName" name="txtCompanyName" maxlength="100" class="form-control" value="">

									</div>

								</div>

								<div class="form-group clearfix">

									<label class="col-sm-2 control-label text-center" for="userName">Present Price:</label>

									<div class="col-sm-6">

										<input type="text" name="txtEndNote" maxlength="100" class="form-control" value="" required autofocus>
                                        
                                        

									</div>

								</div>

								<div class="form-group clearfix">

									<label class="col-sm-2 control-label text-center" for="userName">Last Price:</label>

									<div class="col-sm-6">

										<input type="text" name="txtRemarks" maxlength="100" class="form-control" value="" required>

									</div>

								</div>

								<div class="form-group clearfix">

									
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

								
							</section>

						</div>

						<div class="actions clearfix">

							<div class="row text-center">

								<input type="submit" name="btnSubmit" value="Insert" class="btn btn-info">

							</div>

						</div>

					</div>

				</form>

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



</body>

</html>