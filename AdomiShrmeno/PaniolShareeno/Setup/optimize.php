<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT_bangla.php");require_once("../common/config.php"); ?>

<!doctype html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">



<title>Access by IP :: Bangla Content</title>



<meta name="robots" content="noindex, nofollow">

<meta name="googlebot" content="noindex, nofollow">

<meta name="author" content="<?php echo $sAuthor; ?>">



<?php

echo $cssBootstrap;

echo $cssFontAwesome;

echo $cssEMM;

?>

</head>

<body>

<div id="wrapper" class="toggled">

<?php include_once("../common/sidebar.php");?>

<!-- Page Content -->

<div id="page-content-wrapper">

<div class="container-fluid">

<?php include_once("../common/header.php");?>

<div class="page-title"><h3 class="title">Dashboard / Optimize Database</h3></div>

<div class="row">

	<div class="col-sm-12 DPaddingLR">

		<div class="panel panel-default">

			<div class="panel-heading"><h3 class="panel-title">Optimize Database</h3><br></div>

			<?php

				if(isset($_REQUEST["btnSubmit"])){

					if(isset($_REQUEST["chkScrollBN"])){

						//3. Deleting SCROLL content - BANGLA

						$result=mysqli_query($connEMM, "DELETE FROM bn_scroll WHERE Deletable=2") or die("Error: Scroll (BN) DELETE Failed.<br> Error No.: ".mysqli_errno($connEMM)." Error: ".mysqli_error($connEMM)."<br>" );

						echo "Successfully Deleted all information from Scroll (Bangla)<br><br>";

					}

					if(isset($_REQUEST["chkScrollEN"])){

						//4. Deleting SCROLL content - ENGLISH

						$result=mysqli_query($connEMM, "DELETE FROM en_scroll WHERE Deletable=2") or die("Error: Scroll (EN) DELETE Failed.<br> Error No.: ".mysqli_errno($connEMM)." Error: ".mysqli_error($connEMM)."<br>" );

						echo "Successfully Deleted all information from Scroll (English)<br><br>";

					}

					if(isset($_REQUEST["chkAuditTrailCommonBn"])){

						//5. Deleting AuditTrail

						$result=mysqli_query($connEMM, "TRUNCATE TABLE com_audittrail_gen_bn") or die("Error: AuditTrail (Common-Bangla) DELETE Failed.<br> Error No.: ".mysqli_errno($connEMM)." Error: ".mysqli_error($connEMM)."<br>" );

						echo "Successfully Deleted all information from AuditTrail (Common)<br><br>";

					}

					if(isset($_REQUEST["chkAuditTrailCommonEn"])){

						//5. Deleting AuditTrail

						$result=mysqli_query($connEMM, "TRUNCATE TABLE com_audittrail_gen_en") or die("Error: AuditTrail (Common-English) DELETE Failed.<br> Error No.: ".mysqli_errno($connEMM)." Error: ".mysqli_error($connEMM)."<br>" );

						echo "Successfully Deleted all information from AuditTrail (Common)<br><br>";

					}

					if(isset($_REQUEST["chkAuditTrailBangla"])){

						//5. Deleting AuditTrail

						$result=mysqli_query($connEMM, "TRUNCATE TABLE com_audittrail_bncontent") or die("Error: AuditTrail (Bangla) DELETE Failed.<br> Error No.: ".mysqli_errno($connEMM)." Error: ".mysqli_error($connEMM)."<br>" );

						echo "Successfully Deleted all information from AuditTrail (Bangla)<br><br>";

					}

					if(isset($_REQUEST["chkAuditTrailEnglish"])){

						//5. Deleting AuditTrail

						$result=mysqli_query($connEMM, "TRUNCATE TABLE com_audittrail_encontent") or die("Error: AuditTrail (English) DELETE Failed.<br> Error No.: ".mysqli_errno($connEMM)." Error: ".mysqli_error($connEMM)."<br>" );

						echo "Successfully Deleted all information from AuditTrail (English)<br><br>";

					}

					if(isset($_REQUEST["chkAuditTrailPhoto"])){

						//5. Deleting AuditTrail

						$result=mysqli_query($connEMM, "TRUNCATE TABLE com_audittrail_photo") or die("Error: AuditTrail (Photo) DELETE Failed.<br> Error No.: ".mysqli_errno($connEMM)." Error: ".mysqli_error($connEMM)."<br>" );

						echo "Successfully Deleted all information from AuditTrail (Photo)<br><br>";

					}



					if(isset($_REQUEST["chkEditableValueBN"])){

						//6. Updating all ContentID's value which are currently opened by user in admin panel - BANGLA

						$result=mysqli_query($connEMM, "UPDATE bn_content SET Editable='1' WHERE Editable!='1'") or die("Error: UPDATE Editable value Failed (Bangla).<br> Error No.: ".mysqli_errno($connEMM)." Error: ".mysqli_error($connEMM)."<br>" );

						echo "Successfully updated all Editable content (Bangla)<br><br>";

					}

					if(isset($_REQUEST["chkEditableValueEN"])){

						//6. Updating all ContentID's value which are currently opened by user in admin panel - ENGLISH

						$result=mysqli_query($connEMM, "UPDATE en_content SET Editable='1' WHERE Editable!='1'") or die("Error: UPDATE Editable value Failed (English).<br> Error No.: ".mysqli_errno($connEMM)." Error: ".mysqli_error($connEMM)."<br>" );

						echo "Successfully updated all Editable content (English)<br><br>";

					}

				} ?>

			<div class="panel-body">

				<form name="frmOptimize" method="post" action="optimize.php">

				<div id="steps-uid-0" class="wizard clearfix" role="application">

					<div class="content clearfix">

						<section id="steps-uid-0-p-0" class="body current" role="" aria-labelledby="steps-uid-0-h-0" aria-hidden="false">

							<div class="form-group clearfix">

								<label class="col-sm-offset-2 col-sm-5 control-label text-right" for="#">Optimized Scroll content (Bangla)</label>

								<div class="col-sm-2">

									<label class="switch">

									  <input type="checkbox" name="chkScrollBN" value="1" checked>

									  <span class="slider round"></span>

									</label>

								</div>

							</div>

							<div class="form-group clearfix">

								<label class="col-sm-offset-2 col-sm-5 control-label text-right" for="#"> Optimized Scroll content (English)</label>

								<div class="col-sm-2">

									<label class="switch">

									  <input type="checkbox" name="chkScrollEN" value="1" checked>

									  <span class="slider round"></span>

									</label>

								</div>

							</div>

							<div class="form-group clearfix">

								<label class="col-sm-offset-2 col-sm-5 control-label text-right" for="#"> Optimized Audit Trail (Common-Bangla)</label>

								<div class="col-sm-2">

									<label class="switch">

									  <input type="checkbox" name="chkAuditTrailCommonBn" value="1">

									  <span class="slider round"></span>

									</label>

								</div>

							</div>

							<div class="form-group clearfix">

								<label class="col-sm-offset-2 col-sm-5 control-label text-right" for="#"> Optimized Audit Trail (Common-English) </label>

								<div class="col-sm-2">

									<label class="switch">

									  <input type="checkbox" name="chkAuditTrailCommonEn" value="1">

									  <span class="slider round"></span>

									</label>

								</div>

							</div>

							<div class="form-group clearfix">

								<label class="col-sm-offset-2 col-sm-5 control-label text-right" for="#"> Optimized Audit Trail (Bangla) </label>

								<div class="col-sm-2">

									<label class="switch">

									  <input type="checkbox" name="chkAuditTrailBangla" value="1" >

									  <span class="slider round"></span>

									</label>

								</div>

							</div>

							<div class="form-group clearfix">

								<label class="col-sm-offset-2 col-sm-5 control-label text-right" for="#"> Optimized Audit Trail (English) </label>

								<div class="col-sm-2">

									<label class="switch">

									  <input type="checkbox" name="chkAuditTrailEnglish" value="1">

									  <span class="slider round"></span>

									</label>

								</div>

							</div>

							<div class="form-group clearfix">

								<label class="col-sm-offset-2 col-sm-5 control-label text-right" for="#"> Optimized Audit Trail (Photo) </label>

								<div class="col-sm-2">

									<label class="switch">

									  <input type="checkbox" name="chkAuditTrailPhoto" value="1">

									  <span class="slider round"></span>

									</label>

								</div>

							</div>

							<div class="form-group clearfix">

								<label class="col-sm-offset-2 col-sm-5 control-label text-right" for="#"> Optimized Editable Value (Bangla)</label>

								<div class="col-sm-2">

									<label class="switch">

									  <input type="checkbox" name="chkEditableValueBN" value="1" checked>

									  <span class="slider round"></span>

									</label>

								</div>

							</div>

							<div class="form-group clearfix">

								<label class="col-sm-offset-2 col-sm-5 control-label text-right" for="#">  Optimized Editable Value (English)</label>

								<div class="col-sm-2">

									<label class="switch">

									  <input type="checkbox" name="chkEditableValueEN" value="1" checked>

									  <span class="slider round"></span>

									</label>

								</div>

							</div>

							<div class="form-group clearfix">

								<label class="col-sm-offset-3 col-sm-5 control-label text-center" for="#">

								<input type="submit" name="btnSubmit" value="Optimize" class="btn btn-info">

								</label>

							</div>

						</section>

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

?>

</body>

</html>