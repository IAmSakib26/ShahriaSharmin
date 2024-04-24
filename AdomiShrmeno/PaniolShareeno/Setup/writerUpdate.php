<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT_bangla.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Writer - Update</title>
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<meta name="author" content="<?php echo $sAuthor; ?>">
<?php
echo $cssBootstrap;
echo $cssFontAwesome;
echo $cssEMM;
?>
<script type="text/javascript" src="../common/ckeditor/ckeditor.js"></script>
<link href="../common/css/jquery.tagit.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper" class="toggled">
<?php include_once("../common/sidebar.php");?>
<!-- Page Content -->
<div id="page-content-wrapper">
<div class="container-fluid">
<?php include_once("../common/header.php");?>
<div class="page-title"><h3 class="title">Dashboard / Writer - Update</h3></div>
<div class="row">
	<div class="col-sm-12 DPaddingLR">
		<div class="panel panel-default">
			<div class="panel-body">
				<?php $iUpdateID=$_REQUEST["updateid"];
				$qUpdate="SELECT * FROM bn_writer WHERE WriterID=".$iUpdateID;
				$resultUpdate=mysqli_query($connEMM, $qUpdate);
				$rsUpdate=mysqli_fetch_assoc($resultUpdate); ?>
				<form name="frmUpdate" id="frmUpdate" action="writerUpdateAction.php?updateid=<?php echo $iUpdateID; ?>" enctype="multipart/form-data" method="post">
				<div id="steps-uid-0" class="wizard clearfix" role="application">
					<div class="content clearfix">
						<section id="steps-uid-0-p-0" class="body current" role="" aria-labelledby="steps-uid-0-h-0" aria-hidden="false">
							<div class="form-group clearfix">
								<label class="col-sm-2 control-label" for="#"> User Type: </label>
								<div class="col-sm-4">
									<select class="form-control" id="UserType" name="UserType">
										<option value="1" <?php if($rsUpdate["Type"]==1){ echo 'selected'; } ?> >Sub-Editor</option>
										<option value="2" <?php if($rsUpdate["Type"]==2){ echo 'selected'; } ?> >Stuff Reporter</option>
										<option value="3" <?php if($rsUpdate["Type"]==3){ echo 'selected'; } ?> >District Correspondent</option>
										<option value="4" <?php if($rsUpdate["Type"]==4){ echo 'selected'; } ?> >Contributor</option>
									</select>
								</div>
							</div>
							<div class="form-group clearfix">
								<label class="col-sm-2 control-label" for="#"> Writer Name(BN): </label>
								<div class="col-sm-10">
									<input type="text" id="txtWriterName" name="txtWriterName" maxlength="100" value="<?php echo $rsUpdate["WriterName"]; ?>" class="form-control" >
								</div>
							</div>
							<div class="form-group clearfix">
								<label class="col-sm-2 control-label" for="#"> Initial (BN): </label>
								<div class="col-sm-4">
									<input type="text" id="txtInitialBn" name="txtInitialBn" maxlength="10" value="<?php echo $rsUpdate["InitialBn"]; ?>" class="form-control">
								</div>
								<label class="col-sm-2 control-label" for="#"> Slug (EN): <?php echo $sMsgRequired; ?></label>
								<div class="col-sm-4">
									<input type="text" id="txtSlug" name="txtSlug" maxlength="14" value="<?php echo $rsUpdate["Slug"]; ?>" class="form-control required" required autofocus>
								</div>

							</div>
							<div class="form-group clearfix">
								<label class="col-sm-2 control-label" for="#">Writer Bio: </label>
								<div class="col-sm-10">
									<textarea id="txtWriterBio" name="txtWriterBio" class="form-control required" rows="8"> <?php echo $rsUpdate["WriterBio"]; ?></textarea>
								</div>
							</div>

							<div class="form-group clearfix">
								<label class="col-sm-2 control-label" for="userName">Photo:</label>
								<div class="col-sm-8">
									<?php echo $rsUpdate["ImagePath"]; ?><br>
									<?php if($rsUpdate["ImagePath"]!=""){?>
									<img src="<?php echo $sSiteURL; ?>media/Writer/<?php echo $rsUpdate["ImagePath"]; ?>" class="img-responsive"><br><?php } ?>
								</div>
							</div>
							<div class="form-group clearfix">
								<label class="col-sm-2 control-label" for="#">Photo Updated: </label>
								<div class="col-sm-10">
									<div class="input-group input-file" name="txtImageSMPath">
										<span class="input-group-btn"><button class="btn btn-default btn-choose" type="button">Choose</button></span>
										<input type="text" class="form-control" placeholder='Choose a file...'  />
										<span class="input-group-btn"><button class="btn btn-warning btn-reset" type="button">Reset</button></span>
									</div>
								</div><br><br>
							</div>
						</section>
					</div>
					<div class="content clearfix">
						<div class="col text-center">
							<input type="submit" name="btnSubmit" value="Update" class="btn btn-info">
						</div>
					</div>
				</div>
			</form>
			</div>
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
<script>
$(document).ready(function(){
	$("#UserType").change(function(){
		
			var catxid=$(this).val();
			if(catxid==1){
				$('#UserName').removeAttr('disabled');			
			}else{
				$('#UserName').attr('disabled', 'disabled');			
			}
		})
});
	CKEDITOR.replace( 'txtWriterBio' );
</script>
</body>
</html>