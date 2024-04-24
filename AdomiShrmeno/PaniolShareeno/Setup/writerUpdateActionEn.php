<?php ob_start();session_cache_expire(60);session_start();require_once("../common/mysqli_conneCT_english.php");require_once("../common/config.php"); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Admin :: Writer Update</title>
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<meta name="author" content="<?php echo $sAuthor; ?>">
<?php
echo $cssBootstrap;
echo $cssFontAwesome;
echo $cssEMM;
?>
<script type="text/javascript" src="../common/ckeditor/ckeditor.js"></script>
</head>
<body>
<div id="wrapper" class="toggled">
	<?php include_once("../common/sidebar.php");?>
	<!-- Page Content -->
	<div id="page-content-wrapper">
		<div class="container-fluid">
			<?php include_once("../common/header.php");?>
			<div class="page-title"><h3 class="title">Dashboard / Writer Update</h3></div>
			<div class="row">
				<div class="col-sm-12 DPaddingLR">
					<div class="panel panel-default">
						<div class="panel-heading"><h3 class="panel-title">Writer Update</h3></br></div>
						<div class="panel-body">
							<?php
							if(isset($_POST["btnSubmit"])){
								$UserName=""; $UserType="";	$sWriterName="";$sWriterNameEn="";	$InitialBn="";	$InitialEn="";	$sWriterBio="";	$sWriterBioEn="";
								$sImageSMPath="";$sImageSMPathNew="";

								$iUpdateID=0;
								if(isset($_REQUEST["updateid"])){
									$iUpdateID=fFormatString($_REQUEST["updateid"]);
									$iUpdateID=filter_var($iUpdateID, FILTER_SANITIZE_NUMBER_INT);
									$iUpdateID=filter_var($iUpdateID, FILTER_VALIDATE_INT);
									if(!is_numeric($iUpdateID)){$iUpdateID=0;}
									if($iUpdateID<0){$iUpdateID=0;}
								}

								if($_FILES["txtImageSMPath"]["name"]!=""){
									//Checking File Size
									$iSize=$_FILES["txtImageSMPath"]["size"]/1024;
									if(($iSize==0) || ($iSize<0) || ($iSize>$iMaxImgSizeGallery) ){
										echo $sMsgImgUpldSizeMaxGal;die();
									}

									//Checking File Extension
									$iInvalid=array('jpg', 'jpeg', 'jpe', 'gif', 'png', 'bmp');
									$sFileName=$_FILES["txtImageSMPath"]["name"];
									$ext=pathinfo($sFileName, PATHINFO_EXTENSION);
									//echo "sFileName: ".$sFileName." - Ext: ".$ext."<br>";
									if(!in_array($ext, $iInvalid)){echo $sMsgImgInvalidImageExt;die();}

									//Checking Image dimension
									list($iWidth, $iHeight, $iType, $iAttr)=getimagesize($_FILES["txtImageSMPath"]["tmp_name"]);
									if( ($iWidth=="") || ($iHeight=="")){echo $sMsgImgInvalidImage;die();}
								}

								$iUpdateID=$_REQUEST["updateid"];//Collecting ID
								$UserName=fFormatString($_POST["UserName"]);
								$UserType=$_POST["UserType"];
								$sWriterNameEn=fFormatString($_POST["txtWriterNameEn"]);
								$InitialEn=fFormatString($_POST["txtInitialEn"]);
								$sSlug=fFormatSlug($_POST["txtSlug"]);
								$sWriterBio=fFormatStringHTML($_POST["txtWriterBio"]);
								$sImageSMPath=$_FILES["txtImageSMPath"]["name"];

								$qUpdate="UPDATE en_writer SET 
								  Type=".$UserType.",
								  WriterNameEn='".$sWriterNameEn."', 
								  InitialEn='".$InitialEn."',
								  Slug='".$sSlug."',
								  WriterBioEn='".$sWriterBio."', 
								  DateTimeUpdated='".$dtDateTime."', ";
								if($sImageSMPath!=""){$qUpdate.="ImagePath='".$sImageSMPath."', ";}
								$qUpdate.="Deletable=1 WHERE WriterID=".$iUpdateID;

								//echo $qUpdate."<br><br>"; die();
								$resultUpdate=mysqli_query($connEMM, $qUpdate) or die(mysqli_error($connEMM));

								if(isset($resultUpdate)){
									//Audit Trail
									$qAuditTrail="INSERT INTO com_audittrail_media(UserInfo, ActionType, ContentID, TableName,RemoteIP, RequestFileName, QueryDetails,DateTimeOccered)
									VALUES('".$_SESSION["sessUserName"]."', 2, ".$iUpdateID.", 'bn_writer', '".$_SERVER["REMOTE_ADDR"]."', '".$_SERVER["REQUEST_URI"]."', '".fAuTrail($qUpdate)."', '".$dtDateTime."')";
									mysqli_query($connEMMAudit, $qAuditTrail) or die($sMsgAuTrailInsert);

									if($sImageSMPath!=""){
							if(is_dir($UploadPhotoWriter) && is_writable($UploadPhotoWriter)){
								if(move_uploaded_file($_FILES["txtImageSMPath"]["tmp_name"], $UploadPhotoWriter.$_FILES["txtImageSMPath"]["name"])){
									print_r($_FILES["txtImageSMPath"]);
									echo $sMsgUpload;

									//Renaming the uploaded file & Creating the NEW file name
									$sExtension=pathinfo($UploadPhotoWriter.$sImageSMPath);
									$sNewName=fFormatImageName($sExtension["filename"]).".".$sExtension["extension"];
									//echo "sNewName: ".$sNewName."<br><br>";

									$dir=opendir($UploadPhotoWriter);
									while($fileRen=readdir($dir)){
										if($fileRen==$sImageSMPath){
											$iFlag=rename($UploadPhotoWriter.$fileRen, $UploadPhotoWriter.$sNewName);

											if($iFlag==1){
												//If Rename was done properly
												//Update the new uploaded file name information into the database
												$sNewName=$sNewName;
												$qUpdate="UPDATE en_writer SET ImagePath='".$sNewName."' WHERE WriterID=".$iUpdateID;
												//echo "qUpdate: ".$qUpdate."<br>";
												mysqli_query($connEMM, $qUpdate) or die("Update ImagePath: ".mysqli_errno($connEMM).": ".mysqli_error($connEMM));
											} // End of IF Flag
										}
									} // End of While
									closedir($dir);
								}else{
									echo $sMsgUploadFail;
									echo "error: ".$_FILES['txtImageSMPath']['error']."<br><br>";
									print_r($_FILES['txtImageSMPath']);
								}
							}else{
								echo $sMsgDirFail;
							}
						}

									echo $sMsgUpdate;
									header("Location: writerListEn.php");
								}else{
									echo $sMsgUpdateFail;
								}
							} ?>
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