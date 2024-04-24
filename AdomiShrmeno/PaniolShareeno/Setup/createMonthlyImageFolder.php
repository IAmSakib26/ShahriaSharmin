<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT_general.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Monthly Image Folder</title>
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<meta name="author" content="<?php echo $sAuthor; ?>">
<?php
echo $cssBootstrap;
echo $cssFontAwesome;
echo $cssEMM;
?>
<script language="javascript">
function setfocus(){document.frmInsert.txtImageFolderName.focus();}
$(document).ready(function(){$("#frmInsert").validate();});
</script>
</head>
<body>
<div id="wrapper" class="toggled">
<?php include_once("../common/sidebar.php");?>
<!-- Page Content -->
<div id="page-content-wrapper">
<div class="container-fluid">
<?php include_once("../common/header.php");?>
<div class="page-title"><h3 class="title">Dashboard / Monthly Image Folder</h3></div>
<div class="row">
<div class="col-sm-12 DPaddingLR">
<div class="panel panel-default">
	<div class="panel-body">
		<div id="steps-uid-0" class="wizard clearfix" role="application">
			<div class="content clearfix">
				<section id="steps-uid-0-p-0" class="body current" role="" aria-labelledby="steps-uid-0-h-0" aria-hidden="false">
					<div class="row">
						<div class="col-sm-12 DTable table-responsive">
							<?php if(isset($_REQUEST["btnSubmit"])){
		echo '<table border="0" cellpadding="5" cellspacing="0" align="center" class="Tbl500"><tr><td align="right" valign="middle">';
		$sNewDir=fFormatString($_REQUEST["txtImageFolderName"]);
		$qInsert="INSERT INTO com_monthlyimagefoldername (FolderName, ImageFolderName) VALUES ('".$sNewDir."', '".$sNewDir."')";
		//echo $qInsert."<br>";
		if(mysqli_query($connEMM, $qInsert)){
			//Audit Trail
			$qAuditTrail="INSERT INTO com_audittrail_gen_bn(UserInfo, ActionType, TableName, RemoteIP, RequestFileName, QueryDetails, DateTimeOccered)
			VALUES('".$_SESSION["sessUserName"]."', 1, 'com_monthlyimagefoldername', '".$_SERVER["REMOTE_ADDR"]."', '".$_SERVER["REQUEST_URI"]."', '".fAuTrail($qInsert)."', '".$dtDateTime."')";
			mysqli_query($connEMMAudit, $qAuditTrail) or die($sMsgAuTrailInsert);
			//Create Directory Info ImageAll Folder
			$oldumask=umask(0);
			if(!file_exists($sPath.$sProjDir.'media/imgAll/'.$sNewDir)){
				$sPathImgAll=$sPath.$sProjDir.'media/imgAll/'.$sNewDir;
				$sPathImgAllSM=$sPath.$sProjDir.'media/imgAll/'.$sNewDir.'/SM';
				$sPathImgAllEn=$sPath.$sProjDir.'media/imgAll/'.$sNewDir.'/en';
				$sPathImgAllEnSM=$sPath.$sProjDir.'media/imgAll/'.$sNewDir.'/en/SM';
				$sPathPhotoAlbum=$sPath.$sProjDir.'media/PhotoAlbum/'.$sNewDir;
				$sPathPhotoProfile=$sPath.$sProjDir.'media/Profile/'.$sNewDir;
				$sPathPhotoQR=$sPath.$sProjDir.'media/QR/'.$sNewDir;
				$sPathPhotoGallery=$sPath.$sProjDir.'media/PhotoGallery/'.$sNewDir;
				$sPathAudio=$sPath.$sProjDir.'media/Audio/'.$sNewDir;
				mkdir($sPathImgAll, 0755, true);
				chmod($sPathImgAll, 0755);
				mkdir($sPathImgAllSM, 0755, true);
				chmod($sPathImgAllSM, 0755);
				mkdir($sPathImgAllEn, 0755, true);
				chmod($sPathImgAllEn, 0755);
				mkdir($sPathImgAllEnSM, 0755, true);
				chmod($sPathImgAllEnSM, 0755);
				mkdir($sPathPhotoAlbum, 0755, true);
				chmod($sPathPhotoAlbum, 0755);
				mkdir($sPathPhotoProfile, 0755, true);
				chmod($sPathPhotoProfile, 0755);
				mkdir($sPathPhotoQR, 0755, true);
				chmod($sPathPhotoQR, 0755);
				mkdir($sPathPhotoGallery, 0755, true);
				chmod($sPathPhotoGallery, 0755);
				mkdir($sPathAudio, 0755, true);
				chmod($sPathAudio, 0755);
				$sData='<!doctype html><html lang="en"><head><meta charset="UTF-8"><title>'.$sSiteTitle.'</title><meta http-equiv="refresh" content="0;'.$sSiteURL.'"><script language="javascript">window.location="'.$sSiteURL.'";</script></head><body></body></html>';
				$sDataHt='#For Image Folders
#Disable directory browsing
Options -Indexes
#Disable directory listings
IndexIgnore *
#Block by User Agent String
BrowserMatchNoCase SpammerRobot bad_bot
BrowserMatchNoCase SecurityHoleRobot bad_bot
Order Deny,Allow
Deny from env=bad_bot
#Enable index.php Execution
<Files /index.php>
Order Allow,Deny
Allow from all
</Files>
<Files /index.html>
Order Allow,Deny
Allow from all
</Files>
<Files /index.htm>
Order Allow,Deny
Allow from all
</Files>
#Enable jpg, Execution
<FilesMatch ".*\.(jpg|jpeg|jpe|gif|png|bmp)$">
Order Allow,Deny
Allow from all
</FilesMatch>
';
				$myFile=$sPathImgAll."/index.html";
				$fh=fopen($myFile, "w");fwrite($fh, $sData);fclose($fh);
				$myFile=$sPathImgAll."/index.php";
				$fh=fopen($myFile, "w");fwrite($fh, $sData);fclose($fh);
				$myFile=$sPathImgAll."/.htaccess";
				$fh=fopen($myFile, "w");fwrite($fh, $sDataHt);fclose($fh);

				$myFile=$sPathImgAllSM."/index.html";
				$fh=fopen($myFile, "w");fwrite($fh, $sData);fclose($fh);
				$myFile=$sPathImgAllSM."/index.php";
				$fh=fopen($myFile, "w");fwrite($fh, $sDataHt);fclose($fh);
				$myFile=$sPathImgAllSM."/.htaccess";
				$fh=fopen($myFile, "w");fwrite($fh, $sDataHt);fclose($fh);

				$myFile=$sPathImgAllEn."/index.html";
				$fh=fopen($myFile, "w");fwrite($fh, $sData);fclose($fh);
				$myFile=$sPathImgAllEn."/index.php";
				$fh=fopen($myFile, "w");fwrite($fh, $sDataHt);fclose($fh);
				$myFile=$sPathImgAllEn."/.htaccess";
				$fh=fopen($myFile, "w");fwrite($fh, $sDataHt);fclose($fh);

				$myFile=$sPathImgAllEnSM."/index.html";
				$fh=fopen($myFile, "w");fwrite($fh, $sData);fclose($fh);
				$myFile=$sPathImgAllEnSM."/index.php";
				$fh=fopen($myFile, "w");fwrite($fh, $sDataHt);fclose($fh);
				$myFile=$sPathImgAllEnSM."/.htaccess";
				$fh=fopen($myFile, "w");fwrite($fh, $sDataHt);fclose($fh);

				$myFile=$sPathPhotoGallery."/index.html";
				$fh=fopen($myFile, "w");fwrite($fh, $sData);fclose($fh);
				$myFile=$sPathPhotoGallery."/index.php";
				$fh=fopen($myFile, "w");fwrite($fh, $sData);fclose($fh);
				$myFile=$sPathPhotoGallery."/.htaccess";
				$fh=fopen($myFile, "w");fwrite($fh, $sDataHt);fclose($fh);

				$myFile=$sPathPhotoProfile."/index.html";
				$fh=fopen($myFile, "w");fwrite($fh, $sData);fclose($fh);
				$myFile=$sPathPhotoProfile."/index.php";
				$fh=fopen($myFile, "w");fwrite($fh, $sData);fclose($fh);
				$myFile=$sPathPhotoProfile."/.htaccess";
				$fh=fopen($myFile, "w");fwrite($fh, $sDataHt);fclose($fh);

				$myFile=$sPathPhotoQR."/index.html";
				$fh=fopen($myFile, "w");fwrite($fh, $sData);fclose($fh);
				$myFile=$sPathPhotoQR."/index.php";
				$fh=fopen($myFile, "w");fwrite($fh, $sData);fclose($fh);
				$myFile=$sPathPhotoQR."/.htaccess";
				$fh=fopen($myFile, "w");fwrite($fh, $sDataHt);fclose($fh);

				$myFile=$sPathAudio."/index.html";
				$fh=fopen($myFile, "w");fwrite($fh, $sData);fclose($fh);
				$myFile=$sPathAudio."/index.php";
				$fh=fopen($myFile, "w");fwrite($fh, $sData);fclose($fh);
				$myFile=$sPathAudio."/.htaccess";
				$fh=fopen($myFile, "w");fwrite($fh, $sDataHt);fclose($fh);
			}else{
				echo "Directory Already exists<br>";
			}
			umask($oldumask);
			echo $sMsgInsert;
		}else{
			if(mysqli_errno($connEMM)==1062){header("Location:".$_SERVER["HTTP_REFERER"]."?msg=duplicate");}
			echo $sMsgInsertFail;
		}
	echo '</td></tr></table>';
	} ?>
							<div class="form-group clearfix">
								<form id="frmInsert" name="frmInsert" action="createMonthlyImageFolder.php" method="post">
								<div class="col-sm-offset-2 col-sm-8 bg-info text-center">
									<h4>Monthly Image Folder</h4>
								</div><br><br><br>
								<label class="col-sm-offset-1 col-sm-3 control-label text-right" >Monthly Image Folder:</label>
								<div class="col-sm-3">
									<input type="text" name="txtImageFolderName" id="" class="form-control required"  value="<?php echo date("YF"); ?>">
								</div>
								<div class="col-sm-2 ">
									<input type="submit" name="btnSubmit" class="btn btn-info btn-block" value="Create">
								</div>
								</form>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-offset-2 col-sm-8 DTable table-responsive">
				<table class="table table-hover table-bordered">
					<thead class="bg-info">
						<tr>
							<th style="width:50%">Content Folder</th>
							<th style="width:50%">Photo Folder</th>
						</tr>
					</thead>
					<tbody>
						<?php if(isset($_REQUEST["msg"])){ ?><tr><td colspan="2" class="TdDuplicate">Folder Name Already exist. Please type a different Folder Name.</td></tr><?php } ?>
						<?php $resultList=mysqli_query($connEMM, "SELECT * FROM com_monthlyimagefoldername ORDER BY FolderID DESC") or die(mysqli_error($connEMM));
		while($rsList=mysqli_fetch_assoc($resultList)){ ?>
		<tr class="TrUpdateListSelect"><td align="center" valign="middle"><?php echo $rsList["FolderName"]; ?></td><td align="center" valign="middle"><?php echo $rsList["ImageFolderName"]; ?></td></tr>
		<?php }mysqli_free_result($resultList); ?>
					</tbody>
				</table>
			</div>
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
</body>
</html>